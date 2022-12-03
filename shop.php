<!DOCTYPE html>
<html lang="en">

<?php 
include __DIR__ . "/partials/header.php";
include __DIR__ . "./model/Product.php";

?>


<body>
    <main>
        <!-- Hero -->
        <div class="jumbotron jumbotron-fluid text-center bg-light d-flex align-items-center justify-content-center">
            <div class="container mt-5">
                <h1 class="mb-3 mt-5">Buy Games Online!</h1>
                <p class="mb-3">We have games for PS, XBOX & PC!</p>
            </div>
        </div>
        <!-- Hero END -->

        <!-- Cards: Display Games -->
        <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">
            <? var_dump(Product::getAllProducts($id)); ?>
        </div>
        <!-- Cards: Display Games END -->
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>