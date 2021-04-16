<?php
session_start();

?>
<link rel="stylesheet" href="\utility\styles\navBarStyles.css">
<div class='navBarStickyDiv'>
<div class='wrapper'>
<div class='navBarDiv'>
    <div>
        <h3><?php echo $_SESSION['currentPage']; ?></h3>
    </div>
    <div>
        <a href='/presentation/views/user/dashboard.php'>Welcome <?php echo $_SESSION['currentUser']['username'] . '!'; ?></a>
    </div>
    <div>
        <form action='/presentation/handlers/searchHandler.php' method='POST'>
            <input type='text' name='search' placeholder='Search by post title...'>
        </form>
    </div>
    <div>
        <a href='/presentation/views/blog/createPost.php'>Create Post</a>
        <a href='/presentation/views/blog/home.php'>View All Posts</a>
        <a href='/presentation/handlers/logoutHandler.php'>Logout</a>
    </div>
</div>
</div>
</div>