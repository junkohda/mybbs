<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Styles -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.3.23/dist/vuetify.min.css" rel="stylesheet">
  <link href="{{url('/css/magnific-popup.css')}}" rel="stylesheet"/>
  <link href="{{url('/css/style.css')}}" rel="stylesheet"/>

  @yield('html-head')
    <style>
        [v-cloak] {
            display: none;
        }
    </style>

  <title>@yield('html-title')</title>
</head>
<body>

  <div id="app">
    <v-app id="inspire" v-cloak>
      <v-content>
          @yield('page-content')
      </v-content>

    </v-app>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.3.23/dist/vuetify.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="{{url('/js/axios.min.js')}}"></script>
  <script src="{{url('/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{url('/js/apiModel.js')}}"></script>
  <script src="{{url('/js/moment.js')}}"></script>
  <script src="{{url('/js/fileDownloader.js')}}"></script>
  <script src="{{url('/js/commonAlert.js')}}"></script>
  <script src="{{url('/js/popupDialog.js')}}"></script>
  <script src="{{url('/js/commonAlert.js')}}"></script>
  <script src="{{url('/js/defs.js')}}"></script>
  <script src="{{url('/js/validations.js')}}"></script>
  @yield('page-script')
</body>
</html>