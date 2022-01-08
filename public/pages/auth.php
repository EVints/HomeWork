<?php
$arr = file('/app/tmp/users.txt');

function newArray(&$item)
{
    $item = str_getcsv($item, ',');
}

array_walk($arr, 'newArray');


function check_auth($userMail, $pass, &$arr, &$name = "")
{
    foreach ($arr as $val) {
        if (trim($userMail, " ") == trim($val[1], " ") && hash('sha256', trim($pass, " ")) == trim($val[2], " ")) {
            $name = $val[0];
            return true;
        }
    }
    return false;
}



if (check_auth($_POST['userEmail'], $_POST['userPassword'], $arr, $name)) {

    setcookie("userName", $name, time() + 3600, "/");

?>
    <script type="text/javascript">
        location = "/";
    </script>
<?php

} else {
    $err = '<span style="color: red;" >Вы ввели неверный логин или пароль!</span> <br>';
}
?>