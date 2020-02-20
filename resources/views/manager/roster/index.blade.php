@extends('layouts.mmapp')

@section('content')

    <div class="">
      <div class="col">
        <!-- <div class=""> -->
          <div class="card-header">

            {{ $today = Carbon\Carbon::now()->toFormattedDateString() }}
            {{ $weekStartDate = Carbon\Carbon::now()->startOfWeek()->format('d-m-y') }}
            {{ $weekEndDate = Carbon\Carbon::now()->endOfWeek()->format('d-m-y') }}

          </div>


              <table id="table-usershifts" class="table table-hover">
                <thead>

                  <th> </th>
                  <th>Monday</th>
                  <th>Tuesday</th>
                  <th>Wednesday</th>
                  <th>Thursday</th>
                  <th>Friday</th>
                  <th>Saturday</th>
                  <th>Sunday</th>

                </thead>

                <tbody>

                  <tr>
                    <td> </td>
                    <td>{{ $mon = $weekStartDate }}</td>
                    <td>{{ ($tue = Carbon\Carbon::now()->startOfWeek()->addDays(1))->format('d-m-y') }} </td>
                    <td>{{ ($wed = Carbon\Carbon::now()->startOfWeek()->addDays(2))->format('d-m-y') }} </td>
                    <td>{{ $thur = Carbon\Carbon::now()->startOfWeek()->addDays(3)->format('d-m-y') }} </td>
                    <td>{{ $fri = Carbon\Carbon::now()->startOfWeek()->addDays(4)->format('d-m-y') }} </td>
                    <td>{{ $sat = Carbon\Carbon::now()->startOfWeek()->addDays(5)->format('d-m-y') }} </td>
                    <td>{{ $sun = $weekEndDate }} </td>
                  </tr>

                  @foreach ($users as $user)
                    <tr data-id="{{ $user->id }}">
                      <td>{{ $user->firstName }}</td>
                      @foreach ($usershifts as $usershift)

                        @if ($usershift->user_id == $user->id)
                          @if ($usershift->date == $mon))
                            <td>SUCCESS</td>
                          @else
                              <td></td>
                          @endif


                            @if ($usershift->date == $tue->format('Y-m-d'))
                              <td>
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                                -
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}
                              </td>
                            @else
                                <td></td>
                            @endif

                          @if ($usershift->date == $wed->format('Y-m-d'))
                          <td>
                            {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}
                          </td>
                          @else
                              <td></td>
                          @endif

                          @if ($usershift->date == $thur)
                            <td>SUCCESS</td>
                          @else
                              <td> </td>
                          @endif

                          @if ($usershift->date == $fri)
                            <td>SUCCESS</td>
                          @else
                              <td> </td>
                          @endif

                          @if ($usershift->date == $sat)
                            <td>SUCCESS</td>
                          @else
                              <td> </td>
                          @endif

                          @if ($usershift->date == $sun)
                            <td>SUCCESS</td>
                          @else
                              <td> </td>
                          @endif

                        @endif

                      @endforeach
                    </tr>
                    @endforeach

                  </tbody>
                </table>




            </div> <!-- end body -->

  </div>
@endsection
