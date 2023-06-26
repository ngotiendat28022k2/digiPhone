<?php

?>

<div class="main">
    <div class="content" style="text-align: center;">
        <div class="" style="width: 100%;">
            <div class="login_panel" style="margin: auto; display: block; float: none; max-width: 400px;">
                <h3>Existing Customers</h3>
                <p>Sign in with the form below.</p>
                <form action="<?= BASE_URL ?>/login/authlogin" method="POST" id="member">
                    <input name="account" type="text" class="field" placeholder="Name Or Email">
                    <input name="password" type="password" class=" field" placeholder="Password">
                    <p class="note">Create New Account? <a href="<?= BASE_URL ?>/register">here</a></p>
                    <div class="buttons">
                        <div><button class="grey" type="submit">Sign In</button></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>