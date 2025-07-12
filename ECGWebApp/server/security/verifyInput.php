<?php
function verifyInput($input)
{
    $input = htmlentities($input);
    $input = htmlspecialchars($input);
    $input = trim($input);
    return $input;
}
?>