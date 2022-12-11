<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . "/partials/header.php";

?>

<body>

    <!-- Hero -->
    <div class="jumbotron mt-5 p-3 p-md-5 text-white bg-dark">
        <div class="col-md-12 px-0">
            <h1 class="display-4">So, you want in, huh? 😎</h1>
            <p class="lead my-3">Great choice. I like your style!</p>
        </div>
    </div>
    <!-- Hero END -->

    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6">Register:
                <form action="./processing/process-register.php" method="post">
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

            <div class="col-lg-6">Login:
                <form action="./processing/process-login.php" method="post">
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
    </div>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>