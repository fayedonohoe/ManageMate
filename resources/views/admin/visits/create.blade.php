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
                <label for="patient">Patient</label>
                <select name="patient_id">
                  @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? "selected" : "" }} > <!-- If there was a previously entered insurer, display that one first with selected -->
                      {{$patient->user->firstName}} {{$patient->user->lastName}}
                    </option>
                  @endforeach
                </select>

                <label for="doctor">Doctor</label>
                <select name="doctor_id">
                  @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? "selected" : "" }} > <!-- If there was a previously entered insurer, display that one first with selected -->
                      {{$doctor->user->firstName}} {{$doctor->user->lastName}}
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
