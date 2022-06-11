<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./index.js" defer></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./api/afficheAppoint.php">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="manifest" href="manifest.webmanifest">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500&display=swap" rel="stylesheet">

    <title>Appointment</title>
</head>

<body>
    <button class="add-button">Add to home screen</button>
    <div class="contain">
        <form data-aos="slide-right" class="form" action="./api/afficheAppoint.php" method="get">



            <div class="content">
                <h2>Appointment today</h2>
                <div class="appointday">
                    <?php foreach($appoints as $appoint): ?>
                    <div class="rdv">
                        <p>
                            <?= $appoint["time"] ?>
                        </p>
                        <div class="txtContent">
                            <h3>
                                <?= $appoint["title"] ?>
                            </h3>
                            <p>
                                <?= $appoint["date"] ?>
                            </p>
                        </div>
                        <hr>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="menuB">
                <span class="material-icons">home</span>
                <span class="material-icons">calendar_today</span>
                <a href="https://farmata-sidibe.github.io/appointment/appoint.html"><button class="material-icons">add</button></a>
                <span class="material-icons">calendar_month</span>
                <span class="material-icons">settings_applications</span>

            </div>

        </form>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            // Global settings:
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120, // offset (in px) from the original trigger point
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 400, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script>
</body>

</html>