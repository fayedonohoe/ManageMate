@extends('layouts.guestapp')

@section('content')

    <div class="col justify-content-center">
        <div class="col-md-12">
            <div class="">

                <div class="card-body">

                    Welcome To ManageMate!

                  </br>
                  </br>
                  <a href="{{ route('about') }}">About ManageMate</a>
                  </br>
                  <a href="{{ route('login') }}">Login</a>
                  </br>


                </div>
            </div>
        </div>
    </div>
@endsection
