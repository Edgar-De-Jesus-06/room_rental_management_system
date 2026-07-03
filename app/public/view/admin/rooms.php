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
    <link rel="stylesheet" href="../../../assets/style/navigation.css">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Room Rental Management System</title>
</head>

<body>

    <div class="modal fade" id="room_btn" tabindex="-1" aria-labelledby="room_btn" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h1 class="modal-title fs-6 fw-bold" id="modalTitle">Add New Room</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="container p-0">
                        <div class="container p-0 m-0">
                            <label for="room_num" class="form-label fw-medium text-secondary">Room Number</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light text-secondary"><i class="bi bi-123"></i></span>
                                <input type="text" class="form-control bg-light" placeholder="e.g 201" name="room_num" id="room_num" required>
                            </div>
                        </div>
                        <div class="container p-0 mb-2 d-flex align-content-center justify-content-between">
                            <div class="container p-0 me-3">
                                <label for="type" class="form-label fw-medium text-secondary">Type</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary"><i class="bi bi-tag"></i></span>
                                    <select name="type" id="type" class="form-select bg-light fw-medium">
                                        <option value="solo" selected>Solo</option>
                                        <option value="duo">Duo</option>
                                        <option value="studio">Studio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="container p-0 me-3">
                                <label for="floor" class="form-label fw-medium text-secondary">Floor</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary"><i class="bi bi-arrow-up-square"></i></span>
                                    <input type="number" class="form-control bg-light fw-medium text-secondary" min="1" max="5" name="floor" id="floor" required>
                                </div>
                            </div>
                        </div>
                        <div class="container p-0 mb-2">
                            <label for="rent_price" class="form-label fw-medium text-secondary">Monthly Price (₱)</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light text-secondary"><i class="bi bi-currency-exchange"></i></span>
                                <input type="number" class="form-control bg-light" placeholder="e.g 5000" min="1" max="5000" name="rent_price" id="rent_price" required>
                            </div>
                        </div>
                        <div class="container p-0 mb-2">
                                <label for="status" class="form-label fw-medium text-secondary">Status</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary"><i class="bi bi-tag"></i></span>
                                    <select name="status" id="status" class="form-select bg-light fw-medium">
                                        <option value="available" selected>Available</option>
                                        <option value="occupied">Occupied</option>
                                        <option value="maintenance">Maintenance</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-light w-100 fw-medium" style="background-color: #0f2573;" name="add_room" id="add_room">Add Room</button>
                </div>
            </div>
        </div>
    </div>

    <main>

        <div class="container-fluid p-0 m-0 min-vh-100 bg-light d-flex align-content-center justify-content-between">
            <?php include __DIR__ . "/../../../layout/adminNav.php"; ?>

            <div class="container-fluid p-0 bg-light">
                <div class="container mw-100 p-4 m-0 bg-white border-bottom  d-flex align-content-center justify-content-between">
                    <div class="container p-0 m-0">
                        <h1 class="fs-5 fw-bold m-0" style="color: #0f2573;">Room Management</h1>
                        <p class="m-0 text-secondary fw-medium" style="font-size: 12px;"><?php echo date('F d, Y'); ?> Admin View</p>
                    </div>
                    <button type="button" class="btn btn-white text-secondary fw-medium border rounded-5"><i class="bi bi-bell"></i></button>
                </div>

                <div class="container p-4 m-0 mw-100 d-flex align-content-center justify-content-between">
                    <div class="container p-0 m-0 d-flex align-content-center">
                        <div class="input-group w-25">
                            <span class="input-group-text bg-white text-secondary"><i class="bi bi-search"></i></span>
                            <input type="search" class="form-control bg-white" placeholder="Search rooms..." name="search_rooms" id="search_rooms">
                        </div>
                        <a href="#" class="nav-link fw-medium border rounded-3 p-2 ms-3">All</a>
                        <a href="#" class="nav-link fw-medium border rounded-3 p-2 ms-3">Occupied</a>
                        <a href="#" class="nav-link fw-medium border rounded-3 p-2 ms-3">Available</a>
                        <a href="#" class="nav-link fw-medium border rounded-3 p-2 ms-3">Maintenance</a>
                    </div>
                    <button class="btn fw-medium text-light" style="background-color: #0f2573; width: 150px;" data-bs-toggle="modal" data-bs-target="#room_btn">
                        <i class="bi bi-plus-lg me-2"></i>Add Room
                    </button>
                </div>
            </div>
        </div>

    </main>

</body>

</html>