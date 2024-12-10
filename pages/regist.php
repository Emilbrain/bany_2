<?php
if (isset($_POST['regist'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_r = $_POST['password-r'];

    $flag = "true";

    $errors = [
        '<p class="error">Заполните поле ввода</p>',
        '<p class="error">Не верный формат почты</p>',
        '<p class="error">Вы уже зарегистированы </p>',
        '<p class="error">Пароль должен включать не менее 6 символов</p>',
        '<p class="error">Пароли не совпадают</p>'
    ];
}
?>
<div class="loginbg">

    <!-- ---------------------------------REGIST-------------------------------------- -->
    <div class="form__container">
        <form action="" class="form-logreg" method="post">
            <div class="form__title">
                Регистрация пользователя
            </div>
            <input type="text" class="form__input" name="name" placeholder="Имя">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($name)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="surname" placeholder="Фамилия">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($surname)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="email" placeholder="E-mail">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($email)) {
                    $flag = 'false';
                    echo $errors[0];
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $flag = 'false';
                    echo $errors[1];
                } else {
                    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
                    $res = $conn->query($sql)->fetchColumn();
                    if ($res != 0) {
                        $flag = 'false';
                        echo $errors[2];
                    }
                }
            } ?>
            <input type="password" class="form__input" name="password" placeholder="Пароль">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($password)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="password" class="form__input" name="password-r" placeholder="Повторите пароль">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($password_r)) {
                    $flag = 'false';
                    echo $errors[0];
                } elseif (strlen($password) < 6) {
                    $flag = 'false';
                    echo $errors[3];
                } elseif ($password != $password_r) {
                    $flag = 'false';
                    echo $errors[4];
                }
            } ?>
            <button type="submit" class="form__btn" name="regist">Зарегистрироваться</button>

        </form>

        <div class="form__inf">
            <p>
                Уже есть аккаунт? Войдите →
            </p>
            <div class="form__inf-btn">
                <a href="?page=login">
                    Войти
                </a>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['regist'])) {
        if ($flag != 'false') {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user`(`id`, `name`, `surname`, `email`, `password`) VALUES (null,'$name','$surname','$email','$password')";
            $res = $conn->query($sql);

            echo '<script> document.location.href="?page=login"</script>';
        }
    } ?>
