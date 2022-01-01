<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>SignUp</title>
</head>

<body>
    <div>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1" style="font-size:40px;"><b>musicX</b></span>
  </div>
</nav>    
    <div class="container">
   

    <div class="row justify-content-md-center">
            <div class="col-5">
            

<br>
</div>
<div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>

                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>

                <form action="<?php echo base_url(); ?>/SignupController/store" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="fullName" placeholder="Full Name" 
                        value="<?= set_value('fullName') ?>" class="form-control" >
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="userName" placeholder="Enter UserName" 
                        value="<?= set_value('userName') ?>" class="form-control" >
                    </div>

                    <div class="dropdown">
                    <select name="role" value="<?php set_value('role') ?>  required>
                    <option value="" selected>Choose Account Type</option>

                    <option value="Admin">Admin</option>
  <option value="User" >User</option>
</select></div>
<br>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password"
                         class="form-control" >
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword"
                         placeholder="Confirm Password" class="form-control" >
                    </div>

       

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Sign Up</button>
                    </div>
                </form>
       <br><p>Already have an Account?</p>
                <div class="d-grid">
       
              <a href="signin">  <button type="submit" class="btn btn-warning">Sign In</button>
                </a>   </div>
       
            </div>
        </div>
    </div>
</body>

</html>