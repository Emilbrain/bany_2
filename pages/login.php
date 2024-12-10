<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>',
        '<p class="error">Вы не зарегистированы </p>',
        '<p class="error">Не верный пароль</p>',
        '<p class="error">Ваш аккаунт заблокирован</p>'
    ];
}
?>
<div class="loginbg">
    <!-- ---------------------------------LOGIN-------------------------------------- -->
    <div class="form__container">
        <form action="" class="form-logreg" method="post">
            <div class="form__title">
                ВХОД
            </div>
            <input type="text" name="email" class="form__input" placeholder="E-mail">
            <? if (isset($_POST['login'])) {
                $sql = "SELECT * FROM `user` WHERE `email`='$email'";
                $res = $conn->query($sql)->fetch();

                if (empty($email)) {
                    echo $errors[0];
                    $flag = 'false';
                } elseif (!$res) {
                    echo $errors[1];
                    $flag = 'false';
                } elseif ($res['role_id'] == 3) {
                    echo $errors[3];
                    $flag = 'false';
                }
            } ?>
            <input type="password" name="password" class="form__input" placeholder="Пароль">
            <? if (isset($_POST['login'])) {
                if (empty($password)) {
                    echo $errors[0];
                    $flag = 'false';
                } elseif (!password_verify($password, $res['password'])) {
                    echo $errors[2];
                    $flag = 'false';
                }
            } ?>
            <button type="submit" class="form__btn" name="login">Войти</button>


        </form>

        <div class="form__inf">
            <p>
                Ещё нет аккаунта? Зарегестрируйся →
            </p>
            <div class="form__inf-btn">
                <a href="?page=regist">
                    Зарегестрироваться
                </a>
            </div>
        </div>
    </div>
    <!-- ---------------------------------LOGIN-------------------------------------- -->

    <? if (isset($_POST['login'])) {
        if ($flag != 'false') {
            $_SESSION['USER'] = $res['id'];
            echo "<script> document.location.href='?page=user'</script>";
        }
    }
    ?>