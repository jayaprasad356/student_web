<?php 
session_start();
ob_start();
include_once('../includes/crud.php');
$db = new Database;
$db->connect();
include_once('../includes/functions.php');
$function = new functions;


date_default_timezone_set('Asia/Kolkata');
$res_cur = $db->getResult();

if (isset($_POST['btnSignUp'])) {
        $error = array();
        $name = $db->escapeString($_POST['name']);
        $student_age = $db->escapeString($_POST['student_age']);
        $class = $db->escapeString($_POST['class']);
        $parent_mobile = $db->escapeString($_POST['parent_mobile']);
        $email = $db->escapeString($_POST['email']);
        $password = $db->escapeString($_POST['password']);
        $aadhar_number = $db->escapeString($_POST['aadhar_number']);
        $school_name = $db->escapeString($_POST['school_name']);
        $address = $db->escapeString($_POST['address']);
        $image_error = $db->escapeString($_FILES['profile']['error']);
            
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($student_age)) {
            $error['student_age'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($class)) {
            $error['class'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($parent_mobile)) {
            $error['parent_mobile'] = " <span class='label label-danger'>Required!</span>";
        }
        
        if (empty($email)) {
            $error['email'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($password)) {
            $error['password'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($aadhar_number)) {
            $error['aadhar_number'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($school_name)) {
            $error['school_name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($address)) {
            $error['address'] = " <span class='label label-danger'>Required!</span>";
        }
        if ($image_error > 0) {
            $error['profile'] = " <span class='label label-danger'>Required!</span>";

        }

        if ( !empty($name) && !empty($student_age)&& !empty($class) && !empty($parent_mobile) && !empty($email) && !empty($password) && !empty($aadhar_number) && !empty($school_name) && !empty($address))
        {
            error_reporting(E_ERROR | E_PARSE);
            $extension = end(explode(".", $_FILES["profile"]["name"]));
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['profile']['name']);
            $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
            // upload new image
            $upload = move_uploaded_file($_FILES['profile']['tmp_name'], '../upload/profile/' . $menu_image);
    
            // insert new data to menu table
            $upload_image = 'upload/profile/' . $menu_image;


    
            $sql = "SELECT * FROM students WHERE email = '" . $email . "'";
            $db->sql($sql);
            $res = $db->getResult();
            $num = $db->numRows($res);
            if($num < 1){
                $sql = "INSERT INTO `students`(`name`, `student_age`,`class`, `parent_mobile`, `email`, `password`, `aadhar_number`, `school_name`, `address`, `profile`,`status`) VALUES ('$name','$student_age','$class', '$parent_mobile', '$email','$password', '$aadhar_number', '$school_name','$address','$upload_image',2)";
                $db->sql($sql);
                $student_result = $db->getResult();
                if (!empty($student_result)) {
                    $student_result = 0;
                } else {
                    $student_result = 1;
                }
                if ($student_result == 1) {
                    $error['add_menu'] = "<section class='content-header'>
                                                    <span class='label label-success'>Student Added Successfully</span>
                                                     </section>";
                } else {
                    $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
                }

            }else{
                

            }


        }
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/ico" href="../img/logo.png">
    <title>Student</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<style>

body {
  background-color: lightblue;
}
</style>
<body>
<section class="content-header">
    
</section>

    <!-- Content Wrapper. Contains page content -->
    <div class="col-md-12" style="margin-top:5px;">
        <!-- general form elements -->
        <div class="text-center">
            <h5>Student Registration Form</h5>
        </div>
        
        <div class='row'>
            <div class="col-md-4">
                
                <div class="text-center">
                
                <h3><u>Student Details:</u></h3>

                </div>
                
                <div class="form-group">
                    <label for="">Name:</label><i class="text-danger asterik">*</i>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="">Student Age</label><i class="text-danger asterik">*</i>
                    <input type="number" min="18" max="30" class="form-control" name="student_age" id="student_age" required>
                </div>
                <div class="form-group">
                    <label for="">Class</label><i class="text-danger asterik">*</i>
                    <input type="text" class="form-control" name="class" id="class" required>
                </div>
                <div class="form-group">
                    <label for="">School Name</label><i class="text-danger asterik">*</i>
                    <input type="text" class="form-control" name="school_name" id="school_name" required>
                </div>
                <div class="form-group">
                    <label for="">School Address</label><i class="text-danger asterik">*</i>
                    <input type="text" class="form-control" name="school_address" id="school_address" required>
                </div>
                <div class="form-group">
                    <label for="">Student Aadhar Number</label><i class="text-danger asterik">*</i>
                    <input type="text" class="form-control" name="aadhar_number" id="aadhar_number" required>
                </div>
                <div class="form-group">
                    <label for="">Upload Student Pic</label><i class="text-danger asterik">*</i>
                    <input type="file" class="form-control" name="profile"id="profile" required>
                </div>

            </div>
            <div class="col-md-8">
                <div class="col-md-6">
                    <div class="text-center">
                        
                        <h3><u>Parent Details:</u></h3>

                    </div>
                    <div class="form-group">
                        <label for="">Parent Name</label><i class="text-danger asterik">*</i>
                        <input type="text" class="form-control" name="school_address" id="school_address" required>
                    </div>
                    <div class="form-group">
                        <label for="">Parent Phone Number</label><i class="text-danger asterik">*</i>
                        <input type="text" class="form-control" name="school_address" id="school_address" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        
                        <h3><u>Account Setup:</u></h3>


                    </div>
                    <div class="form-group">
                        <label for="">Email ID</label><i class="text-danger asterik">*</i>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label><i class="text-danger asterik">*</i>
                        <input type="password" class="form-control" name="password" id="password" required><br>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3><u>Payment Details:</u></h3>
                    <h4><b>Before creating account,payment should be done to below UPI address/QR Code</b></h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Enter UTR Number</label><i class="text-danger asterik">*</i>
                        <input type="text" class="form-control" name="aadhar_number" id="aadhar_number" required>
                    </div>

                </div>
                <div class="col-md-6">
                    <br>
                    <h5><u>What is UTR ?, See example here</u></h5>

                </div>
                <div class="col-md-12">
                <button type="submit" id="submit_btn" name="btnSignUp" class="btn-warning btn">Submit Your Registration Form</button>
            
                </div>
                            

            </div>
                

        </div>
    </div>
</body>

</html>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
    $('#add_student_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
            student_age: "required",
            parent_mobile: "required",
            class: "required",
            student_age: "required",
            email: "required",
            password: "required",
            aadhar_number: "required",
            address: "required",
            school_name: "required"
         }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
   
</script>