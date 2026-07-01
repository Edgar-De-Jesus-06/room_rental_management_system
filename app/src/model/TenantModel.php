<?php 

    namespace app\model;

    require_once __DIR__ . "/../../../vendor/autoload.php";

    use app\config\Database;
    use PDO;
    use PDOException;

    class TenantModel extends Database {

        protected $db;
        public $full_name;
        public $email;
        public $password;
        public $role;

        public function __construct()
        {
            $this->db = (new Database)->db_connection();
        }

    }
