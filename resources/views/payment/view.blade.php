@extends('components.common-layout')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-success">Make a Payment</h2>
                <form method="post" action="{{ route('send-payment') }}">
                    @csrf
                    <button type="submit" class="mt-5 mb-5 btn btn-primary">Send Payment</button>
                </form>
            </div>
        </div>
    </div>

@endsection