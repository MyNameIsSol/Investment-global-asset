<?php 
include 'userhead.php'; 

?>
<style>
    .label{
        color:#9DABB8 !important;
    }
</style>
                     
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
        <!-- <div class="row layout-spacing layout-top-spacing" id="cancel-row"> -->
                    <div id="listGroupImages" class="col-lg-12 layout-spacing">

                            <div class="statbox widget box box-shadow">
        <div class="col-12 mt-4" style="background-color: #C70001; padding:15px 10px;">
                        <div class="balholder align-items-center">
                        <div class="modal-account__pane-header col-12"  style="background-color: #C70001; padding:10px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1);">
                    <p style="font-weight:600; font-size:16px; color:#fff;padding:0;margin:0">Our youths get empowered through Securedglobalasset Entrepreneurship Program (OFEP), and partnership with already established youth entrepreneurship programs like Tony Elumelu Entrepreneurship Program (TEEP).<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></p>
                </div>
                        </div>
                        </div>
                            </div></div>
                        <!-- </div> -->

                    <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                    <div id="listGroupImages" class="col-lg-12 layout-spacing">

                            <div class="statbox widget box box-shadow">
                                <div class="widget-header pl-4 pr-4">
                                    <div class="row p-0">
                                        <div class=" p-0 mt-2 col-xl-12 col-md-12 col-sm-12 col-12 ">
                                            <h4 style="font-size: 20px; font-weight:600">Fill out the form below to participate in our empowerment program.</h4> 
                                        </div>             
                                    </div>
                                    <hr style="border:1px solid #E2E3EA; margin-top:0;">
                                </div>
                                <div class="widget-content widget-content-area">
                               
                                    <ul class="list-group list-group-media ">
                                    <form  method="POST" action="../configs/empowerscript.php" enctype="multipart/form-data">
                                    <div class="form-row mb-2">
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="image">Passport Photo: *</label>
                                            <input type="file" name="file_upload" class="form-control" id="image" placeholder="Choose Photo" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="fname">First Name: *</label>
                                            <input type="text" class="form-control" name="fname" value="<?= isset($firstname) ? $firstname : ""?>" id="fname" placeholder="First Name" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="lname">Family Name: *</label>
                                            <input type="text" class="form-control" name="lname" value="<?= isset($lastname) ? $lastname : ""?>" id="lname" placeholder="Family Name" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="uname">Username: (optional)</label>
                                            <input type="text" class="form-control" name="uname" value="<?= isset($usd) ? $usd : ""?>" id="uname" placeholder="Username" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row mb-2">
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="country">Country: *</label>
                                            <input type="text" class="form-control" name="country" value="<?= isset($country) ? $country : ""?>" id="country" placeholder="country" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="state">Which state do you reside?: *</label>
                                            <input type="text" class="form-control" name="state" value="<?= isset($state) ? $state : ""?>" id="state" placeholder="state" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="addrs">Home Address: *</label>
                                            <input type="text" class="form-control" name="addrs" value="<?= isset($addrs) ? $addrs : ""?>" id="addrs" placeholder="address" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="Phone">Phone: *</label>
                                            <input type="text" class="form-control" name="phone" value="<?= isset($phone) ? $phone : ""?>" id="phone" placeholder="phone" required>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2 ">
                                    <div class="form-group col-12 ">
                                            <label class="label" for="email">E-mail: *</label>
                                            <input type="email" class="form-control" name="email" value="<?= isset($email) ? $email : ""?>" id="email" placeholder="Enter Your Email" required>
                                      </div>
                                    </div>
                                    <div class="form-row mb-4">
                                    <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="dob">Date of Birth: *</label>
                                            <input type="date" class="form-control" name="dob" value="" id="dob" placeholder="Date Of Birth" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label for="gender">Gender: *</label>
                                            <select id="gender" type="text" name="gender" class="form-control" required>
                                                <option selected>Choose...</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label for="marital">Marital Status: *</label>
                                            <select id="marital" type="text" name="marital" class="form-control" required>
                                                <option selected>Choose...</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label for="edu">Educational Level: *</label>
                                            <select id="edu" type="text" name="edu" class="form-control" required>
                                                <option selected>Choose...</option>
                                                <option value="secondary">High/Secondary School and Below</option>
                                                <option value="undergraduate">Undergraduate</option>
                                                <option value="OND">OND</option>
                                                <option value="HND">HND</option>
                                                <option value="bachelor">Bachelor</option>
                                                <option value="masters & above">Masters and Above</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="work">Occupation: *</label>
                                            <input type="text" class="form-control" name="work" id="work" placeholder="Occupation" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="acctno">Bank Account Number: *</label>
                                            <input type="text" class="form-control" name="acctno" id="acctno" placeholder="Account Number" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                            <label class="label" for="Bnkname">Bank Name: *</label>
                                            <input type="text" class="form-control" name="bnkname" id="bnkname" placeholder="bankname" required>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3 col-xl-3">
                                        <label class="label" for="aboutus">How did you hear about us?: *</label>
                                        <select type="text" class="form-control" name="aboutus" id="aboutus" required>
                                                <option selected>Choose...</option>
                                                <option value="from google">Google</option>
                                                <option value="from facebook">Facebook</option>
                                                <option value="from instagram">Instagram</option>
                                                <option value="from whatsapp status">Whatsapp status</option>
                                                <option value="from sms">Sms</option>
                                                <option value="from referrer">Referrer</option>
                                                <option value="from friends">Friends</option>
                                                <option value="from others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row mt-4">
                                            <div class="col-sm-10">
                                                <button type="submit" name='empower' class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
           <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2024 <a target="_blank" href="https://securedglobalasset.com/">securedglobalasset.com</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Trading with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
        <!-- toastr -->
        <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>

    <?php
	if(!empty($_GET['tableerror'])){
        echo "
        <script type='text/javascript'>
                Snackbar.show({
                    text: '".$_GET['tableerror']."',
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#e2a03f'
                });
        </script>
        ";
    }elseif(!empty($_GET['error'])){
        echo "
        <script type='text/javascript'>
                Snackbar.show({
                    text: '".$_GET['error']."',
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#e2a03f'
                });
        </script>
        ";
    }elseif(!empty($_GET['suc'])){
        echo "
        <script type='text/javascript'>
                Snackbar.show({
                    text: '".$_GET['suc']."',
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#1abc9c'
                });
        </script>
        ";
    }
	?>

	<?php include 'userfoot.php' ?>
  
</body>

</html>