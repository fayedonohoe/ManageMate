@extends('layouts.mmapp')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




                        <div class="" aria-labelledby="">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>




                    You are logged in as a manager!

                    <div class="card-body">
                      @if (count($errors) === 0)
                        <p> There Are No Shifts!</p>
                      @else
                        <table id="table-shifts" class="table table-hover">
                          <thead>
                            <th>Employee</th>
                            <th> {{ date() }} </th>
                          </thead>

                          <!-- <tbody>
                            @foreach ($shifts as $shift)
                              <tr data-id="{{ $manager->id }}"> -->

                                <!-- <td>{{ $manager->user->firstName }}</td>
                                <td>{{ $manager->user->lastName }}</td>
                                <td>{{ $manager->user->eircode }}</td>
                                <td>{{ $manager->user->phoneNumber }}</td>
                                <td>{{ $manager->user->email }}</td>
                                <td>{{ $manager->startOfEmployment }}</td> -->

                                <!-- <td>
                                  <a href="{{ route('admin.managers.show', $manager->id) }}" class="btn btn-light">View</a>
                                  <a href="{{ route('admin.managers.edit', $manager->id) }}" class="btn btn-warning">Edit</a>
                                  <form style="display:inline-block" method="POST" action="{{ route('admin.managers.destroy', $manager->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                                  </form>
                              </tr>
                            </td> -->

                            <!-- @endforeach
                          </tbody> -->
                        </table>
                      @endif
                      <a href="{{ route('admin.home') }}" class="btn btn-light">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
