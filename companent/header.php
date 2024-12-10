<div class="section pos_con">
    <div class="header">
        <nav>
            <a href="?page=catalog">Бани</a>
            <a href="?page=action">Акции</a>
            <a href="#">Меню</a>
        </nav>
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/logo/logo.png" alt="">
            </a>
        </div>
        <div class="login">
            <?php
            if (!isset($_SESSION['USER'])) {
            ?>
                <a href="?page=login">Войти</a>
            <?php
            } else {
            ?>
                <a href="?page=user" class="btn">
                    Профиль
                </a>
                <a href="?exit" class="btn">
                    Выйход
                </a>
            <?
            }
            ?>
        </div>
    </div>
</div>