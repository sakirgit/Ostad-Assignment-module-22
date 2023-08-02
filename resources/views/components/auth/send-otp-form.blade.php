
   <!-- Nested Row within Card Body -->
   <div class="row">
      <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
      <div class="col-lg-6">
            <div class="p-5">
               <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Your Email</h1>
               </div>
               <form class="user">
                  <div class="form-group">
                        <input type="email" class="form-control form-control-user"
                           id="email" aria-describedby="emailHelp"
                           placeholder="Enter Email Address...">
                  </div>
                  <a href="login" class="btn btn-primary btn-user btn-block">
                        Next
                  </a>
               </form>
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
   async function VerifyEmail() {
        let email = document.getElementById('email').value;
        if(email.length === 0){
           errorToast('Please enter your email address')
        } else{
            showLoader();
            let res = await axios.post('/send-otp', {email: email});
            hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message'])
                sessionStorage.setItem('email', email);
                setTimeout(function (){
                    window.location.href = '/verify-otp';
                }, 1000)
            }
            else{
                errorToast(res.data['message'])
            }
        }

    }
</script>