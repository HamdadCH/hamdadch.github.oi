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

// معالجة البيانات عند إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات
    $titel = $_POST['titel'];
    $text = $_POST['text'];

    // إعداد استعلام الإدخال
    $stmt = $conn->prepare("INSERT INTO data (titel, text) VALUES (?, ?)");
    $stmt->bind_param("ss", $titel, $text);

    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        echo "Données enregistrées avec succès. <a href='envoyer.html'>retour</a>";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // إغلاق الاتصال
    $stmt->close();
    $conn->close();
}
?>
