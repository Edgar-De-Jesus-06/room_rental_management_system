<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/style/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Room Rental Management System</title>
</head>
<body>
    
    <main>

        <div class="container-fluid p-0 m-0 min-vh-100 bg-light d-flex align-content-center justify-content-between">
            <nav class="navbar navbar-expand-lg border position-absolute top-0 start-0 min-vh-100 d-flex flex-column"  style="width: 250px;">
                <div class="container-fluid p-0 d-flex flex-column">
                    <div class="container p-3 border-bottom d-flex align-content-center">
                        <i class="bi bi-building rounded-3 fs-4 p-1 text-light" style="background-color: #0f2573;"></i>
                        <div class="container">
                            <p class="fw-bolder m-0" style="color: #0f2573;">Room Rental</p>
                            <p class="text-secondary m-0 fw-medium" style="color: #0f2573; font-size: 12px;">Management System</p>
                        </div>
                    </div>
                    <div class="container p-3" style="height: 700px;">
                        <a href="./dashboard.php" class="nav-link text-secondary fw-medium p-2 rounded-3">
                            <i class="bi bi-bar-chart me-2"></i>
                            Dashboard
                        </a>
                        <a href="./rooms.php" class="nav-link text-secondary fw-medium p-2 rounded-3">
                            <i class="bi bi-building me-2"></i>
                            Rooms
                        </a>
                    </div>
                </div>
                <div class="container border-top p-3">
                    <button type="button" class="btn text-light w-100 fw-medium" style="background-color: #0f2573;">
                        Log out
                    </button>
                </div>
            </nav>
        </div>

    </main>

</body>
</html>