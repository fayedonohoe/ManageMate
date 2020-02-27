@extends('layouts.mmapp')

@section('content')
  <div class="">
    <div class="col-md-10">
      <div class="">
        <div class="">
          <div class="card-header">
            Employees
            <a href=" {{route('manager.employees.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($employees) === 0)
              <p> There Are No Employees!</p>
            @else
              <table id="table-employees" class="table table-hover">
                <thead>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Eircode</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>
                  <th>Contract Type</th>
                </thead>

                <tbody>
                  @foreach ($employees as $employee)
                    <tr data-id="{{ $employee->id }}">
                      <td>{{ $employee->user->firstName }}</td>
                      <td>{{ $employee->user->lastName }}</td>
                      <td>{{ $employee->user->eircode }}</td>
                      <td>{{ $employee->user->phoneNumber }}</td>
                      <td>{{ $employee->user->email }}</td>
                      <td>{{ $employee->contract->title }}</td>
                      <td>
                        <a href="{{ route('manager.employees.show', $employee->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('manager.employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('manager.employees.destroy', $employee->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="form-control btn btn-sm btn-danger">Delete</a>
                        </form>
                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
            @endif
            <a href="{{ route('manager.home') }}" class="btn btn-light">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
