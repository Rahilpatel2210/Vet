<?php 
session_start();
$db=mysqli_connect("localhost","root","","test");
$sql = "SELECT user FROM users";
$user = $_SESSION['username'];
// console.log("HELLO");
if(isset($_POST['but_delete'])){

    if(isset($_POST['delete'])){
        foreach($_POST['delete'] as $deleteid){
            echo $deleteid;
        $deleteUser = "Update users SET Udisable ='1'  WHERE memID=".$deleteid;
        mysqli_query($db,$deleteUser);
        }
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
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
        .mainpadding{
          padding-top: 40px;
         
          padding-bottom: 20px;
        
          font-size: 20px;
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
                                        <li><a  href="strat.html">home</a></li>
                                        <li><a href="logout.php">Sign Out</a></li>
                                        <li><a href="about.html">About us</a></li>
                                        <li><a href="q.php">DSS</a></li>
                                        <li><a href="#">Manage Pet <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="home.php">View Pet</a></li>
                                                <li><a href="add.php">Add Pet</a></li>
                                                <li><a href="disable.php">Disable Pet</a></li>
                                                <li><a href="delete.php">Delete Pet</a></li>
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
                        <h3>Deactivate User</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->





<main class="main-content">
 <!-- <div class="col-md-6 col-md-offset-4">



</div> -->


   <script>
           

           $(document).ready(function(){
                $('.btn').on('click',function(e){
                    e.preventDefault();           
                            // var deleteid = $(this).closest("tr").find('.delete').val();
                            var files = new Array();

    //xzyId is table id.
    $('tr  input:checkbox').each(function() {
      if ($(this).is(':checked')) {
      files.push(this.value);
      }
    });

    console.log(files);

                            swal({
                                title: "Are you sure?",
                                text: "you want to deactivate the account!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                    
                                        $.ajax({
                                            type:"POST",
                                            url:"deactivateUser.php",
                                            data: {
                                            "but_delete": 1,
                                            "delete" : files,  
                                            },
                                            
                                                
                                        }); 


                                        swal({
                                            title: "The user has been deactivated",
                                            // text: "You clicked the button!",
                                            icon: "success",
                                            button: "ok!",
                                            });
                                        location.reload();
                                        // swal("Poof! Your imaginary file has been deleted!", {
                                        //         icon: "success",
                                        //     )}
                                        
                                    
                                    } else {
                                        swal({
                                            title: "The user is still active",
                                            // text: "You clicked the button!",
                                            icon: "info",
                                            button: "ok!",
                                            });
                                    }
                                });
                        
                    });
           });
    
    
          </script>


  <div class="mainpadding">
       <h2 align = "center">Here is the details of all the user </h2>
  </div>
  <!-- Form -->
  <form >
    

    <!-- Record list -->
  <div class="container"> 
    <div class="mainpadding">
    <table class="table table-borderless" >
      <tr style='background: whitesmoke;'>
        <th>User  </th>
        <th>Email</th>
        <th>&nbsp;</th>
     </tr>
    
     <?php 
     $query = "SELECT memID, user, email FROM users WHERE Udisable = '0' ";
     $result = mysqli_query($db,$query);
     
     while($row = mysqli_fetch_array($result) ){
        $id = $row['memID'];
        $name = $row['user'];
        $email = $row['email'];
     ?>
     <tr id='tr_<?= $id ?>'>

        <td><?= $name ?></td>
        <td><?= $email ?></td>

        <!-- Checkbox -->
        <!-- <div class="btn-group-toggle" data-toggle="buttons">
           <label class="btn btn-secondary active"> -->
               <!-- <input type="checkbox" checked autocomplete="off">  -->
               <td><input type='checkbox' name = "deletei[]"   value='<?= $id ?>' ></td>
           <!-- </label>
      </div> -->
        
    
    </tr>
    <?php
    }
    ?>
   </table>
   <div class ="mainpadding" align = "center">
    
    <input class= "btn btn-outline-danger btn-block" type='submit' value='Deactivated' name='buti_delete'><br><br>
  
  </div> 
    
   
    
  </div>
  
  </div> 
 </form>

 <div class="contact_anipat anipat_bg_1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact_text text-center">
                            <div class="section_title text-center">
                                <h3>If you are in an emergency, Please Call US</h3>
                                <p>The moment you enter our clinic, your pet will be treated as a member of our extended family.</p>
                            </div>
                            <div class="contact_btn d-flex align-items-center justify-content-center">
                                <a href="contact.html" class="boxed-btn4">Contact Us</a>
                                <p>Or <a href="#"><i class="fa fa-phone"></i> 1300 WILD VET (1300 9453 838)</a></p>
                            </div>
                        </div>
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
</main>


</body>
</html>

