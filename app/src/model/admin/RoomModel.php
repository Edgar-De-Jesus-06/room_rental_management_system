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
                $stmt->bindValue(':room_number', $this->room_no, PDO::PARAM_STR);
                $stmt->bindValue(':floor', $this->floor, PDO::PARAM_INT);
                $stmt->bindValue(':type', $this->type, PDO::PARAM_STR);
                $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);
                $stmt->bindValue(':status', $this->status, PDO::PARAM_STR);
                return $stmt->execute();

            } catch(PDOException $error) {
                echo "There's problem injecting the data: " . $error->getMessage();
            }

        }

        // add a logic to return the data of all rooms
        public function returnRoomsData() {
            try {
                $stmt = $this->db->prepare("SELECT id, room_number, floor, type, price, status
                                            FROM rooms
                                            LIMIT 14");
                $stmt->execute();
                return $stmt->fetchAll();

            } catch(PDOException $error) {
                echo "There's an error that cannot return the data: " . $error->getMessage();
            }
        }

        public function filterRoomsData(string $filter_status) {
            try {
                $stmt = $this->db->prepare("SELECT id, room_number, floor, type, price, status
                                            FROM rooms
                                            WHERE status = ?
                                            LIMIT 14");
                $stmt->execute([$filter_status]);
                return $stmt->fetchAll();

            } catch(PDOException $error) {
                echo "There's an error that cannot return the data: " . $error->getMessage();
            }
        }

        public function countNumberOfColumns() {
            
            try {
                $stmt = $this->db->prepare("SELECT COUNT(*)
                                            FROM rooms
                                            WHERE room_number = :room_number");
                $stmt->bindValue(':room_number', $this->room_no, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetchColumn();


            } catch(PDOException $error) {
                echo $error->getMessage();
            }

        }

        // this method will update the room data of id on database
        public function updateRoomsData(int $id) {
            try {
                $stmt = $this->db->prepare("UPDATE rooms
                                            SET (room_number = ?), (type = ?), (floor = ?), (price = ?), (status = ?)
                                            WHERE id = ?");
                return $stmt->execute([
                                        $this->room_no,
                                        $this->type,
                                        $this->floor,
                                        $this->price,
                                        $this->status,
                                        $id
                                    ]);
            
            } catch(PDOException $error) {
                echo "Invalid, cannot update the data: " . $error->getMessage();
            }
        }

        // this method will delete the current id data
        public function delRoomsData(int $id) {
            try {
                $stmt = $this->db->prepare("DELETE
                                            FROM rooms
                                            WHERE id = ?");
                return $stmt->execute([$id]);
            
            } catch(PDOException $error) {
                echo "Invalid, cannot update the data: " . $error->getMessage();
            }
        }

    }