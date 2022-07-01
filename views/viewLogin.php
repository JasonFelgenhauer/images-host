<?php $this->_t = "Login" ?>
<section class="login container">
    <h2>Login</h2>
    <?php
        if(isset($_SESSION['errors']['badPass'])){
            echo '<span>' . $_SESSION['errors']['badPass'] . '</span>';
        }
    ?>
    <form method="post" action="/login">
        <div>
            <input type="email" name="login_email" placeholder="Email address">
        </div>
        <div>
            <input type="password" name="login_password" placeholder="Password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
    <a href="/register">Don't you have an account?</a>
</section>
