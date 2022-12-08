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
        <div class="jumbotron mt-5 p-3 p-md-5 text-white bg-dark">
            <div class="col-md-12 px-0">
                <h1 class="display-4">Looking for some <i class="slogan-text">games?</i> 😎</h1>
                <p class="lead my-3">Welcome to the <b>best</b> place to find GAMES!</p>
            </div>
        </div>
        <!-- Hero END -->

        <div class="jumbotron jumbotron-fluid text-center bg-light d-flex align-items-center justify-content-center">
            <div class="container">
                <h1 class="mb-3 mt-3">No <i>seriously</i>, we've got games!</h1>
                <p class="mb-3">I don't know why you'd look anywhere else - Kahjiit 😺 has <a href="./shop.php">wares if you have coin</a>. . .</p>
            </div>
        </div>

        <!-- Featured GAMES Display -->
        <h3 class="mb-3 mt-3 text-center display-6">Check out our <i>FEATURED</i> games!</h1>
            <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">


            </div>
        <!-- Featured GAMES Display END -->

        <!-- New Additions GAMES Display -->
        <h4 class="mb-3 mt-3 text-center display-6">Our <i>LATEST</i> additions...</h1>
            <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">


            </div>
        <!-- New Additions GAMES Display END -->






    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>