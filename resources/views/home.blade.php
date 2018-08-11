@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center mb-4 mt-5">Chat Application</h3>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div v-if="isLoggedIn">
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h4>Users</h4>
                                    </div>

                                    <div class="srch_bar">
                                        <div class="stylish-input-group">
                                            <input type="text" class="search-bar" placeholder="Search">

                                            <span class="input-group-addon">
                                                <button type="button">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="inbox_chat">
                                    <div class="chat_list" v-for="user of users">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img v-bind:src="user.image" alt="User Avatar">
                                            </div>

                                            <div class="chat_ib">
                                                <h5>@{{ user.name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mesgs">
                                <div class="msg_history">
                                    <div v-for="message of messages">
                                        <div class="outgoing_msg" v-if="loggedInUserId == message.userId">
                                            <div class="sent_msg">
                                                <p>
                                                    @{{ message.text }}
                                                </p>

                                                <span class="time_date"> 11:01 | June 9</span>
                                            </div>
                                        </div>

                                        <div class="incoming_msg" v-else>
                                            <div class="incoming_msg_img">
                                                <img v-bind:src="message.userImage" alt="User Avatar">
                                            </div>

                                            <div class="received_msg">
                                                <div class="received_withd_msg">
                                                    <p>
                                                        @{{ message.text }}
                                                    </p>

                                                    <span class="time_date">
                                                        @{{ message.time }} AM |
                                                        @{{ message.date }} |
                                                        @{{ message.userName }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <input type="text"
                                            class="write_msg"
                                            placeholder="Type a message"
                                            v-model="newMessage"
                                            v-on:keyup.enter="sendMessage()"
                                        >

                                        <button class="msg_send_btn" type="button" v-on:click="sendMessage()">
                                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-5" v-else>
                    <form method="POST" v-on:submit.prevent="loginForm(this)">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">
                                E-Mail Address
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="login.email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                Password
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="login.password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
