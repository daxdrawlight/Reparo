 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="theme-color" content="#F36639">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Reparo</title>
    </head>
    <body class="grey lighten-4">
      @include ('layouts.nav')
      <div class="container full-height">
      <div class="section"></div>
      <div class="section"></div>
        @yield('content')
      <div class="section"></div>
      <div class="section"></div>
      </div>
      @include ('layouts.button')

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
  </html>