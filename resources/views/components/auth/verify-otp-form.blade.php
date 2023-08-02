
   <!-- Nested Row within Card Body -->
   <div class="row">
      <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
      <div class="col-lg-6">
            <div class="p-5">
               <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Enter OTP Code</h1>
               </div>
               <form class="user">
                  <div class="form-group">
                        <input type="email" class="form-control form-control-user"
                           id="email" aria-describedby="emailHelp"
                           placeholder="5 Digit Code number">
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
   async function VerifyOtp() {
        let otp = document.getElementById('otp').value;
        if(otp.length !==4){
           errorToast('Invalid OTP')
        }
        else{
            showLoader();
            let res=await axios.post('/verify-otp', {
                otp: otp,
                email:sessionStorage.getItem('email')
            })
            hideLoader();

            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message'])
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href='/reset-password'
                }, 1000);
            }
            else{
                errorToast(res.data['message'])
            }
        }
    }
</script>