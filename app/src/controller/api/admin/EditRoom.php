<?php 

    require_once __DIR__ . "/../../../../../vendor/autoload.php";

    header("Content-Type: application/json; Charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    use app\model\admin\RoomModel;

    $room_model = new RoomModel();

    if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['save_edit'])) {
        $edit_id         = $_POST['id'] ?? '';
        $edit_room_num   = filter_input(INPUT_POST, 'edit_room_num', FILTER_SANITIZE_SPECIAL_CHARS);
        $edit_type       = filter_input(INPUT_POST, 'edit_type', FILTER_SANITIZE_SPECIAL_CHARS);
        $edit_floor      = filter_input(INPUT_POST, 'edit_floor', FILTER_VALIDATE_INT);
        $edit_rent_price = filter_input(INPUT_POST, 'edit_rent_price', FILTER_VALIDATE_INT);
        $edit_status     = filter_input(INPUT_POST, 'edit_status', FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($edit_id)) {
            http_response_code(404);
            echo json_encode([
                'message' => 'ID is Not Found',
                'status'  => 404
            ]);
            exit();
        }

        if(empty($edit_room_num) || empty($edit_type) || $edit_floor == null || $edit_rent_price == null || empty($edit_status)) {
            http_response_code(400);
            echo json_encode([
                'message' => 'Bad Request',
                'status'  => 400
            ]);
            exit();
        }

        $room_model->room_no = $edit_room_num;
        $room_model->type    = $edit_type;
        $room_model->floor   = $edit_floor;
        $room_model->price   = $edit_rent_price;
        $room_model->status  = $edit_status;
        
        http_response_code(200);
        $room_model->updateRoomsData($edit_id);
        echo json_encode([
            'message' => 'Your changes have been saved successfully.',
            'status'  => 200
        ]);
        exit();
    

    } elseif($_SERVER['REQUEST_METHOD'] === "GET") {
        $room_id = (int) $_GET['room_id'] ?? 0;
        $res_data = $room_model->returnSelectedData($room_id);

        if($room_id == 0 || !isset($res_data)) {
            http_response_code(404);
            echo json_encode([
                'message' => "Data is Not Found!",
                'status'  => 404
            ]);
            exit();
        } 

        http_response_code(200);
        echo json_encode([
            'data'   => $res_data,
            'status' => 200
        ]);
        exit();
    } 