importScripts("https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js");

firebase.initializeApp({
  apiKey: "YOUR_FIREBASE_API_KEY",
  authDomain: "agorapronto-8116e.firebaseapp.com",
  projectId: "agorapronto-8116e",
  storageBucket: "agorapronto-8116e.appspot.com",
  messagingSenderId: "482881222701",
  appId: "YOUR_FIREBASE_APP_ID",
  databaseURL: "https://agorapronto-8116e-default-rtdb.firebaseio.com",
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    const promiseChain = clients
        .matchAll({
            type: "window",
            includeUncontrolled: true
        })
        .then(windowClients => {
            for (let i = 0; i < windowClients.length; i++) {
                const windowClient = windowClients[i];
                windowClient.postMessage(payload);
            }
        })
        .then(() => {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.score
              };
            return registration.showNotification(title, options);
        });
    return promiseChain;
});
self.addEventListener('notificationclick', function (event) {
    console.log('notification received: ', event)
});