
<?php $__env->startSection('title', 'Câu Hỏi'); ?>
<?php $__env->startSection('link'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200&family=Lora:wght@500&family=Montserrat:ital,wght@0,200;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div style="margin-top:40px" class="container bgr-light-dm">
    <div class="container-fluid ">
        <div class="quiz-lesson-container">
            <aside class="aside__question">
                <h3 class="course__name" style="margin-top: 20px;font-size:30px">
                    <a href="bai-hoc?mon=<?php echo e($dataLessonJoinQuestion['subject_slug']); ?>">
                        <?php echo e($dataLessonJoinQuestion['subject_name']); ?>

                    </a>
                </h3>
                <h4 class="lesson__title">
                    Bài: <?php echo e($dataLessonJoinQuestion['lesson_name']); ?>

                </h4>
                <h5 class="quiz__question">
                    <span class="subtitle">Bài tập</span>
                    <?= $dataQuestion['question'] ?>

                </h5>
                <div class="quiz__img">
                    <img class="img-fluid" src="./public/img/<?php echo e($dataQuestion['question_img']); ?>" alt="">
                </div>
                <div class="quiz-hint">
                    <h5 class="subtitle quiz-hint__title">Gợi ý</h5>
                    <span class="quiz-hint__content">Chọn <?php echo e($countAnswers); ?> đáp án</span>
                </div>
            </aside>
            <div class="quiz-container">
                <div class="index-quiz">
                    <?php

                    use App\Controllers\Frontend\Index;

                    $index = 1;
                    $a = 1;
                    $user = isset($_SESSION['user_info']) ? $_SESSION['user_info'][0]['student_id'] : null;
                    ?>

                    <br>
                    <?php $__currentLoopData = $dataQuestionInLesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $dataQuestionStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyQuestionStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key['question_id'].$_SESSION['user_info'][0]['student_id']==$keyQuestionStatus['question_id'].$keyQuestionStatus['student_id'] ): ?>
                    <?php $kq = $keyQuestionStatus['question_id'] . $keyQuestionStatus['student_id'];

                    ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($kq) && $kq ==$key['question_id'].$_SESSION['user_info'][0]['student_id']): ?>


                    <a style="background: #00bcca; color: #fff;" href="quzi?question_id=<?php echo e($key['question_id']); ?>" class="index__quiz--success"><i class="fas fa-check"></i></a>

                    <?php $index++ ?>
                    <?php else: ?>
                    <a href="quzi?question_id=<?php echo e($key['question_id']); ?>" class="index__quiz"><?= $index++ ?></a>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="quiz-content">
                    <form action="quzi-answer" method="POST" class="quiz-answer">
                        <input type="hidden" name="lesson_id" value="<?php echo e($lesson_id); ?>">
                        <?php if($countAnswers>1): ?>
                        <div class="list-answer">
                            <div class="inputGroup">
                                <input type="hidden" name="question_id" value="<?php echo e($dataQuestion['question_id']); ?>">
                                <input id="option1" name="anwer[]" value="1" type="checkbox" />
                                <label class="" for="option1">
                                    <div class="grid">
                                        <span class="index-option">A</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_one']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">

                                <input id="option2" name="anwer[]" value="2" type="checkbox" />
                                <label class="" for="option2">
                                    <div class="grid">
                                        <span class="index-option">B</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_two']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option3" name="anwer[]" value="3" type="checkbox" />
                                <label class="" for="option3">
                                    <div class="grid">
                                        <span class="index-option">C</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_three']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option4" name="anwer[]" value="4" type="checkbox" />
                                <label class="" for="option4">
                                    <div class="grid">
                                        <span class="index-option">D</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_four']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="list-answer">
                            <div class="inputGroup">
                                <input type="hidden" name="question_id" value="<?php echo e($dataQuestion['question_id']); ?>">
                                <input id="option1" name="anwer[]" value="1" type="radio" />
                                <label class="" for="option1">
                                    <div class="grid">
                                        <span class="index-option">A</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_one']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option2" name="anwer[]" value="2" type="radio" />
                                <label class="" for="option2">
                                    <div class="grid">
                                        <span class="index-option">B</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_two']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option3" name="anwer[]" value="3" type="radio" />
                                <label class="" for="option3">
                                    <div class="grid">
                                        <span class="index-option">C</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_three']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option4" name="anwer[]" value="4" type="radio" />
                                <label class="" for="option4">
                                    <div class="grid">
                                        <span class="index-option">D</span>
                                        <p>
                                            <?php echo e($dataQuestion['answer_four']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="btn-submit" style="display: flex;justify-content: center;">
                            <a style="margin-right: 20px;" href="" class="btn-primary">Chọn lại</a>
                            <button type="submit" name="submit" class="btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/tablinks.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $a = document.getElementsByName('abc');
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
    $(function() {

        <?php if (isset($_SESSION['error'])) {

        ?>

            Swal.fire({
                icon: 'warning',
                title: '<p  style="font-size: 19px;"><?= $_SESSION['error']; ?></p>',

                timer: 3000,
                width: 400,
                padding: '4em',
                confirmButtonText: '<i style="padding: 3px;font-size: 20px">OK</i>',
            })

        <?php
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success'])) { ?>
            Swal.fire({

                icon: 'success',
                title: '<p  style="font-size: 22px;"><?= $_SESSION['success']; ?></p>',
                showConfirmButton: false,
                timer: 3000,
                width: 450,
                padding: '5em',

            })
            var index = 0;
            <?php if (isset($_GET["question_id"]) && !empty($_GET["question_id"])) : ?>
                <?php foreach ($dataQuestionInLesson as $key) : ?>
                    index += 1;
                    if (Number(<?= $key['question_id'] ?>) > Number(<?= $_GET["question_id"] ?>)) {
                        setTimeout(function() {
                            window.location = "quzi?question_id=<?= $key['question_id'] ?>";
                        }, 1500);
                        die;
                    } else if (Number(<?= count($dataQuestionInLesson) ?>) == index) {
                        window.location = "bai-hoc?mon=<?= $subject_slug ?>";
                    }

                <?php endforeach  ?>
            <?php endif  ?>


        <?php unset($_SESSION['success']);
        }
        ?>
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project_one\app\views/customer/quiz.blade.php ENDPATH**/ ?>