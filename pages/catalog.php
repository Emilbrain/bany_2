<?
$sql = 'SELECT * FROM `catalog`';
$query = $conn->query($sql);
$catalogs = $query->fetchAll(PDO::FETCH_ASSOC);


$sql = 'SELECT * FROM `feedback`';
$query = $conn->query($sql);
$feedbacks = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- ---------------------------------BANNER AND HEADER-------------------------------------- -->
<div class="banner">
    <div class="banner__video">
        <video autoplay muted loop playsinline>
            <source src="assets\img\bg\banner.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="section">
        <div class="banner-content">
            <div class="banner-content__title">
                бани
            </div>
            <div class="container_right">
                <div class="banner-content__subtitle">
                    Дайте своему телу и разуму заслуженный
                    <br>
                    отдых и возможность восстановиться
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ---------------------------------BANNER AND HEADER-------------------------------------- -->


<!-- ---------------------------------ABOUT-------------------------------------- -->
<div class="section">
    <div class="about-2 mt100">
        <div class="about-2__right">
            <div class="about-2__title">
                <h2>
                    Русская баня на дровах
                    <br>
                    <span> отдых, пар и расслабление</span>
                </h2>
            </div>
            <div class="about-2__subtitle">
                Для тех, кто не представляет себе поход в баню без веника, здесь вы
                найдёте их на любой вкус: берёзовые, дубовые, эвкалиптовые, пихтовые,
                а также травяные — с полынью, мятой, душицей, донником и таволгой.
            </div>
        </div>
        <div class="about2__main">
            <div class="about2__column">
                <img src="assets/img/about2/about1.png" alt="">
                <div class="about2__column__titile">
                    Чан
                </div>
                <div class="about2__column__subtitile">
                    На дровах с подогревом
                </div>
            </div>
            <div class="about2__column">
                <img src="assets/img/about2/about2.png" alt="">
                <div class="about2__column__titile">
                    6 бань
                </div>
                <div class="about2__column__subtitile">
                    С вместимостью 5-20 человек
                </div>
            </div>
            <div class="about2__column">
                <img src="assets/img/about2/about3.png" alt="">
                <div class="about2__column__titile">
                    детские ванны
                </div>
                <div class="about2__column__subtitile">
                    С детской зоной для игр
                </div>
            </div>
            <div class="about2__column">
                <img src="assets/img/about2/about4.png" alt="">
                <div class="about2__column__titile">
                    13 программ
                </div>
                <div class="about2__column__subtitile">
                    Парений и комплексов
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ---------------------------------ABOUT-------------------------------------- -->


<!-- ---------------------------------CATALOG-------------------------------------- -->
<div class="section">
    <div class="catalog mt100 ">
        <div class="catalog__title">
            <h2>
                В <span>банном комплексе 6 бань</span>
                <br>
                <div class="catalogmt">
                    Выберите любую себе по душе
                </div>
            </h2>
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
                                <div class="our__btn btn-border">
                                    <a href="?page=item&id=<?= $catalog['id'] ?>">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?
                }
            } else {
                ?>
                <p class="noteitem"> Список коментариев пуст</p>
            <?
            }
            ?>

        </div>
    </div>
</div>
<!-- ---------------------------------CATALOG-------------------------------------- -->


<!-- ---------------------------------PROGRAM-------------------------------------- -->
<div class="program__bg mt100">
    <div class="section">
        <div class="program">
            <div class="program__point">
                <h3>
                    [ парения ]
                </h3>
            </div>
            <div class="program__main">
                <div class="program__column program__inf">
                    <div class="program__title">
                        <h2>
                            Программы
                            <br>
                            парений
                        </h2>
                    </div>
                    <div class="program__text">
                        Арендуя баню, вы получаете возможность
                        насладиться ознакомительным парением. У нас
                        разработаны дополнительные уникальные
                        программы парений, которые подходят как для
                        новичков, так и для опытных любителей.
                    </div>
                </div>
                <div class="program__column">
                    <div class="program__img">
                        <img src="assets/img/program/program1.png" alt="">
                        <img class="pc" src="assets/img/program/program2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ---------------------------------PROGRAM-------------------------------------- -->

