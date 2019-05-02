    <?php
    require_once dirname(__FILE__).'/../../Controllers/AuthController.php';
    require_once dirname(__FILE__).'/../../BL/Post_code.php';
    try {
        $auth = AuthController::process();
    } catch(Exception $e) {
        echo 'ERROR!: '.$e->getMessage();
    }

    $pc = Post_code::retrieveAll();
?>
<h3 id="notification" style="color: <?=$auth['type']=='success'?'green':'red'?>;"><?=$auth['message']?></h3>

<div class="signup-customer form-container">
    <h2 class="form-heading">Signup</h2>
    <form class="custom-form" method="post">
        <div class="form-group mb">
            <label>Full Name</label>
            <input type="text" name="customer_name" placeholder="Name">
        </div>

        <div class="form-group mb">
            <label>Post Code</label>
            <select name="customer_post_code_id">
                <?php
                    foreach($pc as $code){
                        echo '<option value="'.$code['id'].'">'.$code['code'].' '.$code['city'].'</option>';
                    }
                ?>
            </select>
            <small>If you can't find your post code, we are sorry, but we are delivering only for customer in areas above.</small>
        </div>

        <label>Street</label>
        <input type="text" name="customer_street" placeholder="Street">

        <label>Phone</label>
        <input type="number" name="customer_telephone" placeholder="Phone">

        <label>Email</label>
        <input type="email" name="customer_email" placeholder="Email">

        <label>Password</label>
        <input type="password" name="customer_password" placeholder="Password">

        <input type="submit" name="customer_signup" value="Submit">
    </form>
</div>
