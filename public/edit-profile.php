<?php
// 接続 ref. https://www.php.net/manual/ja/pdo.connections.php
$dbh = new PDO('mysql:host=database-2.cqezj6zrtivy.us-east-1.rds.amazonaws.com;dbname=bbs_db', 'admin', 'Hoshi1momo!');
$select_sth = $dbh->prepare('SELECT id, login_name, password, created_at FROM users WHERE login_name = :login_name');
$select_sth->execute(['login_name' => $_POST['login_name']]);
$rows = $select_sth->fetchAll();

   if (isset($_GET['login_name'])) {
	  $user = $_GET['login_name'];
	  $get_user = $mysqli->query("SELECT * FROM users WHERE username = '$user'");
	  $user_data = $get_user->fetch_assoc();
    } else {
	   header("Location: bbs_read.php");
    }?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
		<title><?php echo $user_data['login_name'] ?>'s Profile Settings</title>
    </head>
	<body>        <a href="bbs_read.php">Home</a> | Back to <a href="profile.php?user=<?php echo $user_data['name'] ?>"><?php echo $user_data['name'] ?></a>'s Profile
		<h3>Update Profile Information</h3>
		       <form method="post" action="update-profile-action.php?user=<?php echo $user_data['username'] ?>">            			<label>Name:</label><br>
			         <input type="text" name="fullname" value="<?php echo $user_data['full_name'] ?>" /><br>
			         <label>Age:</label><br>
			         <input type="text" name="age" value="<?php echo $user_data['age'] ?>" /><br>
			         <label>Gender:</label><br>
			         <input type="text" name="gender" value="<?php echo $user_data['gender'] ?>" /><br>
			         <label>Address:</label><br>
			         <input type="text" name="address" value="<?php echo $user_data['address'] ?>" /><br><br>
			         <input type="submit" name="update_profile" value="Update Profile" />
		</form>
	</body>
</html>
