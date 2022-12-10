<?php
include __DIR__ . "/head.php";

// Check if the user is already logged in, if yes then redirect them to homepage
// if(!isset($_SESSION["LoggedInUser"])){

//     header("Location: ./index.php");
//     exit;
// }

?>

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark p-3 text-center">
        <button class="navbar-toggler text-center" type="button" data-bs-target="#navCollapse" data-bs-toggle="collapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navCollapse">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about.php">About Us</a>  
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./shop.php">E-Shop!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./lookbook.php">LookBook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">Contact</a>
                </li>
                <?php if(isset($_SESSION['Cart']) === true) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Login</a>
                    </li>
                <?php endif ?>
                    
            </ul>

        </div>
        
    </nav>
    <!-- Navbar END -->
</header>