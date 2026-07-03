<?php 

    namespace app\model\admin;

    require_once __DIR__ . "/../../../../vendor/autoload.php";

    use app\config\Database;
    use PDO;
    use PDOException;

    class AdminModel extends Database {

        private $db;
        public $full_name;
        public $email;
        public $password;
        public $role;

        public function __construct()
        {
            $this->db = (new Database)->db_connection();
        }

        public function createNewTenant() {
            try {
                $stmt = $this->db->prepare("INSERT INTO users (full_name, email, password, role)
                                            VALUES (:full_name, :email, :password, :role)");
                $stmt->bindValue(':full_name', $this->full_name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
                $stmt->bindValue(':role', $this->role, PDO::PARAM_STR);
                return $stmt->execute();

            } catch(PDOException $error) {
                echo "Invalid Data Insertion: " . $error->getMessage();
            }
        }

        // created new method that will return the data of user email
        public function retrieveUsersData(string $admin_email) {
            try {
                $stmt = $this->db->prepare("SELECT full_name, email, password, role
                                            FROM users
                                            WHERE email = ?");
                $stmt->execute([$admin_email]);
                return $stmt->fetch(PDO::FETCH_ASSOC);

            } catch(PDOException $error) {
                echo "Invalid to retrieve the data: " . $error->getMessage();
            }
        }

    }