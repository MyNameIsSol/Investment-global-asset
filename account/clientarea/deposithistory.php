<?php include 'userhead.php' ?>
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!--  END CUSTOM STYLE FILE  -->
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
            <div class="col-12 mb-3 mt-4" style="background-image:linear-gradient(to right, #ff8838 0%, #ffa938 100%); padding:15px 10px; border-radius:4px;">
                        <div class="balholder align-items-center">
                            <div class="widget__left ml-3">
                                <p class=" mb-1" style="font-weight:600; color:#fff; font-size:18px">Below is a list of all your deposit</p>
                            </div>
                        </div>
                        </div>
                            <div class="row layout-top-spacing" id="cancel-row">
                
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <h4 class="box-title"></h4>
                    <div class="widget-content widget-content-area br-6">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th style='font-family: Georgia, serif;'>DEPOSIT ID</th>
                                        <th style='font-family: Georgia, serif;'>DATE OF DEPOSIT</th>
                                        <th style='font-family: Georgia, serif;'>AMOUNT</th>
                                        <th style='font-family: Georgia, serif;'>TRANSACTION STATUS</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                        $sql = "SELECT * FROM depositrequest WHERE username='$username' ORDER BY id DESC";
                        $result = mysqli_query($dbconnec,$sql);
                        $result_check = mysqli_num_rows($result);
                        $i = 1;

                                if($result_check > 0){
                                while($data = mysqli_fetch_assoc($result)){
                                $amount = $data['amount'];
                                $dateofdep = $data['dep_date'];
                                $statusofdep = $data['statusofdep'];
                                $depositid = $data['depositid'];
                                echo ' <tr>
                                        <td class="checkbox-column">'.$i++.'</td>
                                        <td><span class="inv-number text-warning">'.$depositid.'</span></td>
                                       
                                        <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> '.$dateofdep.'</span></td>
                                        <td><span class="inv-amount">$'.$amount.'</span></td>';
                                        if($statusofdep == "Pending"){
                                            echo '<td><span class="badge outline-badge-info inv-status">'.$statusofdep.'</span></td>';
                                            }elseif($statusofdep == "Approved"){
                                            echo '<td><span class="badge outline-badge-success inv-status">'.$statusofdep.'</span></td>';	
                                            }else{
                                                echo '<td><span class="badge outline-badge-warning inv-status">Processing</span></td>';
                                            }
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                       
                                    </tr>
                                </tbody>
                            </table>
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
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>