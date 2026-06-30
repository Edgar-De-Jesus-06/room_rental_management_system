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
                
                <div class="container-fluid">

                </div>
            </div>
        </div>

    </main>

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

        })
        
    </script>
</body>
</html>