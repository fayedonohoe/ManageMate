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


{{-- {{ dd($dataset) }} --}}

                  @foreach ($dataset as $user)
                  {{-- {{ dd($user['shifts'] )}}   // WORKS     not -> or '' or "" --}}

                  <tr>
                    <td>{{ $user['name']}}</td>


                    @for($i=1; $i <= 7; $i++)

                      @foreach ($user['shifts'] as $shift)
                        @php

                        $day = new Carbon\Carbon($shift->date)

                        @endphp

                        @if($day->format('N') == $i)
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                          @else
                            <td>
                              none
                            </td>
                            @break
                        @endif
                      @endforeach

                    @endfor






{{--
                    @foreach ($user['shifts'] as $shift)


                      @for($i=1; $i <= 7; $i++)

                        @php

                        $day = new Carbon\Carbon($shift->date)

                        @endphp

                        {{ "index: " .$i. ", day: " .$day->format('N') }}


                        @if($day->format('N') === $i)
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                          @else
                            <td>
                              none
                            </td>
                        @endif
                      @endfor

  @endforeach --}}
{{--
                      @switch($shift->date)
                        @case($mon->format('Y-m-d'))
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                          @break
                        @case($tue->format('Y-m-d'))
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                          @break
                        @case($wed->format('Y-m-d'))
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                            @break
                        @case($thur->format('Y-m-d'))
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                            @break
                        @case($fri->format('Y-m-d'))
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                            @break
                        @case($sat->format('Y-m-d'))
                          <td>
                            {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                            -
                            {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                          </td>
                            @break
                        @case($sun->format('Y-m-d'))
                        <td>
                          {{ ($myTime = new Carbon\Carbon($shift->shift->startTime))->format('H:i') }}
                          -
                          {{ ($myTime = new Carbon\Carbon($shift->shift->endTime))->format('H:i') }}
                        </td>
                            @break

                        @default
                          <td> </td>
                          @break

                        @endswitch --}}


                       {{-- @if ($shift->date == $mon->format('Y-m-d'))
                         <td>
                           {{ ($myTime = new Carbon\Carbon($shift->startTime))->format('H:i') }}
                           -
                           {{ ($myTime = new Carbon\Carbon($shift->endTime))->format('H:i') }}

                       @endif
                     </td> --}}



                  </tr>
                @endforeach










                  {{-- @foreach ($dataset as $user)
                    {{-- Initialise an empty array called week --}}
                   {{-- @php
                     $days = array();
                   @endphp --}}


                    {{-- {{ dd($user['shifts'] )}}   // WORKS     not -> or '' or "" --}}

                    {{-- <tr>
                      <td>{{ $user['name']}}</td>

                      @foreach ($user['shifts'] as $shift) --}} --}}

                         {{-- {{ dd($user) }}   //WORKS   --}}


                        {{-- Determine what days the shifts are --}}
                        {{-- @switch($shift->date)
                          @case($mon->format('Y-m-d'))
                            @php
                              array_push($days, 0);
                            @endphp
                            @break
                          @case($tue->format('Y-m-d'))
                            @php
                              array_push($days, 1);
                            @endphp
                            @break
                          @case($wed->format('Y-m-d'))
                            @php
                              array_push($days, 2);
                            @endphp
                              @break
                          @case($thur->format('Y-m-d'))
                            @php
                              array_push($days, 3);
                            @endphp
                              @break
                          @case($fri->format('Y-m-d'))
                            @php
                              array_push($days, 4);
                            @endphp
                              @break
                          @case($sat->format('Y-m-d'))
                            @php
                              array_push($days, 5);
                            @endphp
                              @break
                          @case($sun->format('Y-m-d'))
                            @php
                              array_push($days, 6);
                            @endphp
                              @break
                          @endswitch
                        @endforeach --}}
                        {{-- {{ dd($days) }}  // WORKS - $days is equal to [2,5,6] --}}



{{--
                          @switch($days->[0])
                            @case(2)
                              @php

                                $week = array();
                                array_push($week, 0, 0);

                                // Check remaining days in the array using (y-x)-1
                                $thisShift = array();
                                array_push($thisShift, "TEST", $shift->endTime);
                                array_push($week, $thisShift);

                                for($i = 0; $i << count($days); $i++ ){
                                  $temp = ($days[$i+1]-$days[$i])-1;

                                  for( $j = 0; $j << $temp; $j++ ){
                                    array_push($week, 0);
                                  }
                                }

                                while( count($week) < 7 ){
                                  array_push($week, 0);
                                }

                                // dd($week);

                              @endphp
                              @break


                            @case($tue->format('Y-m-d'))
                              @php
                                array_push($week, 1);
                              @endphp
                              @break
                            @case($wed->format('Y-m-d'))
                              @php
                                array_push($week, 2);
                              @endphp
                                @break
                            @case($thur->format('Y-m-d'))
                              @php
                                array_push($week, 3);
                              @endphp
                                @break
                            @case($fri->format('Y-m-d'))
                              @php
                                array_push($week, 4);
                              @endphp
                                @break
                            @case($sat->format('Y-m-d'))
                              @php
                                array_push($week, 5);
                              @endphp
                                @break
                            @case($sun->format('Y-m-d'))
                              @php
                                array_push($week, 6);
                              @endphp
                                @break
                            @endswitch --}}







                         {{-- @if ($shift->date == $mon->format('Y-m-d'))
                           <td>
                             {{ ($myTime = new Carbon\Carbon($shift->startTime))->format('H:i') }}
                             -
                             {{ ($myTime = new Carbon\Carbon($shift->endTime))->format('H:i') }}

                         @endif
                       </td> --}}
                      {{-- @endforeach --}}



                    {{-- </tr>
                  @endforeach --}}




{{-- Below is the code used before the data collection method --}}

                  {{-- @foreach ($users as $user)
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
                    @endforeach --}}

  {{-- ABOVE is the code used before data collection --}}

                  </tbody>
                </table>

            </div> <!-- end col -->

  </div>

@endsection
