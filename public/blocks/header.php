<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Modern Technologies</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/">Главная страница</a>
        <?php
        if ($_COOKIE == false) {
        ?>

            <a class="btn btn-outline-primary" href="login">Войти</a>
        <?php
        } else {
        ?>
            <a class="p-2 text-dark" href="weather">Прогноз погоды</a>
            <a class="p-2 text-dark" href="movies">Поиск фильмов</a>
            <a class="btn btn-danger" href="login">Выйти</a>
        <?php
        }

        ?>
    </nav>



</div>