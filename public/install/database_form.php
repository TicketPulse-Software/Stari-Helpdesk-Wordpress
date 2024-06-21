<!DOCTYPE html>
<html>
<head>
    <title>Installer - Database Setup</title>
</head>
<body>
    <h2>Database Setup</h2>
    <form action="mail_form.php" method="post">
        <label for="db_host">Database Host:</label><br>
        <input type="text" id="db_host" name="db_host" required><br><br>
        
        <label for="db_name">Database Name:</label><br>
        <input type="text" id="db_name" name="db_name" required><br><br>
        
        <label for="db_user">Database User:</label><br>
        <input type="text" id="db_user" name="db_user" required><br><br>
        
        <label for="db_pass">Database Password:</label><br>
        <input type="password" id="db_pass" name="db_pass" required><br><br>
        
        <input type="submit" value="Next">
    </form>
</body>
</html>
