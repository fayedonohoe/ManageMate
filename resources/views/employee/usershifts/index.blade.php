@extends('layouts.emapp')

@section('content')
<div class="container">
  <br/>

  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="">
              <h3> {{ Carbon\Carbon::now()->format('l, F jS') }} </h3>

              <div class="">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif


                  <h3>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} </h3>
                  <br/>
                  You are logged in as an employee!
                  <br/>


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
              </div>
          </div>
      </div>
  </div>
  <br/>



    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            Your Shift Today

          </div>
          <div class="card-body">
            @if (count($usershifts) === 0)
              <p> You Have No Shifts Scheduled Today!</p>
            @else
              <table id="table-usershifts" class="table table-hover">
                <thead>

                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Note</th>
                </thead>

                <tbody>
                  @foreach ($myday->sortBy('shift.sortOrder') as $usershift)
                    <tr data-id="{{ $usershift->id }}">
                      <td>{{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}</td>
                      <td>{{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}</td>
                      <td>{{ $usershift->note }}</td>
                      <td>
                        {{-- <a href="{{ route('usershifts.show', $usershift->id) }}" class="btn btn-light">View</a> --}}

                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="card">
          <div class="card-header">
            Your Upcoming Shifts

          </div>
          <div class="card-body">
            @if (count($usershifts) === 0)
              <p> You Have No Shifts Scheduled Today!</p>
            @else
              <table id="table-usershifts" class="table table-hover">
                <thead>

                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Note</th>
                </thead>

                <tbody>
                  @foreach ($myshifts->sortBy('date') as $usershift)
                    <tr data-id="{{ $usershift->id }}">
                      <td>{{ ($myDate = new Carbon\Carbon($usershift->date))->format('D j M') }}</td>
                      <td>{{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}</td>
                      <td>{{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}</td>
                      <td>{{ $usershift->note }}</td>
                      <td>
                        {{-- <a href="{{ route('usershifts.show', $usershift->id) }}" class="btn btn-light">View</a> --}}

                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>

    </div>

    <br/>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Todays Shifts

            </div>
            <div class="card-body">
              @if (count($usershifts) === 0)
                <p> You Have No Shifts Scheduled Today!</p>
              @else
                <table id="table-usershifts" class="table table-hover">
                  <thead>

                    <th>Employee</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                  </thead>

                  <tbody>
                    @foreach ($usershifts->sortBy('shift.sortOrder') as $usershift)
                      <tr data-id="{{ $usershift->id }}">
                        <td>{{ $usershift->user->firstName }} {{ $usershift->user->lastName }}</td>
                        <td>{{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}</td>
                        <td>{{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}</td>
                        <td>
                          {{-- <a href="{{ route('usershifts.show', $usershift->id) }}" class="btn btn-light">View</a> --}}

                        </td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
              @endif
            </div>
          </div>
        </div>

      </div>



      <br/>

      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('home') }}" class="btn btn-dark">Back</a>
        </div>
      </div>

      <br/>

  </div>




@endsection
