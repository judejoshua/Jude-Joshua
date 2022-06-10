<?php

    include ('../../../../config/server.php');
    
    if (!isset($_SESSION['adminid'])){
        header('location:../../../login/');
    }else{
?>
    <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <meta name="author" content="mite-systems">
                <meta name="description" content="">
                <meta name="format-detection" content="telephone=no">
                <meta name="keywords" content="">

                <title>Edit About Information</title>

                <link rel="icon" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-mini.png"/>
                <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/main.css" />
                <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            </head>
            <body>
                <div class="admin about divwrap">
                    <div class="side-nav">
                        <?php include_once('../../../../config/nav.php') ?>
                    </div>
                    <div class="profile-right">
						<div class="profile-nav">
							<div class="nav">
								<div class="navlinks-holder">
									<div id="mobile-opener">
										<i class="mdi mdi-menu"></i>
									</div>
									<div id="logo_class">
										<div class="block"></div>
										<div class="logo_nav_options">
											<img src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo.jpeg" alt="Logo"/>
										</div>
									</div>
								</div>
								<div class="profilenav-right">
									<div class="welcome-user">
										<p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['adminusername']?><i class="mdi mdi-menu-down"></i></p>
										<?php include_once('../../../../config/user_options.php') ?>
									</div>
								</div>
							</div>
						</div>
                        <div class="profilebody-left">
                            <div class="profilebody-bottom-left">
                                <div class="form-content">
                                    <div class="form-group header">
                                        <h1 id="adminpage-title">Update About information</h1>
                                    </div>
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="contact">
                                        <fieldset>
                                            <legend>Contact Info</legend>
                                            <?php
                                                $contact_query = mysqli_query($db, "SELECT * FROM `contact_info`");
                                                $contact = mysqli_fetch_assoc($contact_query);

                                                $location = $contact['location'];
                                                $city = $contact['city'];
                                                $state = $contact['state'];
                                                $country = $contact['country'];
                                                $email = $contact['email'];
                                                $phone = $contact['phone'];
                                            ?>
                                            <div class="form-group">
                                                <label for="adminloc">Location</label><br>
                                                <input type="text" name="adminloc" placeholder="Enter Location" value="<?php echo $location?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="admincity">City</label><br>
                                                <input type="text" name="admincity" placeholder="Enter city" value="<?php echo $city?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminstate">State</label><br>
                                                <input type="text" name="adminstate" placeholder="Enter state" value="<?php echo $state?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="admincount">Country</label><br>
                                                <input type="text" name="admincount" placeholder="Enter country" value="<?php echo $country?>" size="20" minlength="5" maxlength="50" required>
                                            </div>    
                                            <div class="form-group">
                                                <label for="adminmail">Email</label><br>
                                                <input type="email" name="adminmail" placeholder="Enter Email" value="<?php echo $email?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminphone">Phone</label><br>
                                                <input type="tel" name="adminphone" placeholder="Enter Phone" value="<?php echo $phone?>" size="20" minlength="5" maxlength="20" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="save-contact">Save</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="work">
                                        <fieldset>
                                            <legend>Work Info</legend>
                                            <table>
                                                <tr>
                                                    <th>Days</th>
                                                    <th>Closed</th>
                                                    <th>Time</th>
                                                </tr>
                                                <?php
                                                    $work_query = mysqli_query($db, "SELECT * FROM `work_info`");
                                                    if(mysqli_num_rows($work_query) > 0){
                                                        //output data of each row 
                                                        while($return = mysqli_fetch_array($work_query)){
                                                            if($return["closed"] == "1"){
                                                                $closedcheck = "checked";
                                                            }else{
                                                                $closedcheck = "";
                                                            }
                                                            echo'
                                                                <tr>
                                                                    <td class="days" id="input-holder-hold">
                                                                        <h3>'.$return['days'].'</h3>
                                                                        <input class="days" type="hidden" name="days['.$return['days'].']" value="'.$return['days'].'" readonly/>
                                                                    </td>
                                                                    <td class="closed" id="input-holder-hold"><input class="closed" type="checkbox" name="closed['.$return['days'].']" value="CLOSED" '.$closedcheck.'/></td>                                                                    
                                                                    <td class="time" id="input-holder-hold"><input class="start_time" type="time" name="start_time['.$return['days'].']" value="'.$return['start_time'].'"> to <input class="endtime" type="time" name="endtime['.$return["days"].']" value="'.$return['endtime'].'"></td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                            </table>
                                            <div class="form-group">
                                                <button type="submit" name="save-hours">Save</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="about">
                                        <fieldset>
                                            <legend>About Info</legend>
                                            <?php
                                                $about_query = mysqli_query($db, "SELECT `about` FROM `contact_info`");
                                                $about = mysqli_fetch_assoc($about_query);

                                                $about_us = $about['about'];
                                                $about_us = base64_decode($about_us);
                                            ?>
                                            <div class="form-group">
                                                <textarea name="about" placeholder="About" cols="4" minlength="50" maxlength="500" required><?php echo $about_us ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="save-about">Save</button>
                                            </div>
                                        </fieldset>
                                    </form>
									<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="specialties">
                                        <fieldset>
                                            <legend>Clinic Specialties</legend>
                                            <table>
                                                <tr>
                                                    <th>S/n</th>
                                                    <th>Specialty</th>
                                                    <th></th>
                                                </tr>
                                                <?php
                                                    $specialties_query = mysqli_query($db, "SELECT * FROM `specialties`");
                                                    if(mysqli_num_rows($specialties_query) > 0){
                                                        //output data of each row                            
                                                        while($specialties = mysqli_fetch_array($specialties_query)){
                                                            echo'
                                                                <tr>
                                                                    <td class="icon" id="input-holder-hold">
                                                                        <input class="id" type="text" name="id['.$specialties["id"].']" value="'.$specialties['id'].'" readonly/>
                                                                    </td>
                                                                    <td class="specialty" id="input-holder-hold">
                                                                        <input class="specialty" type="text" name="specialty['.$specialties["id"].']" value="'.$specialties['specialty'].'" />
                                                                    </td>
                                                                    <td class="delete" id="input-holder-hold">
                                                                        <a id="view" class="delete" href="delete_specialty.php/?id='.$specialties['id'].'">Delete</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                            </table>
                                            <div class="form-group">
                                                <?php if (mysqli_num_rows($specialties_query) < 20){
                                                    echo'<a id="view" href="add_specialty.php">Add New Specialty</a>';
                                                }
                                                ?>
                                                <button type="submit" name="save-services">Save</button>
                                            </div>
                                        </fieldset>
                                    </form>
									<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="services">
                                        <fieldset>
                                            <legend>Services Info</legend>
                                            <table>
                                                <tr>
                                                    <th>Icon</th>
                                                    <th>Title</th>
                                                    <th>Text</th>
                                                    <th></th>
                                                </tr>
                                                <?php
                                                    $services_query = mysqli_query($db, "SELECT * FROM `services_info`");
                                                    if(mysqli_num_rows($services_query) > 0){
                                                        //output data of each row                            
                                                        while($services = mysqli_fetch_array($services_query)){
                                                            echo'
                                                                <tr>
                                                                    <td class="icon" id="input-holder-hold">
                                                                        <input class="id" type="hidden" name="id['.$services["id"].']" value="'.$services['id'].'" readonly/>
                                                                        <input class="icon" type="text" name="icon['.$services["id"].']" value="'.$services['icon'].'" list="icons"/>
                                                                    </td>
                                                                    <td class="title" id="input-holder-hold">
                                                                        <input class="title" type="text" name="title['.$services["id"].']" value="'.$services['title'].'" required />
                                                                    </td>
                                                                    <td class="text" id="input-holder-hold">
                                                                        <input class="text" type="text" name="text['.$services["id"].']" value="'.base64_decode($services['text']).'" required />
                                                                    </td>
                                                                    <td class="delete" id="input-holder-hold">
                                                                        <a id="view" class="delete" href="delete.php/?id='.$services['id'].'">Delete</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                                <datalist id="icons">
                                                    <option value="mdi mdi-ambulance"><i class="mdi mdi-ambulance"></i></option>
                                                    <option value="mdi mdi-message-text"><i class="mdi mdi-message-text"></i></option>
                                                    <option value="mdi mdi-stethoscope"><i class="mdi mdi-stethoscope"></i></option>
                                                    <option value="mdi mdi-hospital"><i class="mdi mdi-hospital"></i></option>
                                                </datalist>
                                            </table>
                                            <div class="form-group">
                                                <a id="view" href="add.php">Add New Service</a>
                                                <button type="submit" name="save-services">Save</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/jquery-2.0.3.min.js"></script>
            <script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/landing.js"></script>
        </html>
<?php
    }
?>