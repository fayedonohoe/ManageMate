@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Arrange A New Visit
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('admin.visits.store') }}">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label for="employee">Patient</label>
                <select name="employee_id">
                  @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? "selected" : "" }} > <!-- If there was a previously entered insurer, display that one first with selected -->
                      {{$employee->user->firstName}} {{$employee->user->lastName}}
                    </option>
                  @endforeach
                </select>

                <label for="manager">Manager</label>
                <select name="manager_id">
                  @foreach ($managers as $manager)
                    <option value="{{ $manager->id }}" {{ old('manager_id') == $manager->id ? "selected" : "" }} > <!-- If there was a previously entered insurer, display that one first with selected -->
                      {{$manager->user->firstName}} {{$manager->user->lastName}}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="date">Date of Visit</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
              </div>
              <div class="form-group">
                <label for="time">Time of Visit (0000)</label>
                <input type="number" class="form-control" id="time" name="time"  min="0000" max="2359" value="{{ old('time') }}" />
              </div>
              <div class="form-group">
                <label for="duration">Duration (in minutes)</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" />
              </div>
              <div class="form-group">
                <label for="cost">Cost of Visit</label>
                <input type="number" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" />
              </div>

              <hr>

              <a href="{{ route('admin.visits.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
