window._ = require('lodash');




try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
let token = document.head.querySelector('meta[name="csrf-token"]');

import Echo from 'laravel-echo';

var alertify = require('alertifyjs');

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    authEndpoint : '/broadcasting/auth',
    // forceTLS: true,
    wsHost: 'http://127.0.0.1:8000',
    wsPort: 6001,
    encrypted : false,
    auth: {
        headers: {
            'X-CSRF-TOKEN': token,
        },
    },
});
let userId= $('#user_id').val();
if(userId){
    window.Echo.private('users.' +userId)
    .notification((notification) => {
        alertify.set('notifier', 'position', 'top-center');
        alertify.notify(notification.message, 'success', 10, function(){
            console.log(notification.message)});
        //alertify.success(notification.data.message);
    });
}
