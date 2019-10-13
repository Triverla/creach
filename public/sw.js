var staticCacheName = "pwa-creach";
var filesToCache = [
    '/',
    'offline',
    'app/css/fonts.css',
    'js/app.js',
    'css/app.css',
    'app/css/crumina-fonts.css',
    'app/css/normalize.css',
    'app/css/grid.css',
    'app/css/styles.css',
    'css/toastr.min.css',
    'app/css/jquery.mCustomScrollbar.min.css',
    'app/css/swiper.min.css',
    'app/css/primary-menu.css',
    'app/css/magnific-popup.css',
    'app/js/jquery-2.1.4.min.js',
    'app/js/crum-mega-menu.js',
    'app/js/swiper.jquery.min.js',
    'app/js/theme-plugins.js',
    'app/js/main.js',
    'app/js/posts.js',
    'js/toastr.min.js'


];
// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
        .then(cache => {
            return cache.addAll(filesToCache);
        })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                .filter(cacheName => (cacheName.startsWith("pwa-")))
                .filter(cacheName => (cacheName !== staticCacheName))
                .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
        .then(response => {
            return response || fetch(event.request);
        })
        .catch(() => {
            return caches.match('offline');
        })
    )
});