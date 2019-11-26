var CACHE_NAME = 'goatrails-v1';
var urlsToCache = [
  '/',
  '../../img/icons/logo-192.png',
  '../../img/icons/logo-512.png',
  '../../img/icons/logo.png',
  '../../img/icons/favicon.png',
  '../css/google-fonts/fonts.css',
  '../js/crypto-js/aes.js',
  '../js/popper/popper.min.js"',
  '../js/bootstrap/bootstrap.min.js',
  '../css/global.css',
  '../css/bootstrap/bootstrap.min.css',
  '../css/fontawesome/css/all.min.css',
  '../js/jquery/jquery.min.js',
  '../js/global.js'
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Cache open!');
        return cache.addAll(urlsToCache);
      })
  );
});


self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
        .then(function(response) {
            // Cache hit - return response
            if (response) {
                return response;
            }
            return fetch(event.request);
        })
    );
});

// self.addEventListener('activate', event => {
//     // remove old caches
//     event.waitUntil(
//       caches.keys().then(keys => Promise.all(
//         keys.map(key => {
//           if (key != CACHE_NAME) {
//             return caches.delete(key);
//           }
//         })
//       )).then(() => {
//         console.log('Now ready to handle fetches!');
//       })
//     );
// });