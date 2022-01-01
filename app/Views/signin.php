
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>
  </head>
  <body>
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1" style="font-size:40px;">musicX</span>
  </div>
</nav>    
    <div class="container">
   

    <div class="row justify-content-md-center">
            <div class="col-5">
            

<br>
                <h2>Sign in</h2>
                
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>

                <form action="<?php echo base_url('SigninController/loginAuth'); ?>" method="POST"
                enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="text" name="userName" placeholder="Enter User Name"
                         value="<?= set_value('userName') ?>" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="password"
                         placeholder="Enter Password" class="form-control" required>
                    </div>
                    
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Sign In</button>
                    </div>
                   

                </form>
           <br>     <span>Don't have an account?</span>

                <a href ="signup">           <div class="d-grid">
                        <button type="submit" class="btn btn-warning">Sign Up Now</button>
                   </div></a>
            </div>
              
        </div>
    </div>
  </body>
</html>