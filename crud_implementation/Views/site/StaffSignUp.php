<!--  <//?php
    require_once dirname(__FILE__).'/../../Controllers/StaffController.php';
    require_once dirname(__FILE__).'/../../BL/Post_code.php';
    try {
        $authh = StaffController::process();
    } catch(Exception $e) {
        echo 'ERROR!: '.$e->getMessage();
    }

    $pc = Post_code::retrieveAll();
?>
<h3 id="notification" style="color: <?//=$authh['type']=='success'?'green':'red'?>;"><?//=$authh['message']?></h3>

<div class="signup-customer form-container">
            
    <h2 class="form-heading">Signup</h2>
    <label>Full Name</label>
    <form class="custom-form" method="post">
        <div class="form-group mb">
            <input type="text" name="staff_name" placeholder="Name">
        </div>

        <div class="form-group mb">
            <label>Post Code</label>
            <select name="staff_post_code_id">
                <//?php
                  //  foreach($pc as $code){
                   //     echo '<option value="'.$code['id'].'">'.$code['code'].' '.$code['city'].'</option>';
                  //  }
                ?>
            </select>
            
        </div>

     
        <label>Phone</label>
        <input type="number" name="staff_telephone" placeholder="Phone">

        <label>Email</label>
        <input type="email" name="staff_email" placeholder="Email">

        <label>Password</label>
        <input type="password" name="staff_password" placeholder="Password">

        <input type="submit" name="staff_signup" value="Submit">
    </form>
</div>-->
