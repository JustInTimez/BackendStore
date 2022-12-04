
<!DOCTYPE html>
<html lang="en">

<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include __DIR__ . "/partials/header.php";
include __DIR__ . "./model/Product.php";

$productID = Product::getAllProducts();
// var_dump($productID);
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
            <?php if ($productID): ?>
                <?php foreach ($productID as $id): ?>
                    <?php $product = new Product($id['id']); ?>

                    <div class="col-xl-4 col-md-6">
                    <div class="card border-dark bg-dark text-white shadow h-100">
                        <img src="./static/images/products/<?= $product->image ?>" height="270" class="card-img-top product-image" alt="<?= $product->name ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product->name ?></h5>
                                <div class="d-flex" >
                                    <div class="d-flex flex-column">
                                        
                                        <div class="mt-5">
                                            <form action="" method="post">
                                                <input type="hidden" name="productId" value="<?= $product->id ?>">
                                                <button type="submit" name="Submit" class="btn btn-light"><i>Book!</i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end flex-fill justify-content-end">
                                        <p class="display-5 lh-1 mb-1"><?= $product->price ?></p><span class="small mb-0"><?= $product->rating ?></span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </div>

                <?php endforeach ?>
                <?php else: ?>
                    Uhhhh
            <?php endif ?>
        </div>
        <!-- Cards: Display Games END -->
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>