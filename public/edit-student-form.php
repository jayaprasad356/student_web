<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])) {
        $error = array();
        $name = (isset($_POST['name'])) ? $db->escapeString($fn->xss_clean($_POST['name'])) : "";
        $student_age= (isset($_POST['student_age'])) ? $db->escapeString($fn->xss_clean($_POST['student_age'])) : "";
        $class = (isset($_POST['class'])) ? $db->escapeString($fn->xss_clean($_POST['class'])) : "";
        $parent_mobile = (isset($_POST['parent_mobile'])) ? $db->escapeString($fn->xss_clean($_POST['parent_mobile'])) : "";
        $email= (isset($_POST['email'])) ? $db->escapeString($fn->xss_clean($_POST['email'])) : "";
        $password= (isset($_POST['password'])) ? $db->escapeString($fn->xss_clean($_POST['password'])) : "";
		$aadhar_number = (isset($_POST['aadhar_number'])) ? $db->escapeString($fn->xss_clean($_POST['aadhar_number'])) : "";
        $school_name = (isset($_POST['school_name'])) ? $db->escapeString($fn->xss_clean($_POST['school_name'])) : "";
        $address = (isset($_POST['address'])) ? $db->escapeString($fn->xss_clean($_POST['address'])) : "";
		$profile = (isset($_POST['profile'])) ? $db->escapeString($fn->xss_clean($_POST['profile'])) : "";
        $status = (isset($_POST['status'])) ? $db->escapeString($fn->xss_clean($_POST['status'])) : "";
        $description = (isset($_POST['description'])) ? $db->escapeString($fn->xss_clean($_POST['description'])) : "";
    
      
        $sql = "UPDATE students SET name='$name',student_age='$student_age',class='$class',parent_mobile='$parent_mobile',email='$email',password='$password',aadhar_number='$aadhar_number',school_name='$school_name',address='$address',profile='$profile',status='$status',description='$description' WHERE id='$ID'";
        $db->sql($sql);
        $students_result = $db->getResult();
        if (!empty($students_result)) {
            $students_result = 0;
        } else {
            $students_result = 1;
        }
        if ($students_result == 1) {
            $error['add_menu'] = "<section class='content-header'>
                                            <span class='label label-success'>Student Details Updated Successfully</span>
                                            <h4><small><a  href='students.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Students</a></small></h4>
                                                </section>";
        } else {
            $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
        }

    }
$data = array();
$sql = "SELECT * FROM students WHERE id = '$ID'";
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row)
    $data = $row;
?>
<section class="content-header">
    <h1>Edit Student</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Student</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>
                
                <form method="post"  id="updatedetails_form" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                             <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label> <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['name']?>">
                                   </div>
                             </div>
                             <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Student Age</label> <?php echo isset($error['student_age']) ? $error['student_age'] : ''; ?>
                                        <input type="number" min="18" max="30" class="form-control" name="student_age" id="student_age" value="<?php echo $data['student_age']?>" >
                                 </div>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Class</label> <?php echo isset($error['"class']) ? $error['"class'] : ''; ?>
                                        <input type="text" class="form-control" name="class" id="class" value="<?php echo $data['class']?>">
                                  </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Parent Phone Number</label> <?php echo isset($error['parent_mobile']) ? $error['parent_mobile'] : ''; ?>
                                        <input type="number" class="form-control" name="parent_mobile" id="parent_mobile" value="<?php echo $data['parent_mobile']?>">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Email Id</label> <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email']?>">
                                  </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label> <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                                        <input type="password" class="form-control" name="password" id="password" value="<?php echo $data['password']?>">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Student Aadhar Number</label> <?php echo isset($error['aadhar_number']) ? $error['aadhar_number'] : ''; ?>
                                        <input type="text" class="form-control" name="aadhar_number" id="aadhar_number" value="<?php echo $data['aadhar_number']?>">
                                  </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">School Name</label> <?php echo isset($error['school_name']) ? $error['school_name'] : ''; ?>
                                        <input type="text" class="form-control" name="school_name" id="school_name" value="<?php echo $data['school_name']?>">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label> <?php echo isset($error['address']) ? $error['address'] : ''; ?>
                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $data['address']?>">
                                  </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Student Photo</label> <?php echo isset($error['profile']) ? $error['profile'] : ''; ?>
                                        <input type="file" class="form-control" name="profile" id="profile" value="<?php echo $data['profile']?>">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label> <?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                        <input type="text" class="form-control" name="description" id="description" value="<?php echo $data['description']?>">
                                  </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                                <div class="form-group col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <div id="status" class="btn-group">
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="1" <?= ($data['status'] == 1) ? 'checked' : ''; ?>> Approved
                                            </label>
                                            <label class="btn btn-danger" data-toggle-class="btn-danger" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="2" <?= ($data['status'] == 2) ? 'checked' : ''; ?>> Not-Approved
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- </div> -->

                                <!-- </div> -->

                            </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
                        <!--<div  id="res"></div>-->
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>