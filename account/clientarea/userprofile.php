<?php include 'userhead.php' ?>
<link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-spacing">
                    <!-- Content -->
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Profile</h3>
                                    <a href="#" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </div>
                                <div class="text-center user-info">
                                <?php
                    if(empty($profileimg)){
                    echo '  <img src="assets/img/boy.png" alt="avatar">';
                     }else{
                    echo '  <img style="max-height:150px; max-width:150px;" src="img/'.$profileimg.'" alt="User profile picture">';
                     }
                     ?>
                                    <p class=""><?= !empty($firstname) && !empty($lastname) ? $firstname.' '.$lastname : '';?></p>
                                </div>
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <?= !empty($username) ? $username : '';?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><?= !empty($state) ? $state : '';?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><?= !empty($email) ? $email : '';?></a>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <?= !empty($phone) ? $phone : '';?>
                                            </li>
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                        <div class="skills layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Personal details</h3>
                                <form  method="post" action="../configs/editprofile.php" enctype="multipart/form-data">
                                <div class="form-group row  mb-4">
                                            <label for="customFile" class="col-sm-2 col-form-label col-form-label-sm">Upload Picture</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="img" class="form-control"> 
                                            </div>
                                        </div>
                                        <div class="form-group row  mb-4">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control form-control-sm" name="firstname" type="text" value="<?= !empty($firstname) ? $firstname : '';?>" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="lastname" type="text" value="<?= !empty($lastname) ? $lastname : '';?>" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">User Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control form-control-lg" name="username" type="text" value="<?= !empty($username) ? $username : '';?>" placeholder="User Name">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Email Adress</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="email" type="email" value="<?= !empty($email) ? $email : '';?>" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">State</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="state" type="text" value="<?= !empty($state) ? $state : '';?>" placeholder="Your State">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control form-control-lg" name="phone" type="tel" value="<?= !empty($phone) ? $phone : '';?>" placeholder="Phone">
                                            </div>
                                        </div>
                                        <input type="submit" name="detailS" value="submit" class="mb-4 btn btn-primary">
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021 <a target="_blank" href="https://securedglobalasset.com/">securedglobalasset.com</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
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

    <script src="assets/js/components/notification/custom-snackbar.js"></script>
       <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <?php
	if(!empty($_GET['updated'])){
		echo "
			<script type='text/javascript'>
                    Snackbar.show({
                        text: 'Profile Updated',
                        pos: 'top-right',
                        actionTextColor: '#fff',
                        backgroundColor: '#1abc9c'
                    });
			</script>
			";
	}
    ?>
</body>


</html>