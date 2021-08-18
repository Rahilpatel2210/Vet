<?php
session_start();


//connect to database
$db=mysqli_connect("localhost","root","","test");
$sql = "SELECT user FROM users";
$user = $_SESSION['username'];
$PetType =  $_GET['PetType'];
$PetName =  $_GET['Pname'];
$PetDob =  $_GET['Pdob'];


?>


<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <!-- CSS here -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/slicknav.css">

  <style>
      .form-details{
       
      }

  </style>
 </head>
 <body>

  <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"><i class="fa fa-phone"></i> 1300 WILD VET (1300 9453 838)</a></li>
                                    <!-- <li><a href="#">Mon - Sat 10:00 am - 7:00 am</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="start.html">
                                    <img src="img/logoSmall.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <!-- <li><a  href="#">home</a></li> -->
                                        <li><a href="logout.php">Sign Out</a></li>
                                        <li><a href="about.html">About us</a></li>
                                        <li><a href="q.php">DSS</a></li>
                                        <li><a href="#">Manage Pet <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="home.php">View Pet</a></li>
                                                <li><a href="add.php">Add Pet</a></li>
                                                <li><a href="update.php">Update Pet Details</a></li>
                                                <li><a href="disable.php">Disable Pet</a></li>
                                                <!-- <li><a href="delete.php">Delete Pet</a></li> -->
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="Notification.php">Reminders</a></li> 
                                       <a href="#"  data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
                                      
                                       <ul class="dropdown-menu"></ul>


                                        <!-- <ul class = "submenu"> -->
<!--                                             
                                                <li class="nav-item dropdown">
                                        
                                                    <a href="#"  data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
                                                    <ul class="dropdown-menu"></ul>
                                             
                                                </li> -->
                                            
                                        <!-- </ul>        -->
                                        <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">elements</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li><a href="service.html">services</a></li> -->
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                
                 </div>
            </div>
        </div>
    </header>


    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Set Reminder for <?php echo $PetName;   ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

    <?php
              $hours_in_day   = 24;
              $minutes_in_hour= 60;
              $seconds_in_mins= 60;

              $birth_date     = new DateTime($PetDob);
              $current_date   = new DateTime();

              $diff           = $birth_date->diff($current_date);
     ?>

  


   <form method="post" id="comment_form">
    <div class="form-group">
    <div class="pet_care_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">
                    <div class="pet_thumb">
                        <img src="img/anime/png/68-syringe-3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1 col-md-7">
                    <div class="form-details">
                        <div class="section_title">
                        <h3><span><?php echo $PetName;   ?>  (<?php echo $PetType;   ?>) </span> <br>
                        <?php echo $PetDob;   ?></h3>
                        <span><h2> <?php echo $years     = $diff->y . " years " . $diff->m . " months " . $diff->d . " day(s)";   ?></span></h2>
                      </div>
                     <input type="hidden" name="Pname" value='<?= $PetName ?>'>
                     <input type="hidden" name="UserName" value='<?= $user ?>'>

