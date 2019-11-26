var CACHE_NAME = 'goatrails-v1';
var urlsToCache = [
  '/',
  '../../img/icons/logo-192.png',
  '../../img/icons/logo-512.png',
  '../../img/icons/logo.png',
  '../../img/icons/favicon.png',
  '../../css/google-fonts/fonts.css',
  '../js/crypto-js/aes.js',
  '../js/popper/popper.min.js',
  '../js/bootstrap/bootstrap.min.js',
  '../../css/global.css',
  '../../css/bootstrap/bootstrap.min.css',
  '../../css/fontawesome/css/all.min.css',
  '../js/jquery/jquery.min.js',
  '../js/global.js'
];

self.addEventListener('install', e => {
	  e.waitUntil(
	    caches.open(CACHE_NAME).then(cache => {
	    	return cache.addAll(urlsToCache)
	          .then(() => self.skipWaiting());
	    })
	  );
	});

	self.addEventListener('activate', event => {
	  event.waitUntil(self.clients.claim());
	});

	self.addEventListener('fetch', event => {
	  event.respondWith(
	    caches.open(CACHE_NAME)
	      .then(cache => cache.match(event.request, {ignoreSearch: true}))
	      .then(response => {
	      return response || fetch(event.request);
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