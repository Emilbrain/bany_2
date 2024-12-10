<?
if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `catalog` WHERE `id`='$id'";
    $$res = $conn->query($sql);
    echo "<script> document.location.href='?page=user'</script>";
}
?>

<div class="section">
    <div class="delete_container">

        <h2>
            Вы уверены что хотите удалить?
        </h2>
        <div class="df">
            <form action="" method="post">
                <button type="submit" class="btnf-fill " name="delete">Да</button>
            </form>
            <div class="delete_btn btn-fill">
                <a href="?page=user">Нет</a>
            </div>
        </div>
    </div>
</div>