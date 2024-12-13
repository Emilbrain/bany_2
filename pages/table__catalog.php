<?php
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
            name
        </th>
        <th class="table__title">
            description
        </th>
        <th class="table__title">
            capacity
        </th>
        <th class="table__title">
            watch
        </th>
        <th class="table__title">
            square
        </th>
        <th class="table__title">
            price
        </th>
        <th class="table__title">
            img
        </th>
        <th class="table__title">
            edit
        </th>
        <th class="table__title">
            delete
        </th>
    </tr>
    <?
    if (count($catalogs) > 0) {

        foreach ($catalogs as $catalog) {
    ?>
            <tr>
                <th>
                    <?= $catalog['id'] ?>
                </th>
                <th>
                    <?= $catalog['name'] ?>
                </th>
                <th>
                    <?= $catalog['description'] ?>
                </th>
                <th>
                    <?= $catalog['capacity'] ?>
                </th>
                <th>
                    <?= $catalog['watch'] ?>
                </th>
                <th>
                    <?= $catalog['square'] ?>
                </th>
                <th>
                    <?= $catalog['price'] ?>
                </th>
                <th>
                    <img src="<?= $catalog['img'] ?>" class="table_img" alt="">

                </th>
                <th>
                    <div class="table__btn btn-fill">
                        <a href="?page=edit-catalog&id=<?= $catalog['id'] ?>">Редактировать</a>
                    </div>

                </th>
                <th>
                    <div class="table__btn btn-border">
                        <a href="?page=delete&id=<?= $catalog['id'] ?>">Удалить</a>
                    </div>
                </th>
            </tr>
        <?
        }
    } else {
        ?>
        <p class="noteitem"> Список коментариев пуст</p>
    <?
    }
    ?>
</table>