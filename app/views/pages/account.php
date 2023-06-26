<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
// print_r($data['User']);
?>

<style>
    .box-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-top: 10px;
    }

    .label-item {
        font-size: 20px;
        color: #333;
    }

    .input-item {
        width: 90%;
        padding: 7px 0 7px 7px;
        outline: none;
        border-radius: 10px;

    }
</style>
<section style="background-color: #eee;">
    <div class="container py-5">

        <form action="<?= BASE_URL ?>account/aupdate/<?= $data['User']['id'] ?>" style="background-color: #fff; border: none;" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?= BASE_URL ?>upload/<?= $data['User']['avatar'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <div class="mb-3 mt-3">
                                <label for="image" class="btn btn-info">Browser Image
                                    <input onchange="displayImageName(this)" type="file" class="form-control" style="display: none;" id="image" placeholder="Price product" name="image">
                                </label>
                                <small class="file_info text-muted"></small>
                            </div>
                            <h5 class="my-3"><?= $data['User']['name'] ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 box-item">
                                    <label class="label-item" for="">Name</label>
                                    <input class="input-item" type="text" name="name" value="<?= $data['User']['name'] ?>" required>
                                </div>
                                <div class="col-sm-3 box-item">
                                    <label class="label-item" for="">Email</label>
                                    <input class="input-item" type="text" name="email" value="<?= $data['User']['email'] ?>" required>
                                </div>
                                <div class="col-sm-3 box-item">
                                    <label class="label-item" for="">Phone</label>
                                    <input class="input-item" type="text" name="phone" value="<?= $data['User']['phone'] ?>">
                                </div>
                                <div class="col-sm-3 box-item">
                                    <label class="label-item" for="">Address</label>
                                    <input class="input-item" type="text" name="address" value="<?= $data['User']['address'] ?>">
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: right;"><input type="submit" value="Save" class="btn btn-success
            "></div>
        </form>
    </div>
</section>