<x-login>
    <header>Login Form</header>
    <form action="#">
        <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" required placeholder="Your Email">
        </div>
        <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" class="pass-key" required placeholder="Password">
            <span class="show">SHOW</span>
        </div>
        <div class="pass">
            <a href="#">Forgot Password?</a>
        </div>
        <div class="field">
            <input type="submit" value="LOGIN">
        </div>
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
        <a href="/register">Signup Now</a>
    </div>
</x-login>
