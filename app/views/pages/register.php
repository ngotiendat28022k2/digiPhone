<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
?>
<div class="main">
    <div style="">
        <div class="content" style="text-align: center;width: 100%;">
            <div class="register_account" style="float: none; margin: auto;">
                <h3>Register New Account</h3>
                <form method="POST" action="<?= BASE_URL ?>/register/aadd">
                    <table style="margin: auto;">
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <input type="text" placeholder="Name" name="name" required>
                                    </div>

                                    <div>
                                        <input type="text" placeholder="Email" name="email" required>
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Password" name="password" required>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="search" style="text-align: center; width: 100%;">
                        <div><button class="grey">Create Account</button></div>
                    </div>
                    <p class="terms"><a href="<?= BASE_URL ?>/forgotpass" style="color: #333;">Forgot Your Password?</a> <a href="/digiphone/login" style="color: #333;"> Login Now?</a>.</p>
                    <div class="clear"></div>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>