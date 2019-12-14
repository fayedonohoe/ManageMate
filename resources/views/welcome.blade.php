@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">

                    + Welcome To MedCentral! +

                  </br>
                  <a href="{{ route('about') }}">About MedCentral</a>
                  </br>
                  <a href="{{ route('home') }}">Home</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
