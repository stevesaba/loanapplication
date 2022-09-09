<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Loan App</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?php echo url('/'); ?>/public/images/logo.png" type="image/x-icon"/>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/public/css/custom.css">
</head>
<body>
    <section class="login-wrapper">
      <div class="login-form">
        <div class="container">
          <a class="theme-logo" href="#">
             <img src="<?php echo url('/'); ?>/public/images/logo.png" alt="Loan App">
          </a>
          <p class="p-text">Welcome to Loan App <span><a href="{{ url('/')}}" style="color:#FFF">Home</a> | <a href="{{ url('/adminlogin')}}" style="color:#FFF">Admin Login</a> | <a href="{{ url('/customerregistration')}}" style="color:#FFF">Customer Signup</a> | <a href="{{ url('/customerlogin')}}" style="color:#FFF">Customer Login</a></span></p>
          <div class="form_sect">
          <h1>Admin Login / Loan App</h1>
          <h6 align="center">{{session('return')}}</h6>
          <form action="{{ url('adminloginvalidate')}}"  method="post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <div class="form-group field">
              <input type="email" name="email" class="form-control email" placeholder="Email ID">
            </div>
            <div class="form-group field mb30">
              <input type="password" name="password" class="form-control pass" placeholder="Password">
            </div>
            <div><input type="submit" name="submit" class="btn btn-info" value="Login"></div>
            <div class="clearfix">
            
            </div>
          </form>



          </div>
          
        </div>
      </div>
    </section>
    
</body>
</html>