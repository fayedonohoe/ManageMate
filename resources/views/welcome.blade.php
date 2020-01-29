@extends('layouts.mmapp')

@section('content')

    <div class="col justify-content-center">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">Welcome</div>

                <div class="card-body">

                    Welcome To ManageMate!

                  </br>
                  <a href="{{ route('about') }}">About ManageMate</a>
                  </br>
                  <a href="{{ route('home') }}">Home</a>

                </div>
            </div>
        </div>
    </div>
@endsection
