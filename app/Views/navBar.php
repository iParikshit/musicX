<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Welcome - <?php  echo $_SESSION['user_name']; ?></title>
  </head>
  <style>
    .rowClass {
   display: flex;
   flex-wrap: wrap;
}

.rowClass > div[class*='col-'] {
  display: flex;
}

  </style>
  <body>

  <nav class="navbar navbar-light bg-dark">

<a class="navbar-brand"><h2 style="color:white;"><b> musicX</b></h2></a>

<!-- <form action="<?php echo base_url('SigninController/logout'); ?>" method="POST">
<button type="submit" name="logout">logout</button>
</form> -->
  <class="form-inline">
  <a href="http://localhost:8080/artist-list/"> <button class="btn btn-outline-success my-2 my-sm-0"
   type="submit">Artist/Albums</button>
   </a>


  <a href="http://localhost:8080/index.php/manageAlbum/"> <button class="btn btn-outline-success my-2 my-sm-0"
   type="submit">
  <?php if($_SESSION['account_type']=='Admin'){echo"Preview";} else{echo"Upload";} ?>
   </button>
   </a>

  <button class="btn btn-outline-success my-2 my-sm-0" 
     ><a href='<?php 
// unset($_SESSION["userid"]);
//$_SESSION["LoggedIn"] = false;

?>'>  SignOut</a></button>

</form>
</nav>
