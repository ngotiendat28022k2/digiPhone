    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= BASE_URL ?>/login/dashboard">
            <img style="width: 100%; max-width: 150px;" src="https://theme.hstatic.net/1000370129/1000843061/14/logo.png?v=1667" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL ?>/login/dashboard">Trang Chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?= BASE_URL ?>/admincategory" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= BASE_URL ?>/adminuser">Danh Sách</a>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/adminuser/add">Thêm User</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?= BASE_URL ?>/admincategory" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Danh mục
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= BASE_URL ?>/admincategory">Danh Sách</a>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/admincategory/add">Thêm Danh Mục</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sản Phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= BASE_URL ?>/adminproduct">Danh Sách</a>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/adminproduct/add">Thêm Sản Phẩm</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL ?>/admincomment">Bình Luận <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL ?>/adminoder">Đơn Hàng <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?= BASE_URL ?>/admincategory" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Banner
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= BASE_URL ?>/adminbanner">Danh Sách</a>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/adminbanner/add">Thêm Banner</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL ?>/home">Trang Client<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>


    </nav>