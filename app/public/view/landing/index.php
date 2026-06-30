<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/style/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <title>Room Rental Management System</title>

    <style>

        * {
            padding: 0;
            margin: 0;
            scroll-behavior: smooth;
        }

    </style>
</head>
<body>

    <?php require_once __DIR__ . "/../../../layout/SingIn.php"; ?>
    
    <header>
        <nav class="navbar navbar-expand-lg p-3">
            <div class="container">
                <a href="./index.php" class="navbar-brand fs-6 fw-bolder" style="color: #0f2573;">
                    <i class="bi bi-building rounded-3 p-1 me-1 text-light" style="background-color: #0f2573;"></i>
                    Room Rental <b class="text-secondary fw-light fs-6">· Juan Dela Cruz</b>
                </a>
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#rooms" class="nav-link text-secondary fw-medium">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link text-secondary fw-medium">Features</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link text-secondary fw-medium">Contact</a>
                        </li>
                    </ul>
                </div>
                <button class="btn text-light fw-medium rounded-3" style="background-color: #0f2573; width: 100px;" data-bs-toggle="modal" data-bs-target="#signIn">Sign In</button>   
            </div>
        </nav>
    </header>

</body>
</html>