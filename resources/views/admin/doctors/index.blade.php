@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Doctors
            <a href=" {{route('admin.doctors.create') }}" class="btn btn-primary">Add</a>
          </div>
          <div class="card-body">
            @if (count($docs) === 0)
              <p> There Are No Doctors!</p>
            @else
              <table id="table-doctors" class="table table-hover">
                <thead>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Eircode</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>

                </thead>

                <tbody>
                  @foreach ($docs as $doc)
                    <tr data-id="{{ $doc->id}}">                  @endforeach
                </tbody>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
