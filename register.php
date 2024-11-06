<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// Подключение к базе данных
$servername = "localhost"; // Имя хоста
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$dbname = "unmatched"; // Имя базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

//Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Хеширование пароля для безопасности

    // Запрос для вставки данных в таблицу
    $sql = "INSERT INTO unmatched (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Регистрация прошла успешно";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
