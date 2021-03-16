@extends("layouts.layouts")
@section("header_script")
@endsection
@section("content")
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="{{asset("resources/images/cm-logo.png")}}" alt="">
                                    <p>Social,  is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                                </div><!--cm-logo end-->
                                <img src="{{asset("resources/images/cm-main-img.png)")}}" alt="">
                            </div><!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <b>Already have an account - </b>
                                    <a style="background: #e44d3a; color: #ffffff; padding: 4px; border-radius: 5px" href="{{url("/")}}">Sign in</a>
                                </ul>

                                <div class="sign_in_sec current">
                                    <div class="results">
                                        @if(Session::get('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif

                                        @if(Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('fail') }}
                                            </div>
                                        @endif
                                    </div>

                                    <h3>Sign in</h3>
                                    <form id="signup" method="post" action="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="name" placeholder="Full Name" id="name" value="{{old('name')}}">
                                                    <i class="la la-user"></i>
                                                </div>
                                                <span class="text-danger ">@error('name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="email" placeholder="Email" id="email" value="{{old('email')}}" onblur="duplicateEmail(this)">
                                                    <i class="la la-envelope"></i>
                                                </div>
                                                <span class="text-danger ">@error('email'){{ $message }}@enderror</span>
                                                <span id="error_email" class="error"></span>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="password" placeholder="Password" id="password" value="{{old('password')}}">
                                                    <i class="la la-lock"></i>
                                                </div>
                                                <span class="text-danger ">@error('password'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="repeat_password" placeholder="Repeat Password" id="repeat_password" value="{{old('repeat_password')}}">
                                                    <i class="la la-lock"></i>
                                                </div>
                                                <span class="text-danger ">@error('repeat_password'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec st2">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="terms" id="terms">
                                                        <label for="terms">
                                                            <span></span>
                                                        </label>
                                                        <small>Yes, I understand and agree to the Social Terms & Conditions.</small>
                                                    </div><!--fgt-sec end-->
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button id="submit" type="submit" value="submit">Get Started</button>
                                            </div>
                                        </div>
                                    </form>

                                </div><!--sign_in_sec end-->
                            </div><!--login-sec end-->
                        </div>
                    </div>
                </div><!--signin-pop end-->
            </div><!--signin-popup end-->
            <div id="loader"></div>
            <div class="footy-sec">
                <div class="container">
                    <ul>
                        <li><a href="#" title="">Help Center</a></li>
                        <li><a href="#" title="">Privacy Policy</a></li>
                        <li><a href="#" title="">Community Guidelines</a></li>
                        <li><a href="#" title="">Cookies Policy</a></li>
                        <li><a href="#" title="">Career</a></li>
                        <li><a href="#" title="">Forum</a></li>
                        <li><a href="#" title="">Language</a></li>
                        <li><a href="#" title="">Copyright Policy</a></li>
                    </ul>
                    <p><img src="{{asset("resources/images/copy-icon.png")}}" alt="">Copyright 2018</p>
                </div>
            </div><!--footy-sec end-->
        </div><!--sign-in-page end-->


    </div><!--theme-layout end-->
@endsection
@section("footer_script")
    <script>
        $(document).ready(function(){
            $("#signup").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 3
                    },
                    repeat_password: {
                        required: true,
                        minlength: 3,
                        equalTo: "#password"
                    },
                    terms: "required"
                },
                messages: {
                    name: "Please enter your name",
                    email: "Please enter a valid email address",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    repeat_password: {
                        required: "Please provide confirm password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    terms: "I agree with terms and conditions"
                }
            });
        });

        function duplicateEmail(element){
            let email = $('#email').val();
            $.ajax({
                type: "POST",
                url: '{{route('checkmail')}}',
                data: {email:email, _token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function(res) {
                    if(res.exists){
                        $("#error_email").html('Email already exists');
                    }
                },
                error: function (jqXHR, exception) {

                }
            });
        }

        $(document).ready(function(){
            $("#signup").submit(function() {
                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                alert(name);
                $.ajax({
                    method: "post",
                    url: '{{route('signup.store')}}',
                    data: {name: name, email: email, password: password,  _token: '{{ csrf_token() }}'},
                    dataType: "json",
                    success: function(res) {
                        if(res.data){
                            alert("ok");
                        }else{
                            alert("False");
                        }
                    },
                });
            });
        });
    </script>
@endsection
