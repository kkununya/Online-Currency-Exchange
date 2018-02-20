<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!--  open-iconic CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    
    <!--  Bootstrap 4.0.0-beta CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    
    <!--  jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!--  Bootstrap 4.0.0-beta js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> -->

    <!-- jquery.Thailand.css -->
    <link rel="stylesheet" href="{{URL::asset('js/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.css')}}">
    <!-- jquery.Thailand.js -->
    <script src="{{URL::asset('js/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/JQL.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/typeahead.bundle.js')}}"></script>
    <script src="{{URL::asset('js/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.js')}}"></script>    
      
    <!-- Kanit Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:200,300,400&amp;subset=latin-ext,thai" rel="stylesheet">    <style>body, a, span, input, textarea, select, option{font-family: 'Kanit';}</style>
    <title>@yield('title', 'Online Currency Exchange')</title>
    @yield('stylesheet')

</head>
<body>

  <!-- Main Header -->
  @include('template.main-header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="max-width: 750px; width: 100%; margin: 0 auto;">

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('template.main-footer')

  @yield('javascript')

  <!-- <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</body>
</html>
