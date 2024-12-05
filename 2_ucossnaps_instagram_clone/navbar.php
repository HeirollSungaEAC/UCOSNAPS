<div class="navbar">
    <h1>Welcome <span><?php echo $_SESSION['username']; ?></span></h1>

    <!-- Navbar Links -->
    <a href="index.php">Home</a>
    <a href="profile.php?username=<?php echo $_SESSION['username']; ?>">Your Profile</a>
    <a href="allusers.php">All Users</a>
    <a href="handleForms.php?logoutUserBtn=1">Logout</a>

    </div>
</div>
