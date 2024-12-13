<?
$sql = 'SELECT * FROM `catalog`';
$query = $conn->query($sql);
$catalogs = $query->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM `orders` WHERE `status_id` = 1";
$query = $conn->query($sql);
$orders = $query->fetchAll(PDO::FETCH_ASSOC);

$user_id = $USER['id'];
$sql = "SELECT * FROM `orders` WHERE `user_id`='$user_id'";
$query = $conn->query($sql);
$order_use = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="section">
    <div class="administration">
        <div class="administration-img">
            <?
            if (empty($USER['avatar'])) {
            ?>
                <img src="assets/img/ico/people.png" alt="">


            <?
            } else {
            ?>
                <img src="<?= $USER['avatar'] ?>" alt="">

            <?
            }
            ?>

        </div>

        <div class="administration-inf">

            <p class="administration-name">

                <?php
                echo $USER['name'] . ' ' .  $USER['surname'];
                ?>

            </p>

            <p class="administration-dan">

                <?php
                echo $USER['email']
                ?>
            </p>

        </div>
    </div>
    <div class="user__btn btn-fill">
        <a href="?page=edit-user">Редактировать</a>
    </div>


    <!--catalog-->

    <?
    if ($USER['role_id'] == 2) {
    ?>
        <div class="section mt100">

            <div class="admin__nav">
                <div class="btn-fill">
                    <a href="?page=user&table=catalog">Каталог</a>
                    <a href="?page=user&table=user">Пользователи</a>
                    <a href="?page=user&table=certificate">Сертификаты</a>
                    <a href="?page=user&table=orders">Бронь</a>
                </div>
            </div>

            <?
            if (isset($_GET['table'])) {
                $table = $_GET['table'];
                if ($table == 'catalog') {
                    include "table__catalog.php";
                } elseif ($table == 'user') {
                    include "table__user.php";
                } elseif ($table == 'certificate') {
                    include "table__certificate.php";
                } elseif ($table == 'orders') {
                    include "table__orders.php";
                }
            } else {
                include "table__orders.php";
            }
            ?>

        </div>
    <?
    }
    ?>




    <?
    if ($USER['role_id'] == 1) {

    ?>
        <div class="section mt100 mtsect ">
            <h2>
                Моя история
            </h2>
        </div>
        <?
        if (count($order_use) > 0) {
            foreach ($order_use as $orde) {

                $idr = $orde['catalog_id'];
                $sql = "SELECT * FROM `catalog` WHERE `id`='$idr'";
                $query = $conn->query($sql);
                $catal = $query->fetch(PDO::FETCH_ASSOC);

                $idr = $orde['status_id'];
                $sql = "SELECT * FROM `status` WHERE `id`='$idr'";
                $query = $conn->query($sql);
                $status = $query->fetch(PDO::FETCH_ASSOC);


        ?>
                <div class="our__card">
                    <div class="our__img">
                        <img src="<?= $catal['img'] ?>" alt=" ">
                    </div>
                    <div class="our__txt">
                        <div class="our__title">
                            <?= $catal['name'] ?>
                        </div>
                        <div class="our__subtitle">
                            <?= $catal['description'] ?>
                        </div>
                        <div class="our__inf">
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ вместимость ]
                                </div>
                                <div class="our__inf-subtitle">
                                    до <?= $catal['capacity'] ?> человек
                                </div>
                            </div>
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ время аренды ]
                                </div>
                                <div class="our__inf-subtitle">
                                    от <?= $catal['watch'] ?> часов
                                </div>
                            </div>
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ площадь ]
                                </div>
                                <div class="our__inf-subtitle">
                                    <?= $catal['square'] ?> м2
                                </div>
                            </div>
                        </div>
                        <div class="our__price">
                            <div class="our__price-title">
                                Дата и время
                            </div>
                            <div class="our__price-subtitle">
                                <?= $orde['date'] ?> <?= $orde['watch'] ?>ч.
                            </div>
                        </div>
                        <div class="our__btns">
                            <div class="our__btn btn-fill">
                                <a>Статуc <?= $status['name'] ?></a>

                            </div>
                        </div>
                    </div>
                </div>

    <?
            }
        } else {
            echo "Нет бань ";
        }
    }
    ?>

</div>

<!--catalog-->