@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="application-container" class="card">
                <div class="m-5">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">
                                E-Mail Address
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                Password
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
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

                <div v-else="isloggedIn">
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h4>Online Users</h4>
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
                                    <div class="chat_list active_chat">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                            </div>

                                            <div class="chat_ib">
                                                <h5>Sunil Rajput</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>

                                                <div class="chat_ib">
                                                <h5>Sunil Rajput</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>

                                                <div class="chat_ib">
                                                <h5>Sunil Rajput</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>

                                                <div class="chat_ib">
                                                <h5>Sunil Rajput</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>

                                                <div class="chat_ib">
                                                <h5>Sunil Rajput</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>

                                                <div class="chat_ib">
                                                <h5>Sunil Rajput</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>

                                                <div class="chat_ib">
                                                <h5>Sunil Rajput</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mesgs">
                                <div class="msg_history">
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img">
                                            <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>Test which is a new approach to have all solutions
                                                </p>
                                                <span class="time_date"> 11:01 AM | June 9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>Test which is a new approach to have all solutions
                                            </p>
                                            <span class="time_date"> 11:01 AM | June 9</span>
                                        </div>
                                    </div>
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img">
                                            <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>Test, which is a new approach to have</p>
                                                <span class="time_date"> 11:01 AM | Yesterday</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>Apollo University, Delhi, India Test</p>
                                            <span class="time_date"> 11:01 AM | Today</span>
                                        </div>
                                    </div>
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img">
                                            <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>We work directly with our designers and suppliers, and sell direct to you, which means
                                                    quality, exclusive products, at a price anyone can afford.</p>
                                                <span class="time_date"> 11:01 AM | Today</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <input type="text" class="write_msg" placeholder="Type a message" />
                                        <button class="msg_send_btn" type="button">
                                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
