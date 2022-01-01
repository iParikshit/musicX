<?php
session_start();
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://moat.ai/api/task/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Basic: ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
    ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$res = json_decode($response, true);
//var_dump($res);
//echo $res['id'];


?>

<?php
include 'navBar.php';
?><br>
<center>
    <h1><?php if ($_SESSION['account_type'] == 'Admin') {
            echo  "Manage Alubms";
        } else {
            echo         " Upload Your Ablums";
        }
        ?>
</center>
<div class="row justify-content-md-center">

    <div class="col-4">
        <?php
        if (!$_SESSION['account_type'] == "Admin") {
        ?>
            <form action="<?php echo base_url('albumController/upload'); ?>" method="POST" enctype="multipart/form-data">
                <!-- <div class="form-group mb-3">
                        <input type="text" name="artist" placeholder="Enter Artist Name"
                         value="" class="form-control" required>
                    </div> -->
                <input hidden name="test" value="<?php echo $_SESSION['userid'] ?>"></input>
                <div class="form-group mb-3">
                    <input type="text" name="album" placeholder="Enter Album Name" class="form-control" required>
                </div>




                <div class="form-group mb-3">
                    <div class="dropdown">
                        <select name="artist" value="<?php ?>" required>
                            <option value="" selected>Artists</option>

                            <?php

                            foreach ($res as $key => $val) {
                                //var_dump($val);
                                foreach ($val as $k => $v) {
                                    var_dump($v['id']);



                            ?>

                                    <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>




                    <br>
                    <div class="form-group mb-3">
                        <div class="dropdown">
                            <select name="year" value="<?php ?>" required>

                                <option value="" selected>Select Year</option>

                                <?php

                                for ($i = 1919; $i <= 2021; $i++) {


                                ?>

                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Upload Now</button>
                    </div>


            </form><?php }
                    ?>

    </div>
</div>
</div>
<br>
<div class="container">

    <div class="container">


        <div class="rowClass">




            <?php if ($album) : ?>
                <?php
                foreach ($album as $val) {
                ?>
                    <div class="col-sm-3" style="border:4px solid white;">


                        <div class="card">
                            <img class="card-img-top img-fluid" src="https://pbs.twimg.com/profile_images/1431129444362579971/jGrgSKDD_400x400.jpg" alt="Card image cap">
                            <div class="card-block" style="padding:10px;">
                                <h4 class="card-title"><?php echo $val['artist']; ?>
                                    <span style="float: right;">

                                        <?php if ($_SESSION['account_type'] == 'Admin') {
                                        ?>
                                            <!-- <form action=">" method='POST'>

<input type='hidden' name='_method2' value= "DELETE" ></input> -->

                                            <!-- <button type="submit" name="delete"  style='color:black;background-color:transparent;border:none; '> -->
                                            <b>
                                                <a href=
                                                "
                                                <?php echo base_url('albumController/delete/'.$val['id']); ?>
                    "
                    >
                                                    <i class="fa fa-trash"></i></a>
                                            </b>
                                            <!-- </button> -->
                                            <!-- </form> -->


                                        <?php                                         } else {
                                            echo '<i class="fa fa-edit"></i>';
                                        }  ?>
                                    </span>
                                </h4>

                                <?php if ($_SESSION['account_type'] == 'User') {

                                ?> <p class="card-text"><?php echo $val['album']; ?>
                                        <span style="float: right;">
                                            <?php if ($val['approve'] == 0) {
                                                echo "<span style='color:gray;'>Not Live</span>";
                                            } else {
                                                echo "<span style='color:green;'><b>Live</b></span>";
                                            } ?>
                                        </span>
                                    </p>
                                <?php } ?>




                                <?php if ($_SESSION['account_type'] == 'Admin') {

                                ?> <p class="card-text"><?php echo $val['album']; ?>
                                        <span style="float: right;">
                                            <form action="<?php echo base_url('albumController/approval/' . $val['id']); ?>" method='POST'>

                                                <?php if ($val['approve'] == 0) {;

                                                ?>
                                                    <input type='hidden' name='_method' value="PUT"></input>
                                                    <button style='color:black; '><b>Approve</b></button>
                                            </form>
                                        <?php  } else {
                                                    echo "<span style='color:green;'><b>Approved</b></span>";
                                                } ?>
                                        </span>
                                    </p>
                                <?php } ?>



                                <p class="card-text"><small class="text-muted"><?php echo $val['year']; ?></small></p>
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