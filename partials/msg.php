<?php
    session_start();

    if(isset($_SESSION['msgError'])){
        echo '
            <div class="alert alert-danger" role="alert" onclick="clean()">
                '. $_SESSION['msgError'] .'
            </div>
        ';
    }else if(isset($_SESSION['msgSuccess'])){
        echo '
            <div class="alert alert-success" role="alert" onclick("clean()")>
            '. $_SESSION['msgSuccess'] .'
            </div>
        ';
    }
?>
