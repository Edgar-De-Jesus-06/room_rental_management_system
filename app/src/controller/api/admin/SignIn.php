<?php

    session_start();

    require_once __DIR__ . "/../../../../../vendor/autoload.php";

    use app\model\admin\AdminModel;

    header("Content-Type: application/json; Charset=UTF-8");
    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $admin_email = filter_input(INPUT_POST, 'admin_email', FILTER_VALIDATE_EMAIL);
        $admin_pass = $_POST['admin_password'] ?? '';
        $admin_model = new AdminModel();

        if($admin_email === false || empty($admin_pass)) {
            http_response_code(400);
            echo json_encode([
                'message' => 'Bad Request',
                'status' => 400
            ]);
            exit();
        }

        $validate_admin = $admin_model->retrieveUsersData($admin_email);
        
        if($validate_admin) {
            if(password_verify($admin_pass, $validate_admin['password'])) {
                $_SESSION['admin_data'] = [
                    'full_name' => $validate_admin['full_name'],
                    'email' => $validate_admin['email'],
                    'role' => $validate_admin['role'],
                ];
                http_response_code(200);
                echo json_encode([
                    'message' => "OK",
                    'status' => 200
                ]);
                exit();
            } else {
                http_response_code(401);
                echo json_encode([
                    'message' => "Unauthorized",
                    'status' => 404
                ]);
                exit();
            }
        } else {
            http_response_code(404);
            echo json_encode([
                'message' => "Admin Not Found",
                'status' => 404
            ]);
            exit();
        }

    }