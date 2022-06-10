<?php

    include ('../../config/server.php');

    if (!isset($_SESSION['adminid'])){
        header('location:../../login/');
    }else{

      $requests = "SELECT `id` FROM `requests`";
      $query = mysqli_query($db, $requests);
      $c_requests = mysqli_num_rows($query);

      $request_result = mysqli_query($db, "SELECT `name`, `additional info`, `new` FROM `requests` WHERE `new` = '1'");
      $count_requests = mysqli_num_rows($request_result);


      $messages = "SELECT `id` FROM `messages`";
      $query = mysqli_query($db, $messages);
      $c_messages = mysqli_num_rows($query);

      $message_result = mysqli_query($db, "SELECT `name`, `message`, `new` FROM `messages` WHERE `new` = '1'");
      $count_messages = mysqli_num_rows($message_result);


      $reviews = "SELECT `id` FROM `reviews`";
      $query = mysqli_query($db, $reviews);
      $c_reviews = mysqli_num_rows($query);

      $reviews_result = mysqli_query($db, "SELECT `id`, `name`, `review`, `new` FROM `reviews` WHERE `new` = '1'");
      $count_reviews = mysqli_num_rows($reviews_result);


      $uname = $_SESSION['adminid'];

?>
    <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <meta name="author" content="Mite Systems">
                <meta name="description" content="">
                <meta name="format-detection" content="telephone=no">
                <meta name="keywords" content="">

                <link rel="icon" href="/relatives/admin/config/assets/images/logo-mini.png"/>
                <title>Work Gallery</title>

                <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/admin.css" />
                <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            </head>
            <body>
                <div class="divWrap">
                    <div class="side-nav">
                        <?php include_once('../../config/nav.php') ?>
                    </div>
                    <div class="profile-right">
          						<div class="profile-nav">
          							<div class="nav">
          								<div class="navlinks-holder">
          									<div id="mobile-opener">
          										<i class="mdi mdi-menu"></i>
          									</div>
          								</div>
          								<div class="profilenav-right">
          									<div class="welcome-user">
          										<p><i class="mdi mdi-account-outline"></i></p>
          										<?php include_once('../../config/user_options.php') ?>
          									</div>
          								</div>
          							</div>
          						</div>
                        <div class="profilebody-left">
                            <div class="profilebody-top">
                                <h1>Work Gallery</h1>
                                <?php echo "<p>$uname</p>" ?>
                            </div>
                            <div class="profilebody-bottom">
                              <div class="form change about">
                                <div class="form-content">
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" name="save-gallery">
                                        <fieldset>
                                            <legend>Add Image</legend>
                                            <div class="form-group">
                                                <label for="adminphone">Choose Image</label><br>
                                                <img id="output"/>
                                                <input type="file" name="projectimg" style="padding-right: 67px;" value="<?php if(isset($_POST['save-gallery'])){ echo $_POST['projectimg']; } ?>" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminphone">Project Name</label><br>
                                                <input type="text" name="projectName" placeholder="Enter Project Name"  value="<?php if(isset($_POST['save-gallery'])){ echo $_POST['projectName']; } ?>"size="20" minlength="5" maxlength="40" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminphone">Project Description</label><br>
                                                <input type="text" name="projectDes" placeholder="Enter Project Description" value="<?php if(isset($_POST['save-gallery'])){ echo $_POST['projectDes']; } ?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminphone">Project Date</label><br>
                                                <input type="date" name="projectDate" placeholder="Enter Project Date" value="<?php if(isset($_POST['save-gallery'])){ echo $_POST['projectDate']; } ?>" size="20" minlength="5" maxlength="20" required>
                                            </div>
                                            <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                                                <?php include('../../config/errors.php'); ?>
                                            </div>
                                            <div class="form-group">
                                                <h3>Save</h3>
                                                <button type="submit" name="save-gallery"><i class="mdi mdi-arrow-right"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="show-gallery">
                                        <fieldset>
                                            <legend>My Gallery</legend>
                                            <div id="galleria">
                                              <?php

                                                  if (isset($_GET['pageno'])) {
                                                      $pageno = $_GET['pageno'];
                                                  } else {
                                                      $pageno = 1;
                                                  }
                                                  $no_of_records_per_page = 6;
                                                  $offset = ($pageno-1) * $no_of_records_per_page;

                                                  $total_pages_sql = "SELECT COUNT(*) FROM `gallery`";
                                                  $result = mysqli_query($db, $total_pages_sql);
                                                  $total_rows = mysqli_fetch_array($result)[0];
                                                  $total_pages = ceil($total_rows / $no_of_records_per_page);

                                                  $sql = "SELECT * FROM `gallery` LIMIT $offset, $no_of_records_per_page ";
                                                  $res_data = mysqli_query($db, $sql);
                                                  while($row = mysqli_fetch_array($res_data)){
                                                    echo'
                                                      <div class="gallery_holder">
                                                        <a id="delete" href="delete.php/?id='.$row['id'].'"><i class="mdi mdi-minus"></i></a>
                                                        <div class="galery_holder_top">
                                                            <div></div>
                                                            <img src="/'.base64_decode($row['i_loc']).''.$row['i_name'].'">
                                                        </div>
                                                        <div class="galery_holder_bottom">
                                                            <h3 id="nam">'.$row['name'].'</h3>
                                                            <h4 id="date">'.$row['date'].'</h4>
                                                            <p id="des">'.$row['des'].'</p>
                                                        </div>
                                                      </div>
                                                    ';
                                                  }
                                              ?>
                                            </div>
                                            <ul class="pagination">
                                              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                                <a id="liners" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="mdi mdi-chevron-right"></i></a>
                                              </li>
                                              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                                <a id="liners" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="mdi mdi-chevron-left"></i></a>
                                              </li>
                                            </ul>
                                        </fieldset>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
            </body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="/relatives/admin/config/assets/js/jquery-2.0.3.min.js"></script>
            <script src="/relatives/admin/config/assets/js/landing.js"></script>
            <script>
                $(document).ready(function() {
                    $("a#liners").click(function(event) {
                        link = $(this).attr("href");
                        $.ajax({
                            url: link,
                            success: function(response) {
                                $('body').empty().append(response);
                            }
                        })
                        return false;
                    });
                });
            </script>

        </html>
<?php
    }
?>
