self.addEventListener('install', (e) => {
    e.waitUntil(
        caches.open('fox-store').then((cache) => cache.addAll([
            '/',
            '/index.php',
            '/appoint.php',
            '/index.js',
            '/css/style.css',
            '/css/Appoint.css',
            '/images/fox1.jpg',
            '/pwa-examples/a2hs/images/noun-appointment-4878328.png',
            '/pwa-examples/a2hs/images/noun-setting-1150962.png',
            '/pwa-examples/a2hs/images/noun-upcoming-4588070.png',
        ])),
    );
});

self.addEventListener('fetch', (e) => {
    console.log(e.request.url);
    e.respondWith(
        caches.match(e.request).then((response) => response || fetch(e.request)),
    );
});