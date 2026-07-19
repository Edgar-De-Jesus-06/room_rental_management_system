<?php 

    session_start();

    require_once __DIR__ . "/../../../../../vendor/autoload.php";

    use app\model\admin\RoomModel;

    header("Content-Type: application/json; Charset=UTF-8");
    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    $room_model = new RoomModel();

    if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['add_room'])) {
        $room_num = filter_input(INPUT_POST, 'room_num', FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        $floor = filter_input(INPUT_POST, 'floor', FILTER_VALIDATE_INT);
        $rent_price = filter_input(INPUT_POST, 'rent_price', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);

        if($room_num == null || empty($type) || $floor == null || $rent_price == null || empty($status)) {
            http_response_code(400);
            echo json_encode([
                'message' => 'Bad Request',
                'status'  => 400
            ]);
            exit();
        }

        $room_model->room_no = $room_num;
        $room_model->type    = $type;
        $room_model->floor   = $floor;
        $room_model->price   = $rent_price;
        $room_model->status  = $status;

        $validate_if_room_is_exist = $room_model->countNumberOfColumns();

        if($validate_if_room_is_exist > 0) {
            http_response_code(409);
            echo json_encode([
               'message' => "Room No. {$room_model->room_no} is already exist", 
               'status'  => 409
            ]);
            exit();
        } else {
            http_response_code(201);
            echo json_encode([
                'message' => 'Room created successfully',
                'status'  => 201
            ]);
            $room_model->createNewRoom();
            exit();
        }
        
    } elseif($_SERVER['REQUEST_METHOD'] === "GET") {
        $filter_status = $_GET['filter_status'] ?? '';

        if (!empty($filter_status)) {
            $data = $room_model->filterRoomsData($filter_status);
        } else {
            $data = $room_model->returnRoomsData();
        }

        if(empty($data)) {
            http_response_code(404);
            echo json_encode([
                'message' => 'Not Found',
                'status'  => 404
            ]);
            exit();
        }

        http_response_code(200);
        echo json_encode([
            'data'    => $data ?? [],
            'message' => 'Ok',
            'status'  => 200
        ]);
        exit();
       
    } elseif($_SERVER['REQUEST_METHOD'] === "POST") {
        $del_id = $_POST['del_btn'];
    
        if(!isset($del_id)) {
            http_response_code(400);
            echo json_encode([
                'message' => 'ID is missing',
                'status'  => 400
            ]);
            exit();
        }

        http_response_code(204);
        $room_model->delRoomsData($del_id);
        exit();
    }