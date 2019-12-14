@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Patients
            <a href=" {{route('admin.patients.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($patients) === 0)
              <p> There Are No Patients!</p>
            @else
              <table id="table-patients" class="table table-hover">
                <thead>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Eircode</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>
                  <th>Insurance Company</th>
                </thead>

                <tbody>
                  @foreach ($patients as $patient)
                    <tr data-id="{{ $patient->id }}">
                      <td>{{ $patient->user->firstName }}</td>
                      <td>{{ $patient->user->lastName }}</td>
                      <td>{{ $patient->user->eircode }}</td>
                      <td>{{ $patient->user->phoneNumber }}</td>
                      <td>{{ $patient->user->email }}</td>
                      <td>{{ $patient->insurer->name }}</td>
                      <td>
                        <a href="{{ route('admin.patients.show', $patient->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="form-control btn btn-danger">Delete</a>
                        </form>
                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
            @endif
            <a href="{{ route('admin.home') }}" class="btn btn-light">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
