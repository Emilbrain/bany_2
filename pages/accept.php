<?php
if ($_GET['page'] == 'accept') {
    $id = $_GET['id'];
    $sql = "UPDATE `orders` SET `status_id`= 2 WHERE id = '$id'";
    $res = $conn->query($sql);
    echo '<script> document.location.href="?page=user"</script>';
} else {
    $id = $_GET['id'];
    $sql = "UPDATE `orders` SET `status_id`= 3 WHERE id = '$id'";
    $res = $conn->query($sql);
    echo '<script> document.location.href="?page=user"</script>';
}
    