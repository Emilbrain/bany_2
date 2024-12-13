<?

$id = $_GET['id'];
$sql = "SELECT * FROM `catalog` WHERE id='$id'";
$query = $conn->query($sql);
$catalog = $query->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['brony'])) {
    $date = $_POST['date'];
    $watch = $_POST['watch'];
    $people = $_POST['people'];
    $today = date('Y-m-d');
    echo '<script>window.onload = function() { showModal(); };</script>';

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните дату</p>',
        '<p class="error">Неправильная дата</p>',
        '<p class="error">Заполните количетсво человек</p>',
        '<p class="error">Вы привысили лимит людей</p>'
    ];
}

?>
<!-- ---------------------------------MAIN-------------------------------------- -->
<div class="section mt140">
    <div class="main__title ">
        <?= $catalog['name'] ?>
    </div>
    <div class="main__row">
        <div class="main__column">
            <div class="main__img-big">
                <img src="<?= $catalog['img'] ?>" alt="">
            </div>
        </div>
        <div class="main__column">
            <div class="main__txt">
                <div class="main__subtitle">
                    <?= $catalog['description'] ?>

                </div>
                <div class="main__inf">
                    <div class="main__inf-column">
                        <div class="main__inf-title">
                            [ вместимость ]
                        </div>
                        <div class="main__inf-subtitle">
                            до <?= $catalog['capacity'] ?>
                            человек
                        </div>
                    </div>
                    <div class="main__inf-column">
                        <div class="main__inf-title">
                            [ время аренды ]
                        </div>
                        <div class="main__inf-subtitle">
                            от <?= $catalog['watch'] ?>
                            часов
                        </div>
                    </div>
                    <div class="main__inf-column">
                        <div class="main__inf-title">
                            [ площадь ]
                        </div>
                        <div class="main__inf-subtitle">
                            <?= $catalog['square'] ?>
                            м2
                        </div>
                    </div>
                </div>
                <div class="main__txt-botom">

                    <div class="main__price">
                        <div class="main__price-title">
                            [ стоимость ]
                        </div>
                        <div class="main__price-subtitle">
                            <?= $catalog['price'] ?>
                            ₽/час
                        </div>
                    </div>
                    <div class="main__btns">
                        <button class="form__btn" id="open-modal">Забронировать</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ---------------------------------MAIN-------------------------------------- -->


<!-- ---------------------------------MODAL-------------------------------------- -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">×</span>
        <form action="" class="from_bron" method="post">
            <label for="">Дата брони</label>
            <input type="date" name="date" class="form__input form_date">
            <?
            if (empty($date)) {
                $error = $errors[0];
                $flag = 'false';
            } elseif ($date < $today) {
                $error = $errors[1];
                $flag = 'false';
            }
            ?>
            <label for="">На сколько часов</label>
            <input type="text" name="watch" class="form__input form_date">
            <label for="">Количество людей</label>
            <input type="text" name="people" class="form__input form_date">
            <?
            if (empty($people)) {
                $error = $errors[2];
                $flag = 'false';
            } elseif ($people > $catalog['capacity']) {
                $error = $errors[3];
                $flag = 'false';
            }
            ?>
            <button type="submit" class="form__btn" name="brony">Забронировать</button>
        </form>


        <?php
        if (isset($_POST['brony'])) {
            if ($flag != 'false') {
                $id_user = $USER['id'];
                $sql = "INSERT INTO `orders`(`id`, `date`, `watch`, `catalog_id`, `user_id`) VALUES (null,'$date','$watch','$id','$id_user')";
                $res = $conn->query($sql);
                // echo '<script> document.location.href="?page=user"</script>';
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