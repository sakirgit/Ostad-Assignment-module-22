
   <!-- Nested Row within Card Body -->
   <div class="row">
      <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
      <div class="col-lg-6">
            <div class="p-5">
               <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Set new password</h1>
               </div>
               <form class="user">
                  <div class="form-group">
                     <input type="password" class="form-control form-control-user"
                        id="password" placeholder="New Password">
                  </div>
                  <div class="form-group">
                        <input type="password" class="form-control form-control-user"
                           id="cpassword" placeholder="Confirm Password">
                  </div>
                  <button class="btn btn-primary btn-user btn-block">
                        Next
                  </button>
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
      async function ResetPass() {
            let password = document.getElementById('password').value;
            let cpassword = document.getElementById('cpassword').value;
    
            if(password.length===0){
                errorToast('Password is required')
            }
            else if(cpassword.length===0){
                errorToast('Confirm Password is required')
            }
            else if(password!==cpassword){
                errorToast('Password and Confirm Password must be same')
            }
            else{
              showLoader()
              let res=await axios.post("/reset-password",{password:password});
              hideLoader();
              if(res.status===200 && res.data['status']==='success'){
                  successToast(res.data['message']);
                  debugger;
                  setTimeout(function () {
                      window.location.href="/login";
                  },1000);
              }
              else{
                errorToast(res.data['message'])
              }
            }
    
        }
    </script>