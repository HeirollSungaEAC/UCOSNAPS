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
    <title>Images</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <!-- Photo Upload Form Section -->
    <div class="upload-section">
        <h2 class="section-title">Upload New Album</h2>
        <form action="handleForms.php" method="POST" enctype="multipart/form-data" class="photo-upload-form">
            <label for="photoDescription">Album Name</label>
            <input type="text" name="photoDescription" id="photoDescription" placeholder="Enter a Album Name..." required>

            <label for="image">Album Upload</label>
            <input type="file" name="image" id="image" required>

            <input type="submit" name="insertPhotoBtn" value="Upload" class="submit-btn">
        </form>
    </div>

    <!-- Display Photos Section -->
    <div class="photos-gallery">
        <h2 class="section-title">albums</h2>

        <?php $getAllPhotos = getAllPhotos($pdo); ?>
        <?php foreach ($getAllPhotos as $row) { ?>
            <div class="photo-card">
                <div class="photo-container">
                    <img src="images/<?php echo $row['photo_name']; ?>" alt="Photo" class="photo-image">
                    <div class="photo-description">
                        <a href="profile.php?username=<?php echo $row['username']; ?>" class="username-link">
                            <h3><?php echo $row['username']; ?></h3>
                        </a>
                        <p class="date"><i><?php echo $row['date_added']; ?></i></p>
                        <p class="description"><?php echo $row['description']; ?></p>

                        <?php if ($_SESSION['username'] == $row['username']) { ?>
                            <div class="photo-actions">
                                <a href="editphoto.php?photo_id=<?php echo $row['photo_id']; ?>" class="action-btn">Edit</a>
                                <a href="deletephoto.php?photo_id=<?php echo $row['photo_id']; ?>" class="action-btn delete-btn">Delete</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
