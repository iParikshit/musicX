<?php
include'navBar.php';
?>
    <div class="container">
   

    <div class="row justify-content-md-center">
            <div class="col-5">
            

<br>
                <center><h2>Welcome -<span style="color:red;"> <?php echo $_SESSION['user_name']; ?>
                -<span style="font-size:15px; color:black;"> (
                <?php echo $_SESSION['account_type']; ?> ) </span>
</span></h2>
</center>
                </div>
                </div>

<p style="margin-left:100px;margin-top:30px; font-size:30px;"><b>All Collections:</b></p>

<div class="container" >

<div class="container">
 

<div class="rowClass">

<?php  if($allAlbum):?> 
        <?php
foreach($allAlbum as $val){
        ?>
    <div class="col-sm-3" style="border:4px solid white;">
 
  
        <div class="card">
                <img class="card-img-top img-fluid"
                 src="https://pbs.twimg.com/profile_images/1431129444362579971/jGrgSKDD_400x400.jpg" alt="Card image cap">
                <div class="card-block" style="padding:10px;">
                    <h4 class="card-title"><?php echo $val['artist']; ?>
</h4>
                    <!-- <p class="card-text"><?php echo $val['album'];?>
                    <!-- <span style="float: right;">
                <?php  if($val['approve']==0){echo "<span style='color:gray;'>Not Live</span>";}
                else{ echo "<span style='color:green;'><b>Live</b></span>";} ?>
                </span>
                </p>-->
                    <p class="card-text"><small class="text-muted"><?php echo $val['year'];?></small></p> 
                </div>
            </div>
            </div>
    <?php }
endif; 
?>
        </div>
 
  

</div>

</div>
<br><br>
