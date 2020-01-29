@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Manager: {{ $manager->firstName }} {{ $manager->lastName }}

          </div>
          <div class="card-body">

              <table id="table-managers" class="table table-hover">
                <tbody>
                  <tr>
                    <td>First Name</td>
                    <td>{{ $manager->user->firstName }}</td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td>{{ $manager->user->lastName }}</td>
                  </tr>
                  <tr>
                    <td>Eircode</td>
                    <td>{{ $manager->user->eircode }}</td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $manager->user->phoneNumber }}</td>
                  </tr>
                  <tr>
                    <td>Email Address</td>
                    <td>{{ $manager->user->email }}</td>
                  </tr>
                  <tr>
                    <td>Commenced Employment</td>
                    <td>{{ $manager->startOfEmployment }}</td>
                  </tr>

                </tbody>
              </table>

              <a href="{{ route('admin.managers.index') }}" class="btn btn-light">Back</a>
              <a href="{{ route('admin.managers.edit', $manager->id) }}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.managers.destroy', $manager->id) }}">
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
