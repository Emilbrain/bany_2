<?

$id = $_GET['id'];
$sql = "SELECT * FROM `catalog` WHERE id='$id'";
$query = $conn->query($sql);
$catalog = $query->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `catalog` ORDER BY `id`
LIMIT 3";
$query = $conn->query($sql);
$catalogs = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['brony'])) {
    $date = $_POST['date'];
    $watch = $_POST['watch'];

    $flag = 'true';
    $error = [
        '<p class="error">Заполните даты</p>'
    ];
}

?>
<!-- ---------------------------------MAIN-------------------------------------- -->
<div class="section">
    <div class="main__title mt100">
        баня №1
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
                    Двухэтажная баня. В бани имеется комната отдыха на первом
                    этаже, большой обеденный стол со стульями, диван, телевизор.
                    Парная, большая помывочная. В помывочной располагаются 2
                    купели, одна с холодной водой, другая с теплой. На улице
                    находите теплый чан , подогреваемый дровами. На втором
                    этаже находится зона отдыха с большой двуспальной кроватью.
                    Комната сеновая и комната гардеробная.
                </div>
                <div class="main__inf">
                    <div class="main__inf-column">
                        <div class="main__inf-title">
                            [ вместимость ]
                        </div>
                        <div class="main__inf-subtitle">
                            до 20 человек
                        </div>
                    </div>
                    <div class="main__inf-column">
                        <div class="main__inf-title">
                            [ время аренды ]
                        </div>
                        <div class="main__inf-subtitle">
                            от 4 часов
                        </div>
                    </div>
                    <div class="main__inf-column">
                        <div class="main__inf-title">
                            [ площадь ]
                        </div>
                        <div class="main__inf-subtitle">
                            80 м2
                        </div>
                    </div>
                </div>
                <div class="main__txt-botom">

                    <div class="main__price">
                        <div class="main__price-title">
                            [ стоимость ]
                        </div>
                        <div class="main__price-subtitle">
                            6 000 ₽/час
                        </div>
                    </div>
                    <div class="main__btns">
                        <!-- <div class="main__btn btn-fill">
                            <a href="">Забронировать</a>
                        </div> -->
                    </div>
                </div>
                <form action="" class="from_bron" method="post">
                    <label for="">Дата брони</label>
                    <input type="date" name="date" class="form__input form_date">
                    <label for="">На сколько?</label>
                    <input type="text" name="watch" class="form__input form_date">
                    <button type="submit" class="form__btn" name="brony">Забронировать</button>
                </form>

                <?php
                if (isset($_POST['brony'])) {
                    if ($flag != 'false') {
                        $id_user = $USER['id'];
                        $sql = "INSERT INTO `orders`(`id`, `date`, `watch`, `catalog_id`, `user_id`) VALUES (null,'$date','$watch','$id','$id_user')";
                        $res = $conn->query($sql);
                        echo '<script> document.location.href="?page=user"</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- ---------------------------------MAIN-------------------------------------- -->