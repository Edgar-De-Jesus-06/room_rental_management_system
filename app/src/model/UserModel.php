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
                $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
                $stmt->bindValue(':role', $this->role, PDO::PARAM_STR);
                return $stmt->execute();

            } catch(PDOException $err) {
                echo "Error: " . $err->getMessage();
            }

        }

        public function Read_users_data() {
            try {
                $stmt = $this->db->prepare("SELECT full_name, email, role 
                                            FROM users");
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);

            } catch(PDOException $err) {
                echo "Error: " . $err->getMessage();
            }
        }

        public function Update_user_data() {
            try {
                $stmt = $this->db->prepare("UPDATE users
                                            SET full_name = ?, email = ?, role = ?
                                            WHERE id = ?");
                $stmt->execute([
                    $this->full_name,
                    $this->email,
                    $this->role
                ]);
                return $stmt->rowCount();
            } catch(PDOException $err) {
                echo "Invalid Update: " . $err->getMessage();
            }

        }

    }