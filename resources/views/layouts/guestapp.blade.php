<!--Shows everything that is consistant across views-->
<!--This page will hold all links, navigation, general structure and titles.-->
<!DOCTYPE html>

<html>

<head>
    <!-- Will locate title name for each page -->
    <title>@yield('title', 'ManageMate')</title>
    <meta charset="utf-8">

    <!--css-->
    <!--<link rel="stylesheet" type="text/css" href="../sass/css/main.css">-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css"/>

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Fonts link-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:600|Roboto&display=swap" rel="stylesheet">

    <!--JQuery UI script-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>

<!-- Body -->
<body>

  <!--top bar-->
  <div class="row">
      <div class="col-12">
          <div class="heading">
              <h2>ManageMate</h2>
          </div>
      </div>
  </div>


    <div class="row">
        <ul class="nav flex-column">
            {{-- <li class="nav-item links">
                <a class="nav-link" href="/home">Login</a>
            </li>
            <li class="nav-item links">
              <a class="nav-link" href="/about">About</a> --}}

        </ul>

        <!-- This will place all individual content for each page into this section -->
        @yield('content')

      </div>
      <!--bottom bar-->
      <div class="row">
          <div class="col-12">
              <div class="heading">

              </div>
          </div>
      </div>
</body>

</html>
