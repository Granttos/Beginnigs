<?php
session_start();
include_once("./config/config.php");

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <?php include_once './admin/layouts/header.php'; ?>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <?php include_once './admin/layouts/top_nav.php'; ?>
            <?php include_once './admin/layouts/sidebar.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Student</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Student</li>
                                    <li class="breadcrumb-item active">Wszyscy studenci</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
				<!-- All Teacher Table -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row" id="table1">
                            <div class="col-8">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Wszyscy studenci</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="dTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%">ID</th>
                                                    <th>Imię i nazwisko</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                $sql = "SELECT * FROM student";
                                                $result = mysqli_query($conn, $sql);
                                                $count = 0;
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $count++;

                                                ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td>
                                                                <a href="#studentDetails" data-toggle="modal" onclick="studentDetails(this);" data-id="<?php echo $row['id']; ?>">
                                                                    <?php echo $row['name']; ?>
                                                                </a>
                                                            
                                                            </td>
                                                           
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
				 <!-- wybieranie oceny -->
                
				<div class="modal fade" id="modalSelectGrade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title">Wybierz ocenę</h5>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="grade_id">Ocena</label>
                                    <select id="grade_id" class="form-control">
                                        <option value="">Wybierz ocenę</option>
                                        <?php

                                        $sql = "SELECT * FROM grade";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                        ?>

                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- $('#grade_id').change(function() -->
                <div id="divSelectSubject">
                    
                </div>

                <!-- function addPayment(student_id,grade_id,monthly_fee) -->
                <div id="divShowInvoice">
                    
                </div>


            </div>
            <!-- /.content-wrapper -->

            <?php include_once './admin/layouts/footer.php'; ?>
            
        </div>
        <!-- ./wrapper -->

        <?php include_once './admin/layouts/import_js.php'; ?>

        <!-- This Page JS File-->
        <script src="./js/student.js"></script>

        <!-- Alerty -->
        <?php
        if (isset($_GET["do"]) && ($_GET["do"] == "alert_from_insert")) {

            $msg = $_GET['msg'];
            $student_id = $_GET['student_id'];

            if ($msg == 1) {

                echo '
                <script>
                
                $(function() {
                    toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                    }
    
                    toastr["warning"]("This index number already has in our Database.", "Warning!");
    
                });
                
                </script>
            ';
            }

            if ($msg == 2) {

                echo '
                <script>
                
                $(function() {
                    toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                    }
    
                    toastr["warning"]("This index number and email address already have in our Database.", "Warning!");
    
                });
                
                </script>
            ';
            }

            if ($msg == 3) {

                echo '
                <script>
                
                $(function() {
                    toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                    }
    
                    toastr["warning"]("This email address already has in our Database.", "Warning!");
    
                });
                
                </script>
            ';
            }

            if ($msg == 4) {

                echo "
                <script>
                
                $(function() {
                    
                    $('#modalSelectGrade').data('id','$student_id').modal('show');
                
                });
                
                </script>
            ";
            }

            if ($msg == 5) {
                echo '
                <script>
                
                $(function() {
                    toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                    }
    
                    toastr["info"]("Check your internet connection and try again.", "Something is wrong!");
    
                });
                
                </script>
            ';
            }

            if ($msg == 6) {
                echo '
                <script>
                
                $(function() {
                    toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                    }
    
                    toastr["error"]("Sorry, there was an error uploading your file.", "Something is wrong!");
    
                });
                
                </script>
            ';
            }
        }
        ?>
        
    </body>

</html>