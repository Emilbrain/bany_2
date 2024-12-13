<?php
$sql = 'SELECT * FROM `user`';
$query = $conn->query($sql);
$catalogs = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `role`";
$query = $conn->query($sql);
$roles = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['user_set'])) {
    $roleid = $_POST['role'];
    $usid = $_POST['usid'];

    $sql = "UPDATE `user` SET `role_id` = '$roleid' WHERE `id` = '$usid' LIMIT 1";
    $query = $conn->query($sql);
}

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
            email
        </th>
        <th class="table__title">
            role
        </th>
        <th class="table__title">
            avatar
        </th>
        <th class="table__title">
            save
        </th>
        <th class="table__title">
            delete
        </th>
    </tr>
    <?
    if (count($catalogs) > 0) {

        foreach ($catalogs as $catalog) {
            $sql = "SELECT * FROM `role` where `id` = '$role_id'";
            $query = $conn->query($sql);
            $role = $query->fetchAll(PDO::FETCH_ASSOC);
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
                    <?= $catalog['email'] ?>
                </th>
                <form action="" method="post">
                    <input type="hidden" name='usid' value="<?=$catalog['id']?>">
                    <th>
                        <select name="role" id="">
                            <?
                            foreach ($roles as $role) {
                            ?>
                                <option value="<?= $role['id']?>"
                                    <?
                                    if ($catalog['role_id'] == $role['id']) {
                                        echo 'selected';
                                    }
                                    ?>><?= $role['name'] ?></option>
                            <?
                            }
                            ?>
                        </select>
                    </th>
                    <th>
                        <img src="<?= $catalog['avatar'] ?>" class="table_img" alt="">

                    </th>
                    <th>
                        <button type="submit" name="user_set" class="table__btn btnf-fill">
                            Сохранить
                        </button>
                </form>
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
        <p class="noteitem"> Список пользователей пуст</p>
    <?
    }
    ?>
</table>

<script>

</script>