<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . "/partials/header.php";

?>


<body>
    <main>
        <!-- Hero -->
        <div class="jumbotron mt-5 p-3 p-md-5 text-white bg-dark">
            <div class="col-md-12 px-0">
                <h1 class="display-4">Lookbook 📖</h1>
                <p class="lead my-3">Some kinda gallery?</p>
            </div>
        </div>
        <!-- Hero END -->

        <!-- Display -->
        <div class="container">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8"><img src="./static/images/products/pc-D3.jpg"></div>
                <div class="col-6 col-md-4"><img src="./static/images/products/pc-ER.jpg"></div>
            </div>

            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="row">
                <div class="col-6 col-md-4"><img src="./static/images/products/pc-GTA.jpg"></div>
                <div class="col-6 col-md-4"><img src="./static/images/products/pc-HG.jpg"></div>
                <div class="col-6 col-md-4"><img src="./static/images/products/ps4-CH.jpg"></div>
            </div>

            <!-- Columns are always 50% wide, on mobile and desktop -->
            <div class="row">
                <div class="col-6"><img src="./static/images/products/ps4-FC5.jpg"></div>
                <div class="col-6"><img src="./static/images/products/ps5-ACV.jpg"></div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>