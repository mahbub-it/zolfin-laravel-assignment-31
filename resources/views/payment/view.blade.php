@extends('components.common-layout')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-success">Make a Payment</h2>
                <form method="post" action="{{ route('send-payment') }}">
                    @csrf
                    <!-- <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input type="number" class="form-control" id="amount" name="amount">
                                                        </div> -->
                    <button type="submit" class="mt-5 mb-5 btn btn-primary">Send Payment</button>
                </form>
            </div>
        </div>
    </div>

@endsection