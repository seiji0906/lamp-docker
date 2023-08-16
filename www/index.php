<?php
$host = 'db';
$user = 'lamp_user';
$pass = 'lamp_password';
$db = 'lamp_db';

$conn = new mysqli($host, $user, $pass, $db);

//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
)";

$conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM users");

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>LAMP App</title>
</head>
<body>
    <h1>LAMP App</h1>
    
    <h2>Add User</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <button type="submit">Add User</button>
    </form>
    
    <h2>Users</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><?php echo $row['name']; ?> (<?php echo $row['email']; ?>)</li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
