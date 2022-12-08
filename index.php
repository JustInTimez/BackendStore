<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . "/partials/header.php";
include __DIR__ . "/model/Product.php";

// Check if the user is already logged in, if yes then redirect them to homepage
// if (isset($_SESSION["LoggedInUser"]) && $_SESSION["LoggedInUser"] === true) {
//     header("location: ./login.php");
//     exit;
// }

$featProducts = Product::displayFeatured();
$latestProducts = Product::displayLatest();
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
        <h3 class="mb-3 mt-3 text-center display-6">Check out our <i>FEATURED</i> games!</h3>
        <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">
            <?php if ($featProducts) : ?>

                <?php foreach ($featProducts as $id) : ?>
                    <?php $product = new Product($id); ?>

                    <div class="col-xl-4 col-md-6">
                        <div class="card border-dark bg-dark text-white shadow h-100">
                            <img src="./static/images/products/<?= $product->getImage() ?>" class="card-img-top product-image" alt="<?= $product->getName() ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->getName() ?></h5><span class="small mb-0"><?= $product->getRating() ?></span>
                                <div class="d-flex flex-column align-items-end flex-fill justify-content-end">
                                    <p class="display-7 lh-1 mb-1">Stock:</p><span class="small mb-0"><?= $product->getStock() ?></span>
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <div class="mt-5">
                                            <form action="./processing/process-session.php" method="post">
                                                <input type="hidden" name="productId" value="<?= $product->getId() ?>">
                                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#productModal<?= $product->getId() ?>"><i>Details</i></button>
                                                <button type="submit" name="Submit" class="btn btn-primary" <?= in_array($product->getId(), $_SESSION['Cart']) ? 'disabled' : "" ?>><i><?= in_array($product->getId(), $_SESSION['Cart']) ? '<b>Already in!</b>' : "Add to Cart" ?></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end flex-fill justify-content-end">
                                        <p class="display-5 lh-1 mb-1">R <?= $product->getPrice() ?></p><span class="small mb-0"><?= $product->getRating() ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="productModal<?= $product->getId() ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form action="./processing/process-session.php" method="post">
                                    <div class="modal-header">
                                        <!-- Try add in the genres as category pills next to the title in a row. Perhaps also use on the base card? -->
                                        <h1 class="modal-title fs-4"><?= $product->getName() ?></h1>
                                        <p class="gameGenre"><?= $product->getGenre() ?></p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Idea: Use iframe or API instead of image to call to a YT trailer video for the selected game? -->
                                        <img src="./static/images/products/<?= $product->getImage() ?>" class="card-img-top product-image" alt="<?= $product->getName() ?>">
                                        <div>
                                            <p class="fs-5 text-center">Description:</p>
                                            <p><?= $product->getDescription() ?></p>
                                            <p class="display-5 lh-1 mb-1">R <?= $product->getPrice() ?></p>

                                            <p class="fs-5 text-center">Play <?= $product->getName() ?> <i>today!</i></p>

                                            <!-- Hidden field for productID -->
                                            <input type="hidden" name="productId" value="<?= $product->getId() ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nah, lemme see the others...</button>
                                        <button type="submit" name="Submit" class="btn btn-primary" <?= in_array($product->getId(), $_SESSION['Cart']) ? 'disabled' : "" ?>><i><?= in_array($product->getId(), $_SESSION['Cart']) ? 'Already in!' : "Add to Cart" ?></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else : ?>
                <h2>Sorry, the request could not be completed. Go back and refresh your browser</h2>
            <?php endif ?>
        </div>
        <!-- Featured GAMES Display END -->

        <!-- New Additions GAMES Display -->
        <h4 class="mb-3 mt-3 text-center display-6">Our <i>LATEST</i> additions...</h4>
        <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">
            <?php if ($latestProducts) : ?>

                <?php foreach ($latestProducts as $id) : ?>
                    <?php $product = new Product($id); ?>

                    <div class="col-xl-4 col-md-6">
                        <div class="card border-dark bg-dark text-white shadow h-100">
                            <img src="./static/images/products/<?= $product->getImage() ?>" class="card-img-top product-image" alt="<?= $product->getName() ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->getName() ?></h5><span class="small mb-0"><?= $product->getRating() ?></span>
                                <div class="d-flex flex-column align-items-end flex-fill justify-content-end">
                                    <p class="display-7 lh-1 mb-1">Stock:</p><span class="small mb-0"><?= $product->getStock() ?></span>
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <div class="mt-5">
                                            <form action="./processing/process-session.php" method="post">
                                                <input type="hidden" name="productId" value="<?= $product->getId() ?>">
                                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#productModal<?= $product->getId() ?>"><i>Details</i></button>
                                                <button type="submit" name="Submit" class="btn btn-primary" <?= in_array($product->getId(), $_SESSION['Cart']) ? 'disabled' : "" ?>><i><?= in_array($product->getId(), $_SESSION['Cart']) ? '<b>Already in!</b>' : "Add to Cart" ?></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end flex-fill justify-content-end">
                                        <p class="display-5 lh-1 mb-1">R <?= $product->getPrice() ?></p><span class="small mb-0"><?= $product->getRating() ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="productModal<?= $product->getId() ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form action="./processing/process-session.php" method="post">
                                    <div class="modal-header">
                                        <!-- Try add in the genres as category pills next to the title in a row. Perhaps also use on the base card? -->
                                        <h1 class="modal-title fs-4"><?= $product->getName() ?></h1>
                                        <p class="gameGenre"><?= $product->getGenre() ?></p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Idea: Use iframe or API instead of image to call to a YT trailer video for the selected game? -->
                                        <img src="./static/images/products/<?= $product->getImage() ?>" class="card-img-top product-image" alt="<?= $product->getName() ?>">
                                        <div>
                                            <p class="fs-5 text-center">Description:</p>
                                            <p><?= $product->getDescription() ?></p>
                                            <p class="display-5 lh-1 mb-1">R <?= $product->getPrice() ?></p>

                                            <p class="fs-5 text-center">Play <?= $product->getName() ?> <i>today!</i></p>

                                            <!-- Hidden field for productID -->
                                            <input type="hidden" name="productId" value="<?= $product->getId() ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nah, lemme see the others...</button>
                                        <button type="submit" name="Submit" class="btn btn-primary" <?= in_array($product->getId(), $_SESSION['Cart']) ? 'disabled' : "" ?>><i><?= in_array($product->getId(), $_SESSION['Cart']) ? 'Already in!' : "Add to Cart" ?></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else : ?>
                <h2>Sorry, the request could not be completed. Go back and refresh your browser</h2>
            <?php endif ?>

        </div>
        <!-- New Additions GAMES Display END -->






    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>