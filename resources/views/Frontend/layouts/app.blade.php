<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CosmolineBD') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('frontend/logo/cosmoline.png') }}" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                        <li class="nav-item" @yield('login','')>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item" @yield('reg','')>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-messaging.js"></script>
{{-- <script defer  src="https://www.gstatic.com/firebasejs/8.1.2/firebase-init.js"></script> --}}
{{-- <script src='https://cdn.firebase.com/js/client/8.1.2/firebase.js'></script> --}}
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  {{-- <script defer  src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
  <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script> --}}
  <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-functions.js"></script>
<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyByydM3yV7LV5CHNDC0n5snrZOo5Y4J31s",
    authDomain: "cosmolinebd-b7d5f.firebaseapp.com",
    projectId: "cosmolinebd-b7d5f",
    storageBucket: "cosmolinebd-b7d5f.appspot.com",
    messagingSenderId: "42079919319",
    appId: "1:42079919319:web:9031809804e9ddc8802492",
    measurementId: "G-LRVXZ8K4WH"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  const messaging = firebase.messaging();

  console.log('Requesting permission...');
    // [START request_permission]
    Notification.requestPermission().then((permission) => {
      if (permission === 'granted') {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve a registration token for use with FCM.
        // [START_EXCLUDE]
        // In many cases once an app has been granted notification permission,
        // it should update its UI reflecting this.
        // resetUI();
        // [END_EXCLUDE]
      } else {
        console.log('Unable to get permission to notify.');
      }
    });
//   // Add the public key generated from the console here.
    messaging.getToken().then((currentToken) => {
    if (currentToken) {
        console.log(currentToken);
    //   sendTokenToServer(currentToken);
    //   updateUIForPushEnabled(currentToken);
    } else {
      // Show permission request.
      console.log('No registration token available. Request permission to generate one.');
      // Show permission UI.
    //   updateUIForPushPermissionRequired();
    //   setTokenSentToServer(false);
    }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // showToken('Error retrieving registration token. ', err);
        // setTokenSentToServer(false);
    });
//   messaging.getToken({vapidKey: "AAAACcwonNc:APA91bHyfX9qo8Glhw9IvCXT5Y9m_DxIYjiOz7Np9BYrC0kjfeaH3q1uzpIxv7wBh8SwePz8-AkqEXF26G2gLfqAIdhbhnKLNSq6DjClHxAHSB9KzQgj3RKjKHDxMEpfXlK6OFG-jXiL"}).then((currentToken) => {
//       if (currentToken) {
//         console.log(currentToken);
//         // updateUIForPushEnabled(currentToken);
//       } else {
//         // Show permission request.
//         console.log('No registration token available. Request permission to generate one.');
//         // Show permission UI.
//         // updateUIForPushPermissionRequired();
//         // setTokenSentToServer(false);
//       }
//     }).catch((err) => {
//       console.log('An error occurred while retrieving token. ', err);
//       showToken('Error retrieving registration token. ', err);
//     //   setTokenSentToServer(false);
//     });

//   function showToken(currentToken) {
//     console.log(currentToken);
//     // Show token in console and UI.
//     // const tokenElement = document.querySelector('#token');
//     // tokenElement.textContent = currentToken;

//   }

  // Send the registration token your application server, so that it can:
  // - send messages back to this app
  // - subscribe/unsubscribe the token from topics
//   function sendTokenToServer(currentToken) {
//     if (!isTokenSentToServer()) {
//       console.log('Sending token to server...');
//       // TODO(developer): Send the current token to your server.
//     //   setTokenSentToServer(true);
//     } else {
//       console.log('Token already sent to server so won\'t send it again ' +
//           'unless it changes');
//     }

//   }

//   function isTokenSentToServer() {
//     return window.localStorage.getItem('sentToServer') === '1';
//   }

//   function setTokenSentToServer(sent) {
//     window.localStorage.setItem('sentToServer', sent ? '1' : '0');
//   }
messaging.onMessage((payload) => {
    console.log('Message received. ', payload);
  });

</script>
</html>
