<?php
class User {
    private $db;
    private $login;
    private $password;
    public $user;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($login, $password) {
        $conn = $this->db->connect();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('INSERT INTO user (login, password) VALUES (:login, :password)');
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $hashed_password);
        return $stmt->execute();
    }
    
    

    // Existing methods and properties

    public function getUserById($user_id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findBylogin($login) {
        $conn = $this->db->connect();
        $query = $conn->prepare("SELECT * FROM user WHERE login = :login");
        $query->bindParam(':login', $login);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
  
    public function verifyPassword($userData, $password) {
        // Vérifier si le mot de passe est haché, utiliser password_verify
        if (password_verify($password, $userData['password'])) {
            return true;
        }
    
    
        // Sinon, comparer en clair
        return $password === $userData['password'];
    }
    
    
        public function create($login, $password) {
            $conn = $this->db->connect();
            $stmt = $conn->prepare("INSERT INTO user (login, password) VALUES (?, ?)");
            $stmt->execute([$login, $password]);
        }
    
    public function login($login, $password) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare('SELECT * FROM user WHERE login = :login');
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function updateProfile($id, $login, $password) {
        $conn = $this->db->connect();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('UPDATE user SET login = :login, password = :password WHERE id = :id');
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updatePassword($user_id, $login, $old_password, $new_password) {
        $conn = $this->db->connect();
        
        // Get user data
        $user = $this->getUserById($user_id);
        
        // Verify login matches user_id
        if ($user['login'] !== $login) {
            return false;
        }
        
        // Verify old password
        if (!$this->verifyPassword($user, $old_password)) {
            return false;
        }
        
        // Update password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('UPDATE user SET password = :password WHERE id = :id');
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':id', $user_id);
        return $stmt->execute();
    }

}

?>
