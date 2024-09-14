<x-layout_login>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">OAS</h1>

            </div>
            <h3>Register to OAS</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="{{ route('register-user') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password"
                        name="password_confirmation" required="">
                </div>

                <div class="form-group">
                    <div class="checkbox i-checks">
                        <label> <input type="checkbox"><i></i> Agree to the terms and policy </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>
            </form>

            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</x-layout_login>
