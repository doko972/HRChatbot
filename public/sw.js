// ============================================
// Service Worker — HR Chatbot Push Notifications
// ============================================

self.addEventListener('push', (event) => {
    if (!event.data) return;

    const data = event.data.json();
    const title = data.title || 'HR Chatbot';
    const options = {
        body:    data.body  || '',
        icon:    data.icon  || '/images/logo-192.png',
        badge:   '/images/logo-192.png',
        vibrate: [200, 100, 200],
        data:    { url: data.url || '/chat' },
        actions: [
            { action: 'open',    title: 'Ouvrir' },
            { action: 'dismiss', title: 'Ignorer' },
        ],
    };

    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});

self.addEventListener('notificationclick', (event) => {
    event.notification.close();

    if (event.action === 'dismiss') return;

    const url = event.notification.data?.url || '/chat';

    event.waitUntil(
        clients.matchAll({ type: 'window', includeUncontrolled: true }).then((clientList) => {
            for (const client of clientList) {
                if (client.url.includes('/chat') && 'focus' in client) {
                    return client.focus();
                }
            }
            return clients.openWindow(url);
        })
    );
});
