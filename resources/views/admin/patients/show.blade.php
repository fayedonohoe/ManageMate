@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Patient: {{ $patient->firstName }} {{ $patient->lastName }}

          </div>
          <div class="card-body">

              <table id="table-patients" class="table table-hover">
                <tbody>
                  <tr>
                    <td>First Name</td>
                    <td>{{ $patient->user->firstName }}</td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td>{{ $patient->user->lastName }}</td>
                  </tr>
                  <tr>
                    <td>Eircode</td>
                    <td>{{ $patient->user->eircode }}</td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $patient->user->phoneNumber }}</td>
                  </tr>
                  <tr>
                    <td>Email Address</td>
                    <td>{{ $patient->user->email }}</td>
                  </tr>

                  <hr>

                  <tr>
                    <td>Insurance Company</td>
                    <td>{{ $patient->insurer->name }}</td>
                  </tr>
                  <tr>
                    <td>Policy Number</td>
                    <td>{{ $patient->policyNum }}</td>
                  </tr>


                </tbody>
              </table>

              <a href="{{ route('admin.patients.index') }}" class="btn btn-light">Back</a>
              <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}">
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
