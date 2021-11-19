
<?php $__env->startSection('title', 'Câu Hỏi'); ?>
<?php $__env->startSection('link'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200&family=Lora:wght@500&family=Montserrat:ital,wght@0,200;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<!-- <div style="margin-top:130px" class="container bgr-white">
    <div class="container-fluid ">
        <div class="quiz-lesson-container">
            <div class="quiz-container">
                <?php if(isset($dataQuestion)): ?>
                <h5 class="quiz__question">
                    <?php echo e($dataQuestion['question']); ?>

                </h5>
                <?php endif; ?>
                <div class="quiz__img">
                    <img class="img-fluid" src="./public/img/<?php echo e($dataQuestion['question_img']); ?>" alt="">
                </div>
                <div class="quiz-content">
                    <form action="quzi-answer" method="POST" class="quiz-answer">
                        <?php if($countAnswers>1): ?>
                        <div class="list-answer">
                            <div class="inputGroup">
                                <input type="hidden" name="question_id" value="<?php echo e($dataQuestion['question_id']); ?>">
                                <input id="option1" name="anwer_one" value="1" type="checkbox" />
                                <label class="" for="option1">
                                    <div class="grid">
                                        <span class="index-option">A</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_one']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option2" name="anwer_two" value="2" type="checkbox" />
                                <label class="" for="option2">
                                    <div class="grid">
                                        <span class="index-option">B</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_two']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option3" name="anwer_three" value="3" type="checkbox" />
                                <label class="" for="option3">
                                    <div class="grid">
                                        <span class="index-option">C</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_three']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option4" name="anwer_four" value="4" type="checkbox" />
                                <label class="" for="option4">
                                    <div class="grid">
                                        <span class="index-option">D</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_four']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <?php else: ?>

                        <div class="list-answer">
                            <div class="inputGroup">
                                <input id="option1" name="anwer_one" value="1" type="radio" />
                                <label class="" for="option1">
                                    <div class="grid">
                                        <span class="index-option">A</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_one']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option2" name="anwer_two" value="2" type="radio" />
                                <label class="" for="option2">
                                    <div class="grid">
                                        <span class="index-option">B</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_two']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option3" name="anwer_three" value="3" type="radio" />
                                <label class="" for="option3">
                                    <div class="grid">
                                        <span class="index-option">C</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_three']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="inputGroup">
                                <input id="option4" name="anwer_four" value="4" type="radio" />
                                <label class="" for="option4">
                                    <div class="grid">
                                        <span class="index-option">D</span>
                                        <p>
                                            <?php echo e($dataQuestion['anwer_four']); ?>

                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="btn-submit">
                            <button type="submit"  class="btn-primary">Submit</button>
                        </div>
                     
                    </form>
                </div>
            </div>

     
        </div>
    </div>
</div> -->

<div style="margin-top:100px" class="container bgr-white">
    <div class="container-fluid ">
        <div class="quiz-lesson-container">
            <aside class="aside__question">

                <h3 class="course__name">
                    <?php echo e($dataLessonJoinQuestion['subject_name']); ?>

                </h3>
                <h4 class="lesson__title">Bài học: <?php echo e($dataLessonJoinQuestion['lesson_name']); ?> </h4>
                <h5 class="quiz__question">
                    <span class="subtitle">Bài tập</span>
                   <?=$dataQuestion['question']?>

                </h5>
                <div class="quiz__img">
                    <img class="img-fluid" src="./public/img/<?php echo e($dataQuestion['question_img']); ?>" alt="">
                </div>
                <div class="quiz-hint">
                    <h5 class="subtitle quiz-hint__title">Gợi ý</h5>
                    Chọn <?php echo e($countAnswers); ?> đáp án
                </div>
            </aside>
            <div class="quiz-container">
                <div class="index-quiz">
                    <?php $index=1 ?>
                    <?php $__currentLoopData = $dataQuestionInLesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="quzi?question_id=<?php echo e($key['question_id']); ?>" class="index__quiz"><?=$index++?></a>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="quiz-content">
                    <form action="quzi-answer" method="POST" class="quiz-answer">
                        <?php if($countAnswers>1): ?>
                        <div class="list-answer">
                            <div class="inputGroup">
                                <input type="hidden" name="question_id" value="<?php echo e($dataQuestion['question_id']); ?>">
                                <input id="option1" name="anwer_one" value="1" type="checkbox" />
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

                                <input id="option2" name="anwer_two" value="2" type="checkbox" />
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
                                <input id="option3" name="anwer_three" value="3" type="checkbox" />
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
                                <input id="option4" name="anwer_four" value="4" type="checkbox" />
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
                                <input id="option1" name="anwer_one" value="1" type="radio" />
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
                                <input id="option2" name="anwer_two" value="2" type="radio" />
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
                                <input id="option3" name="anwer_three" value="3" type="radio" />
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
                                <input id="option4" name="anwer_four" value="4" type="radio" />
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
                        <div class="btn-submit">
                            <button type="submit" class="btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/tablinks.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/customer/quiz.blade.php ENDPATH**/ ?>