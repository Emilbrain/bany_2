<div class="section pos_con">
    <div class="header">
        <nav class="pc">
            <a href="?page=catalog">Бани</a>
            <a href="?page=action">Акции</a>
            <a href="
                    <?php

                    if (empty($_GET["page"]) || $_GET["page"] == "catalog") {
                    ?>
                        #feedback
                        <?
                    } else {
                        ?>
                        index.php#feedback
                        <?
                    }
                        ?>
                    
                    ">Отзывы</a>
        </nav>
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/logo/logo.svg" alt="">
            </a>
        </div>
        <div class="login pc">
            <?php
            if (!isset($_SESSION['USER'])) {
            ?>
                <a href="?page=login">Войти</a>
            <?php
            } else {
            ?>
                <a href="?page=user" class="btn">
                    <?
                    if ($USER['role_id'] == 2) {
                    ?>
                        Панель администратора
                    <?
                    } else {
                    ?>
                        Профиль
                    <?
                    }
                    ?>
                </a>
                <a href="?exit" class="btn">
                    Выход
                </a>
            <?
            }
            ?>
        </div>

        <div class="burgers mobile">
            <nav class="navbar">
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <div class="nav-menu">
                    <a href="index.php">Главная</a>
                    <a href="?page=catalog">Бани</a>
                    <a href="?page=action">Акции</a>
                    <a href="
                    <?php

                    if (empty($_GET["page"]) || $_GET["page"] == "catalog") {
                    ?>
                        #feedback
                        <?
                    } else {
                        ?>
                        index.php
                        <?
                    }
                        ?>
                    
                    ">Отзывы</a>
                    <?php
                    if (!isset($_SESSION['USER'])) {
                    ?>
                        <a href="?page=login">Войти</a>
                    <?php
                    } else {
                    ?>
                        <a href="?page=user" class="btn">
                            <?
                            if ($USER['role_id'] == 2) {
                            ?>
                                Панель администратора
                            <?
                            } else {
                            ?>
                                Профиль
                            <?
                            }
                            ?>
                        </a>
                        <a href="?exit" class="btn">
                            Выход
                        </a>
                    <?
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
</div>