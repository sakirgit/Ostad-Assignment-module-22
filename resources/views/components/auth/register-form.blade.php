
                <!-- Nested Row within Card Body -->
                <div class="row">
                    

                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <div class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="fullName"
                                        placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="phone"
                                        placeholder="Phone">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                
                                <button onclick="onRegistration()" class="btn btn-primary btn-user btn-block">Register Account</button>
                                
                            </div>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
                
<script>


    async function onRegistration() {
            
          let email = document.getElementById('email').value;
          let fullName = document.getElementById('fullName').value;
          let phone = document.getElementById('phone').value;
          let password = document.getElementById('password').value;
  
          if(email.length===0){
              errorToast('Email is required')
          }
          else if(fullName.length===0){
              errorToast('Full Name is required')
          }
          else if(phone.length===0){
              errorToast('Phone number is required')
          }
          else if(password.length===0){
              errorToast('Password is required')
          }
          else{
           //   showLoader();
              let res=await axios.post("/register",{
                  email:email,
                  full_name:fullName,
                  phone:phone,
                  password:password
              })
            //  hideLoader();
              if(res.status===201 && res.data['status']==='success'){
                  successToast(res.data['message']);
                  setTimeout(function (){
                      window.location.href='/login'
                  },2000)
              }
              else{
                  errorToast(res.data['message'])
              }
          }
      }
  </script>