<html>
<head>    
    <title> Send Email Codeigniter </title>
</head>
<body>
<?php
echo $this->session->flashdata('email_sent');
echo form_open('/admin/send_mail');
?>
<input type = "email" name = "email" required />
<input type = "submit" value = "SEND MAIL">
<?php
echo form_close();
?>
</body>
</html>