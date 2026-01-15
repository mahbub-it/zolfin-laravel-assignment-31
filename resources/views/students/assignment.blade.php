@extends('components.common-layout')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-success">Students Assignment</h2>
                <form method="post" action="{{ route('providescore') }}">
                    @csrf
                    <input type="number" name="score" class="form-control" placeholder="score below 10" min="1" max="10">
                    <button type="submit" class="mt-5 mb-5 btn btn-primary">Students Score</button>
                </form>
            </div>
        </div>
    </div>

@endsection