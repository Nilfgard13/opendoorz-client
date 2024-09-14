<x-login>
   <header>Register Form</header>
   <form action="#">
       <div class="field">
           <span class="fa fa-envelope-square"></span>
           <input type="text" required placeholder="Email">
       </div>
       <div class="field space">
           <span class="fa fa-user"></span>
           <input type="text" required placeholder="Username">
       </div>
       <div class="field space">
           <span class="fa fa-phone"></span>
           <input type="text" required placeholder="Phone">
       </div>
       <div class="field space">
           <span class="fa fa-lock"></span>
           <input type="password" class="pass-key" required placeholder="Password">
           <span class="show">SHOW</span>
       </div>
       <div class="field space">
           <span class="fa fa-lock"></span>
           <input type="password" class="pass-key" required placeholder="Reconfirm Password">
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
       <a href="/login">Signup Now</a>
   </div>
</x-login>
