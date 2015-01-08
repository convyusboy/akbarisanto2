<!DOCTYPE html>
<html lang="en">

<head>
    <!-- title and favicon -->
    <title>Akbarisanto</title>
    <link rel="icon" href="{{asset('assets/img/RA_logo_red.png')}}" type="image/png" sizes="16x16">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/freelancer.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/font-awesome-4.1.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    @if(Session::has('message'))
    <div id="message">{{ Session::get('message') }}</div>
    @endif

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/js/classie.js')}}"></script>
    <script src="{{ asset('assets/js/cbpAnimatedHeader.js')}}"></script>
    <script src="{{ asset('assets/js/imgLiquid-min.js')}}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ asset('assets/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('assets/js/contact_me_dev.js')}}"></script>

    <!-- Header JavaScript -->
    <script src="{{ asset('assets/js/header_dev.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/js/freelancer.js')}}"></script>

</body>

</html>
