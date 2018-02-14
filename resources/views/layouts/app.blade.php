<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Medieval Card Game</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    {{--JQuery--}}

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 32.33%;
            margin-left: 2px;
            margin-right: 2px;
            margin-bottom: 2px;
            height: 350px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Medieval Card Game</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('card/deck') || Request::is('/') ? 'active' : '' }}"><a href="/card/deck">My
                        Cards<span
                                class="sr-only">(current)</span></a></li>
                <li class="{{ Request::is('card/collection') ? 'active' : '' }}"><a href="/card/collection">Card
                        Collection<span
                                class="sr-only">(current)</span></a></li>
                <li class="{{ Request::is('card/add') ? 'active' : '' }}"><a href="/card/add">Add New Card<span
                                class="sr-only">(current)</span></a></li>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div>
</nav>

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
