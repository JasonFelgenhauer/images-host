<?php $this->_t = "Register" ?>
<section class="login container">
    <h2>Register</h2>
    <?php
        if(isset($_SESSION['errors']['exist'])){
            echo '<span>' . $_SESSION['errors']['exist'] . '</span>';
        }
    ?>
    <form method="post" action="/register">
        <div>
            <input type="email" name="register_email" placeholder="Email address">
            <?php
                if(isset($_SESSION['errors']['email']['email'])){
                    echo '<span>' . $_SESSION['errors']['email']['email'] . '</span>';
                }
            ?>
        </div>
        <div>
            <input type="password" name="register_password" placeholder="Password">
            <?php
                if(isset($_SESSION['errors']['password']['password'])){
                    echo '<span>' . $_SESSION['errors']['password']['password'] . '</span>';
                }
            ?>
        </div>
        <div>
            <input type="password" name="register_password_confirm" placeholder="Confirm password">
            <?php
            if(isset($_SESSION['errors']['password']['confirm'])){
                echo '<span>' . $_SESSION['errors']['password']['confirm'] . '</span>';
            }
            ?>
        </div>
        <div>
            <input type="submit" value="register">
        </div>
    </form>
    <a href="/login">You have an account?</a>
</section>
