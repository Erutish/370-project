<?php
    session_start();
?>


<header>
    <div class="header-left">
        <a href="">Services</a>
        <a href="">Property Search</a>
    </div>

    <div class="header-middle">
        <a href="./index.php">
            <h1>Rent A Room</h1>
        </a>
    </div>
    
    <div class="header-right">
        <a href="">About</a>
        <a href="">Contact</a>
        <?php
            if (isset($_SESSION["user"])) {
                echo "<a href='include/logout.inc.php'>Log out</a>";
            } else {
                echo "<a href='register.php'>Register</a>";
                echo "<a href='login.php'>Sign In</a>";
            }
        ?>
    </div>    
</header>
