<?php
//getting database connection file

require_once 'database.php';

class Student{
    private $conn;
    private $table = 'tbl_student';

    //student constructor   
    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
        if ($this->conn === null) {
            throw new Exception('Database connection failed.');
        }
    }
    public function create($first_name, $email){
        $sql = "INSERT INTO " . $this->table . " (first_name, email) VALUES (:first_name, :email)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['first_name' => $first_name, 'email' => $email]);
    }
    public function readAll(){
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id){
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $first_name, $email){
        $sql = "UPDATE " . $this->table . " SET first_name = :first_name, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['first_name' => $first_name, 'email' => $email, 'id' => $id]);
    }
    public function delete($id){
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

}
?>