<!-- ---------------------------------OTZV-------------------------------------- -->
<div class="section" id="feedback">
    <div class="otzv mt100">
        <div class="otzv__point">
            <h3>
                [ отзывы ]
            </h3>
        </div>
        <div class="otzv__title">
            <h2>
                гости о нас
            </h2>
        </div>

        <div class="otzv__slider">
            <button class="slider-btn pc " id="preBtn"><img src="assets/img/ico/arrow-slider2.png" alt=""> </button>
            <div class="sliderotzv">

                <div class="slideot-container">
                    <?
                    if (count($feedbacks) > 0) {

                        foreach ($feedbacks as $feedback) {
                            $usid = $feedback['id_user'];
                            $sql = "SELECT * FROM `user` where `id` = '$usid'";
                            $query = $conn->query($sql);
                            $userotz = $query->fetch(PDO::FETCH_ASSOC);

                    ?>
                            <div class="otzv__column">
                                <div class="otzv__stars">
                                    <?
                                    for ($i = 0; $i < $feedback['rating']; $i++) {
                                    ?>
                                        <div class="otzv__star">
                                            ★
                                        </div>
                                    <?
                                    }
                                    ?>
                                </div>
                                <div class="otzv__text">
                                    <?= $feedback['coment'] ?>
                                </div>
                                <div class="otzv__client-name">
                                    <?= $userotz['name'] ?>
                                </div>
                                <div class="otzv__decor">
                                    <svg width="45" height="33" viewBox="0 0 45 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.53955 5.28251C7.38456 5.64932 6.73152 6.07002 5.91173 6.9756C4.94209 8.04666 4.554 9.14844 4.63555 10.599C4.81878 13.8645 7.72631 15.6229 11.1559 14.5426C12.4155 14.1457 12.8422 14.1473 13.2781 14.5508C13.8033 15.0367 14.0525 15.7734 14.0499 16.8331C14.0446 19.1191 13.1265 21.1927 11.3974 22.8237C10.4552 23.7126 7.61641 25.7312 6.95316 25.984C6.796 26.0438 6.73534 26.3343 6.73534 27.0257V27.9846L7.76427 27.6365C11.1343 26.4967 14.0347 24.3183 15.8616 21.5548C17.5114 19.0587 18.2394 16.4861 18.128 13.5453C18.051 11.5104 17.6649 10.1214 16.8079 8.79495C16.2494 7.93069 14.9583 6.63923 14.0414 6.02763C12.5699 5.0462 10.266 4.73419 8.53955 5.28251ZM30.1697 5.15671C28.5855 5.52745 26.9707 6.9208 26.4081 8.40287C26.1266 9.14435 26.0766 9.5237 26.1296 10.5176C26.2057 11.9412 26.5145 12.6342 27.4919 13.5759C28.8208 14.8558 30.3862 15.1643 32.4072 14.5444C33.705 14.1463 34.18 14.1446 34.6814 14.5361C35.1713 14.9189 35.3911 15.6675 35.3922 16.9575C35.394 19.0412 34.5775 20.904 32.8846 22.6777C31.9205 23.6882 29.5589 25.4193 28.4954 25.8954C28.1021 26.0715 28.0762 26.1425 28.0762 27.0416V28L29.0936 27.6197C32.8538 26.2141 35.7806 23.9187 37.586 20.9589C40.9638 15.4217 40.0666 9.09954 35.4752 6.08591C34.0292 5.13688 31.8706 4.75872 30.1697 5.15671Z"
                                            fill="black" />
                                    </svg>
                                </div>
                            </div>
                        <?
                        }
                    } else {
                        ?>
                        <p class="noteitem"> Список коментариев пуст</p>
                    <?
                    }
                    ?>
                </div>
            </div>
            <button class="slider-btn pc" id="nexBtn"><img src="assets/img/ico/arrow-slider1.png" alt=""></button>
        </div>
        <div class="our-btn">
            <a
                <?php
                if (empty($USER)) {
                ?>
                href="?page=login"
                <?
                } else {
                ?>
                id="open-modal"
                <?
                }
                ?>>
                Оставить коментарий
            </a>
        </div>
    </div>
</div>
<!-- ---------------------------------OTZV-------------------------------------- -->


<!-- ---------------------------------FAQ-------------------------------------- -->
<div class="section">
    <div class="faq mt100">
        <div class="faq__title">
            <h2>
                Часто задаваемые вопросы
            </h2>
        </div>
        <div class="faq__main">
            <div class="question">
                <button type="button" class="question-title">
                    <p>Можно ли забронировать баню онлайн?</p>
                    <div class="faq__title-cont"></div>
                </button>
                <div class="answer">Конечно! Вы можете забронировать интересующую вас баню прямо на нашем сайте.
                    Просто выберите дату, время и тип бани, и
                    следуйте инструкциям для завершения бронирования. Также возможна бронь по телефону у
                    администратора.</div>
            </div>

            <div class="question">
                <button type="button" class="question-title">
                    <p>Что нужно брать с собой в баню?</p>
                    <div class="faq__title-cont"></div>
                </button>
                <div class="answer">Мы предоставляем все необходимые принадлежности для парения (полотенце, тапочки,
                    шапки, килт/парео, одноразовое нижнее
                    белье). К нам можно приехать сразу после рабочего дня, и все необходимое уже будет в бане.</div>
            </div>

            <div class="question">
                <button type="button" class="question-title">
                    <p> Сколько стоит посещение бани на одного
                        человека?</p>
                    <div class="faq__title-cont"></div>
                </button>
                <div class="answer">Стоимость посещения варьируется в зависимости от выбранного типа бани, дня
                    недели и времени суток. Например, посещение
                    русской бани в будний день обойдется вам в X рублей, а в выходные дни цена составит Y рублей.
                    Актуальные цены всегда
                    можно узнать на нашем сайте или у администратора по телефону.</div>
            </div>

            <div class="question">
                <button type="button" class="question-title">

                    <p> Какие правила поведения действуют в вашем
                        бане?</p>
                    <div class="faq__title-cont"></div>

                </button>
                <div class="answer">Для обеспечения комфортного пребывания всех гостей, просим соблюдать следующие
                    правила: воздерживаться от громких
                    разговоров и музыки, уважать личное пространство других посетителей, не оставлять мусор и
                    следить за чистотой. Курение и
                    употребление алкоголя строго запрещены на всей территории комплекса.</div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div id="modal_сomplete" class="modal_сomplete">
    <div class="modal_complete-content">
        <span class="close" onclick="hideModal()">×</span>
        <p>Коментарий отправлен!</p>
    </div>
</div>

<script>
    function showModal() {
        var modal = document.getElementById("modal_сomplete");
        modal.classList.add("show");

        setTimeout(hideModal, 3000);
    }

    function hideModal() {
        var modal = document.getElementById("modal_сomplete");
        modal.classList.remove("show");
    }
</script>