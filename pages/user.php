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
    <div class="section mt100">
        <?
        if ($USER['role_id'] == 2) {
        ?>
            <h2>
                Заказы на бронь
            </h2>
        <?
        } else {
        ?>

            <h2>
                Моя история
            </h2>
        <?
        }
        ?>
    </div>

    <?php
    if ($USER['role_id'] == 2) {
        if (count($orders) > 0) {

            foreach ($orders as $order) {

                $idr = $order['catalog_id'];
                $sql = "SELECT * FROM `catalog` WHERE `id`='$idr'";
                $query = $conn->query($sql);
                $catalo = $query->fetch(PDO::FETCH_ASSOC);

    ?>
                <div class="our__card">
                    <div class="our__img">
                        <img src="<?= $catalo['img'] ?>" alt=" ">
                    </div>
                    <div class="our__txt">
                        <div class="our__title">
                            <?= $catalo['name'] ?>
                        </div>
                        <div class="our__subtitle">
                            <?= $catalo['description'] ?>
                        </div>
                        <div class="our__inf">
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ вместимость ]
                                </div>
                                <div class="our__inf-subtitle">
                                    до <?= $catalo['capacity'] ?> человек
                                </div>
                            </div>
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ время аренды ]
                                </div>
                                <div class="our__inf-subtitle">
                                    от <?= $catalo['watch'] ?> часов
                                </div>
                            </div>
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ площадь ]
                                </div>
                                <div class="our__inf-subtitle">
                                    <?= $catalo['square'] ?> м2
                                </div>
                            </div>
                        </div>
                        <div class="our__price">
                            <div class="our__price-title">
                                Дата и время
                            </div>
                            <div class="our__price-subtitle">
                                <?= $order['date'] ?> <?= $order['watch'] ?>ч.
                            </div>
                        </div>
                        <div class="our__btns">
                            <div class="our__btn btn-fill">
                                <a href="?page=accept&id=<?= $order['id'] ?>">Принять</a>

                            </div>
                            <div class="our__btn btn-border">
                                <a href="?page=reject&id=<?= $order['id'] ?>">Отклонить</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?
            }
        } else {
            echo "Нет бань ";
        }
    } else {
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


    <div class="user_cont mt100 ">
        <?
        if ($USER['role_id'] == 2) {
        ?>
            <div class="df">
                <h2>
                    Каталог
                </h2>

                <div class="user_btn btn-fill">
                    <a href="?page=add-catalog">Добавить баню</a>
                </div>
            </div>

    </div>
    <div class="our__cards">
        <?
            if (count($catalogs) > 0) {

                foreach ($catalogs as $catalog) {
        ?>
                <div class="our__card">
                    <div class="our__img">
                        <img src="<?= $catalog['img'] ?>" alt=" ">
                    </div>
                    <div class="our__txt">
                        <div class="our__title">
                            <?= $catalog['name'] ?>
                        </div>
                        <div class="our__subtitle">
                            <?= $catalog['description'] ?>
                        </div>
                        <div class="our__inf">
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ вместимость ]
                                </div>
                                <div class="our__inf-subtitle">
                                    до <?= $catalog['capacity'] ?> человек
                                </div>
                            </div>
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ время аренды ]
                                </div>
                                <div class="our__inf-subtitle">
                                    от <?= $catalog['watch'] ?> часов
                                </div>
                            </div>
                            <div class="our__inf-column">
                                <div class="our__inf-title">
                                    [ площадь ]
                                </div>
                                <div class="our__inf-subtitle">
                                    <?= $catalog['square'] ?> м2
                                </div>
                            </div>
                        </div>
                        <div class="our__price">
                            <div class="our__price-title">
                                [ стоимость ]
                            </div>
                            <div class="our__price-subtitle">
                                <?= number_format($catalog['price'], 0, '.', ' ') ?> ₽/час
                            </div>
                        </div>
                        <div class="our__btns">
                            <div class="our__btn btn-fill">
                                <a href="?page=edit-catalog&id=<?= $catalog['id'] ?>">Редактировать</a>
                            </div>
                            <div class="our__btn btn-border">
                                <a href="?page=delete&id=<?= $catalog['id'] ?>">Удалить</a>
                            </div>
                        </div>
                    </div>
                </div>

        <?
                }
            } else {
                echo "Нет бань ";
            }
        ?>

    </div>
<?
        }
?>
</div>
</div>

<!--catalog-->