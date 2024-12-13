<?php
$sql = 'SELECT * FROM `certificate`';
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
            surname
        </th>
        <th class="table__title">
            price
        </th>
        <th class="table__title">
            phone
        </th>
        <th class="table__title">
            id_user
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
                    <?= $catalog['surname'] ?>
                </th>
                <th>
                    <?= $catalog['price'] ?>
                </th>
                <th>
                    <?= $catalog['phone'] ?>
                </th>
                <th>
                    <?= $catalog['id_user'] ?>
                </th>
            </tr>
        <?
        }
    } else {
        ?>
        <p class="noteitem"> Список сертификатов пуст</p>
    <?
    }
    ?>
</table>