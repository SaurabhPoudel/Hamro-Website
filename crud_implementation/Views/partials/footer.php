
<footer>
    Copyright © Saurabh Poudel

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="public/javascripts/main.js"></script>


<?php
        if(isset($_GET['page'])){
            $arr = explode('/',$_GET['page']);
            if(sizeof($arr) == 2){
                $script=htmlspecialchars('public/javascripts/'.strtolower($arr[0]).'/'.strtolower($arr[1]).'.js');
                if(file_exists($script)){
                    echo '<script src="'.$script.'"></script>';
                }
            }
        }
    ?>

</body>
</html>