<?php
   session_start();
   
   //connect to database
   $db=mysqli_connect("localhost","root","","test");
   $sql1 = "SELECT user FROM users";
   $user = $_SESSION['username'];
  
   
   if(isset($_POST['register_btn']))
   {  
      $name = $_FILES['file']['name'];
    $target_dir = "imagesuploadedf/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     
     // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");


      
     mysqli_query($db,$sql1);

         
          if(($_FILES['file']['name']) == ""){
            
            $sql= "UPDATE pets  SET Pname = '$_POST[PetName]' , Pdob = '$_POST[PetDob]' , Psex = '$_POST[PetSex]' , Pweight = '$_POST[PetWeight]', Ptype = '$_POST[Ptype]', husbandry= '$_POST[husbandry]'   WHERE  Pid = '$_POST[id]' AND user = '$user'" ;
            

          }else{       
            if( in_array($imageFileType,$extensions_arr) ){
            
               // Insert record
               // $query = "insert into images(name) values('".$name."')";
               $sql= "UPDATE pets  SET Pname = '$_POST[PetName]' , Pdob = '$_POST[PetDob]' , Psex = '$_POST[PetSex]' , Pweight = '$_POST[PetWeight]', Ptype = '$_POST[Ptype]',img = '$name', husbandry= '$_POST[husbandry]'   WHERE  Pid = '$_POST[id]' AND user = '$user' " ;
             
            
               // Upload file
               move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
              
            }
           
         }  
         $sql_run = mysqli_query($db,$sql);

         if($sql_run){ 

            $_SESSION["status"] = "Pet Details has been Updated";
            $_SESSION["status_code"] = "success";
          
       
            header("location:home.php");
            die();
            // exit();
            
         }else{
            $_SESSION['status'] = "Pet Details has not been Updated";
            $_SESSION['status_code'] = "error";
            header("location:home.php");
            die();
         }
         
   }
   
  
   ?>
 

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Peterinarian</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
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
      
      <!-- <link rel="stylesheet" href="style.css"> -->
      <style>
         .mainpadding{
         padding-top: 40px;
         padding-bottom: 20px;
         font-size: 20px;
         }
         .img-thumbnail{
          height: 200px;
           width: 200px;
           border-radius: 50%;
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
                     <h3>Update Pet Details</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <main class="main-content">
         <?php
            // if(isset($_SESSION['status']))
            // {
            //      echo "<div id='error_msg'>".$_SESSION['status']."</div>";
            //      unset($_SESSION['status']);
            // }
            ?>
         <div class="container">
         <div class="row justify-content-center">
               <div class="col-lg-8 col-md-8 col-xs-6 ">
            <div class="mainpadding">
               <?php 
                  $query = "SELECT Pid, Pname, Pdob, Psex, Pweight,img, Ptype, husbandry, user, Pdisable FROM pets WHERE user = '$user' AND Pdisable = '0' ";
                  $result = mysqli_query($db,$query);
                  
                  while($row = mysqli_fetch_array($result) ){
                    
                      $id = $row['Pid'];
                      $username = $row['Pname'];
                      $name = $row['Pdob'];
                      $gender = $row['Psex'];
                      $email = $row['Pweight'];
                      $img = $row['img'];
                      $image_src = "imagesuploadedf/".$img;
                      $Ptype = $row['Ptype'];
                      $husbandry = $row['husbandry'];
                  ?>

                  <hr>
                  <div class="container">
                  <img class="img-thumbnail" alt="Responsive image" src='<?php echo $image_src;  ?>' >
                  <div class="bradcam_text text-center">
                     <h3><?= $username ?>'s details are showing below:</h3>   
                  </div>
                  </div>
                  
               <form method="post" action="update.php"  enctype="multipart/form-data">
                  
                  <table class= "table">
                     <tr>
                        <input type="hidden" name = "id" value = "<?= $id ?>" >
                        <td>Pet Name : </td>
                        <td><input type="text" name="PetName" class="textInput" value = "<?= $username ?>"></td>
                     </tr>
                     <tr>
                        <td>Date of Birth : </td>
                        <td><input type="date" name="PetDob" class="textInput"  value = "<?= $name ?>"></td>
                     </tr>
                     <tr>
                        <td>sex : </td>
                        <td><input type="text" name="PetSex" class="textInput"  value = "<?= $gender ?>"></td>
                     </tr>
                     <tr>
                        <td>Weight: </td>
                        <td><input type="text" name="PetWeight" class="textInput"  value = "<?= $email ?>"></td>
                     </tr>
                     <tr>
                        <td>Husbandry: </td>
                        <td><input type="text" name="husbandry" class="textInput"  value = "<?= $husbandry ?>"></td>
                     </tr>
                     <tr>
                        <td>Pet type:</td>
                        <td>
                           <select class="btn" name="Ptype" value =  '<?= $Ptype ?>'>
                              <option value="<?= $Ptype ?>"><?= $Ptype ?></option>
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
                        <td> <input type='file' name='file'></td>
                     </tr>
                     <tr>
                     <td><input class= "btn btn-primary btn-lg-block"  type="submit" name="register_btn" value='Update' class="Register"></td>
                     </tr>  
                  </table>
               </form>
               <?php
                  }
                ?>
            </div>
            </div>
         </div>
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
      <script src="js/sweetalert.min.js"></script>
      <script src="js/jquery.ajaxchimp.min.js"></script>
      <script src="js/jquery.form.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <script src="js/mail-script.js"></script>
      <script src="js/main.js"></script>
   

      <!-- <script>
      $(document).ready(function(){
         $('.btn').on('click',function(e){

            var myform = document.getElementById("updateForm");
            var fd = new FormData(myform );


         swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this pet!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
               $.ajax({
                  type:"POST",
                  url:"update.php",
                  data: fd,
                  cache: false,
                  processData: false,
                  contentType: false,

               })
               swal("Poof! Your pet has been deleted!", {
                  icon: "success",
               });
            } else {
               swal("Your pet has not been deleted!");
            }
            });
      })

      })
      
      
      </script> -->
      <?php
      if(isset($_SESSION['status'])){
            
   ?>
      <script>
   //    $(document).ready(function() {
   // // some code here
   //    });
      
         swal({
             title: '<?= $_SESSION["status"] ?>',
            //  text: "You clicked the button!",
             icon: '<?= $_SESSION["status_code"] ?>',
            button: "done!",
         });
    
      </script>
   <?php
      unset($_SESSION['status']);
      }
   ?> 
  

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