@extends('admin.master-admin')

@section('content')

    @include('admin.left-sidemenu')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h4 class="card-title">Create New Post</h4>
                            <hr>
                            <form class="forms-sample" method="POST" action="{{ route('admin.post.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="posttitle">Post Title</label>
                                    @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="text" name="title" class="form-control" id="posttitle"
                                        placeholder="Post Title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label>Post Thumbnail</label>
                                    <br>
                                    <input type="file" name="thumbnail">
                                    @error('thumbnail')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="postexcerpt">Post Excerpt</label>
                                    @error('excerpt')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <textarea class="form-control" name="excerpt" id="postexcerpt"
                                        rows="2">{{ old('excerpt') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="postcontent">Post Content</label>
                                    @error('content')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <textarea class="form-control" name="content" id="postcontent" rows="2">
                                                                                                                                                                    {{ old('content') }}
                                                                                                                                                            </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="postcategory">Post Category</label>
                                    <select class="form-control" name="category_id" id="">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == old('category_id'))
                                            selected="selected" @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type=" submit" class="btn btn-success mr-2">Publish Post</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
@endsection('content')