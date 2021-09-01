<!-- Modal Code Start -->
{{-- <script>
    function toggle() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script> --}}
<section>
    <div class="login-wrap modal " id="myModal" style="overflow-y: hidden;">
        <div class="login-html pt-5">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                class="tab">Sign Up</label>

            <div class="login-form">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="email" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="password" class="input"
                                data-type="password">
                        </div>
                        <div class="group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Keep me Signed in') }}
                                </label>
                            </div>
                            {{-- <label for="check"><span class="icon"></span> Keep me Signed in</label> --}}
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        <div class="flex icons">
                            <i class="fab fa-google google"></i>
                            <i class="fab fa-facebook-f facebook"></i>
                            <i class="fab fa-google-play play"></i>
                        </div>
                        <div class="hr"></div>

                        <div class="foot-lnk">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </div>
                </form>

                <div class="sign-up-htm">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>

                            <input id="password" type="password" class="input" name="password" required>
                            {{-- <i class="far fa-eye-slash hide" onclick="toggle()"></i> --}}

                        </div>

                        <div class="group">
                            <label for="pass" class="label">Phone</label>
                            <input id="pass" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="text" class="input" name="email"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">I am a</label>
                            <select name="role" class="form-control">
                                <option value="teacher">Teacher</option>
                                <option value="student">Student/Parent</option>
                            </select>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>

                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal Code End -->
