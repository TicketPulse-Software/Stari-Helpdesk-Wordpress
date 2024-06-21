<!DOCTYPE html>
<html>
<head>
    <title>Installer - SMS API Setup</title>
</head>
<body>
    <h2>SMS API Setup</h2>
    <form action="admin_account_form.php" method="post">
        <label for="twilio_sid">Twilio SID:</label><br>
        <input type="text" id="twilio_sid" name="twilio_sid" required><br><br>
        
        <label for="twilio_token">Twilio Token:</label><br>
        <input type="text" id="twilio_token" name="twilio_token" required><br><br>
        
        <label for="twilio_from">Twilio From Number:</label><br>
        <input type="text" id="twilio_from" name="twilio_from" required><br><br>
        
        <label for="clicksend_username">ClickSend Username:</label><br>
        <input type="text" id="clicksend_username" name="clicksend_username" required><br><br>
        
        <label for="clicksend_api_key">ClickSend API Key:</label><br>
        <input type="text" id="clicksend_api_key" name="clicksend_api_key" required><br><br>
        
        <input type="submit" value="Next">
    </form>
</body>
</html>
