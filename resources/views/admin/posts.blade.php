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
                            @if(session()->get('message'))
                                <div class="alert alert-success">
                                    {{session()->get('message')}}
                                </div>
                            @endif
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
                                        <th> Updated on </th>
                                        <th> <i class="mdi mdi-dots-horizontal"></i> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($posts->all() as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td class="py-1">
                                                <img class="thumb-image" src="/storage/images/{{ $post->thumbnail }}"
                                                    alt="image" />
                                            </td>
                                            <td> {{ $post->title }} </td>
                                            <td> {{ $post->category->name }} </td>
                                            <td> {{ $post->user->name }} </td>
                                            <td> {{ $post->views }} </td>
                                            <td> {{ date('F d, Y', strtotime($post->updated_at)) }} </td>
                                            <td>
                                                <a class="btn btn-info" href="{{route('admin.post.edit', $post->id)}}">Edit</a>
                                                <form action="{{route('admin.post.delete', $post->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class=" mt-2">
                                {{$posts->links('vendor.pagination.bootstrap-5')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
@endsection('content')