 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="theme-color" content="#09AE8B">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Nalog sustav</title>
    </head>
    <body class="grey lighten-4">
    <header>
      @include ('layouts.nav')
    </header>
    <main>
      <div class="container full-height">
      <div class="section hide-on-small-only"></div>
      <div class="section hide-on-small-only"></div>
        @yield('content')
      <div class="section hide-on-small-only"></div>
      <div class="section hide-on-small-only"></div>
      </div>
    </main>
      {{-- @include ('layouts.button') --}}
      @include('flash::message')

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
  </html>