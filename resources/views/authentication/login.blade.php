@extends('components.common-layout')

@section('content')

    <!-- Banner -->
    <div class="zol-banner zol-banner--blog t-pt-150 t-pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="mt-0 t-text-light">
                        {{ $title }}
                    </h2>
                    <ul class="t-list breadcrumbs d-flex justify-content-center align-items-center">
                        <li class="breadcrumbs__list">
                            <a href="{{ route('home')}}"
                                class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                home
                            </a>
                        </li>
                        <li class="breadcrumbs__list">
                            <a href="{{ route('blog')}} "
                                class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="t-pt-120 t-pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="row">
                        <div class="col">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session()->has('wrong'))
                                <div class="alert alert-danger">
                                    {{ session('wrong') }}
                                </div>
                            @endif

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <h4>Login</h4>
                            <hr> <br>
                            <form method="POST" action="{{ route('loginProcess') }}">
                                @csrf
                                <div class="mb-3">
                                    <input value="{{ old('email') }}" type="text" name="email" class="form-control"
                                        placeholder="Email address or Username">
                                </div>
                                <div class="mb-3">
                                    <input value="{{ old('password') }}" type="password" name="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Sign In">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection