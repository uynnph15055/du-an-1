
<?php $__env->startSection('title', 'Banner'); ?>
<?php $__env->startSection('link css banner'); ?>

<link rel="stylesheet" href="./public/css/adminCss/style.css" rel="stylesheet">
<link rel="stylesheet" href="./public/css/adminCss/reset.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .banner .row {
        margin: 80px 30px;
    }

    .banner-text {
        display: flex;
        align-items: center;
    }

    .banner-text .slogan {
        font-size: 48px;
    }

    .banner-text .slogan-sub {
        font-size: 20px;
        margin: 30px 0;
    }

    .banner-text button {
        font-size: 24px;
        text-transform: uppercase;
        padding-left: 25px;
        padding-right: 25px;
        box-shadow: 0 10px 15px 0px var(--color-secondary);
    }
</style>
<div class="container" style="background-color: #ffff;margin-top:-70px">
    <div class="banner">
        <?php if($dataBanner): ?>

        <div class="row">
            <div class="banner-text col l-6 m-6 c-12">
                <div class="banner-text-list">
                    <div class="banner-text__item slogan-sub" id="show_text">
                        <h2 class="banner-text__item slogan">
                            <?php echo e($dataBanner[0]['banner_title']); ?>

                        </h2>
                        <p class="banner-text__item slogan-sub">
                            <?php echo e($dataBanner[0]['banner_text']); ?>

                        </p>
                    </div>
                    <button class="banner-text__item btn-primary">
                        Học ngay
                    </button>
                </div>
            </div>
            <div class="banner-img col l-6 m-6 c-12" id="hihihihi">
                <img width="600px" id="img_main" src="./public/img/<?php echo e($dataBanner[0]['banner_img']); ?>" alt="">
            </div>
        </div>
    </div>
    <h4 style="margin-bottom:30px" class="text-center">Chỉnh Sửa</h4>
    <div style=" position: relative;">
        <form method="POST" action="them-banner" enctype="multipart/form-data">
            <div class="" style="max-width: 900px;margin:auto">
                <input type="text" hidden name="banner_img" value="<?php echo e($dataBanner[0]['banner_img']); ?>">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh </label>
                    <br>
                    <input type="file" onchange="banner_imgg()" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" id="banner_img" name="banner_img">
                </div>
                <div class="row" style="display:flex">
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Tiêu đề </label>
                        <br>
                        <textarea style="border-radius: 15px;padding:10px" placeholder="Tiêu đề banner" name="banner_title" cols="50" rows="6"><?php echo e($dataBanner[0]['banner_title']); ?></textarea>
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Nội dung</label>
                        <textarea style="border-radius: 15px;padding:10px" placeholder="Nội dung banner" name="banner_text" onkeyup="banner_textt()" id="banner_text" cols="57" rows="6"><?php echo e($dataBanner[0]['banner_text']); ?></textarea>
                    </div>
                </div>
            </div>
            <br>
            <button style="transform: translateX(100px); margin-bottom: 40px;" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
    <?php endif; ?>
</div>
<script>
    function banner_textt() {
        var input_text = document.getElementById('banner_text');
        var show_text = document.getElementById('show_text');
        var text = input_text.value;
        show_text.innerHTML = text
    }
</script>
<script>
    function banner_imgg() {
        var banner_img = document.getElementById('banner_img').files;

        if (banner_img.length > 0) {
            var filetoload = banner_img[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newimg = document.createElement('img');
                newimg.src = srcData;
                document.getElementById('img_main').src = newimg.src;
            }
            fileReader.readAsDataURL(filetoload);
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminBanner/listBanner.blade.php ENDPATH**/ ?>