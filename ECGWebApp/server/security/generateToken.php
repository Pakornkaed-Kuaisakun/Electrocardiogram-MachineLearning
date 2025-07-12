<?php 
    function gernerateToken($bytes) {
        return bin2hex(random_bytes($bytes));
    }
?>