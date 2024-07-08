<?php

require_once 'DBConnection.php';
require_once 'UserDao.php';
require_once 'User.php';

class UserDaoImpl implements UserDao {
    private $conn;

    public function __construct() {
        $this->conn = DBConnection::getConnection();
    }

    public function getAllUsers() {
        $users = array();
        try {
            $statement = $this->conn->query("SELECT * FROM users");
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $user = new User();
                $user->setId($row['id']);
                $user->setName($row['name']);
                $user->setEmail($row['email']);
                $users[] = $user;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $users;
    }

    public function getUser($id) {
        $user = new User();
        try {
            $statement = $this->conn->prepare("SELECT * FROM users WHERE id=?");
            $statement->execute([$id]);
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $user->setId($row['id']);
                $user->setName($row['name']);
                $user->setEmail($row['email']);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $user;
    }

    public function updateUser($user) {
        try {
            $statement = $this->conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
            $statement->execute([$user->getName(), $user->getEmail(), $user->getId()]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteUser($user) {
        try {
            $statement = $this->conn->prepare("DELETE FROM users WHERE id=?");
            $statement->execute([$user->getId()]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>
