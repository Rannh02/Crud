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
        public function create($First_Name, $Last_Name, $Email){
            $sql = "INSERT INTO " . $this->table . " (First_Name, Last_Name, Email) VALUES (:First_Name, :Last_Name, :Email)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute(['First_Name' => $First_Name, 'Last_Name' => $Last_Name, 'Email' => $Email]);
    }
    public function readAll(){
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($ID){
        $sql = "SELECT * FROM " . $this->table . " WHERE ID = :ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ID' => $ID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($ID, $First_Name, $Last_Name, $Email){
        $sql = "UPDATE " . $this->table . " SET First_Name = :First_Name, Last_Name = :Last_Name, Email = :Email WHERE ID = :ID";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['First_Name' => $First_Name, 'Last_Name' => $Last_Name, 'Email' => $Email, 'ID' => $ID]);
    }
    public function delete($ID){
        $sql = "DELETE FROM " . $this->table . " WHERE ID = :ID";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['ID' => $ID]);
    }

}
?>
