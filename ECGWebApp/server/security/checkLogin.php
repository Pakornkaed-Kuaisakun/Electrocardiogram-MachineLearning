<?php
    function checkLogin() {
        if(!isset($_SESSION['ID']) && !isset($_SESSION['token'])) {
            $HOST = $_SERVER['HTTP_HOST'];
            $extra = 'index';
            header("Location: https://$HOST/ECGWebApp/$extra");
        }
    }
?>