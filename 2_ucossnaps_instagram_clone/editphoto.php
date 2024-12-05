<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>

<?php  
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	
	<h1>EDIT Album</h1>

	<?php $getPhotoByID = getPhotoByID($pdo, $_GET['photo_id']); ?>
	<div class="editPhotoForm" style="display: flex; justify-content: center;">
		<form action="handleForms.php" method="POST" enctype="multipart/form-data">
			<p>
				<label for="#">Album Name</label>
				<input type="hidden" name="photo_id" value="<?php echo $_GET['photo_id']; ?>">
				<input type="text" name="photoDescription" value="<?php echo $getPhotoByID['description']; ?>">
			</p>
			<p>
				<label for="#">Album Upload</label>
				<input type="file" name="image">
				<input type="submit" name="insertPhotoBtn" style="margin-top: 10px;">
			</p>
		</form>
	</div>
</body>
</html>