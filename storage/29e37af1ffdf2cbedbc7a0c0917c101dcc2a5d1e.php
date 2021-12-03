<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'PT16306 project_one'); ?></title>
    <link rel="stylesheet" href="./public/css/customerCss/reset.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="icon" href="./public/img/images/Blue Gradient Tech Marketing Company Logo.png" type="image/gif" sizes="16x16">

    <!-- css -->
    <link rel="icon" href="./public/img/images/Blue Gradient Tech Marketing Company Logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="./public/css/customerCss/style.css">
</head>

<body class="bgr-img form-log-section">
    <?php echo $__env->yieldContent('main_content'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
            <?php if (isset($_SESSION['error'])) { ?>
                Swal.fire({
                    icon: 'warning',
                    title: '<?= $_SESSION['error']; ?>',
                    timer: 3000,
                    width: 450,
                    padding: '5em',
                })
            <?php
                unset($_SESSION['error']);
            } elseif (isset($_SESSION['success'])) { ?>
                Swal.fire({
                    icon: 'success',
                    title: '<?= $_SESSION['success']; ?>',
                    showConfirmButton: false,
                    timer: 1500
                })
            <?php unset($_SESSION['success']);
            }
            ?>
        });
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\project_one\app\views/customer/layout/layout_login.blade.php ENDPATH**/ ?>