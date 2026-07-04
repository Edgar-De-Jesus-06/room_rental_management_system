<?php 

    namespace app\model\admin;

    require_once __DIR__ . "/../../../../vendor/autoload.php";

    use app\config\Database;
    use PDO;
    use PDOException;

    class RoomModel extends Database {

        private $db;
        public $room_no;
        public $floor;
        public $type;
        public $price;
        public $status;
        public $tenant;

        public function __construct()
        {
            $this->db = (new Database)->db_connection();
        }

        // added a method function to create room and then inject into database
        public function createNewRoom() {
            try {
                $stmt = $this->db->prepare("INSERT INTO rooms
                                            (room_number, floor, type, price, status)
                                            VALUES
                                            (:room_number, :floor, :type, :price, :status)");
                $stmt->bindValue(':room_number', $this->room_no, PDO::PARAM_INT);
                $stmt->bindValue(':floor', $this->floor, PDO::PARAM_INT);
                $stmt->bindValue(':type', $this->type, PDO::PARAM_STR);
                $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);
                $stmt->bindValue(':status', $this->status, PDO::PARAM_STR);
                return $stmt->execute();

            } catch(PDOException $error) {
                echo "There's problem injecting the data: " . $error->getMessage();
            }

        }

        public function returnRoomsData() {

        }

        public function updateRoomsData() {

        }

        public function delRoomsData() {

        }
        
    }