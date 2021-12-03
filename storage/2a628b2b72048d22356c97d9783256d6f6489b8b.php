<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'PT16306 project_one'); ?></title>
    <!-- Custom styles for this template -->
    <link href="./vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="./vnpay_php/assets/jquery-1.11.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="./public/img/images/Blue Gradient Tech Marketing Company Logo.png" type="image/gif" sizes="16x16">
</head>

<body class="bg-light">
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

</html><?php /**PATH D:\Xampp\htdocs\project_one\app\views/customer/layout/layout_payment.blade.php ENDPATH**/ ?>