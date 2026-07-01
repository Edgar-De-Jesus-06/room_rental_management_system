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

    <style>

        * {
            padding: 0;
            margin: 0;
            scroll-behavior: smooth;
        }

        #tenant_sign_in, #admin_sign_in {
            background-color: whitesmoke;
            color: #0f2573;
        }

        #tenant_sign_in:hover, #admin_sign_in:hover {
            background-color: #0f2573;
            color: whitesmoke;
            transition: .2s ease;
        }

        .nav-link {
            color: gray;
        }

        .nav-link:hover {
            color: #0f2573;
            transition: .2s ease;
        }
    </style>
</head>
<body>

    <?php require_once __DIR__ . "/../../../layout/SignIn.php"; ?>
    
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
                            <a href="#rooms" class="nav-link fw-medium">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link fw-medium">Features</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link fw-medium">Contact</a>
                        </li>
                    </ul>
                </div>
                <button class="btn text-light fw-medium rounded-3" id="sign_in" name="sign_in" style="background-color: #0f2573; width: 100px;" data-bs-toggle="modal" data-bs-target="#signIn">Sign In</button>   
            </div>
        </nav>
    </header>

    <main>
        
        <div class="container-fluid p-5" style="background-color: #0f2573; min-height: 70vh;">
            <div class="container mt-5">
                <h6 class="fw-medium border border-light bg-light rounded-5 text-center p-1" style="color: #0f2573; width: 330px;">
                    Now accepting new tenants for <?php echo date('F Y'); ?>
                </h6>
                <h1 class="text-light mt-4 mb-4" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 3.5rem;">
                    Your Home Away<br>
                    From Home.
                </h1>
                <p class="text-light fw-medium w-50">
                    Affordable, well-managed rooms in a safe and comfortable boarding house. Bills, maintenance, and communication — all handled online.
                </p>

                <div class="container p-0 mt-4 d-flex align-content-center">
                    <button type="button" class="btn btn-success fw-medium text-light rounded-4" style="width: 170px; height: 45px;" data-bs-toggle="modal" data-bs-target="#signIn">
                        Tenant Sign In<i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
            <div class="container-fluid mt-5 d-flex align-content-center justify-content-between">
                <div class="container p-4 rounded-4 bg-light d-flex flex-column text-center" style="width: 150px;">
                    <h3 class="fw-bold" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:#0f2573;">
                        50
                    </h3>
                    <p class="fw-medium fs-6" style="color:#0f2573;">
                        Total Rooms
                    </p>
                </div>
                <div class="container p-4 rounded-4 bg-light d-flex flex-column text-center" style="width: 150px;">
                    <h3 class="fw-bold" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:#0f2573;">
                        45
                    </h3>
                    <p class="fw-medium fs-6" style="color:#0f2573;">
                        Happy Tenants
                    </p>
                </div>
                <div class="container p-4 rounded-4 bg-light d-flex flex-column text-center" style="width: 150px;">
                    <h3 class="fw-bold" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:#0f2573;">
                        3
                    </h3>
                    <p class="fw-medium fs-6" style="color:#0f2573;">
                        Floors 3
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5" style="min-height: 60vh;" id="rooms">
            <div class="container d-flex flex-column mb-4">
                <p class="text-success m-0 fw-medium" style="font-family: 'Courier New', Courier, monospace;">
                    Availability
                </p>
                <h1 class="text-dark fs-2 mt-1 mb-1" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    Available Rooms
                </h1>
                <p class="text-secondary fs-6 fw-medium">
                    Move in as early as next week. Utilities included in select units.
                </p>
            </div>
            <div class="container">
                
            </div>
        </div>

        <div class="container-fluid p-5"  style="min-height: 60vh; background-color: #0f2573;" id="features">
            <div class="container">
                <p class="text-success m-0 fw-medium" style="font-family: 'Courier New', Courier, monospace;">
                    Why Room Rental
                </p>
                <h1 class="text-light fs-2 mt-1 mb-1" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    Everything Managed Online
                </h1>
                <p class="text-light fs-6 fw-medium w-50">
                    No more knocking on doors for receipts or writing complaints on paper. Our system keeps you connected.
                </p>
            </div>
            <div class="container mt-5 d-flex align-content-center justify-content-between">
                <div class="card w-25 p-2 bg-light border border-secondary">
                    <div class="card-body">
                        <i class="bi bi-wallet text-success p-2 bg-success-subtle border border-success-subtle rounded-3 fs-5"></i>
                        <h1 class="card-title text-dark mt-3 fs-5 fw-bold">
                            Easy Online Billing
                        </h1>
                        <p class="card-text text-secondary fs-6 fw-light">
                            View and track your monthly rent, water, and electricity bills all in one place. No more paper receipts.
                        </p>
                    </div>
                </div>
                <div class="card w-25 p-2 bg-light border border-secondary">
                    <div class="card-body">
                        <i class="bi bi-tools text-success p-2 bg-success-subtle border border-success-subtle rounded-3 fs-5"></i>
                        <h1 class="card-title text-dark mt-3 fs-5 fw-bold">
                            Submit Maintenance Requests
                        </h1>
                        <p class="card-text text-secondary fs-6 fw-light">
                            Report any room or facility issues directly through the portal. Track status from Pending to Resolved.
                        </p>
                    </div>
                </div>
                <div class="card w-25 p-2 bg-light border border-secondary">
                    <div class="card-body">
                        <i class="bi bi-bell text-success p-2 bg-success-subtle border border-success-subtle rounded-3 fs-5"></i>
                        <h1 class="card-title text-dark mt-3 fs-5 fw-bold">
                            Smart Notifications
                        </h1>
                        <p class="card-text text-secondary fs-6 fw-light">
                            Receive timely reminders for upcoming due dates and announcements from management.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5" style="min-height: 60vh;" id="contact">
            <div class="container d-flex align-content-center justify-content-between">
                <div class="container">
                    <p class="text-success m-0 fw-medium" style="font-family: 'Courier New', Courier, monospace;">
                        Get in Touch
                    </p>
                    <h1 class="text-dark fs-2 mt-1 mb-1" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        Contact Us
                    </h1>
                    <p class="text-secondary fs-6 fw-medium">
                        Interested in renting a room or have questions? Reach out to us and we will get back to you as soon as possible.
                    </p>

                    <div class="container p-0 mt-4">
                        <p class="text-secondary fs-6 fw-medium mb-4">
                            <i class="bi bi-geo-alt text-primary border border-secondary-subtle bg-secondary-subtle p-2 rounded-3 me-2"></i>
                            Blk 3 Lot 32 P2 A3 Longos Malabon City
                        </p>
                        <p class="text-secondary fs-6 fw-medium mb-4">
                            <i class="bi bi-telephone text-primary border border-secondary-subtle bg-secondary-subtle p-2 rounded-3 me-2"></i>
                            +639673108067
                        </p>
                        <p class="text-secondary fs-6 fw-medium">
                            <i class="bi bi-envelope text-primary border border-secondary-subtle bg-secondary-subtle p-2 rounded-3 me-2"></i>
                            edgarb.dejesus@gmail.com
                        </p>
                    </div>
                </div>
                <div class="container border rounded-4 shadow-lg p-4 ms-5">
                    <h1 class="text-dark fs-5 fw-medium">
                        Send a Message
                    </h1>
                    <form action="" method="post">
                        <div class="input-group mt-4 mb-3">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control bg-light" placeholder="Your name" name="inquire_name" id="inquire_name" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="email" class="form-control bg-light" placeholder="Client@gmail.com" name="inquire_email" id="inquire_email" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <textarea class="form-control bg-light" placeholder="Your Message Here..." name="inquire_message" id="inquire_message" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn w-100 fw-medium text-light" style="background-color: #0f2573;">
                            <i class="bi bi-send me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <div class="container-fluid border p-4">
            <div class="container d-flex align-content-center justify-content-between">
                <div class="container">
                    <h1 class="text-dark fs-6 fw-bold">
                        <i class="bi bi-building rounded-3 p-1 me-1 text-light" style="background-color: #0f2573;"></i>
                        Room Rental
                    </h1>
                </div>
                <div class="container">
                    <p class="text-secondary fs-6 fw-light">
                        © 2026 Juan Dela Cruz · Room Rental Management System
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>

        $(document).ready(function() {
            
            $('#tenant_sign_in').on('click', function(e) {
                e.preventDefault();
                
                $('#default_form').html('');
                $('#admin_form').html('');
                $('#tenant_form').html(`<label for="client_email" class="text-secondary fw-medium mb-1">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-light" style="color: #0f2573;"><i class="bi bi-person"></i></span>
                                            <input type="email" class="form-control bg-light" placeholder="edgar@gmail.com" name="client_email" id="client_email" required>
                                        </div>
                                        <label for="client_password" class="text-secondary fw-medium mb-1">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light" style="color: #0f2573;"><i class="bi bi-shield-lock"></i></span>
                                            <input type="password" class="form-control bg-light" placeholder="••••••••" name="client_password" id="client_password" required>
                                        </div>`)
            })

            $('#admin_sign_in').on('click', function(e) {
                e.preventDefault()

                $('#default_form').html('');
                $('#tenant_form').html('');
                $('#admin_form').html(`<label for="admin_email" class="text-secondary fw-medium mb-1">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-light" style="color: #0f2573;"><i class="bi bi-person"></i></span>
                                            <input type="email" class="form-control bg-light" placeholder="admin@gmail.com" name="admin_email" id="admin_email" required>
                                        </div>
                                        <label for="admin_password" class="text-secondary fw-medium mb-1">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light" style="color: #0f2573;"><i class="bi bi-shield-lock"></i></span>
                                            <input type="password" class="form-control bg-light" placeholder="••••••••" name="admin_password" id="admin_password" required>
                                        </div>`)
            })

            $('#sign_in').on('click', function(e) {
                e.preventDefault();

                let form_validate = {
                    'sign_in': true,
                    'client_email': $('#client_email').val(),
                    'client_password': $('#client_password').val(),
                }
                
                if(form_validate.client_email == '' || form_validate.client_password == '') {
                    $('.error_sign_in_message').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <strong>Empty Field</strong> You should check in on some of those fields below.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>`);
                } else {
                    $('.error_sign_in_message').html(``);
                }
            })

        })
        
    </script>
</body>
</html>