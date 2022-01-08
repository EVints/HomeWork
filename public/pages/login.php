<form class="form-signin" style="width: 500px; margin: auto;" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Пожалуйста войдите</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input name="userEmail" type="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input name="userPassword" type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="">
    <div class="checkbox mb-3">
        <span>Ещё не зарегестированы? Тогда <a href="registration">жми!</a></span>
    </div>

    <?php
    if ($_POST['userEmail'] == '' && check_auth($_POST['userEmail'], $_POST['userPassword'], $arr, $name) == false) {
        print_r('');
    } else if (check_auth($_POST['userEmail'], $_POST['userPassword'], $arr, $name) == false) {
        echo ($err);
    }
    ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    <p class="mt-5 mb-3 text-muted">© 2021-2022</p>
</form>