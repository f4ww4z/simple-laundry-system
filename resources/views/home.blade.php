@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!

                        <p class="card-text">Name: {{ Auth::user()->name }}</p>
                        <p class="card-text">Birthdate: {{ Auth::user()->birth }}</p>
                        <p class="card-text">Email: {{ Auth::user()->email }}</p>
                        <p class="card-text">Phone: {{ Auth::user()->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
