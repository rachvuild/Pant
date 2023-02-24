
<?php
$string = "jack@polcom";
// if (stristr($string, '@', '.') == true) {
if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
    echo 'yes';
}
