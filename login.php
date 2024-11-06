<?php
$conn = new mysqli("localhost", "root", "", "unmatched");

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM unmatched WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Успешный вход!";
        } else {
            echo "Неправильный пароль!";
        }
    } else {
        echo "Пользователь с таким email не найден!";
    }
}

$conn->close();
?>
