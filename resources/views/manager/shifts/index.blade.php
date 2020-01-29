@extends('layouts.mmapp')

@section('content')
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Shifts
            <a href=" {{route('manager.shifts.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($shifts) === 0)
              <p> There Are No Shifts!</p>
            @else
              <table id="table-shifts" class="table table-hover">
                <thead>
                  <th>Name</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Options</th>
                </thead>

                <tbody>
                  @foreach ($shifts as $shift)
                    <tr data-id="{{ $shift->id }}">
                      <td>{{ $shift->name }}</td>
                      <td>{{ $shift->startTime }}</td>
                      <td>{{ $shift->endTime }}</td>

                      <td>
                        <a href="{{ route('manager.shifts.show', $shift->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('manager.shifts.edit', $shift->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('manager.shifts.destroy', $shift->id) }}">
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
            <a href="{{ route('manager.home') }}" class="btn btn-light">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
