
<?php $__env->startSection('title', 'Khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<main class="bgr-light-dm">
    <div class="learning-section" style="padding-top: 90px">
        <div class="container-fluid">
            <div class="learning-fluid">
                <div class="learning-space">
                    <div class="learning__video">
                        <?php if(isset($lessonFist)): ?>
                        <iframe width="100%" height="520" src="https://www.youtube.com/embed/<?php echo e($lessonFist['lesson_link']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                        <h2 class="learning__lesson-name" style="font-size: 20px;text-align:center;margin-top:15px"><?php echo e($lessonFist['lesson_name']); ?></h2>
                        <?php endif; ?>
                        <!-- </video> -->
                    </div>
                    <div class="learning-tabs">
                        <div class="btn-tab">
                            <button class="tablinks" id="defaultOpen" onclick="openTabAction(event, 'comment-lesson')">Bình Luận</button>
                            <button class="tablinks" onclick="openTabAction(event, 'note-lesson')">Ghi chú</button>
                        </div>
                        <div id="comment-lesson" class="tab-content">
                            <div class="count-comment">
                                <?php if(!empty($dataComment)): ?>
                                <span>Hiện có <?php echo count($dataComment) ?> bình luận</span>
                                <?php else: ?>
                                <span>Chưa có bình luận nào!</span>
                                <?php endif; ?>
                            </div>
                            <div class="form-comment-input ">
                                <div class="comment-img">
                                    <img src="<?php echo e($userInfo['student_avatar']); ?>" alt="" class="img-fluid">
                                </div>
                                <form method="POST" action="binh-luan-bai-hoc?student_id=<?php echo e($userInfo['student_id']); ?>&bai=<?php echo e($lesson_id); ?>">
                                    <input type="text" name="comment_content" placeholder="Bạn có thắc mắc gì trong bài học này?">
                                    <button type="submit" class="btn btn-comment">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="comment-list">
                                <?php $__currentLoopData = $dataComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="comment-item">
                                    <div class="comment-img comment-img--acc ">
                                        <img src="<?php echo e($key['student_avatar']); ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="comment-text">
                                        <span class="comment-item__name">
                                            <?php echo e($key['student_name']); ?>

                                        </span>
                                        <span class="comment-item__date">
                                            <?php echo e($key['date_cmtt']); ?>

                                        </span>
                                        <p class="comment-item__content">
                                            <?php echo e($key['comment_content']); ?>

                                        </p>
                                    </div>
                                    <?php if($userInfo['student_id'] == $key['student_id']): ?>
                                    <div class="action-ctrl">
                                        <button class="item-ctrl-btn">
                                            <abbr title="Xóa bình luận">
                                                <a class="delete_cmtt" onclick="return confirm('Bạn có muốn xóa bình luận này ?')" data-id="<?php echo e($key['cmtt_id']); ?>" href=""><i class="fas fa-trash"></i></a>
                                            </abbr>
                                        </button>
                                        <button class="item-ctrl-btn">
                                            <abbr title="Sắp ra mắt">
                                                <a href="#"><i class="fas fa-pen"></i></a>
                                            </abbr>
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- <div class="tab-content-note">
                        </div> -->
                        <div id="note-lesson" class="tab-content">
                            <?php if(empty($dataNote)): ?>
                            <form class="form__note" action="ghi-chu-bai-hoc?student_id=<?php echo e($userInfo['student_id']); ?>&bai=<?php echo e($lesson_id); ?>" method="POST">
                                <label class="form__note__title" for="">Tạo ghi chú mới</label>
                                <div class="note-section-content">
                                    <!-- <input class="input__time-note" type="text" placeholder="Thời gian"> -->
                                    <textarea class="input__content-note" placeholder="Nội dung ghi chú" name="content_note" cols="30" rows="6"></textarea>
                                    <button type="submit" class="btn btn-note">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </form>
                            <?php else: ?>
                            <div class="note-lesson-list">
                                <?php $__currentLoopData = $dataNote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="note-lesson-item">
                                    <span class="">
                                    </span>
                                    <div class="note-text-container">
                                        <span class="lesson-title">Nội dung ghi chú</span>
                                        <p class="note-content">
                                            <?php echo e($key['content_note']); ?>

                                        </p>
                                    </div>
                                    <div class="action-ctrl note-item-ctrl">
                                        <button class="item-ctrl-btn">
                                            <a class="editNote" data-id="<?php echo e($key['note_id']); ?>" href=""><i class="fas fa-pencil-alt"></i></a>
                                        </button>
                                        <button class="item-ctrl-btn">
                                            <a onclick="return confirm('Bạn có muốn xóa ghi chú?')" href="xoa-ghi-chu?note_id=<?php echo e($key['note_id']); ?>"><i class="fas fa-trash"></i></a>
                                        </button>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <aside class="play-list">
                    <h3 class="course__title">
                        Khóa học <?php echo e($subjectName); ?>



                    </h3>
                    <?php

                    use App\Models\modelQuestion;

                    $index = 1;
                    ?>
                    <div class="lesson-list">
                        <?php $__currentLoopData = $dataLesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div>

                            <div class="lesson-item">
                                <a href="bai-hoc?mon=<?php echo e($subject_slug); ?>&bai=<?php echo e($key['lesson_slug']); ?>" class="lesson-item-info">
                                    <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                                    <h4 class="lesson-item__title" style="line-height: 1.4;">
                                        Bài <?= $index++ ?>: <?php echo e($key['lesson_name']); ?>

                                    </h4>
                                    <span class="lesson__time">
                                        10:10
                                    </span>
                                </a>
                                <div class="lesson-item-test">
                                    <?php require_once('./app/models/modelQuestion.php');
                                    $model = new modelQuestion;
                                    $dataQuestion = $model->where_id($key['lesson_id']);
                                    $biendem = 1;
                                    ?>
                                    <?php foreach ($dataQuestion as $value) {

                                    ?>
                                        <?php if(isset($dataQuestionStatus)): ?>
                                        <?php $__currentLoopData = $dataQuestionStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyQuestionStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($value['question_id'].$_SESSION['user_info'][0]['student_id']==$keyQuestionStatus['question_id'].$keyQuestionStatus['student_id'] ): ?>
                                        <?php $kq = $keyQuestionStatus['question_id'] . $keyQuestionStatus['student_id'];

                                        ?>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if(isset($kq) && $kq ==$value['question_id'].$_SESSION['user_info'][0]['student_id']): ?>

                                        <a style="background: #04d200;" href="quzi?question_id=<?= $value['question_id'] ?>" class="test_index--success">
                                            <i style="color: white" class="fas fa-check"></i>
                                            <? $biendem++ ?>
                                        </a>

                                        <?php else: ?>
                                        <a href="quzi?question_id=<?= $value['question_id'] ?>" class="test_index">
                                            <?= $biendem++ ?>
                                        </a>
                                        <?php endif; ?>

                                        <?php else: ?>
                                        <a href="quzi?question_id=<?= $value['question_id'] ?>" class="test_index">
                                            <?= $biendem++ ?>
                                        </a>
                                        <?php endif; ?>
                                    <?php   } ?>


                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
<script src="./public/js/customerJs/tablinks.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.delete_cmtt').click(function(e) {
            e.preventDefault();
            var cmtt_id = $(this).data('id');
            $.get("xoa-binh", {
                cmtt_id: cmtt_id
            }, function($data) {
                $('.comment-list').html($data);
            })
        })
    })
    // $(document).ready(function() {
    //     $('.editNote').click(function(e) {
    //         e.preventDefault();
    //         $('#note-lesson').css("display", "none");
    //         var note_id = $(this).data('id');
    //         $.get("sua-ghi-chu", {
    //             note_id: note_id
    //         }, function($data) {
    //             $('.tab-content-note').html($data);
    //         })
    //     })
    // })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project_one\app\views/customer/learning.blade.php ENDPATH**/ ?>