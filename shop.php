<!DOCTYPE html>
<html lang="en">

<?php

include __DIR__ . "/partials/header.php";
include __DIR__ . "/model/Product.php";

if (isset($_POST['PC']) || isset($_POST['PLAYSTATION']) || isset($_POST['XBOX'])) {
    $productID = Product::filter();
} else {
    $productID = Product::getAllProducts();
}

?>


<body>
    <main>
        <!-- Hero -->
        <div class="jumbotron mt-5 p-3 p-md-5 text-white bg-dark">
            <div class="col-md-12 px-0">
                <h1 class="display-4">Buy Games<i> Online!</i> 🌎</h1>
                <p class="lead my-3">We have games for <b>PS, XBOX & PC!</b></p>
            </div>
        </div>
        <!-- Hero END -->

        <!-- Filter Products Form -->
        <p class="display-6 text-center mt-2"><b>Filter by platform</b></p>
        <div class="d-flex justify-content-center mt-3">
            <form action="./shop.php" method="post">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-dark" type="submit" name="PC" value="PC">PC</button>
                    <button class="btn btn-outline-dark" type="submit" name="PLAYSTATION" value="PLAYSTATION">Playstation</button>
                    <button class="btn btn-outline-dark" type="submit" name="XBOX" value="XBOX">XBOX</button>
                </div>
            </form>
        </div>
        <!-- Filter Products Form END -->

        <!-- Cards: Display Games -->
        <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">
            <?php if (!empty($productID)) : ?>

                <?php foreach ($productID as $id) : ?>
                    <?php $product = new Product($id['id']); ?>

                    <div class="col-xl-4 col-md-6 d-flex justify-content-center">
                        <div class="card border-dark bg-dark text-white shadow card-size">
                            <img src="./static/images/products/<?= $product->getImage() ?>" class="card-img-top product-image" alt="<?= $product->getName() ?>">
                            <div class="card-body">
                                <div class="text-center">
                                    <h5 class="card-title text-center"><?= $product->getName() ?> </h5><span class="small mb-0 text-center"><?= $product->getRating() ?> <i class="fa-solid fa-star"></i></span>
                                    <p class="gameGenre text-center"><?= $product->getGenre() ?></p>
                                </div>
                                <p class="display-5 mt-3 text-center">R <?= $product->getPrice() ?></p>
                                <div class="d-flex flex-column align-items-center flex-fill">
                                    <span class="small"><?= $product->getStock() ?></span><p class="display-7 mb-1">left!</p>
                                </div>
                                <div class="container">
                                    <div class="d-flex justify-content-evenly">
                                        <div class="mt-3">
                                            <form action="./processing/process-session.php" method="post">
                                                <input type="hidden" name="productId" value="<?= $product->getId() ?>">
                                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#productModal<?= $product->getId() ?>"><i>Details</i></button>
                                                <?php if(isset($_SESSION['Cart']) === true) : ?>
                                                    <?php if (in_array($product->getId(), $_SESSION['Cart'])) : ?>
                                                        <button type="submit" name="Submit" class="btn btn-primary" disabled><i>Already in!</i></button>
                                                    <?php elseif ($product->getStock() == 0) : ?> 
                                                        <button type="submit" name="Submit" class="btn btn-danger" disabled><i>Out of Stock</i></button>
                                                    <?php else : ?>
                                                        <button type="submit" name="Submit" class="btn btn-primary"><i>Add to Cart</i></button>
                                                    <?php endif ?>
                                                    <?php elseif (empty($_SESSION["Cart"])) : ?>
                                                    <button type="submit" name="Submit" class="btn btn-danger" disabled><i>Log in to add!</i></button>
                                                <?php endif ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade mb-4" id="productModal<?= $product->getId() ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="./processing/process-session.php" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-4"><?= $product->getName() ?></h1>
                                        <p class="gameGenre"><?= $product->getGenre() ?></p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="100%" height="350" src=<?= $product->getTrailer_link() ?>></iframe>
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
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nah, lemme see others...</button>
                                        <?php if (isset($_SESSION['Cart']) === true) : ?>
                                            <?php if (in_array($product->getId(), $_SESSION['Cart'])) : ?>
                                                <button type="submit" name="Submit" class="btn btn-primary" disabled><i>Already in!</i></button>
                                            <?php elseif ($product->getStock() == 0) : ?> 
                                                <button type="submit" name="Submit" class="btn btn-danger" disabled><i>Out of Stock</i></button>
                                            <?php else : ?>
                                                <button type="submit" name="Submit" class="btn btn-primary"><i>Add to Cart</i></button>
                                            <?php endif ?>
                                            <?php elseif (empty($_SESSION["Cart"])) : ?> 
                                                <button type="submit" name="Submit" class="btn btn-danger" disabled><i>Log in to add!</i></button>
                                        <?php endif ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal END -->
                <?php endforeach ?>
            <?php else : ?>
                <h2>Sorry, the request could not be completed. Go back and refresh your browser</h2>
            <?php endif ?>
        </div>
        <!-- Cards: Display Games END -->
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>