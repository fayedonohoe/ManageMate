@extends('layouts.mmapp')

@section('content')
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Edit Employee
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

            <form method="POST" action="{{ route('manager.employees.update', $employee->id) }}">

              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname', $employee->user->firstName) }}" />
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname', $employee->user->lastName) }}" />
              </div>
              <div class="form-group">
                <label for="eircode">Eircode</label>
                <input type="text" class="form-control" id="eircode" name="eircode" value="{{ old('eircode', $employee->user->eircode) }}" />
              </div>
              <div class="form-group">
                <label for="num">Phone Number</label>
                <input type="text" class="form-control" id="num" name="num" value="{{ old('num', $employee->user->phoneNumber) }}" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->user->email) }}" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" />
              </div>

              <hr>

              <div class="form-group">
                <label for="contract">Contract Type</label>
                <select name="contract_id">
                  @foreach ($contracts as $contract)
                    <option value="{{ $contract->id }}" {{ old('contract_id') == $contract->id ? "selected" : "" }} > <!-- If there was a previously entered contract, display that one first with selected -->
                      {{$contract->title}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="policyNum">Employee Number</label>
                <input type="text" class="form-control" id="policyNum" name="policyNum" value="{{ old('policyNum') }}" />
              </div>

              <a href="{{ route('manager.employees.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
