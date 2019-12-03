<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Teste') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.dm-uploader.min.js') }}" defer></script>
    <script src="{{ asset('js/demo-ui.js') }}" defer></script>
    <script src="{{ asset('js/demo-config.js') }}" defer></script>
    <script src="{{ asset('js/demo-config-upload.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Logo -->
    <link rel="icon" type="image/png" href="img/icon.png"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="img/logo.png" alt="Atom Funding">
                </a>
                <a class="nav-link" href="#" style="padding-left:800px"><img src="img/avatar.png" width="37" height="37" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Footer -->
  <footer class="footer bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <table>
			<tr>
				<td rowspan=3 valign="top" align="right" width="300px">
					<a class="nav-link" href="#" style="padding-right:32px"><img src="img/icon-white.png" width="37" height="37" alt=""></a>
				</td>
				<td width="300px">
				  <a class="white" href="#">How it Works</a>
				</td>
				<td width="300px">
				  <a class="white" href="#">Contact Us</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="white" href="#">Get Funding</a>
				</td>
				<td>
				  <a class="white" href="#">Careers</a>
				</td>
			</tr>
			<tr>
				<td>
				  <a class="white" href="#">Apply Now</a>
				</td><td>
				  <a class="white" href="#">FAQ</a>
				</td>
			</tr>
          </table>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto" align="top">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a class="white fa" href="#">
              <img src="img/slack.png" alt="Slack" style="width:25px;height:25px;">
              </a>
            </li>
			<li class="list-inline-item mr-3">
              <a class="white fa" href="#">
              <img src="img/twitter.png" alt="Twitter" style="width:25px;height:25px;">
              </a>
            </li>
			<li class="list-inline-item mr-3">
              <a class="fa" href="#">
              <img src="img/linkedin.png" alt="LinkedIn" style="width:25px;height:25px;">
              </a>
            </li>
			<li class="list-inline-item mr-3">
              <a class="white fa" href="#">
              <img src="img/facebook.png" alt="Facebook" style="width:25px;height:25px;">
              </a>
            </li>
            <li class="list-inline-item">
              <a class="white" href="#">
                <img src="img/instagram.png" alt="Instagram" style="width:25px;height:25px;">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
