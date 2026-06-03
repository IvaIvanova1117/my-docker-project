<?php
echo "Изчакване на връзка с базата данни...\n";
sleep(2);

$host = 'db'; 
$db   = 'mydatabase';
$user = 'myuser';
$pass = 'mypassword';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "Успешно свързване с базата данни! 🎉\n";
     
     $pdo->exec("CREATE TABLE IF NOT EXISTS messages (id INT AUTO_INCREMENT PRIMARY KEY, text VARCHAR(255))");
     $pdo->exec("INSERT INTO messages (text) VALUES ('Привет от Docker и PHP!')");
     
     $stmt = $pdo->query('SELECT text FROM messages');
     while ($row = $stmt->fetch()) {
         echo "Прочетено от базата: " . $row['text'] . "\n";
     }

} catch (\PDOException $e) {
     echo "Грешка при свързване: " . $e->getMessage() . "\n";
}



