<?
if (isset($_POST['sert'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $price = $_POST['price'];
    $phone = $_POST['phone'];
    echo '<script>window.onload = function() { showModal(); };</script>';

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните все поля</p>',
        '<p class="error">Не верный телефонный номер</p>'
    ];
}
?>

<!-- ---------------------------------BANNER AND HEADER-------------------------------------- -->
<div class="banner">
    <div class="banner__video">
        <video autoplay muted loop playsinline>
            <source src="assets\img\bg\banner.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="section">
        <div class="banner-content">
            <div class="banner-content__title">
                акции
            </div>
            <div class="container_right">
                <div class="banner-content__subtitle">
                    Дайте своему телу и разуму заслуженный
                    <br>
                    отдых и возможность восстановиться
                </div>
                <div class="banner-content__btn btn-fill">
                    <a href="#">Забронировать</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ---------------------------------BANNER AND HEADER-------------------------------------- -->


<!-- ---------------------------------ACTION-------------------------------------- -->
<div class="section">
    <div class="action mt100">
        <div class="action__point">
            <h3>
                [ об акциях ]
            </h3>
        </div>
        <div class="action__title">
            <h2>
                акции
            </h2>
        </div>

        <div class="action__main">
            <div class="action__card">
                <div class="action__card-img">
                    <img src="assets/img/action/action1.png" alt="">
                </div>
                <div class="action__card-inf">
                    <div class="action__card-title">
                        счастливые часы
                    </div>
                    <div class="action__card-subtitle">
                        Ежедневно с 10:00 до 14:00
                    </div>
                    <!-- <div class="action__card-btn btn-fill">
                        <a href="#">
                            Воспользоваться
                        </a>
                    </div> -->
                    <div class="action_card-inf">
                        <p>
                            Получите скидку 20% на посещение банного комплекса в "Счастливые часы"!
                        </p>
                    </div>
                </div>
            </div>
            <div class="action__card">
                <div class="action__card-img">
                    <img src="assets/img/action/action2.png" alt="">
                </div>
                <div class="action__card-inf">
                    <div class="action__card-title">
                        Приведи друга
                    </div>
                    <div class="action__card-subtitle">
                        скидка до 25%
                    </div>
                    <!-- <div class="action__card-btn btn-fill">
                        <a href="#">
                            Воспользоваться
                        </a>
                    </div> -->
                    <div class="action_card-inf">
                        <p>
                            Получите скидку 20% на посещение банного комплекса в "Счастливые часы"!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ---------------------------------ACTION-------------------------------------- -->

<!-- ---------------------------------PROGRAM-------------------------------------- -->
<div class="program__bg mt100">
    <div class="section">
        <div class="program">
            <div class="program__point">
                <h3>
                    [ сертификаты ]
                </h3>
            </div>
            <div class="program__main">
                <div class="program__column program__inf">
                    <div class="program__title">
                        <h2>
                            подарочные
                            <br>
                            сертификаты
                        </h2>
                    </div>
                    <div class="program__text">
                        Подарочный сертификат послужит удачным
                        подарком на предстоящий праздник для коллеги,
                        мужа или друга
                    </div>
                    <div class="program__btn btn-fill">
                        <a id="open-modal">Закaзать сертификат</a>
                    </div>
                </div>
                <div class="program__column">
                    <div class="program__img">
                        <img src="assets/img/program/program1.png" alt="">
                        <img src="assets/img/program/program2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ---------------------------------PROGRAM-------------------------------------- -->

<!-- ---------------------------------MODAL-------------------------------------- -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">×</span>
        <form action="" class="from_bron" method="post">
            <label for="">Укажите полные фамилию, имя человека на чье имя хотите оформить сертификат </label>
            <input type="text" name="name" class="form__input form_date" placeholder="Имя">
            <?
            if (empty($name)) {
                $error = $errors[0];
                $flag = 'false';
            }
            ?>
            <label for=""></label>
            <input type="text" name="surname" class="form__input form_date" placeholder="Фамилия">
            <?
            if (empty($surname)) {
                $error = $errors[0];
                $flag = 'false';
            }
            ?>
            <label for="">Введиту на какую сумму вы хотите оформить сертификат</label>
            <input type="text" name="price" class="form__input form_date" placeholder="Цена">
            <?
            if (empty($price)) {
                $error = $errors[0];
                $flag = 'false';
            }
            ?>
            <label for="">Введите номер телефона человека на которого оформляется сертификат</label>
            <input type="number" name="phone" class="form__input form_date" placeholder="Номер телефона">
            <?
            if (empty($phone)) {
                $error = $errors[0];
                $flag = 'false';
            } elseif (strlen(($phone) < 12)) {
                $error = $errors[1];
                $flag = 'false';
            }
            ?>
            <button type="submit" class="form__btn" name="sert">Оформить сертификат</button>
        </form>


        <?php
        if (isset($_POST['sert'])) {
            if ($flag != 'false') {
                $id_user = $USER['id'];
                $sql = "INSERT INTO `certificate`(`id`, `name`, `surname`, `price`, `phone`, `id_user`) VALUES (null,'$name','$surname', '$price','$phone','$id_user')";
                $res = $conn->query($sql);
            }
        }
        ?>
    </div>
</div>


<div id="modal_сomplete" class="modal_сomplete">
    <div class="modal_complete-content">
        <span class="close" onclick="hideModal()">×</span>
        <?
        if ($flag == 'false') {
        ?>
            <p>
                <?
                echo $error;
                ?>
            </p>
        <?
        } else {
        ?>
            <p>Ваша заявка находиться на рассмотрение</p>
        <?
        }
        ?>
    </div>
</div>
<!-- ---------------------------------MODAL-------------------------------------- -->


<script>
    function showModal() {
        var modal = document.getElementById("modal_сomplete");
        modal.classList.add("show");

        setTimeout(hideModal, 3000);
    }

    function hideModal() {
        var modal = document.getElementById("modal_сomplete");
        modal.classList.remove("show");
    }
</script>