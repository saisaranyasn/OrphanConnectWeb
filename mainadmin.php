<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("Location: alogin.html"); // Redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="orplogo.jpeg">
                </span>
                <div class="text header-text">
                    <span class="name">OrphanConnect</span>
                </div>
            </div>
            <i class="fa fa-ellipsis-h toggle" style="color: black;"></i>
        </header>
        <div class="menu-bar">
            <div class="menu-m">
                <li class="search-box">
                    <i class="fa fa-search icons"></i>
                    <input type="search" placeholder="Search...">
                </li>
                <div class="menu-links">
                <li class="nav-link">
                        <a href="mainuser.php">
                            <i class="fa fa-user icons" style="font-size: 25px;"></i>
                            <span class="text nav-text">&nbsp;&nbsp;User</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="maindonate.php">
                            <i class="fa fa-gift icons" style="font-size: 25px;"></i>
                            <span class="text nav-text">&nbsp;&nbsp;Donation</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="mainadopt.php">
                            <i class="fa fa-child-reaching icons" style="font-size: 25px;"></i>
                            <span class="text nav-text">&nbsp;&nbsp;Adoption</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="initial.html">
                            <i class="fa fa-sign-out icons" style="font-size: 25px;"></i>
                            <span class="text nav-text">&nbsp;&nbsp;Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <section class="home">
        <div class="text">
            <div class="container">
            <h2>Welcome, <?php echo $_SESSION['admin_email']; ?>!</h2>
            <img src="orplogo.jpeg" alt="Logo" class="center-logo"><br>
            <h2>
"OrphanConnect: A Digital Bridge Between Donors and Orphanage"</h2>


<h4>Empowering Humanity | Enabling Transparency | Supporting Orphans</h4>
            </div>
        </div>
    </section>
            </div>
        </div>
    </section>
    <script src="main.js"></script>
</body>

</html>