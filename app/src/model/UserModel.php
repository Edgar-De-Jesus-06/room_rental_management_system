<?php 

    namespace app\model;

    require_once __DIR__ . "/../../../vendor/autoload.php";

    use app\config\Database;
    use PDO;
use PDOException;

    class UserModel extends Database {

        private $db;
        public $full_name;
        public $email;
        public $password;
        public $role;

        public function __construct()
        {
            $this->db = (new Database())->db_connection();
        }

        public function Create_users() {
            try {
                $stmt = $this->db->prepare("INSERT INTO users (full_name, email, password, role)
                                        VALUES (:full_name, :email, :password, :role)");
                $stmt->bindValue(':full_name', $this->full_name, PDO::PARAM_STR);
                $stmt->bindValue(':full_name', $this->full_name, PDO::PARAM_STR);
                $stmt->bindValue(':full_name', $this->full_name, PDO::PARAM_STR);
                $stmt->bindValue(':full_name', $this->full_name, PDO::PARAM_STR);
                return $stmt->execute();

            } catch(PDOException $err) {
                echo "Error: " . $err->getMessage();
            }

        }

        

    }