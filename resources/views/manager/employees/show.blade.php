@extends('layouts.mmapp')

@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Employee: {{ $employee->firstName }} {{ $employee->lastName }}

          </div>
          <div class="card-body">

              <table id="table-employees" class="table table-hover">
                <tbody>
                  <tr>
                    <td>First Name</td>
                    <td>{{ $employee->user->firstName }}</td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td>{{ $employee->user->lastName }}</td>
                  </tr>
                  <tr>
                    <td>Eircode</td>
                    <td>{{ $employee->user->eircode }}</td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $employee->user->phoneNumber }}</td>
                  </tr>
                  <tr>
                    <td>Email Address</td>
                    <td>{{ $employee->user->email }}</td>
                  </tr>

                  <hr>

                  <tr>
                    <td>Contracted Hours</td>
                    <td>{{ $employee->contract->hoursPerWeek }}</td>
                  </tr>
                  <tr>
                    <td>Employee Number</td>
                    <td>{{ $employee->policyNum }}</td>
                  </tr>


                </tbody>
              </table>

              <br/>

              <a href="{{ route('manager.employees.index') }}" class="btn btn-light">Back</a>
              <a href="{{ route('manager.employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('manager.employees.destroy', $employee->id) }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-sm btn-danger">Delete</a>
              </form>

          </div>
        </div>
      </div>
    </div>

@endsection
