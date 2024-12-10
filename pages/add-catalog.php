<?php
if ($USER['role_id'] == 2) {
    if (isset($_POST['add-home'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $capacity = $_POST['people'];
        $watch = $_POST['watch'];
        $square = $_POST['square'];
        $price = $_POST['price'];

        $img = 'assets/img/catalog/' . time() . $_FILES['img']['name'];

        $errors = [
            '<p class="error">Заполните поле ввода</p>',
            '<p class="error">Загрузите файл</p>'
        ];
    }
}
?>
<div class="loginbg">

    <!-- ---------------------------------LOGIN-------------------------------------- -->
    <div class="form__container">
        <form action="" class="form-logreg" method="post" enctype="multipart/form-data">
            <div class="form__title">
                Добавиь баню
            </div>
            <input type="text" class="form__input" name="name" placeholder="Название">
            <?php
            if (isset($_POST['add-сatalog'])) {
                if (empty($name)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <textarea type="text" class="form__input" name="description" placeholder="Описание"></textarea>
            <?php
            if (isset($_POST['add-сatalog'])) {
                if (empty($description)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="people" placeholder="Количество человек ">
            <?php
            if (isset($_POST['add-сatalog'])) {
                if (empty($capacity)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="watch" placeholder="Время аренды">
            <?php
            if (isset($_POST['add-сatalog'])) {
                if (empty($capacity)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="square" placeholder="Площадь">
            <?php
            if (isset($_POST['add-сatalog'])) {
                if (empty($watch)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="price" placeholder="Цена">
            <?php
            if (isset($_POST['add-сatalog'])) {
                if (empty($capacity)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="file" name="img" id="" placeholder="добавить фото">

            <?php
            if (isset($_POST['add-home'])) {
                if ($_FILES['img']['size'] < 0) {
                    $flag = 'false';
                    echo $errors[1];
                }
            } ?>

            <button type="submit" class="form__btn" name="add-home">Добавить</button>

        </form>


    </div>


    <? if (isset($_POST['add-home'])) {
        if ($flag != 'false') {
            move_uploaded_file($_FILES['img']['tmp_name'], $img);
            $sql = "INSERT INTO `catalog`(`id`, `name`, `description`, `capacity`, `watch`, `square`, `price`, `img`) VALUES (null, '$name', '$description', '$capacity', '$watch', '$square', '$price','$img')";
            $res = $conn->query($sql);
            echo '<script> document.location.href="?page=user"</script>';
        }
    } ?>