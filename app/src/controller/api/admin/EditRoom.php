<?php 

    require_once __DIR__ . "/../../../../../vendor/autoload.php";

    header("Content-Type: application/json; Charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    use app\model\admin\RoomModel;

    $room_model = new RoomModel();

    if($_SERVER['REQUEST_METHOD'] === "GET") {
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