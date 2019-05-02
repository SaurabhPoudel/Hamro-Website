<?php
    require_once dirname(__FILE__).'/../../Controllers/AuthController.php';
    try {
        $res = AuthController::process();
    } catch(Exception $e) {
        echo 'ERROR!: '.$e->getMessage();
    }

?>

<h3 id="notification" style="color: <?=$res['type']=='success'?'green':'red'?>;"><?=$res['message']?></h3>

<div class="auth-customer form-container">
    <h2 class="form-heading">Login</h2>
    <form class="custom-form" method="post">
        <label>Email</label>
        <input type="email" name="customer_email" placeholder="Email">

        <label>Password</label>
        <input type="password" name="customer_password" placeholder="Password">

        <input type="submit" name="customer_submit" value="Submit">
        <a href="index.php?page=site/StaffLogin">ONLY FOR STAFFS</a>
    </form>
</div>
