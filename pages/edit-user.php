<?php
if (isset($_POST['edit_p'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    if ($_FILES['img']['size'] > 0) {
        $img = 'assets/img/avatar/' . time() . $_FILES['img']['name'];
    }

    $flag = "true";

    $errors = [
        '<p class="error">Заполните поле ввода</p>',
        '<p class="error">Не верный формат почты</p>',
        '<p class="error">Не верный номер телефона</p>',
        '<p class="error">Вы уже зарегистрированы  </p>'
    ];
}

?>
<div class="loginbg">

    <!-- ---------------------------------LOGIN-------------------------------------- -->
    <div class="form__container">
        <form action="" class="form-logreg" method="post" enctype="multipart/form-data">
            <?
            $id = $USER['id'];
            $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
            $res = $conn->query($sql)->fetch(2);
            ?>
            <div class="form__title">
                Редактирования пользователя
            </div>
            <input type="text" class="form__input" name="name" placeholder="Имя" value="<?= $res['name'] ?>">
            <?php
            if (isset($_POST['edit_p'])) {
                if (empty($name)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type=" text" class="form__input" name="surname" placeholder="Фамилия" value="<?= $res['surname'] ?>">
            <?php
            if (isset($_POST['edit_p'])) {
                if (empty($surname)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="email" placeholder="E-mail" value="<?= $res['email'] ?>">
            <?php
            if (isset($_POST['edit_p'])) {
                if (empty($email)) {
                    $flag = 'false';
                    echo $errors[0];
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $flag = 'false';
                    echo $errors[1];
                } elseif ($email != $res['email']) {
                    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
                    $res = $conn->query($sql)->fetchColumn();
                    if ($res != 0) {
                        $flag = 'false';
                        echo $errors[3];
                    }
                }
            } ?>
            <input type="file" name="img">

            <button type="submit" class="form__btn" name="edit_p">Редактировать</button>

        </form>

    </div>



    <?php
    if (isset($_POST['edit_p'])) {
        if ($flag != 'false') {
            if ($_FILES['img']['size'] > 0) {
                move_uploaded_file($_FILES['img']['tmp_name'], $img);
            }

            $sql = "UPDATE `user` SET `name`='$name',`surname`='$surname',`email`='$email'";
            if (isset($img)) {
                $sql .= ", `avatar`='$img'";
            }
            $sql .= " WHERE `id`='$id'";
            $res = $conn->query($sql);
            echo '<script> document.location.href="?page=user"</script>';
        }
    } ?>