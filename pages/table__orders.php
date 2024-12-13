<?php
$sql = 'SELECT * FROM `orders`';
$query = $conn->query($sql);
$orders = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM `catalog`';
$query = $conn->query($sql);
$catalogs = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th class="table__title">
            id
        </th>
        <th class="table__title">
            date
        </th>
        <th class="table__title">
            watch
        </th>
        <th class="table__title">
            catalog_name
        </th>
        <th class="table__title">
            user_email
        </th>
        <th class="table__title">
            status
        </th>
        <th class="table__title">
            accept
        </th>
        <th class="table__title">
            reject
        </th>
    </tr>
    <?
    if (count($catalogs) > 0) {

        foreach ($orders as $order) {
            $catid = $order['catalog_id'];
            $sql = "SELECT * FROM `catalog` where `id`='$catid'";
            $query = $conn->query($sql);
            $catalog = $query->fetch(PDO::FETCH_ASSOC);

            $uid = $order['user_id'];
            $sql = "SELECT * FROM `user` where `id`='$uid'";
            $query = $conn->query($sql);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $sid = $order['status_id'];
            $sql = "SELECT * FROM `status` where `id`='$sid'";
            $query = $conn->query($sql);
            $staus = $query->fetch(PDO::FETCH_ASSOC);
    ?>
            <tr>
                <th>
                    <?= $order['id'] ?>
                </th>
                <th>
                    <?= $order['date'] ?>
                </th>
                <th>
                    <?= $order['watch'] ?>
                </th>
                <th>
                    <?= $catalog['name'] ?>
                </th>
                <th>
                    <?= $user['email'] ?>
                </th>
                <th>
                    <?= $staus['name'] ?>

                </th>
                <th>
                    <div class="our__btn btn-fill">
                        <?
                        if ($order['status_id'] == 1) {

                        ?>
                            <a href="?page=accept&id=<?= $order['id'] ?>">Принять</a>
                        <?
                        }
                        ?>
                    </div>
                </th>
                <th>
                    <div class="our__btn btn-border">
                        <?
                        if ($order['status_id'] == 1) {
                        ?>
                            <a href="?page=reject&id=<?= $order['id'] ?>">Отклонить</a>
                        <?
                        }
                        ?>
                    </div>
                </th>
            </tr>
        <?
        }
    } else {
        ?>
        <p class="noteitem"> Список зявок пуст</p>
    <?
    }
    ?>
</table>