<x-login>
    <header>Login Form</header>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="field">
            <span class="fa fa-user"></span>
            <input type="email" name="email" required placeholder="Your Email" value="{{ old('email') }}">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" name="password" class="pass-key" required placeholder="Password">
            <span class="show">SHOW</span>
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="pass">
            <a href="#">Forgot Password?</a>
        </div>
        <div class="field">
            <input type="submit" value="LOGIN">
        </div>
        @if (session('error'))
            <div class="text-red-500 text-sm mt-2">
                {{ session('error') }}
            </div>
        @endif
    </form>
    <div class="login">
        Or login with
    </div>
    <div class="links">
        <div class="facebook">
            <i class="fab fa-facebook-f"><span>Facebook</span></i>
        </div>
        <div class="instagram">
            <i class="fab fa-instagram"><span>Instagram</span></i>
        </div>
    </div>
    <div class="signup">
        Don't have account?
        <a href="register">Signup Now</a>
    </div>

    @push('scripts')
    <script>
        const pass_field = document.querySelector('.pass-key');
        const showBtn = document.querySelector('.show');
        showBtn.addEventListener('click', function(){
            if(pass_field.type === "password"){
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
            }else{
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
            }
        });
    </script>
    @endpush
</x-login>