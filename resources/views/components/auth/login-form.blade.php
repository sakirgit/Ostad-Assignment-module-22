
   <!-- Nested Row within Card Body -->
   <div class="row">
      <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
      <div class="col-lg-6">
            <div class="p-5">
               <div class="text-center">
                  <h1 class="h2 text-gray-900 mb-4">Login</h1>
                  <h2 class="h5 text-gray-900 mb-4">Welcome Back! (y)</h2>
               </div>
               <div class="user">
                  <div class="form-group">
                        <input type="email" class="form-control form-control-user"
                           id="email" aria-describedby="emailHelp"
                           placeholder="Enter Email Address...">
                  </div>
                  <div class="form-group">
                        <input type="password" class="form-control form-control-user"
                           id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                           <input type="checkbox" class="custom-control-input" id="customCheck">
                           <label class="custom-control-label" for="customCheck">Remember
                              Me</label>
                        </div>
                  </div>
                  
                  <button onclick="SubmitLogin()" class="btn btn-primary btn-user btn-block">Login</button>
               </div>
               <hr>
               <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
               </div>
               <div class="text-center">
                  <a class="small" href="register">Create an Account!</a>
               </div>
            </div>
      </div>
   </div>
   
<script>

   async function SubmitLogin() {
             let email=document.getElementById('email').value;
             let password=document.getElementById('password').value;
 
             if(email.length===0){
                 errorToast("Email is required");
             }
             else if(password.length===0){
                 errorToast("Password is required");
             }
             else{
               //  showLoader();
                 let res=await axios.post("/login",{email:email, password:password});
               //  hideLoader()
                 if(res.status===200 && res.data['status']==='success'){
                     window.location.href="/dashboard";
                 }
                 else{
                     errorToast(res.data['message']);
                 }
             }
     }
 
 </script>