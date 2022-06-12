const BASE = location.protocol + "//" + location.host;

const PREFIX = "Version1";
const CACHED_FILES = [
    `${BASE}/css/style.css`,
    `${BASE}/css/Appoint.css`,

    `${BASE}/index.js`,
    `${BASE}/API/.htaccess`,
    `${BASE}/API/index.php`,
    `${BASE}/API/api.php`,
    `${BASE}/API/insertAppoint.php`,


];

// cache pour certains ressources uniquement lorsqu'elles sont demander
const LAZY_CACHE = [`${BASE}/post.json`];

self.addEventListener("install", () => {
    // on lui dit de ne plus attendre
    self.skipWaiting();
    self.waitUntil(
        (async() => {
            const cache = await caches.open(PREFIX);
            await cache.addAll([...CACHED_FILES, "/appoint.html"]);
        })()
    );

    console.log(`${PREFIX} Install`);
});

self.addEventListener("activate", (event) => {
    //permet de controller la page dés que le sw est activer
    clients.claim();
    event.waitUntil(
        (async() => {
            const keys = await caches.keys();
            await Promise.all(
                keys.map((key) => {
                    if (!key.includes(PREFIX)) {
                        return caches.delete(key);
                    }
                })
            );
        })()
    );
    console.log(`${PREFIX} Active`);
});


self.addEventListener('fetch', (event) => {
    console.log(`${PREFIX} Fetching : ${event.request.url}, Mode : ${event.request.mode}`);
    if (event.request.mode === "navigate") {
        event.respondWith(
            (async() => {
                try {
                    const preloadResponse = await event.preloadResponse;
                    if (preloadResponse) {
                        return preloadResponse;
                    }

                    return await fetch(event.request);
                } catch (e) {
                    const cache = await caches.open(PREFIX);

                    return await cache.match('/appoint.html');
                }
            })()
        );
    } else if (CACHED_FILES.includes(event.request.url)) {
        event.respondWith(caches.match(event.request));
    } else if (LAZY_CACHE.includes(event.request.url)) {
        event.respondWith(
            (async() => {
                try {
                    const cache = await caches.open(PREFIX);
                    const preloadResponse = await event.preloadResponse;
                    if (preloadResponse) {
                        cache.put(event.request, preloadResponse.clone())
                        return preloadResponse;
                    }

                    const networkResponse = await fetch(event.request);
                    cache.put(event.request, networkResponse.clone());
                    return networkResponse;
                } catch (e) {
                    return await caches.match(event.request);
                }
            })()
        );
    }
});