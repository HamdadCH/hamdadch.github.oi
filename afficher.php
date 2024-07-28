<?php
// إعدادات قاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cloud";

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لجلب جميع البيانات من الجدول
$sql = "SELECT id, titel, text, upload_date FROM data";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les données</title>
</head>
<body>
    <h1>Liste des données</h1>
    <?php
    if ($result->num_rows > 0) {
        // عرض البيانات لكل صف
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['titel']) . "</h2>";
            echo "<p>" . nl2br(htmlspecialchars($row['text'])) . "</p>";
            echo "<p>Date de téléchargement: " . htmlspecialchars($row['upload_date']) . "</p>";
            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo "Aucune donnée trouvée.";
    }

    // إغلاق الاتصال
    $conn->close();
    ?>
    <p><a href="envoyer.html">envoyer</a></p>
</body>
</html>
