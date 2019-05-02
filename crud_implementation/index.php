<?php
    session_start();
 

    require_once dirname(__FILE__).'/Views/partials/header.php';

    require_once dirname(__FILE__).'/Controllers/InvoiceController.php';

    $result = InvoiceController::process();
?>

<section id="content">
    <h2 style="color: <?=$result['type']=='error'?'red':'green'?>" id="message"><?=$result['message']?></h2>
    <?php
        if(isset($_GET['page'])){
            $arr = explode('/',$_GET['page']);
            if(sizeof($arr) != 2){
                http_response_code(404);
                include(dirname(__FILE__).'/Views/site/404.php');
            }
            else {
                $path=htmlspecialchars(dirname(__FILE__).'/Views/'.$arr[0].'/'.$arr[1].'.php');
                if(file_exists($path)){
                    require_once $path;
                }else{
                    http_response_code(404);
                    include(dirname(__FILE__).'/Views/site/404.php');
                }
            }
        } else {
            require_once dirname(__FILE__).'/Views/site/index.php';
        }
    ?>
</section>

<?php require_once dirname(__FILE__).'/Views/partials/footer.php';?>
