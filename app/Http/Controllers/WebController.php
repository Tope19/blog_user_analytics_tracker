<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use App\Visitors;
use Illuminate\Support\Facades\Validator;
use App\BlogCategory;
use App\BlogComment;

class WebController extends Controller
{
    public function index(){
        $trending = Blog::where('status', 1)
                            ->inRandomOrder()
                            ->get();

        $ip = Visitors::create([
            'ip' =>  request()->ip(),
        ]);

        // dd($ip);





        $categories = BlogCategory::orderby('title')->limit(5)->inRandomOrder()->get();
        $recent_posts = Blog::orderby('created_at' , 'desc')->limit(5)->inRandomOrder()->paginate();
        return view('web.index', compact('trending','recent_posts','categories', 'ip'));
    }

    public function blog_info($id){
        $post = Blog::findorfail($id);
        Blog::find($id)->increment('views');
        $recent_posts = Blog::orderby('created_at' , 'desc')->limit(5)->inRandomOrder()->get();
        $categories = BlogCategory::orderby('title')->limit(5)->inRandomOrder()->get();
        $comments = BlogComment::where('blog_id',$post->id)->where('status',1)->orderby('id','desc')->get();
        return view('web.blog_info' , compact('post' , 'categories' , 'recent_posts', 'comments'));
    }



    public function blog_category_posts(Request $request , $id){
        $category = $this->PostCategory->find($id);
        if(!empty($category)){
            $request['category_id'] = $id;
            return $this->blogsView($request);
        }
    }



    public function blogsComment(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'nullable|string',
            'website' => 'nullable|string',
            'blog_id' => 'required|string',
            'comment' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'success'=> false ,
                'msg' => 'Comment could not be added!',
                'data' => null,
            ]);
        }
        else{
           $data = $validator->validated();
           $comment = BlogComment::create($data);
           return response()->json([
               'success'=> true ,
               'msg' => 'Comment added successfully!',
               'data' => [
                   'avatar' => $comment->getAvatar() ,
                   'name' => $comment->name,
                   'date' => date('d M Y h:i:A',strtotime($comment->created_at)),
                   'comment' => $comment->comment,
                ],
           ]);
        }
    }

    public function make_comment(Request $request){
        //dd($request->all());
        $data = $request->validate([
            'blog_id' => 'required',
            'name' => 'required|string',
            'email' => 'required|string',
            'body' => 'required|string',
        ]);
        $data['status'] = 1;
        $comment = BlogComment::create($data);
        $comment['post_date'] = date('d/m/y',strtotime($comment->created_at));
        $comment['name'] = $comment->name;
        $comment['email'] = $comment->email;
        $comment['body'] = $comment->body;
       return response()->json($comment);
    }

}
