<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . "/partials/header.php";
include __DIR__ . "/model/Order.php";

// Check if the user is already logged in, if yes then redirect them to homepage
// if (isset($_SESSION["LoggedInUser"]) && $_SESSION["LoggedInUser"] === true) {
//     header("location: ./login.php");
//     exit;
// }

$_SESSION['Cart'];
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
            <?php if(isset($_SESSION['Cart'])) ?>
                <?php foreach($_SESSION['Cart'] as $item) ?>
                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Game Name</th>
                                <th>Platform</th>
                                <th>Rating</th>
                                <th>Rating</th>
                                <th>Genre</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td><?= $item->$_SESSION['Cart'][0] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>R </td>
                                <td><button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#cancelModal' . $product->id . '">
                                        Cancel?
                                    </button></td>

                                <!-- Modal -->
                                <div class="modal fade" id="cancelModal' . $product->id . '" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="./processing/" method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">ADD NAME HERE</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="./static/images/products/' ADD IMAGE HERE FOR FILE PATH '" height="270" class="card-img-top product-image" alt="ADD NAME HERE">
                                                    <div>
                                                        <p class="fs-3">Want to Refund?</p>

                                                        <p class="fs-6">Please note that refunds can only be done within <i>24hrs (1 day) after a successful purchase</i>.<br><br>
                                                            Should you choose to cancel, we will check your validity and inform you.
                                                        </p>
                                                        <p class="fs-5 text-center">Are you sure you\'d like to cancel?</p>
                                                        <input type="hidden" name="productId" value="ADD PRODUCT ID HERE">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="confirmCancel" class="btn btn-dark">Yes, please refund me?</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                <?php endforeach ?>
            <?php else : ?>
                <h2>Sorry, there's nothing in yo cart ATM!</h2>
            <?php endif ?>


        </div>
    </main>

    <?php include __DIR__ . "/partials/footer.php"; ?>

</body>

</html>