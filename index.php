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
                <h1 class="mb-3 mt-5">Looking for some games?</h1>
                <p class="mb-3">Check out our offerings below!</p>
            </div>
        </div>
        <!-- Hero END -->

        <!-- Cards: Display Games -->
        <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">
            
        </div>
        <!-- Cards: Display Games END -->
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>