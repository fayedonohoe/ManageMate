@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit Patient
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

            <form method="POST" action="{{ route('admin.patients.update', $patient->id) }}">

              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname', $patient->user->firstName) }}" />
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname', $patient->user->lastName) }}" />
              </div>
              <div class="form-group">
                <label for="eircode">Eircode</label>
                <input type="text" class="form-control" id="eircode" name="eircode" value="{{ old('eircode', $patient->user->eircode) }}" />
              </div>
              <div class="form-group">
                <label for="num">Phone Number</label>
                <input type="text" class="form-control" id="num" name="num" value="{{ old('num', $patient->user->phoneNumber) }}" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $patient->user->email) }}" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" />
              </div>

              <hr>

              <div class="form-group">
                <label for="insurer">Insurance Company</label>
                <select name="insurer_id">
                  @foreach ($insurers as $insurer)
                    <option value="{{ $insurer->id }}" {{ old('insurer_id') == $insurer->id ? "selected" : "" }} > <!-- If there was a previously entered insurer, display that one first with selected -->
                      {{$insurer->name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="policyNum">Policy Number (Where Appliable)</label>
                <input type="text" class="form-control" id="policyNum" name="policyNum" value="{{ old('policyNum') }}" />
              </div>

              <a href="{{ route('admin.patients.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
