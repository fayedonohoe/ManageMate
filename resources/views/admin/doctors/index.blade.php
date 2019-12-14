@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Doctors
            <a href=" {{route('admin.doctors.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($doctors) === 0)
              <p> There Are No Doctors!</p>
            @else
              <table id="table-doctors" class="table table-hover">
                <thead>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Eircode</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>
                  <th>Commenced Employment</th>
                </thead>

                <tbody>
                  @foreach ($doctors as $doctor)
                    <tr data-id="{{ $doctor->id }}">
                      <td>{{ $doctor->user->firstName }}</td>
                      <td>{{ $doctor->user->lastName }}</td>
                      <td>{{ $doctor->user->eircode }}</td>
                      <td>{{ $doctor->user->phoneNumber }}</td>
                      <td>{{ $doctor->user->email }}</td>
                      <td>{{ $doctor->startOfEmployment }}</td>
                      <td>
                        <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
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
