@extends('layouts.mmapp')

@section('content')

    <div class="">
      <div class="col">

          <!-- Nested Loop of divs instead of a table?
               This would allow me to fill by col not row ( by day not user) -->

              <table id="table-usershifts" class="table table-hover">

                <thead class="trGray">
                  <tr>
                    <th colspan="8">
                      Todays Date:
                      {{ $today = Carbon\Carbon::now()->toFormattedDateString() }}
                      <br/>
                      {{ ($weekStartDate = Carbon\Carbon::now()->startOfWeek())->format('d-m-y') }}
                        --->
                      {{ ($weekEndDate = Carbon\Carbon::now()->endOfWeek())->format('d-m-y') }}
                    </th>
                  </tr>
                </thead>


                <thead class="trRed">

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

                  <thead class="trGray">

                    <td> </td>
                    <td>{{ ($mon = $weekStartDate)->format('d-m-y') }}</td>
                    <td>{{ ($tue = Carbon\Carbon::now()->startOfWeek()->addDays(1))->format('d-m-y') }} </td>
                    <td>{{ ($wed = Carbon\Carbon::now()->startOfWeek()->addDays(2))->format('d-m-y') }} </td>
                    <td>{{ ($thur = Carbon\Carbon::now()->startOfWeek()->addDays(3))->format('d-m-y') }} </td>
                    <td>{{ ($fri = Carbon\Carbon::now()->startOfWeek()->addDays(4))->format('d-m-y') }} </td>
                    <td>{{ ($sat = Carbon\Carbon::now()->startOfWeek()->addDays(5))->format('d-m-y') }} </td>
                    <td>{{ ($sun = $weekEndDate)->format('d-m-y') }} </td>

                  </thead>


                  @foreach ($users as $user)
                  <!-- for each user, make a collection of their shifts
                          loop though (foreach)usershifts per this user id, if belongs to this monday, add, if tuesday, add, etc etc
                          7 if statements - if this monday
                          -->

                    <tr data-id="{{ $user->id }}">
                      <td>{{ $user->firstName }}</td>
                      @foreach ($usershifts as $usershift)


                        @if ($usershift->user_id == $user->id)
                          @if ( Carbon\Carbon::parse($usershift->date)->between($weekStartDate, $weekEndDate))

                            {{ $usershift }}
                            <br/>

                            @if ($usershift->date == $mon->format('Y-m-d'))
                              <td>
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                                -
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}

                              </td>
                                @continue

                            @endif


                            @if ($usershift->date == $tue->format('Y-m-d'))
                              <td></td>
                              <td>
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                                -
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}

                              </td>
                              @continue
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

                            @if ($usershift->date == $thur->format('Y-m-d'))
                              <td>
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                                -
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}
                              </td>
                            @else
                                <td> </td>
                            @endif

                            @if ($usershift->date == $fri->format('Y-m-d'))
                              <td>
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                                -
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}
                              </td>
                            @else
                                <td> </td>
                            @endif

                            @if ($usershift->date == $sat->format('Y-m-d'))
                              <td>
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                                -
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}
                              </td>
                            @else
                                <td> </td>
                            @endif

                            @if ($usershift->date == $sun->format('Y-m-d'))
                              <td>
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->startTime))->format('H:i') }}
                                -
                                {{ ($myTime = new Carbon\Carbon($usershift->shift->endTime))->format('H:i') }}
                              </td>
                            @else
                                <td> </td>
                            @endif


                        @endif
                      @endif

                      @endforeach

                    </tr>
                    @endforeach

                  </tbody>
                </table>

            </div> <!-- end col -->

  </div>
@endsection
