<?php
Session::init();
$user = Session::get('user');
?>

<style>
    .dropdowncustom {
        position: relative;
        z-index: 10;
    }

    .dropdowncustom:hover .dropdown-menucustom {
        display: block;
    }

    .dropdown-menucustom {
        position: absolute;
        top: 40px;
        right: 0;
        background-color: #333;
        text-align: center;
        width: 150px;
        display: none;
        text-transform: capitalize;
    }

    .dropdown-itemcustom {
        display: block;
        color: #fff;
        padding: 10px 15px;

    }

    .dropdown-itemcustom:hover {
        background-color: green;
        color: #fff;
    }
</style>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 20px 0;">
    <div class="logo">
        <a href="index.php"><img style="max-width: 200px;" src="https://theme.hstatic.net/1000370129/1000843061/14/logo.png?v=1605" alt="" /></a>
    </div>
    <div class="" style="max-width: 600px; width: 100%;">
        <form style=" width: 100%; display: flex; justify-content: space-between; align-items: center;" action="productsearch/" method="GET">
            <input style="width: 100%;" type="text" placeholder="Search for Products" name="search"><input type="submit" value="SEARCH">
        </form>
    </div>
    <div class="shopping_cart">
        <div class="cart">
            <a href="<?= BASE_URL ?>carts" title="View my shopping cart" rel="nofollow">
                <span class="cart_title">Cart</span>
                <span class="no_product">(empty)</span>
            </a>
        </div>
    </div>
    <div class="dropdowncustom" style="margin-right: 20px;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img style="max-width: 30px;" src="https://w7.pngwing.com/pngs/419/473/png-transparent-computer-icons-user-profile-login-user-heroes-sphere-black-thumbnail.png" alt="">
        </button>
        <div class="dropdown-menucustom">
            <?php if (!empty($user)) { ?>
                <?php if (isset($user['name'])) { ?>
                    <h3 style="font-size: 13px; color: red; margin-top: 10px;">Hi <?= $user['name'] ?></h3>
                <?php } ?>
                <a class="dropdown-itemcustom" href="<?= BASE_URL ?>account/profile/<?= $user['id'] ?>">account</a>
                <a class="dropdown-itemcustom" href="<?= BASE_URL ?>account/oder/<?= $user['id'] ?>">oder</a>
                <a class="dropdown-itemcustom" href="<?= BASE_URL ?>login/logout">Logout</a>
                <?php if ($user['role'] === 1) { ?>
                    <a class="dropdown-itemcustom" href="<?= BASE_URL ?>login/dashboard">Website Admin</a>
                <?php } ?>
            <?php } else { ?>
                <a class="dropdown-itemcustom" href="<?= BASE_URL ?>login">Login</a>
                <a class="dropdown-itemcustom" href="<?= BASE_URL ?>register">Register</a>
            <?php } ?>
        </div>
    </div>


</div>
<div class="menu">
    <ul id="dc_mega-menu-orange" class="dc_mm-orange">
        <li><a href="<?= BASE_URL ?>home">Home</a></li>
        <li><a href="<?= BASE_URL ?>products">Products New</a> </li>
        <!-- <li><a href="<?= BASE_URL ?>topbrands">Top Brands</a></li> -->
        <li><a href="<?= BASE_URL ?>contact">Contact</a> </li>
        <div class="clear"></div>
    </ul>
</div>