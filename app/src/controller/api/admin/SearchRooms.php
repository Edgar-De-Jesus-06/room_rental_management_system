<?php 

    require_once __DIR__ . "/../../../../../vendor/autoload.php";

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    use app\model\admin\RoomModel;

    $room_model = new RoomModel();
    $search_room = trim((string) filter_input(INPUT_GET, 'search_rooms', FILTER_SANITIZE_SPECIAL_CHARS));

    if(empty($search_room)) {
        http_response_code(400);
        echo json_encode(array('message' => 'Search value is required.'));
        exit();
    }

    $result = $room_model->searchRoomNumber($search_room);

    if(!empty($result)) {
        http_response_code(200);
        echo json_encode(array('data' => $result));
        exit();
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'No matching data found.'));
        exit();
    }