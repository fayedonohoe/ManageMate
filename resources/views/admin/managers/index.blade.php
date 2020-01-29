@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Managers
            <a href=" {{route('admin.managers.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($managers) === 0)
              <p> There Are No Managers!</p>
            @else
              <table id="table-managers" class="table table-hover">
                <thead>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Eircode</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>
                  <th>Commenced Employment</th>
                </thead>

                <tbody>
                  @foreach ($managers as $manager)
                    <tr data-id="{{ $manager->id }}">
                      <td>{{ $manager->user->firstName }}</td>
                      <td>{{ $manager->user->lastName }}</td>
                      <td>{{ $manager->user->eircode }}</td>
                      <td>{{ $manager->user->phoneNumber }}</td>
                      <td>{{ $manager->user->email }}</td>
                      <td>{{ $manager->startOfEmployment }}</td>
                      <td>
                        <a href="{{ route('admin.managers.show', $manager->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('admin.managers.edit', $manager->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.managers.destroy', $manager->id) }}">
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
