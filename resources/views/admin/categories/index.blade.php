@extends('admin.master-admin')

@section('content')

    @include('admin.left-sidemenu')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-6 grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body">

                            @if(session()->get('message'))
                                <div class="alert alert-success">
                                    {{session()->get('message')}}
                                </div>
                            @endif

                            <div class="row mt-5 mb-5">
                                <div class="col text-center">
                                    <h2 style="font-size: 24px;" class="text-dark card-title">Add new category</h2>
                                </div>

                            </div>

                            <div class="category-form">
                                <form action="{{ route('categories.store') }}" method="POST">
                                    @csrf
                                    <input class="form-control mb-2" type="text" name="category_name"
                                        placeholder="Category name" />

                                    <button class="btn btn-primary" type="submit">Create category</button>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <h2 style="font-size: 24px;" class="card-title">All Categories</h2>

                                </div>
                                <div class="col-4">
                                    <form class="ml-auto search-form d-none d-md-block" method="GET"
                                        action="{{route('categories.index')}}">
                                        <div class="form-group">
                                            <input type="search" class="form-control"
                                                placeholder="Search from categories..." name="search" value="{{$keyword}}">
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> <i class="mdi mdi-dots-horizontal"></i> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories->all() as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td> {{ $category->name }} </td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{route('categories.edit', $category->id)}}">Edit</a>

                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#categoryModal{{ $category->id }}">
                                                        Delete
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Remove
                                                                        Category: {{ $category->name }}
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <p>Assign new category to post of this category</p>

                                                                    <select class="form-control" name="new_category">
                                                                        @foreach(App\Models\Category::where('id', '!=', $category->id)->get() as $cat)
                                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!-- <div class="mt-2">
                                                                                                                                <span class="text-danger">Are you sure you want to
                                                                                                                                    delete this category?</span>
                                                                                                                            </div> -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class=" mt-2">
                                {{$categories->links('vendor.pagination.bootstrap-5')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
@endsection('content')