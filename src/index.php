<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/Index.css">

    <title>Iniyan studios</title>
</head>

<body>
    <header>
        <nav>
            <div><img src="assets/img/svg/logoWhite.svg" alt="logo"></div>
            <div id="navList" class="navList">
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href="gallery.php">GALERIES</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="connection.php">CONNECTION</a></li>
            </div>
            <button id="menuBurger">
                <div id="burgerDiv" class="burgerDiv"></div>
            </button>

        </nav>
        <div class="headContent">
            <div class="headLeft">
                <div class="headName">Madhavan</div>
                <div class="headDescrip">a photographer</div>
                <button id="headButton">Contact me</button>
            </div>
            <div class="headRight">
                <!-- <img src="/assets/img/Group_triangle.svg" alt="group of photos"> -->
                <div class="imgDiv1">
                    <div class="triangle1"></div>
                    <div class="triangle2"></div>
                </div>
                <div class="imgDiv2">
                    <div class="triangle2"></div>
                    <div class="triangle1"></div>
                </div>
                <div class="imgDiv3">
                    <div class="triangle2"></div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="mainLogo"><img src="assets/img/svg/logoBlack.svg" alt="logo_image"></div>
        <div class="Carousel">
        <div class="slide">
                <div class="item" style="background-image:url(./assets/img/portrait1.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait2.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait3.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait4.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait5.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait6.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait7.jpg);"></div>
            </div>
            <div class="controlCarousel">
                <button id="prev" class="prev"><ion-icon name="chevron-back-outline"></ion-icon></button>
                <button id="next" class="next"><ion-icon name="chevron-forward-outline"></ion-icon></button>
            </div>
        </div>
        <div class="mainContent">
            <div class="subContent1">
                <div class="photo">
                    <img src="assets/img/photo-bg.png" alt="photo">
                </div>
                <div class="about">
                    <h2>I'm Madhavan</h2>
                    <p>
                        Welcome to [Your Name] Photography! I'm a passionate freelance photographer dedicated to
                        capturing life's most beautiful moments. With a keen eye for detail and a love for storytelling,
                        I specialize in portrait, event, and landscape photography. My mission is to create timeless
                        images that reflect the unique essence of each subject. Let's work together to turn your special
                        moments into lasting memories.
                    </p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <img class="logoFooter" src="assets/img/svg/logoWhite.svg" alt="logo">
        <div class="logoContact">
            <a href="https://www.instagram.com/" target=”_blank”><img src="assets/img/svg/insta.svg" alt="instaLogo"></a>
            <a href="https://web.whatsapp.com/" target=”_blank”><img src="assets/img/svg/Whatsapp.svg"
                    alt="whatsappLogo"></a>
            <a href="https://www.facebook.com/" target=”_blank”><img src="assets/img/svg/fb.svg" alt="fbLogo"></a>
            <a href="https://x.com/?lang=en" target=”_blank”><img src="assets/img/svg/x.svg" alt="xLogo"></a>
        </div>
        <div class="copyRight">
            <img src="assets/img/svg/copyright.svg" alt="copyright">
            <p>Copyright reserved iniyan studios</p>
        </div>

    </footer>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>