<?php 

    require_once __DIR__ . "/../../../../../vendor/autoload.php";

    header("Content-Type: application/json; Charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, PATCH");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    use app\model\admin\RoomModel;

    $room_model = new RoomModel();

    if($_SERVER['REQUEST_METHOD'] === "PATCH") {
        $data = json_decode(file_get_contents('php://input'), true);

        $id              = (int) $data['id'] ?? 0;
        $edit_room_num   = $data['edit_room_num'] ?? '';
        $edit_floor      = $data['edit_floor'] ?? '';
        $edit_type       = $data['edit_type'] ?? '';
        $edit_rent_price = $data['edit_rent_price'] ?? '';
        $edit_status     = $data['edit_status'] ?? '';

        if($id == 0) {
            http_response_code(404);
            echo json_encode([
                'message' => 'ID is not found',
                'status'  => 404
            ]);
            exit();
        }

        if(empty($edit_room_num) || empty($edit_type) || empty($edit_floor) || empty($edit_rent_price) || empty($edit_status)) {
            http_response_code(400);
            echo json_encode([
                'message' => 'Empty field, please try again',
                'status'  => 400
            ]);
            exit();
        }

        try {
            $room_model->room_no = $edit_room_num;
            $room_model->floor   = $edit_floor;
            $room_model->type    = $edit_type;
            $room_model->price   = $edit_rent_price;
            $room_model->status  = $edit_status;

            http_response_code(200);
            $room_model->updateRoomsData($id);
            echo json_encode([
                'data'   => $data,
                'status' => 200
            ]);
            exit();

        } catch(\PDOException $e) {
            echo $e->getMessage();
        }

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