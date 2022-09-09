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
          <p class="p-text">Welcome to Loan App <span></span></p>
          <div class="form_sect">
          <h1>Navigation Link / Loan App</h1>

           <a href="{{ url('/customerregistration')}}"  class="btn btn-info">Customer Sign Up</a>
           <a href="{{ url('/customerlogin')}}"  class="btn btn-info"> Customer Login</a><br><br>
          <a href="{{ url('/adminlogin')}}"  class="btn btn-info">Admin Login</a>
          



          </div>
          
        </div>
      </div>
    </section>
    
</body>
</html>