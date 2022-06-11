<?php
require_once("./api.php");
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['title'])&& isset($_POST['date'])&& isset($_POST['time'])){
    $result = $pdo->insertAppoint($_POST['name'],$_POST['email'],$_POST['title'],$_POST['date'],$_POST['time']);
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./index.js" defer></script>

    <link rel="stylesheet" href="./css/Appoint.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="manifest" href="manifest.webmanifest">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/djibe/bootstrap-material-datetimepicker@6659d24c7d2a9c782dc2058dcf4267603934c863/css/bootstrap-material-datetimepicker-bs4.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/moment/moment@develop/min/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/djibe/bootstrap-material-datetimepicker@83a10c38ee94dd27fd946ea137af6667c65a738f/js/bootstrap-material-datetimepicker-bs4.min.js"></script>

    <title>Appointment</title>
</head>

<body>
    <button class="add-button">Add to home screen</button>
    <div class="contain">
        <form data-aos="slide-left" action="./api/insertAppoint.php" class="formAppoint" method="POST">
            <a href="https://farmata-sidibe.github.io/appointment/index.html"><span class="material-icons">
                keyboard_backspace
            </span></a>
            <h2>Schedule an Appointment</h2>
            <div class="appoint">
                <label class="label">Name</label>
                <input type="text" class="form-input otherInput" name="name" id="name">
                <label class="label">Email</label>
                <input type="text" class="form-input otherInput" name="email" id="email">
                <label class="label">Title Appointment</label>
                <input type="text" class="form-input otherInput" name="title" id="title">
                <label class="label">Appointment Time</label>
                <div class="input-group">

                    <input name="date" class="form-input" id="datepicker" type="text" placeholder="Choose a date">
                    <div class="input-group-prepend">
                        <span class="input-group-text span"><i class="material-icons">event</i></span>
                    </div>
                </div>
                <div class="input-group">

                    <input name="time" class="form-input" id="timepicker" type="text" placeholder="Choose time">
                    <div class="input-group-prepend">
                        <span class="input-group-text span"><i class="material-icons">event</i></span>
                    </div>
                </div>


            </div>
            <div class="btnB">
                <button class="btnConfirm">Confirm</button>
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