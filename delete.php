<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'todo_list';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $_POST['data'];
        $deleteSql = "DELETE FROM datas WHERE id = :id";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bindParam(':id', $data, PDO::PARAM_INT);
       if ($deleteStmt->execute()) {
        
            header("Location: admin.php");
            exit;
        } else {
            echo "Error deleting record.";
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>