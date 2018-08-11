
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#application-container',
    data: {
        isLoggedIn: 0,
        login: {
            email: '',
            password: '',
        },
        users: [],
    },
    methods: {
        loginForm: function (form) {
            axios.post('/login', this.login)
            .then(function (response) {
                if (response.data.type == 'success') {
                    app.isLoggedIn = true;
                    return;
                }

                app.isLoggedIn = 0;
            });
        },
        showValidationErrors(errors, errorContainer = 'error-container') {
            var errorsHtml = '';

            $.each(errors, function (key, value) {
                errorsHtml += '<li>' + value + '</li>';
            });

            $('#' + errorContainer + ' ul').html(errorsHtml);
            $('#' + errorContainer).removeClass('d-none');
        },
        setUsers(users) {
            users = JSON.parse(users);

            $.each(users, function (key, user) {
                app.users.push({
                    'id': user.id,
                    'email': user.email,
                    'name': user.name,
                    'image': '/images/' + user.id + '.png',
                });
            });
        },
    },
    created: function () {
        axios.get('/check-user-logged-in')
        .then(function (response) {
            if (response.data.type == 'success') {
                app.setUsers(response.data.data);
                app.isLoggedIn = true;
                return;
            }

            app.isLoggedIn = 0;
        });
    },
});
