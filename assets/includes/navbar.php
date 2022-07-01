<nav class="container nav">
    <div class="nav_left">
        <a href="./home">Fast Image</a>
    </div>
    <div class="nav_right">
        <ul id="menu">
            <li><a href="/home">Home</a></li>
            <li><a href="/host">Host</a></li>
            <?php
                if(isset($_SESSION['connect'])){
                    ?>
                        <li><a href="/account">Account</a></li>
                        <li><a href="/login-logout">Logout</a></li>
                    <?php
                }else{
                    ?>
                        <li><a href="/login">Login</a></li>
                    <?php
                }
            ?>
        </ul>
        <button id="burger_menu"><i class="fa-solid fa-bars"></i></button>
    </div>
</nav>