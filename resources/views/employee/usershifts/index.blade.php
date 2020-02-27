@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Todays Shifts
            <a href=" {{route('usershifts.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($usershifts) === 0)
              <p> You Have No Shifts Scheduled Today!</p>
            @else
              <table id="table-usershifts" class="table table-hover">
                <thead>

                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Note</th>
                </thead>

                <tbody>
                  @foreach ($usershifts as $usershift)
                    <tr data-id="{{ $usershift->id }}">
                      <td>{{ $usershift->user->firstName }}</td>
                      <td>{{ $usershift->user->lastName }}</td>
                      <td>{{ $usershift->shift->startTime }}</td>
                      <td>{{ $usershift->shift->endTime }}</td>
                      <td>{{ $usershift->note }}</td>
                      <td>
                        <a href="{{ route('usershifts.show', $usershift->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('usershifts.edit', $usershift->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('usershifts.destroy', $usershift->id) }}">
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
            <a href="{{ route('home') }}" class="btn btn-light">Back</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Todays Shifts
            <a href=" {{route('usershifts.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($usershifts) === 0)
              <p> You Have No Shifts Scheduled Today!</p>
            @else
              <table id="table-usershifts" class="table table-hover">
                <thead>

                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Note</th>
                </thead>

                <tbody>
                  @foreach ($usershifts as $usershift)
                    <tr data-id="{{ $usershift->id }}">
                      <td>{{ $usershift->user->firstName }}</td>
                      <td>{{ $usershift->user->lastName }}</td>
                      <td>{{ $usershift->shift->startTime }}</td>
                      <td>{{ $usershift->shift->endTime }}</td>
                      <td>{{ $usershift->note }}</td>
                      <td>
                        <a href="{{ route('usershifts.show', $usershift->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('usershifts.edit', $usershift->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('usershifts.destroy', $usershift->id) }}">
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
            <a href="{{ route('home') }}" class="btn btn-light">Back</a>
          </div>
        </div>
      </div>



    </div>
  </div>
@endsection
