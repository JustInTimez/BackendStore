<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . "/partials/header.php";


// Check if the user is already logged in, if yes then redirect them to homepage
// if (isset($_SESSION["LoggedInUser"]) && $_SESSION["LoggedInUser"] === true) {
//     header("location: ./login.php");
//     exit;
// }

?>


<body>
    <main>

        <!-- Hero -->
        <div class="jumbotron jumbotron-fluid text-center bg-light d-flex align-items-center justify-content-center">
            <div class="container mt-5">
                <h1 class="mb-3 mt-5">About Us</h1>
                <p class="mb-3">Some snazzy punchline?</p>
            </div>
        </div>
        <!-- Hero END -->

        <h2 class="text-center my-5">Wanna visit us?</h2>
        <div class="maps-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.6993033604444!2d18.63279031525808!3d-33.871639526637644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc50b0ac0a214f%3A0x66973f0ada04f5e1!2sBattle%20Bunker!5e0!3m2!1sen!2sza!4v1670333667516!5m2!1sen!2sza" width="1200" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>