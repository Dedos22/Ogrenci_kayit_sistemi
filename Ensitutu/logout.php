<?php
session_start();
?>
<html>
 
<head>
<meta charset="utf-8"> 
</head>
<body>
<?php
$_SESSION = array();
session_destroy();
echo "Oturum sonlandirildi.<br>";
 header("Location: index.php");
?>
</body>
</html>