<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta and link tags for character encoding, responsive design, and external stylesheets -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <!-- Main CSS file -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Page-specific CSS file -->
    <link rel="stylesheet" href="./assets/css/Index.css">
    <!-- Webpage title -->
    <title>Iniyan studios</title>
</head>

<body>
    <header>
        <!-- import nav bar from UI -->
        <?php include "ui/nav.php"; ?>
        <!-- content section inside the header -->
        <div class="headContent">
            <!-- Left side content with photographer's name and description -->
            <div class="headLeft">
                <div class="headName">Madhavan</div>
                <div class="headDescrip">a photographer</div>
                <button onclick="location.href = 'contact.php';" id="headButton">Contact me</button>
            </div>

            <!-- Right side decorative triangle elements for design -->
            <div class="headRight">
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
        <!-- Main logo displayed in the body of the webpage -->
        <div class="mainLogo"><img src="assets/img/svg/logoBlack.svg" alt="logo_image"></div>

        <!-- Image carousel showcasing portfolio images -->
        <div class="Carousel">
            <div class="slide">
                <!-- Carousel items with background images of portraits -->
                <div class="item" style="background-image:url(./assets/img/portrait1.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait2.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait3.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait4.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait5.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait6.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait7.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait8.jpg);"></div>
                <div class="item" style="background-image:url(./assets/img/portrait9.jpg);"></div>
                
            </div>

            <!-- Carousel navigation buttons for previous/next slides -->
            <div class="controlCarousel">
                <button id="prev" class="prev"><ion-icon name="chevron-back-outline"></ion-icon></button>
                <button id="next" class="next"><ion-icon name="chevron-forward-outline"></ion-icon></button>
            </div>
        </div>

        <!-- Main content section introducing the photographer -->
        <div class="mainContent">
            <div class="subContent1">
                <!-- Photographer's image -->
                <div class="photo">
                    <img src="assets/img/photo-bg.png" alt="photo">
                </div>

                <!-- About section with photographer's introduction -->
                <div class="about">
                    <h2>I'm Madhavan</h2>
                    <p>
                        Welcome to Iniyan Photography! I'm a passionate freelance photographer dedicated to
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
        <!-- Footer section with logo and social media icons -->
        <img class="logoFooter" src="assets/img/svg/logoWhite.svg" alt="logo">

        <!-- Social media links -->
        <div class="logoContact">
            <a href="https://www.instagram.com/" target=”_blank”><img src="assets/img/svg/insta.svg"
                    alt="instaLogo"></a>
            <a href="https://web.whatsapp.com/" target=”_blank”><img src="assets/img/svg/Whatsapp.svg"
                    alt="whatsappLogo"></a>
            <a href="https://www.facebook.com/" target=”_blank”><img src="assets/img/svg/fb.svg" alt="fbLogo"></a>
            <a href="https://x.com/?lang=en" target=”_blank”><img src="assets/img/svg/x.svg" alt="xLogo"></a>
        </div>

        <!-- Copyright notice -->
        <div class="copyRight">
            <img src="assets/img/svg/copyright.svg" alt="copyright">
            <p>Copyright reserved iniyan studios</p>
        </div>
    </footer>

    <!-- Linking external JavaScript files -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/index.js"></script>

    <!-- Ionicons library for the icons used in the carousel buttons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>