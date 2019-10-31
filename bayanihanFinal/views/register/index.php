<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>


  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              
                

                 

                <div class="form-group row" id="VolunteerForm">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>

                <div class="form-group" id="CompanyForm" style="display:none;">
                  <input type="email" class="form-control form-control-user" id="exampleInputCompanyName" placeholder="Company name">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="Organization" placeholder="Company/Organization">
                  </div>
                  <div class="col-sm-6">
                    
                    <select class="form-control form-control-user" id="Career">
                    <option disabled selected="" value="">Career / Category</option>
                    <option value="Student">Student</option>
                    <option value="Professionals">Professionals</option>
                </select>
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <span>Company<input type="radio" class="btn btn-info btn-circle btn-sm" name="status" id="Company" value="Company"  style="margin-left:6px;"></span>
                  </div>
                  <div class="col-sm-3">
                    <span>Volunteer<input type="radio" class="btn btn-info btn-circle btn-sm" name="status" id="Volunteer" value="Volunteer"  style="margin-left:6px;" checked=""></span>
                  </div>
                </div>
                <span class="btn btn-primary btn-user btn-block" id="register">
                  Register
                </span>
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
            
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets/js/sb-admin-2.min.js"></script>
  <script scr="../../assets/js/jquery-3.2.1.min.js"></script>

</body>

</html>
<script>
 $(function(){
    $(document).on("click","#register",function(){
        var exampleFirstName = $("input#exampleFirstName").val();
        var exampleLastName = $("input#exampleLastName").val();
        var exampleInputEmail = $("input#exampleInputEmail").val();
        var exampleInputPassword = $("input#exampleInputPassword").val();
        var exampleRepeatPassword = $("input#exampleRepeatPassword").val();
        var Organization = $("input#Organization").val();
        var Career = $("select#Career").val();
        /*var Volunteer = $("input#Volunteer").val();
        var Company = $("input#Company").val();*/
        var exampleInputCompanyName = $("input#exampleInputCompanyName").val();

       var status = document.querySelector('input[name="status"]:checked').value;
        
    

        if(exampleInputPassword == exampleRepeatPassword){
              $.ajax({
            url : "../../classes/register.php",
            method:"POST",
            data : "exampleFirstName=" + exampleFirstName + "&exampleLastName=" + exampleLastName + "&exampleInputEmail=" + exampleInputEmail + "&exampleInputPassword=" + exampleInputPassword + "&exampleRepeatPassword=" + exampleRepeatPassword + "&exampleInputCompanyName=" + exampleInputCompanyName + "&status=" + status + "&Organization=" + Organization + "&Career=" + Career,
            success:function(data){
              document.location.href= "../login/";
            }
        });

        }else{
            alert("Password did not match");
        }

      

    });

    $(document).on("click","#Company",function(){
        $("#CompanyForm").show();
        $("#VolunteerForm").hide();
        $("#Organization").hide();
        $("#Career").hide();

    });
    $(document).on("click","#Volunteer",function(){
        $("#CompanyForm").hide();
        $("#VolunteerForm").show();
        $("#Organization").show();
        $("#Career").show();
    });
 });
</script>
