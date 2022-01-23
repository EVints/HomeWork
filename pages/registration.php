<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <h2>Приветствую тебя, давай знакомиться</h2>

    <form style="margin: auto; width: 500px;" method="post">
        <div class="mb-2">
            <label for="user_name" class="form-label">Имя</label>
            <input name="user_name" type="text" class="form-control" id="user_name" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="user_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="user_password" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (empty($_POST['user_name']) || empty($_POST['user_email']) || empty($_POST['user_password'])) {
    return;
} else {
    file_put_contents('/app/tmp/users.txt', "{$_POST['user_name']},{$_POST['user_email']}," . hash('sha256', $_POST['user_password']) . PHP_EOL, FILE_APPEND);
?>


    <script type="text/javascript">
        location = "reg_success";
    </script>
<?php
}
