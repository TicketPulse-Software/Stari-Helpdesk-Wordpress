<!DOCTYPE html>
<html>
<head>
    <title>Installer - Admin Account Setup</title>
</head>
<body>
    <h2>Admin Account Setup</h2>
    <form action="ip_form.php" method="post">
        <label for="admin_username">Admin Username:</label><br>
        <input type="text" id="admin_username" name="admin_username" required><br><br>
        
        <label for="admin_email">Admin Email:</label><br>
        <input type="text" id="admin_email" name="admin_email" required><br><br>
        
        <label for="admin_password">Admin Password:</label><br>
        <input type="password" id="admin_password" name="admin_password" required><br><br>
        
        <input type="submit" value="Next">
    </form>
</body>
</html>
