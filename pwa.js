"use strict";

const notificationButton = document.getElementById("enableNotifications");
let swRegistration = null;
const TokenElem = document.getElementById("token");
const ErrElem = document.getElementById("err");

// Initialize Firebase
// TODO: Replace with your project's customized code snippet
const config = {
  apiKey: "AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ",
  authDomain: "doncen-1.firebaseapp.com",
  databaseURL: "https://doncen-1.firebaseio.com",
  projectId: "doncen-1",
  storageBucket: "doncen-1.appspot.com",
  messagingSenderId: "741021253190",
  appId: "1:741021253190:web:569722f8de9679f5ffd447"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
initializeApp();

function initializeApp() {
  if ("serviceWorker" in navigator && "PushManager" in window) {
    console.log("Service Worker and Push is supported");
    initializeUi();
    initializeFCM();

    //Register the service worker
    navigator.serviceWorker
      .register("/sw.js")
      .then(swReg => {
        console.log("Service Worker is registered", swReg);
        swRegistration = swReg;
      })
      .catch(error => {
        console.error("Service Worker Error", error);
      });
    navigator.serviceWorker.ready.then(function(registration) {
      console.log("A service worker is active:", registration.active);

      // At this point, you can call methods that require an active
      // service worker, like registration.pushManager.subscribe()
    });
  } else {
    console.warn("Push messaging is not supported");
    notificationButton.textContent = "Push Not Supported";
  }
}

function initializeUi() {
  notificationButton.addEventListener("click", () => {
    displayNotification();
  });
}

function initializeFCM() {
  messaging
    .requestPermission()
    .then(() => {
      console.log("Notification permission granted.");

      // get the token in the form of promise
      return messaging.getToken();
    })
    .then(token => {
      document.cookie = 'notification_token = ' + token;

      // TokenElem.innerHTML = "token is : " + token;

    })
    .catch(err => {
      // ErrElem.innerHTML = ErrElem.innerHTML + "; " + err;
      console.log("Unable to get permission to notify.", err);
    });
}

function displayNotification() {
  if (window.Notification && Notification.permission === "granted") {
    notification();
  }
  // If the user hasn't told if he wants to be notified or not
  // Note: because of Chrome, we are not sure the permission property
  // is set, therefore it's unsafe to check for the "default" value.
  else if (window.Notification && Notification.permission !== "denied") {
    Notification.requestPermission(status => {
      if (status === "granted") {
        notification();
      } else {
        alert("You denied or dismissed permissions to notifications.");
      }
    });
  } else {
    // If the user refuses to get notified
    alert(
      "You denied permissions to notifications. Please go to your browser or phone setting to allow notifications."
    );
  }
}

function notification() {
  const options = {
    body: "Testing Our Notification",
    icon: "./doncen-icon.png"
  };
  swRegistration.showNotification("PWA Notification!", options);
}


let deferredPrompt;
const addBtn = document.querySelector('.add-button');
addBtn.style.display = 'none';




window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  // Update UI to notify the user they can add to home screen

      var position = $(window).scrollTop(); 
      
      $(window).scroll(function() {
          
          var scroll = $(window).scrollTop();
          
          if(scroll > position) {
              addBtn.style.display = 'block';
          } else {
              addBtn.style.display = 'none';
          }

          position = scroll;
      });
  

  addBtn.addEventListener('click', () => {
    // hide our user interface that shows our A2HS button

    addBtn.style.display = 'none';
    // Show the prompt
    deferredPrompt.prompt();
    // Wait for the user to respond to the prompt
    deferredPrompt.userChoice.then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('User accepted the A2HS prompt');
      } else {
        console.log('User dismissed the A2HS prompt');
      }
      deferredPrompt = null;
    });
  });
});
