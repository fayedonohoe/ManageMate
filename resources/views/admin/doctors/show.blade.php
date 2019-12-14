@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Doctor: {{ $doctor->firstName }} {{ $doctor->lastName }}

          </div>
          <div class="card-body">

              <table id="table-doctors" class="table table-hover">
                <tbody>
                  <tr>
                    <td>First Name</td>
                    <td>{{ $doctor->user->firstName }}</td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td>{{ $doctor->user->lastName }}</td>
                  </tr>
                  <tr>
                    <td>Eircode</td>
                    <td>{{ $doctor->user->eircode }}</td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $doctor->user->phoneNumber }}</td>
                  </tr>
                  <tr>
                    <td>Email Address</td>
                    <td>{{ $doctor->user->email }}</td>
                  </tr>
                  <tr>
                    <td>Commenced Employment</td>
                    <td>{{ $doctor->startOfEmployment }}</td>
                  </tr>

                </tbody>
              </table>

              <a href="{{ route('admin.doctors.index') }}" class="btn btn-light">Back</a>
              <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-danger">Delete</a>
              </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
