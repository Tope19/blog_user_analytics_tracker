@extends('user.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Wusob</a></li>
                        <li class="breadcrumb-item active">New Blog Post</li>
                    </ol>
                </div>
                <h5 class="page-title">Blog Posts</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Create Blog Post</h4>

                            <form class="" enctype="multipart/form-data" method="POST" action="{{ route('blog.posts.store') }}">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <div>
                                                <select name="blog_category_id"  class="form-control" required autofocus>
                                                    <option value="" disabled selected> Select One</option>
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}" {{ old('blog_category_id') == $cat->id ? 'selected' : ''}}>{{ $cat->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <div>
                                                <input type="text" name="title" maxlength="50" id="" class="form-control" required autofocus value="{{old('title')}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <div>
                                        <textarea name="description" id="summernote" required rows="5" cols="40" class="form-control summernote" required value="">{{old('description')}}</textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div>
                                               <input type="file" name="image" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div>
                                                <select name="status"  class="form-control" required autofocus>
                                                    <option value="" disabled selected> Select One</option>
                                                    <option value="1" {{ old('status') == '1' ? 'selected' : ''}}>Published</option>
                                                    <option value="0" {{ old('status') == '0' ? 'selected' : ''}}>Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <div>
                                                <input type="text" name="meta_keywords" class="form-control"  autofocus value="{{old('meta_keywords')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <div>
                                                <input type="text" name="meta_description" class="form-control"  autofocus value="{{old('meta_description')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container fluid -->
    <script>
        $('#summernote').summernote({
            placeholder: 'Enter Blog Description',
            tabsize: 2,
            height: 120,
            toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['view', ['fullscreen', 'codeview', 'help']]
            ]
          });
    </script>
@endsection
