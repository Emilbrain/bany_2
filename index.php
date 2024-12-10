<?php
session_start();
include "connect/database.php";
include "connect/head.php";

global $conn;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Паровые Традиции</title>
    <link rel="stylesheet" href="assets//style/style.css">
    <link rel="shortcut icon" href="assets/img/logo/favi.png" type="image/x-icon">
</head>

<body>
    <?
    include "companent/header.php";
    ?>


    <?
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        if ($page == "catalog") {
            include "pages/catalog.php";
        } elseif ($page == "login") {
            include "pages/login.php";
        } elseif ($page == "regist") {
            include "pages/regist.php";
        } elseif ($page == "action") {
            include "pages/action.php";
        } elseif ($page == "user") {
            include "pages/user.php";
        } elseif ($page == "edit-user") {
            include "pages/edit-user.php";
        } elseif ($page == "add-catalog") {
            include "pages/add-catalog.php";
        } elseif ($page == "edit-catalog") {
            include "pages/edit-catalog.php";
        } elseif ($page == "delete") {
            include "pages/delete.php";
        } elseif ($page == "item") {
            include "pages/item.php";
        } elseif ($page == "accept") {
            include "pages/accept.php";
        } elseif ($page == "reject") {
            include "pages/accept.php";
        }
    } else {
        include "pages/start.php";
    }
    ?>
    <?
    include "companent/footer.php";
    ?>

    <script>
    document.querySelectorAll('.answer').forEach(answer => {
        answer.style.setProperty('--max-height', `${answer.scrollHeight}px`);
    });

    document.querySelectorAll('.question-title').forEach(button => {
        button.addEventListener('click', event => {
            const question = event.target.closest('.question');
            const answer = question.querySelector('.answer');

            // Проверяем, является ли текущий вопрос активным
            if (question.classList.contains('active')) {
                question.classList.remove('active');
                answer.style.maxHeight = '0';
            } else {
                // Закрываем все активные вопросы
                document.querySelectorAll('.question.active')
                    .forEach(item => {
                        item.classList.remove('active');
                        item.querySelector('.answer').style.maxHeight = '0';
                    });

                // Открываем текущий вопрос
                question.classList.add('active');
                answer.style.maxHeight = `${answer.scrollHeight}px`;
            }
        });
    });
    </script>
    <script src="assets/JS/slider.js"></script>
</body>

</html>