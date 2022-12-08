<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include __DIR__ . "/partials/header.php";
include __DIR__ . "/model/Product.php";

// Check if the user is already logged in, if yes then redirect them to homepage
// if (isset($_SESSION["LoggedInUser"]) && $_SESSION["LoggedInUser"] === true) {
//     header("location: ./login.php");
//     exit;
// }

?>


<body>
    <main>
        <!-- Hero -->
        <div class="jumbotron mt-5 p-3 p-md-5 text-dark bg-light">
            <div class="col-md-6 px-0">
                <h1 class="display-4">Your shopping <i>Cart</i></h1>
                <p class="lead my-3">Some snazzy cart punchline???</p>
            </div>
        </div>
        <!-- Hero END -->

        <!-- Cart List  -->
        <div class="table-responsive m-5">

            <table class="table table-hover table-responsive-md">
                <thead>
                    <tr>
                        <th>Game Name</th>
                        <th>Platform</th>
                        <th>Rating</th>
                        <th>Genre</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php if (!empty($_SESSION['Cart'])) : ?>
                        <?php foreach ($_SESSION['Cart'] as $id) : ?>
                            <?php $item = new Product($id); ?>
                            <tr>
                                <td><?= $item->getName() ?></td>
                                <td><?php if($item->getIs_pc()) {
                                    echo "PC";
                                } elseif ($item->getIs_ps()) {
                                    echo "Playstation";
                                } else {
                                    echo "XBOX";
                                }
                                ?>
                                </td>
                                <td><?= $item->getRating() ?></td>
                                <td><?= $item->getGenre() ?></td>
                                <td>R <?= $item->getPrice() ?></td>
                                <td>
                                    <form action="./processing/remove-cart-item.php" method="post">
                                        <input type="hidden" name="productId" value="<?= $item->getId() ?>">
                                        <button type="submit" name="Submit" class="btn btn-light">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <h2>Your 🛒 is empty...</h2>
                    <?php endif ?>
                </tbody>
            </table>
            <form action="./processing/clear-cart.php" method="post">
                <input type="hidden" name="cart" value="">
                <button type="submit" name="Submit" class="btn btn-primary">
                    Clear Cart
                </button>
            </form>
        </div>
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>