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
        <div class="jumbotron jumbotron-fluid text-center bg-light d-flex align-items-center justify-content-center">
            <div class="container mt-5">
                <h1 class="mb-3 mt-5">Your shopping Cart</h1>
                <p class="mb-3">Some snazzy cart punchline???</p>
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
                    <?php if (isset($_SESSION['Cart'])) : ?>
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
                                                Delete (Change to trashcan icon?)
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