<?php if ($PetType == "Cat"){  ?>
        <strong> <label>Vaccination type (for Cat):</label> </strong>
          <select class="btn" name="subject">
                      <option value="">Select...</option>
                     <option value="F3">F3</option>
                     <option value="F3 + FIV">F3 + FIV</option>
                     <option value="F3 +FeLV">F3 +FeLV</option>
                     <option value="F3 + FIV + FeLV">F3 + FIV + FeLV</option>
                     <option value="FIV">FIV</option>
                     <option value="FeLV">FeLV</option>
                    
                 </select>
               <!-- cat vac -->
        <?php
            if((floor((time() - strtotime($PetDob)) / (60*60*24*7))) >= '6' || (floor((time() - strtotime($PetDob)) / (60*60*24*7))) <= '10' ) {
              ?>
              </br>
              <label>On:</label>
             <select class="btn" name="On">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+2 weeks', strtotime(date("Y-m-d"))))?>'>2 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+4 weeks', strtotime(date("Y-m-d"))))?>'>4 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
         
      </select>
          <?php      
            }else if((floor((time() - strtotime($PetDob)) / (60*60*24*7))) > '52' ) {
          ?> 
          </br>
          <label>On:</label>
                 <select class="btn" name="On">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
      </select>
          <?php      
            } else{
          ?> 
          </br>
          <label>On:</label>
           <select class="btn" name="On">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+2 weeks', strtotime(date("Y-m-d"))))?>'>2 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+4 weeks', strtotime(date("Y-m-d"))))?>'>4 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
         <option value='<?=date('Y-m-d', strtotime('+3 years', strtotime(date("Y-m-d"))))?>'>3 years</option>
      </select>
          <?php      
            }
          ?>


     <?php   }else if ($PetType == "Dog"){ ?>
          <label>Vaccination type (for Dog):</label>
          <select class="btn" name="subject">
                      <option value="">Select...</option>
                     <option value="C3">C3</option>
                     <option value="C4">C4</option>
                     <option value="Kennel Cough(KC)">Kennel Cough (KC)</option>
                     <option value="C5">C5</option>
                     <option value="C7">C7</option>
                     <option value="C2i">C2i</option>
                 </select>

                  <!-- dog vac -->
        <?php
            if((floor((time() - strtotime($PetDob)) / (60*60*24*7))) >= '6' || (floor((time() - strtotime($PetDob)) / (60*60*24*7))) <= '10' ) {
              ?>
              </br>
              <label>On:</label>
             <select class="btn" name="On">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+2 weeks', strtotime(date("Y-m-d"))))?>'>2 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+4 weeks', strtotime(date("Y-m-d"))))?>'>4 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
         
      </select>
          <?php      
            }else if((floor((time() - strtotime($PetDob)) / (60*60*24*7))) > '52' ) {
          ?> 
          </br>
          <label>On:</label>
                 <select class="btn" name="On">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
         <option value='<?=date('Y-m-d', strtotime('+3 years', strtotime(date("Y-m-d"))))?>'>3 years</option>
      </select>
          <?php      
            } else{
          ?> 
          </br>
          <label>On:</label>
           <select class="btn" name="On">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+2 weeks', strtotime(date("Y-m-d"))))?>'>2 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+4 weeks', strtotime(date("Y-m-d"))))?>'>4 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
         <option value='<?=date('Y-m-d', strtotime('+3 years', strtotime(date("Y-m-d"))))?>'>3 years</option>
      </select>
          <?php      
            }
          ?>

    <?php    }else{ ?>
            <label>Vaccination type(input manually):</label>
          <input type="text" name="subject" id="subject" ></br>
          <label>On:</label>
           <select class="btn" name="On">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+2 weeks', strtotime(date("Y-m-d"))))?>'>2 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+4 weeks', strtotime(date("Y-m-d"))))?>'>4 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
         <option value='<?=date('Y-m-d', strtotime('+3 years', strtotime(date("Y-m-d"))))?>'>3 years</option></br>

      <?php    
        }
      ?>

            </br>
    


    </div>
    <div class="form-group">
       
       
    
        <!-- floor((time() - strtotime("2019-07-27")) / (60*60*24*7)); -->

        
      <!-- <label>On:</label>
    
        
        
      <select class="btn" name="n">
          <option value="">Select...</option>
         <option value='<?=date('Y-m-d', strtotime('+2 weeks', strtotime(date("Y-m-d"))))?>'>2 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+4 weeks', strtotime(date("Y-m-d"))))?>'>4 Weeks</option>
         <option value='<?=date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))))?>'>1 year</option>
         <option value='<?=date('Y-m-d', strtotime('+3 years', strtotime(date("Y-m-d"))))?>'>3 years</option>
      </select> -->
       
      </div>  

        
    
    <div class="form-group">
     <label>Health Notes:</label>
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="submit"  name="post" id="post" class="boxed-btn4" value="Set Reminder" />
    </div>
   </form>
       
   </div>
                    </div>
                </div>
            </div>
    </div>
      
<div class="container">
   <div class="card">
  <div class="card-header">
    Reminders:
  </div>
  <div class="card-body">
    <h5 class="card-title">Dog Vaccination</h5>
    <p class="card-text">C5 fulfills C3,C4 and KC</br>C7 fulfills C3, C4, KC and C2i </br> C4 fulfills C3 & vice versa 
    </p>
  </div>
   
  </div>
  
</div>
</div>


 <!-- footer_start  -->
 <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Contact Us
                            </h3>
                            <ul class="address_line">
                                <li><i class="fa fa-envelope"></i> admin@thewildvet.com.au</li>
                                <li><a href="#"><i class="fa fa-phone"></i> 1300 WILD VET (1300 9453 838)</a></li>
                                <li>22a Bridge Road, Glebe, NSW, 2037 </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Our Services
                            </h3>
                            <ul class="links">
                                <li><a href="#">Pet Health Checks</a></li>
                                <li><a href="#">Pet Vaccinations </a></li>
                                <li><a href="#">Pet Nail Clipping</a></li>
                                <li><a href="#">Microchipping</a></li>
                                <!-- <li><a href="#">Dog Insurance</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Quick Link
                            </h3>
                            <ul class="links">
                                <li><a href="#">About Us</a></li>
                                <!-- <li><a href="#"></a></li> -->
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Login info</a></li>
                                <!-- <li><a href="#">Knowledge Base</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-5 col-lg-2 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logoSmall.png" alt="">
                                </a>
                            </div>
                            <p class="address_text"> 22a Bridge Road, Glebe, NSW, 2037 
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="bordered_1px"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->


    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        //     icons: {
        //      rightIcon: '<span class="fa fa-caret-down"></span>'
        //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
         format: 'HH.MM'
     });
    </script>


 </body>
</html>

<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("all Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>