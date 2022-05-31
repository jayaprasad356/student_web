<?php 
session_start();
ob_start();
include_once('includes/crud.php');
$db = new Database;
$db->connect();
include_once('includes/functions.php');
$function = new functions;


date_default_timezone_set('Asia/Kolkata');
$res_cur = $db->getResult();

if (isset($_POST['btnSignUp'])) {
        $error = array();
        $name = $db->escapeString($_POST['name']);
        $student_age = $db->escapeString($_POST['student_age']);
        $class = $db->escapeString($_POST['class']);
        $school_name = $db->escapeString($_POST['school_name']);
        $school_address = $db->escapeString($_POST['school_address']);
        $aadhar_number = $db->escapeString($_POST['aadhar_number']);
        $image_error = $db->escapeString($_FILES['profile']['error']);
        $parent_name = $db->escapeString($_POST['parent_name']);
        $parent_phone_number = $db->escapeString($_POST['parent_phone_number']);
        $email = $db->escapeString($_POST['email']);
        $password = $db->escapeString($_POST['password']);
        $utr_number = $db->escapeString($_POST['utr_number']);
            
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($student_age)) {
            $error['student_age'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($class)) {
            $error['class'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($school_name)) {
            $error['school_name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($school_address)) {
            $error['school_address'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($aadhar_number)) {
            $error['aadhar_number'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($parent_name)) {
            $error['parent_name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($parent_phone_number)) {
            $error['parent_phone_number'] = " <span class='label label-danger'>Required!</span>";
        }
        
        if (empty($email)) {
            $error['email'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($password)) {
            $error['password'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($utr_number)) {
            $error['utr_number'] = " <span class='label label-danger'>Required!</span>";
        }
        
        if ($image_error > 0) {
            $error['profile'] = " <span class='label label-danger'>Required!</span>";

        }
        
        if ( !empty($name) && !empty($student_age) && !empty($class) && !empty($school_name) && !empty($school_address) && !empty($aadhar_number) && !empty($parent_name) && !empty($parent_phone_number) && !empty($email) && !empty($password)  && !empty($utr_number))
        {
            
            error_reporting(E_ERROR | E_PARSE);
            $extension = end(explode(".", $_FILES["profile"]["name"]));
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['profile']['name']);
            $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
            // upload new image
            $upload = move_uploaded_file($_FILES['profile']['tmp_name'], 'upload/profile/' . $menu_image);
    
            // insert new data to menu table
            $upload_image = 'upload/profile/' . $menu_image;


    
            $sql = "SELECT * FROM students WHERE email = '" . $email . "'";
            $db->sql($sql);
            $res = $db->getResult();
            $num = $db->numRows($res);
            
            if($num == 1){
                $error['add_menu'] = " <span class='label label-danger'>Email Already Registered</span>";
        
               
            }
            else{
                $sql = "INSERT INTO `students`(`name`, `student_age`,`class`,`school_name`,`school_address`,`aadhar_number`,`profile`, `parent_name`, `parent_phone_number`,`email`, `password`, `utr_number`,`status`) VALUES ('$name','$student_age','$class','$school_name','$school_address','$aadhar_number','$upload_image', '$parent_name','$parent_phone_number', '$email','$password', '$utr_number',0)";
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


            }
        }else{
            $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
        }
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/ico" href="<?= DOMAIN_URL . 'dist/img/'.$logo?>">
	<title>register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<style>

body {
  background-color: lightblue;
}
</style>
<body>

    <!-- Content Wrapper. Contains page content -->
    <div class="col-md-12" style="margin-top:5px;">
        <!-- general form elements -->
        <div class="text-center">
            <h5>Student Registration Form</h5>
            <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
        </div>
        <form id='signup_student_form' method="post" enctype="multipart/form-data">
        
            <div class='row'>
                <div class="col-md-4">     
                    <div class="text-center">
                    <h3><u>Student Details:</u></h3>
                    </div>
                    <div class="form-group">
                        <label for="">Name:</label><i class="text-danger asterik">*</i> <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Student Age</label><i class="text-danger asterik">*</i> <?php echo isset($error['student_age']) ? $error['student_age'] : ''; ?>
                        <input type="number" min="18" max="30" class="form-control" name="student_age" id="student_age" required>
                    </div>
                    <div class="form-group">
                        <label for="">Class</label><i class="text-danger asterik">*</i> <?php echo isset($error['class']) ? $error['class'] : ''; ?>
                        <input type="text" class="form-control" name="class" id="class" required>
                    </div>
                    <div class="form-group">
                        <label for="">School Name</label><i class="text-danger asterik">*</i> <?php echo isset($error['school_name']) ? $error['school_name'] : ''; ?>
                        <input type="text" class="form-control" name="school_name" id="school_name" required>
                    </div>
                    <div class="form-group">
                        <label for="">School Address</label><i class="text-danger asterik">*</i> <?php echo isset($error['school_address']) ? $error['school_address'] : ''; ?>
                        <input type="text" class="form-control" name="school_address" id="school_address" required>
                    </div>
                    <div class="form-group">
                        <label for="">Student Aadhar Number</label><i class="text-danger asterik">*</i> <?php echo isset($error['aadhar_number']) ? $error['aadhar_number'] : ''; ?>
                        <input type="text" class="form-control" name="aadhar_number" id="aadhar_number" required>
                    </div>
                    <div class="form-group">
                        <label for="">Upload Student Pic</label><i class="text-danger asterik">*</i> <?php echo isset($error['profile']) ? $error['profile'] : ''; ?>
                        <input type="file" class="form-control" name="profile"id="profile" required>
                    </div>
                
                </div>

                <div class="col-md-8">
                    <div class="col-md-6">
                        <div class="text-center">
                            
                            <h3><u>Parent Details:</u></h3>

                        </div>
                        <div class="form-group">
                            <label for="">Parent Name</label><i class="text-danger asterik">*</i> <?php echo isset($error['parent_name']) ? $error['parent_name'] : ''; ?>
                            <input type="text" class="form-control" name="parent_name" id="parent_name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Parent Phone Number</label><i class="text-danger asterik">*</i> <?php echo isset($error['parent_phone_number']) ? $error['parent_phone_number'] : ''; ?>
                            <input type="text" class="form-control" name="parent_phone_number" id="parent_phone_number" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            
                            <h3><u>Account Setup:</u></h3>


                        </div>
                        <div class="form-group">
                            <label for="">Email ID</label><i class="text-danger asterik">*</i> <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label><i class="text-danger asterik">*</i> <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                            <input type="password" class="form-control" name="password" id="password" required><br>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h3><u>Payment Details:</u></h3>
                        <h4><b>Before creating account,payment should be done to below UPI address/QR Code</b></h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Enter UTR Number</label><i class="text-danger asterik">*</i> <?php echo isset($error['utr_number']) ? $error['utr_number'] : ''; ?>
                            <input type="text" class="form-control" name="utr_number" id="utr_number" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <br>
                        <h5><u>What is UTR ?, See example here</u></h5>

                    </div>
                        <div class="col-md-12">
                        <input type="submit" class="btn-primary btn" value="Submit Your Registration Form" name="btnSignUp" />&nbsp;
                            
                            
                        </div>
                    </form>      

                </div>   

            </div>
        </form>
    </div>
</body>

</html>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
    $('#signup_student_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
            student_age: "required",
            class:"required",
            school_name:"required",
            school_address:"required",
            aadhar_number:"required",
            profile:"required",
            parent_name:"required",
            parent_phone_number: "required",
            student_age: "required",
            email: "required",
            password: "required",
            utr_number: "required",
         }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
   
</script>