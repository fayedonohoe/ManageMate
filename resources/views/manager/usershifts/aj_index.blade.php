<!--This will extend to the layout file, which will hold pre-made layout content, such as titles, navs, etc.-->
@extends('layouts.mmapp')

@section('title', 'Roster')
    <script>

    /*Droppable jquery*/
// $(function() {
//     $(".draggable").draggable({
//         cursor: "move",
//         revert: "invalid"
//     });
//     $(".block").droppable({
//         accept: ".draggable",
//         drop: function(event, ui) {
//             console.log("drop");
//             $(this).removeClass("over");
//             var dropped = ui.draggable;
//             var droppedOn = $(this);
//             $(dropped).detach().css({
//
//                 //Determines position of dropped item in relation to drop area.
//                 top: 0,
//                 left: 0,
//                 margin: 0
//             }).appendTo(droppedOn);
//         },
//         over: function(event, elem) {
//             $(this).addClass("over");
//             console.log("over");
//         },
//         out: function(event, elem) {
//             $(this).removeClass("over");
//         }
//     });
//     $("#drop").sortable({
//         cursor: "move"
//     });
//     $(".inside").droppable({
//         accept: ".draggable",
//         drop: function(event, ui) {
//             console.log("drop");
//             var dropped = ui.draggable;
//             var droppedOn = $(this);
//             $(dropped).detach().css({
//                 //Determines position of dropped item in relation to original area.
//                 top: 0,
//                 left: 0,
//                 margin: 0
//             }).appendTo(droppedOn);
//         }
//     });
// });
</script>
</head>

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-3 pageTitle">
              <h3>Roster</h3>
          </div>
      </div>

            <!--Table start-->
            <div class="col-md-12">
                <div class="table-responsive table-bordered">
                    <table class="table">

                        <!--Weekdays and Dates-->
                        <thead class="trGray">
                            <tr>
                                <th colspan="8">
                                    <p>Weekly Roster</p>
                                </th>
                            </tr>
                        </thead>
                        <thead class="trGray">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">06/01/2020</th>
                                <th scope="col">07/01/2020</th>
                                <th scope="col">08/01/2020</th>
                                <th scope="col">09/01/2020</th>
                                <th scope="col">10/01/2020</th>
                                <th scope="col">11/01/2020</th>
                                <th scope="col">12/01/2020</th>
                            </tr>
                        </thead>
                        <thead class="trRed">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Monday</th>
                                <th scope="col">Tuesday</th>
                                <th scope="col">Wednesday</th>
                                <th scope="col">Thursday</th>
                                <th scope="col">Friday</th>
                                <th scope="col">Saturday</th>
                                <th scope="col">Sunday</th>
                            </tr>
                        </thead>

                        <!--Table data-->
                        <tbody>

                          @foreach ($usershifts as $usershift)
                            <!-- <tr data-id="{{ $employee->id }}"> -->
                              <!-- <td>{{ $employee->user->firstName }}</td>
                              <td>{{ $employee->user->lastName }}</td>
                              <td>{{ $employee->user->eircode }}</td>
                              <td>{{ $employee->user->phoneNumber }}</td>
                              <td>{{ $employee->user->email }}</td>
                              <td>{{ $employee->contract->name }}</td>
                              <td> -->
                            <!--first row-->
                            <tr>
                                <th scope="row" data-id="{{ $employee->id }}"></th>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                            </tr>


                                <!--Droppable Objects only drop into first table cell-->
                                <!-- <td id="droppable" class="block ui-widget-header ui-droppable">
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">drop here
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">drop here
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">drop here
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">drop here
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                            </tr> -->



                            <!--second row-->
                            <tr>
                                <th scope="row">Mark</th>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                            </tr>
                            <!--third row-->
                            <tr>
                                <th scope="row">Larry</th>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                            </tr>
                            <!--fourth row-->
                            <tr>
                                <th scope="row">Bob</th>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                            </tr>
                            <!--fifth row-->
                            <tr>
                                <th scope="row">Jane</th>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                            </tr>
                            <!--sixth row-->
                            <tr>
                                <th scope="row">Danny</th>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                                <td>
                                    <div id="droppable" class="ui-widget-header">
                                    </div>
                                </td>
                            </tr>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--Table end-->
                </div>
            </div>
            <!--Table end-->

            <!--Gap-->
            <div class="row">
                <div class="col">
                    <h1>---</h1>
                </div>
            </div>

            <!--Gap-->
            <div class="row">
                <div class="col">
                    <h1>---</h1>
                </div>
            </div>

            <!--Draggable Objects-->
            <div class="row">

                <!--Card for Draggable objects-->
                <div class="card col-md-6">
                    <div class="card-body">
                        <p class="card-title trRed">Premade Shifts</p>
                        <div class="ui-widget-content draggable">
                            <p>Drag</p>
                        </div>
                        <div class="ui-widget-content draggable">
                            <p>Drag</p>
                        </div>
                    </div>
                </div>

                <!--Gap-->
                <div class="col-1"></div>

                <!--Requests-->
                <div class="card col-md-5" style="padding-left: 0; padding-right: 0;">
                    <div class="card-body">
                        <p class="card-title trRed">Requests</p>

                    </div>
                </div>
            </div>
        </div>

        @endsection
