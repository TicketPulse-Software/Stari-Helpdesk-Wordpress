<!DOCTYPE html>
<html>
<head>
    <title>Installer - Mail Setup</title>
</head>
<body>
    <h2>Mail Setup</h2>
    <form action="sms_api_form.php" method="post">
        <label for="mail_provider">Mail Provider:</label><br>
        <select id="mail_provider" name="mail_provider" required>
            <option value="smtp">SMTP</option>
            <option value="gmail">Gmail API</option>
            <option value="outlook">Outlook API</option>
        </select><br><br>
        
        <div id="smtp-settings">
            <label for="mail_host">Mail Host:</label><br>
            <input type="text" id="mail_host" name="mail_host"><br><br>
            
            <label for="mail_port">Mail Port:</label><br>
            <input type="text" id="mail_port" name="mail_port"><br><br>
            
            <label for="mail_username">Mail Username:</label><br>
            <input type="text" id="mail_username" name="mail_username"><br><br>
            
            <label for="mail_password">Mail Password:</label><br>
            <input type="password" id="mail_password" name="mail_password"><br><br>
            
            <label for="mail_from">Mail From Address:</label><br>
            <input type="text" id="mail_from" name="mail_from"><br><br>
            
            <label for="mail_from_name">Mail From Name:</label><br>
            <input type="text" id="mail_from_name" name="mail_from_name"><br><br>
        </div>
        
        <div id="gmail-settings" style="display:none;">
            <label for="gmail_client_id">Gmail Client ID:</label><br>
            <input type="text" id="gmail_client_id" name="gmail_client_id"><br><br>
            
            <label for="gmail_client_secret">Gmail Client Secret:</label><br>
            <input type="text" id="gmail_client_secret" name="gmail_client_secret"><br><br>
            
            <label for="gmail_redirect_uri">Gmail Redirect URI:</label><br>
            <input type="text" id="gmail_redirect_uri" name="gmail_redirect_uri"><br><br>
            
            <label for="gmail_token_path">Gmail Token Path:</label><br>
            <input type="text" id="gmail_token_path" name="gmail_token_path"><br><br>
            
            <label for="gmail_from">Gmail From Address:</label><br>
            <input type="text" id="gmail_from" name="gmail_from"><br><br>
        </div>
        
        <div id="outlook-settings" style="display:none;">
            <label for="outlook_access_token">Outlook Access Token:</label><br>
            <input type="text" id="outlook_access_token" name="outlook_access_token"><br><br>
            
            <label for="outlook_from">Outlook From Address:</label><br>
            <input type="text" id="outlook_from" name="outlook_from"><br><br>
        </div>
        
        <input type="submit" value="Next">
    </form>
    
    <script>
        document.getElementById('mail_provider').addEventListener('change', function() {
            var smtpSettings = document.getElementById('smtp-settings');
            var gmailSettings = document.getElementById('gmail-settings');
            var outlookSettings = document.getElementById('outlook-settings');
            
            smtpSettings.style.display = 'none';
            gmailSettings.style.display = 'none';
            outlookSettings.style.display = 'none';
            
            if (this.value === 'smtp') {
                smtpSettings.style.display = 'block';
            } else if (this.value === 'gmail') {
                gmailSettings.style.display = 'block';
            } else if (this.value === 'outlook') {
                outlookSettings.style.display = 'block';
            }
        });
    </script>
</body>
</html>
