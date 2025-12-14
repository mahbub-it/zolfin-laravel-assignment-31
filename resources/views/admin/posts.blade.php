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
                            <div class="row">
                                <div class="col">
                                    <h2 style="font-size: 24px;" class="card-title">All posts</h2>
                                </div>
                                <div class="col-4">
                                    <form class="ml-auto search-form d-none d-md-block" method="GET"
                                        action="{{route('admin.posts')}}">
                                        <div class="form-group">
                                            <input type="search" class="form-control" placeholder="Search from posts..."
                                                name="search" value="{{$keyword}}">
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Post ID </th>
                                        <th> Thumbnail </th>
                                        <th> Post Title </th>
                                        <th> Post Category </th>
                                        <th> Post Author </th>
                                        <th> Total Views </th>
                                        <th> Published on </th>
                                        <th> Updated on </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($posts->all() as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td class="py-1">
                                                <img class="thumb-image" src="{{$post->thumbnail}}" alt="image" />
                                            </td>
                                            <td> {{ $post->title }} </td>
                                            <td> {{ $post->category->name }} </td>
                                            <td> {{ $post->user->name }} </td>
                                            <td> {{ $post->views }} </td>
                                            <td> {{ date('F d, Y', strtotime($post->created_at)) }} </td>
                                            <td> {{ date('F d, Y', strtotime($post->updated_at)) }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2">
                                {{$posts->links('vendor.pagination.bootstrap-5')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
@endsection('content')