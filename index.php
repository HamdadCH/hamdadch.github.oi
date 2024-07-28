<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cloud.cherif</title>
    <script>
        function clearForm(){
            document.getElementById('form-password').reset();
        }

        window.onload = clearForm;
    </script>
</head>
<body>
    <form id="form-password" method="post">
        <label for="password">password:</label>
        <input type="password" name="password" id="password">
        <br>

        <button type="submit">Envoyer</button>
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    // تحقق من كلمة المرور
    if ($password === "admin2008") {
        // إعادة التوجيه إلى envoyer.html
        header("Location: envoyer.html");
        exit();
    } else {
        echo "Mot de passe incorrect.";
    }
}
?>

</body>
</html>