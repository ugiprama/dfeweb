<?php
$host = 'localhost'; // sesuaikan dengan host database Anda
$dbname = 'portfolio_db'; // sesuaikan dengan nama database Anda
$username = 'root'; // sesuaikan dengan username database Anda
$password = ''; // sesuaikan dengan password database Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (name, email, comment) VALUES (:name, :email, :comment)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':comment', $comment);
        $stmt->execute();

        echo "Komentar berhasil disimpan!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
