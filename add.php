<?php
   session_start();
   
   //connect to database
   $db=mysqli_connect("localhost","root","","test");
   
   
   $query = "SELECT user FROM users";
   
   if(isset($_POST['register_btn']))
   {
     
   
       $Pname=mysqli_real_escape_string($db,$_POST['PetName']);
       $Pdob=mysqli_real_escape_string($db,$_POST['PetDob']);
       $Psex=mysqli_real_escape_string($db,$_POST['PetSex']);
       $Pweight=mysqli_real_escape_string($db,$_POST['PetWeight']); 
       $Phusbandry = mysqli_real_escape_string($db,$_POST['husbandry']);
       $Ptype=mysqli_real_escape_string($db,$_POST['Ptype']);
       $Pdisable = "0";
       $user=$_SESSION['username'];
   
       $name = $_FILES['file']['name'];
       $target_dir = "imagesuploadedf/";
       $target_file = $target_dir . basename($_FILES["file"]["name"]);
   
       // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Valid file extensions
         $extensions_arr = array("jpg","jpeg","png","gif");
   
   
     
       
   
   
   
   
       //$filename=mysqli_real_escape_string($db,$_POST['uploadfile']);
       // $query = "SELECT * FROM pets WHERE Pname = '$Pname'";
           //  $result=mysqli_query($db);
        //hash password before storing for security purposes
   
                  
                     // //declaring variables
                     // $filename = $_FILES['uploadfile']['name'];
                     // $filetmpname = $_FILES['uploadfile']['tmp_name'];
                     // //folder where images will be uploaded
                     // $folder = 'imagesuploadedf/';
                     // //function for saving the uploaded images in a specific folder
                     // move_uploaded_file($filetmpname, $folder.$filename);
   
               if(empty($Pname)){
                   $_SESSION['status'] = "Please enter the pet name";
                   $_SESSION['status_code'] = "error";
                  
                   
                          
                   
                   
               }else if(empty($Pdob)){
                   $_SESSION['status'] = "The pet has not been Added";
                   $_SESSION['status_code'] = "error";    
               }else{  
                   if( in_array($imageFileType,$extensions_arr) ){
    
                       // Insert record
                       // $query = "insert into images(name) values('".$name."')";
                       $sql="INSERT INTO pets (pname,  Pdob , Psex, Pweight,img, Ptype, husbandry, user, Pdisable) VALUES('$Pname', '$Pdob','$Psex', '$Pweight','$name','$Ptype','$Phusbandry','$user','$Pdisable' )"; 
                       $sql_run = mysqli_query($db,$sql);
                       
                       if($sql_run){ 
   
                           $_SESSION["status"] = "The pet has been Added";
                           $_SESSION["status_code"] = "success";
                         
                      
                           header("location:home.php");
                           die();
                           // exit();
                           
                        }else{
                           $_SESSION['status'] = "The pet has not been Added";
                           $_SESSION['status_code'] = "error";
                           header("location:home.php");
                           die();
                        }
                       // Upload file
                       move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                       header("location:home.php"); 
                   }
               }    
   
                   //$sql="INSERT INTO pets (pname,  Pdob , Psex, Pweight) VALUES('$Pname', '$Pdob','$Psex', $Pweight)"; 
                   // mysqli_query($db,$sql);  
                  
                   //redirect home page
               
               
            
         
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>peterinarian</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <link rel="stylesheet" href="css/add.css">
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
      <link rel="stylesheet" href="css/slicknav.css">
      <link rel="stylesheet" href="css/styles.css">
      <style> 
         tr:hover {
         animation: zoomInDown;
         /* background-color: #f4511e;
         border: none;
         color: white;
         padding: 16px 32px;
         text-align: center;
         font-size: 16px;
         margin: 4px 2px;
         opacity: 0.6;
         transition: 0.3s; */
         }
         .signin-image{
         display: inline-block;
         margin: 0 0.5rem;
         animation:; /* referring directly to the animation's @keyframe declaration */
         animation-duration: 2s; /* don't forget to set a duration! */
         --animate-delay: 0.9s;
         }
         .table{
         display: inline-block;
         margin: 0 0.5rem;
         animation:; /* referring directly to the animation's @keyframe declaration */
         animation-duration: 2s; /* don't forget to set a duration! */
         --animate-delay: 0.9s;
         }
         h3{
         display: inline-block;
         margin: 0 0.5rem;
         animation: zoomInDown; /* referring directly to the animation's @keyframe declaration */
         animation-duration: 1s;
         }


         .dog_thumb img{
            width:60%;
            height:auto;
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
                                 <li><a  href="home.php">home</a></li>
                                 <li><a href="logout.php">Sign Out</a></li>
                                 <li><a href="about.html">About us</a></li>
                                 <li><a href="q.php">DSS</a></li>
                                 <li>
                                    <a href="#">Manage Pet <i class="ti-angle-down"></i></a>
                                    <ul class="submenu">
                                       <li><a href="home.php">View Pet</a></li>
                                       <li><a href="add.php">Add Pet</a></li>
                                       <li><a href="update.php">Update Pet Details</a></li>
                                       <li><a href="disable.php">Disable Pet</a></li>
                                       <!-- <li><a href="delete.php">Delete Pet</a></li> -->
                                    </ul>
                                 </li>
                                 <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="elements.html">elements</a></li>
                                        
                                    </ul>
                                    </li>
                                    <li><a href="service.html">services</a></li> -->
                                 <li><a href="contact.html">Contact</a></li>
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
                     <h3>Add Pet</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- bradcam_area_end -->
      <main class="main-content">
         <div class="container">
            <?php
               if(isset($_SESSION['status']) && $_SESSION['status'] != '' ){
                     
               ?>
            <script>
               swal({
                   title: '<?= $_SESSION['status'] ?>',
                  //  text: "You clicked the button!",
                   icon: '<?= $_SESSION['status_code'] ?>',
                  button: "ok!",
               });
               
               
            </script>
            <?php
               unset($_SESSION['status']);
               }
               ?>
            <form method="post" action="add.php" enctype="multipart/form-data">
          
               
       
            <p class= "text-center" style= "padding-top:50px; padding-bottom:20px;"><strong>Note: Please fill out this form to add a new pet.</strong></p> 
                  <div class="row justify-content-center">
                    
                  <div class="col-lg-4 col-md-5">
                              <figure>
                                 <div class="dog_thumb d-none d-lg-block">
                                    <img src="img/anime/png/75-super-doctor.png" alt="">
                                 </div>
                              </figure>
                        </div>
                     <div class="col-lg-8  col-md-5 ">
                            <table class= "table" style="padding-top:40px;">
                                <tr>
                                    <td>Pet Name : </td>
                                    <td><input type="text" name="PetName" class="textInput" required></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth : </td>
                                    <td><input type="date" name="PetDob" class="textInput" required></td>
                                </tr>
                                <tr>
                                    <td>sex : </td>
                                    <td>
                                        
                                        <input type="radio" name="PetSex" class="textInput" value="Female" checked> Female
                                        <input type="radio" name="PetSex" class="textInput"value="Male" > Male
                                        <input type="radio" name="PetSex"class="textInput" value="other" > Other
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Weight: </td>
                                    <td><input type="number" name="PetWeight" class="textInput" required></td>
                                </tr>
                                <tr>
                                    <td>Husbandry: </td>
                                    <td><input type="text" name="husbandry" class="textInput" required></td>
                                </tr>
                                <tr>
                                    <td>Pet type:</td>
                                    <td>
                                        <select class="btn" name="Ptype" required>
                                            <option value="">Select...</option>
                                            <option value="Cat">Cat</option>
                                            <option value="Dog">Dog</option>
                                            <option value="M">Bird</option>
                                            <option value="Bird">Fish</option>
                                            <option value="Reptiles">Reptiles</option>
                                            <option value="Amphibians">Amphibians</option>
                                            <option value="Ferrets">Ferrets</option>
                                            <option value="Rabits & Rodents">Rabits & Rodents</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Add image: </td>
                                    <td> <input type='file' name='file' /></td>
                                </tr>
                                <tr>
                                    <!-- <td><input type="file" name="uploadfile" /> -->
                                    <!-- <input type="submit" name="uploadfilesub" value="upload" /></td> -->
                                    <td><input class= "btn btn-success btn-lg btn-block" type="submit" name="register_btn" value='Add pet' class="Register"></td>
                                </tr>
                            </table>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </main>
      </div>
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
                           <li><a href="about.html">About Us</a></li>
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