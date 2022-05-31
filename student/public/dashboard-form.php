<?php
if (isset($_SESSION['seller_id']) && isset($_SESSION['seller_name'])) {
    header("location:home.php");
}
if (isset($_POST['btnLogout'])) {
    session_start();	
	unset($_SESSION['description']);
	unset($_SESSION['status']);
	header("location:index.php");

}
?>
<div class="col-md-4 col-md-offset-4 " style="margin-top:80px;">
    <div class='row'>
        <div class="col-md-12 text-center">
            <img src="../img/logo.png" height="110">
            
        </div>
        
        <div class="box box-info col-md-12 ">
            <div class="box-header with-border ">
                <?php
                if($_SESSION['status'] == '1'){?>
                    <h3 class="box-title text-success">Your Account is Approved</h3>
                    <h3 class="box-title">Exam is Scheduled at 1st,June 2022</h3>
                    <?php
                    
                }
                else {
                    
                    ?>
                    <h3 class="box-title text-danger">Your Account is Not Approved</h3>
                    <h3 class="box-title"><?php echo $_SESSION['description'] ?></h3>
                    <?php
                }
                ?>
                 <form method="post" enctype="multipart/form-data">
                    <div class="box-footer">
                        <button type="submit" name="btnLogout" class="btn btn-info pull-left">Logout</button>
                    </div>
                </form>


                
                
                
            </div>
        </div>
    </div>
</div>
</div>

