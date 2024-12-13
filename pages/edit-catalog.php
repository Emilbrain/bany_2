<?php
if ($USER['role_id'] == 2) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `catalog` WHERE `id`='$id'";
    $catalog = $conn->query($sql)->fetch(2);
    if (isset($_POST['edit-catalog'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $capacity = $_POST['people'];
        $watch = $_POST['watch'];
        $square = $_POST['square'];
        $price = $_POST['price'];

        if ($_FILES['img']['size'] > 0) {
            $img = 'assets/img/catalog/' . time() . $_FILES['img']['name'];
        }

        $errors = [
            '<p class="error">Заполните поле ввода</p>',

        ];
    }
}
?>
<div class="loginbg">

    <!-- ---------------------------------LOGIN-------------------------------------- -->
    <div class="form__container">
        <form action="" class="form-logreg" method="post" enctype="multipart/form-data">
            <div class="form__title">
                Редактировать баню
            </div>
            <input type="text" class="form__input" name="name" placeholder="Название" value="<?= $catalog['name'] ?>">
            <?php
            if (isset($_POST['edit-сatalog'])) {
                if (empty($name)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <textarea class=" textarea__form" name="description" placeholder="Описание"><?= $catalog['description'] ?></textarea>
            <?php
            if (isset($_POST['edit-сatalog'])) {
                if (empty($description)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="people" placeholder="Количество человек" value="<?= $catalog['capacity'] ?>">
            <?php
            if (isset($_POST['edit-сatalog'])) {
                if (empty($capacity)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="watch" placeholder="Время аренды" value="<?= $catalog['watch'] ?>">
            <?php
            if (isset($_POST['edit-сatalog'])) {
                if (empty($watch)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="square" placeholder="Площадь" value="<?= $catalog['square'] ?>">
            <?php
            if (isset($_POST['edit-сatalog'])) {
                if (empty($square)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="text" class="form__input" name="price" placeholder="Цена" value="<?= $catalog['price'] ?>">
            <?php
            if (isset($_POST['edit-сatalog'])) {
                if (empty($price)) {
                    $flag = 'false';
                    echo $errors[0];
                }
            } ?>
            <input type="file" name="img" id="img" placeholder="добавить фото">

            <button type="submit" class="form__btn" name="edit-catalog">Добавить</button>

        </form>


    </div>


    <? if (isset($_POST['edit-catalog'])) {
        if ($flag != 'false') {
            if ($_FILES['img']['size'] > 0) {
                move_uploaded_file($_FILES['img']['tmp_name'], $img);
            }
            var_dump($name);
            var_dump($description);
            var_dump($capacity);
            var_dump($watch);
            var_dump($square);
            var_dump($price);
            $sql = "UPDATE `catalog` SET `name`='$name',`description`=' $description',`capacity`=' $capacity',`watch`='$watch',`square`='$square', `price`='$price'";
            if (isset($img)) {
                $sql .= ", `img`='$img'";
            }

            $sql .= " WHERE `id`='$id'";

            $res = $conn->query($sql);
            echo '<script> document.location.href="?page=user"</script>';
        }
    } ?>