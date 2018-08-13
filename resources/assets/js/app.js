
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
        loggedInUserId: 0,
        login: {
            email: '',
            password: '',
        },
        users: [],
        messages: [],
        newMessage: '',
        search: '',
        selectedUsers: [],
    },
    computed: {
        searchedUsers: function() {
            return this.users.filter(
                function(user) {
                    return user.name.toLowerCase().indexOf(app.search.toLowerCase()) >= 0;
                }
            );
        },
        selectedUsersMessages: function() {
            return this.messages.filter(
                function(message) {
                    if (app.selectedUsers.length == 0) {
                        return true;
                    }

                    return app.selectedUsers.indexOf(message.userId) >= 0;
                }
            );
        }
    },
    methods: {
        loginForm: function (form) {
            axios.post('/login', this.login)
            .then(function (response) {
                if (response.data.type == 'success') {
                    app.setUsers(response.data.users);
                    app.setMessageHistory(response.data.messages);

                    app.isLoggedIn = true;
                    app.loggedInUserId = response.data.user_id;
                    return;
                }

                app.isLoggedIn = 0;
            });
        },
        sendMessage() {
            axios.post('/send-message', { text: this.newMessage })
            .then(function (response) {
                app.setMessageRow(response.data);
                app.newMessage = '';
            });
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
        setMessageHistory(messages) {
            messages = JSON.parse(messages);

            $.each(messages, function (key, message) {
                app.setMessageRow(message);
            });
        },
        setMessageRow(message) {
            var date = new Date(message.created_at);
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            app.messages.push({
                'id': message.id,
                'text': message.text,
                'userId': message.user_id,
                'userName': message.user.name,
                'userImage': '/images/' + message.user_id + '.png',
                'time': date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }),
                'date': monthNames[date.getMonth()] + date.getDate(),
            });
        },
        showUserchat(event, userId) {
            event.currentTarget.classList.toggle('active_chat');

            if (app.selectedUsers.indexOf(userId) >= 0) {
                app.selectedUsers.splice(app.selectedUsers.indexOf(userId), 1);

                return;
            }

            app.selectedUsers.push(userId);
        },
    },
    created: function () {
        axios.get('/check-user-logged-in')
        .then(function (response) {
            if (response.data.type == 'success') {
                app.setUsers(response.data.users);
                app.setMessageHistory(response.data.messages);
                app.isLoggedIn = true;
                app.loggedInUserId = response.data.user_id;
                return;
            }

            app.isLoggedIn = 0;
        });
    },
});
