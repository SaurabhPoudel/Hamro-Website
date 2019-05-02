<?php
    require_once dirname(__FILE__).'/../../Controllers/StaffController.php';
    try {
        $ress = StaffController::process();
    } catch(Exception $e) {
        echo 'ERROR!: '.$e->getMessage();
    }

?>

<h3 id="notification" style="color: <?=$ress['type']=='success'?'green':'red'?>;"><?=$ress['message']?></h3>

<div class="auth-customer form-container1">
    <h2 class="form-heading">Login for staffs</h2>
    <form class="custom-form" method="post">
        <label>Email</label>
        <input type="email" name="staff_email" placeholder="Email">

        <label>Password</label>
        <input type="password" name="staff_password" placeholder="Password">

        <input type="submit" name="staff_submit" value="Submit">
        
    </form>
</div>
