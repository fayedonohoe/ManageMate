@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Recorded Visits
            <a href=" {{route('admin.visits.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($visits) === 0)
              <p> There Are No Visits Recorded!</p>
            @else
              <table id="table-visits" class="table table-hover">
                <thead>
                  <th>Patient</th>
                  <th>Doctor</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Duration</th>
                  <th>Cost</th>
                </thead>

                <tbody>
                  @foreach ($visits as $visit)
                    <tr data-id="{{ $visit->id }}">
                      <td>{{ $visit->patient->user->firstName }} {{ $visit->patient->user->lastName }}</td>
                      <td>{{ $visit->doctor->user->firstName }} {{ $visit->->doctor->user->lastName }}</td>
                      <td>{{ $visit->date }}</td>
                      <td>{{ $visit->time }}</td>
                      <td>{{ $visit->duration }}</td>
                      <td> € {{ $visit->cost }}</td>
                      <td>
                        <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
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
