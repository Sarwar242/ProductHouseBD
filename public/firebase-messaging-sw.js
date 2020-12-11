importScripts('https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.1.2/firebase-messaging.js');
// Get registration token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
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
const messaging = firebase.messaging();

  messaging.onBackgroundMessage(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    console.log(payload.data.name);
    // Customize notification here
    // const notificationTitle = 'Background Message Title';
    // const notificationOptions = {
    //   body: 'Background Message body.',
    //   icon: '/firebase-logo.png'
    // };

    // self.registration.showNotification(notificationTitle,
    //   notificationOptions);
  });
