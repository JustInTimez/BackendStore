<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . "/partials/header.php";


// Check if the user is already logged in, if yes then redirect them to homepage
// if (isset($_SESSION["LoggedInUser"]) && $_SESSION["LoggedInUser"] === true) {
//     header("location: ./home.php");
//     exit;
// }

?>

<body>

    <main>
        <!-- Hero -->
        <div class="jumbotron jumbotron-fluid text-center bg-light d-flex align-items-center justify-content-center">
            <div class="container mt-5">
                <h1 class="mb-3 mt-5">Looking for GAMES?</h1>
                <p class="mb-3">Check our offerings for PC, XBOX and Playstation!</p>
            </div>
        </div>
        <!-- Hero END -->

        <!-- Cards: Hotels -->
        <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">
            <? Hotel::getAllHotels(); ?>
        </div>
        <!-- Cards: Hotels END -->

    </main>

    <!-- <div class="container text-center">
        <div class="row">
            <div class="col-lg-6">Register:
                <form action="./processes/process-register.php" method="post">
                    <div class="mb-3">
                        <label for="RegInputName" class="form-label">Name*</label>
                        <input type="text" name="RegInputName" class="form-control" id="RegInputName" required>
                    </div>
                    <div class="mb-3">
                        <label for="RegInputSurname" class="form-label">Surname</label>
                        <input type="text" name="RegInputSurname" class="form-control" id="RegInputSurname">
                    </div>
                    <div class="mb-3">
                        <label for="RegInputEmail" class="form-label">Email*</label>
                        <input type="email" name="RegInputEmail" class="form-control" id="RegInputEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="RegInputPassword" class="form-label">Password*</label>
                        <input type="password" name="RegInputPassword" class="form-control" id="RegInputPassword" required>
                    </div>
                    <button type="submit" name='Submit' class="btn btn-dark">Submit</button>
                </form>
            </div>

            <div class="col-lg-6">Customer/Staff Login:
                <form action="./processes/process-login.php" method="post">
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email*</label>
                        <input type="email" class="form-control" name="LoginEmail" id="InputEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label">Password*</label>
                        <input type="password" class="form-control" name="LoginPassword" id="InputPassword" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
        <p>* Indicates required field</p>
    </div> -->

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>