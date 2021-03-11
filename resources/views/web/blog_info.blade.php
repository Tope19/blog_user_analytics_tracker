@extends('web.layouts.app')
@section('title', 'Blog Info')
@section('content')
<!-- Page Content -->
    <div class="container-fluid no-left-padding no-right-padding page-content blog-single post-nosidebar">
        <!-- Container -->
        <div class="container">
            <div class="entry-cover">
                <img src="{{ asset('post_images/'.$post->image) }}" alt="Post" />
            </div>
            <div class="row">
                <!-- Content Area -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 content-area">
                    <article class="type-post">
                        <div class="entry-content">
                            <div class="entry-header">
                                <span class="post-category"><a href="#" title="{{  $post->blog_category->title  }}">{{  $post->blog_category->title  }}</a></span>
                                <h3 class="entry-title">{!! $post->title !!}</h3>
                                <div class="post-meta">
                                    <span class="byline">by <a title="{!! $post->user->name !!}">{!! $post->user->name !!}</a></span>
                                    <span class="post-date">{{ date('M d, Y',strtotime($post->created_at)) }}</span>
                                </div>
                            </div>
                            <p>{!! $post->description !!}</p>
                            <div class="entry-footer">
                                <ul class="social">
                                    <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>


                    <!-- Comment Area -->
                    <div class="comments-area">
                        <h2 class="comments-title">{{ $post->views ?? 0 }} View(s)</h2>
                        <h2 class="comments-title">{{ $comments->count() ?? 0 }} Comments</h2>
                        <ol class="comment-list">
                            @foreach ($comments as $comment)
                            <li class="comment byuser comment-author-admin bypostauthor even thread-odd thread-alt depth-1">
                                <div class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img alt="img" src="{{ $comment->getAvatar() }}" height="50px" width="50px" class="avatar avatar-72 photo"/>
                                            <b class="fn">{{ $comment->name }}</b>
                                        </div>
                                        <div class="comment-metadata">
                                            {{  date('d M Y h:i:A',strtotime($comment->created_at)) }}
                                        </div>
                                    </footer>
                                    <div class="comment-content">
                                        <p>
                                            {!! $comment->comment !!}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ol><!-- comment-list /- -->
                        <!-- Comment Form -->
                        <div class="comment-respond">
                            <h2 class="comment-reply-title">Leave a Reply</h2>
                            <form method="post" class="comment-form row" id="commentform" action="{{ route('our_blog.comment')}}" method="post">
                                @csrf
                                <input type="hidden" name="blog_id" required value="{{ $post->id }}">
                                <p class="comment-form-author">
                                    <input id="author" name="name" placeholder="Name" size="30" maxlength="245" required="required" type="text"/>
                                </p>
                                <p class="comment-form-email">
                                    <input id="email" name="email" placeholder="Email" required="required" type="email"/>
                                </p>
                                <p class="comment-form-url">
                                    <input id="url" name="website" placeholder="Website" required="required" type="url"/>
                                </p>
                                <p class="comment-form-comment">
                                    <textarea id="comment" name="comment" placeholder="Enter your comment here..." rows="8" required="required"></textarea>
                                </p>
                                <p class="form-submit">
                                    <input name="submit" class="submit" value="Post Comment" type="submit"/>
                                </p>
                            </form>
                        </div><!-- Comment Form /- -->
                    </div><!-- Comment Area /- -->
                </div><!-- Content Area /- -->
            </div>
        </div><!-- Container /- -->
    </div>
<!-- Page Content /- -->

<!-- Comment Template /- -->
<ol class="comment-list d-none" id="commentTemplate">
    @foreach ($comments as $comment)
    <li class="comment byuser comment-author-admin bypostauthor even thread-odd thread-alt depth-1">
        <div class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <img alt="img" class="avatar avatar-72 photo"/>
                    <b class="fn"></b>
                </div>
                <div class="comment-metadata">

                </div>
            </footer>
            <div class="comment-content">
                <p>

                </p>
            </div>
        </div>
    </li>
    @endforeach
</ol><!-- comment-list /- -->


@stop
