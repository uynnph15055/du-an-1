@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')
<main class="bgr-light-dm">
    <div class="learning-section" style="padding-top: 90px">
        <div class="container-fluid">
            <div class="learning-fluid">
                <div class="learning-space">
                    <div class="learning__video">
                        @if(isset($lessonFist))
                        <iframe width="100%" height="520" src="https://www.youtube.com/embed/{{$lessonFist['lesson_link']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                        <h2 class="learning__lesson-name" style="font-size: 20px;text-align:center;margin-top:15px">{{$lessonFist['lesson_name']}}</h2>
                        @endif
                        <!-- </video> -->
                    </div>
                    <div class="learning-tabs">
                        <div class="btn-tab">
                            <button class="tablinks" id="defaultOpen" onclick="openTabAction(event, 'comment-lesson')">Bình Luận</button>
                            <button class="tablinks" onclick="openTabAction(event, 'note-lesson')">Ghi chú</button>
                        </div>
                        <div id="comment-lesson" class="tab-content">
                            <div class="count-comment">
                                @if(!empty($dataComment))
                                <span>Hiện có <?php echo count($dataComment) ?> bình luận</span>
                                @else
                                <span>Chưa có bình luận nào!</span>
                                @endif
                            </div>
                            <div class="form-comment-input ">
                                <div class="comment-img">
                                    <img src="{{$userInfo['student_avatar']}}" alt="" class="img-fluid">
                                </div>
                                <form method="POST" action="binh-luan-bai-hoc?student_id={{$userInfo['student_id']}}&bai={{$lesson_id}}">
                                    <input type="text" name="comment_content" placeholder="Bạn có thắc mắc gì trong bài học này?">
                                    <button type="submit" class="btn btn-comment">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="comment-list">
                                @foreach($dataComment as $key)
                                <div class="comment-item">
                                    <div class="comment-img comment-img--acc ">
                                        <img src="{{$key['student_avatar']}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="comment-text">
                                        <span class="comment-item__name">
                                            {{$key['student_name']}}
                                        </span>
                                        <span class="comment-item__date">
                                            {{$key['date_cmtt']}}
                                        </span>
                                        <p class="comment-item__content">
                                            {{$key['comment_content']}}
                                        </p>
                                    </div>
                                    @if($userInfo['student_id'] == $key['student_id'])
                                    <div class="action-ctrl">
                                        <button class="item-ctrl-btn">
                                            <abbr title="Xóa bình luận">
                                                <a class="delete_cmtt" onclick="return confirm('Bạn có muốn xóa bình luận này ?')" data-id="{{$key['cmtt_id']}}" href=""><i class="fas fa-trash"></i></a>
                                            </abbr>
                                        </button>
                                        <button class="item-ctrl-btn">
                                            <abbr title="Sắp ra mắt">
                                                <a href="#"><i class="fas fa-pen"></i></a>
                                            </abbr>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-content-note">
                        </div>
                        <div id="note-lesson" class="tab-content">
                            @if(empty($dataNote))
                            <form class="form__note" action="ghi-chu-bai-hoc?student_id={{$userInfo['student_id']}}&bai={{$lesson_id}}" method="POST">
                                <label class="form__note__title" for="">Tạo ghi chú mới</label>
                                <div class="note-section-content">
                                    <!-- <input class="input__time-note" type="text" placeholder="Thời gian"> -->
                                    <textarea class="input__content-note" placeholder="Nội dung ghi chú" name="content_note" cols="30" rows="6"></textarea>
                                    <button type="submit" class="btn btn-note">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </form>
                            @else
                            <div class="note-lesson-list">
                                @foreach($dataNote as $key)
                                <div class="note-lesson-item">
                                    <span class="">
                                    </span>
                                    <div class="note-text-container">
                                        <span class="lesson-title">Nội dung ghi chú</span>
                                        <p class="note-content">
                                            {{$key['content_note']}}
                                        </p>
                                    </div>
                                    <div class="action-ctrl note-item-ctrl">
                                        <button class="item-ctrl-btn">
                                            <a class="editNote" data-id="{{$key['note_id']}}"><i class="fas fa-pencil-alt"></i></a>
                                        </button>
                                        <button class="item-ctrl-btn">
                                            <a onclick="return confirm('Bạn có muốn xóa ghi chú?')" href="xoa-ghi-chu?note_id={{$key['note_id']}}"><i class="fas fa-trash"></i></a>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <aside class="play-list">
                    <h3 class="course__title">
                        Khóa học {{$subjectName}}


                    </h3>
                    <?php

                    use App\Models\modelQuestion;

                    $index = 1;
                    ?>
                    <div class="lesson-list">
                        @foreach($dataLesson as $key)

                        <div>

                            <div class="lesson-item">
                                <a href="bai-hoc?mon={{$subject_slug}}&bai={{$key['lesson_slug']}}" class="lesson-item-info">
                                    <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                                    <h4 class="lesson-item__title" style="line-height: 1.4;">
                                        Bài <?= $index++ ?>: {{$key['lesson_name']}}
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
                                        @if(isset($dataQuestionStatus))
                                        @foreach($dataQuestionStatus as $keyQuestionStatus)
                                        @if($value['question_id'].$_SESSION['user_info'][0]['student_id']==$keyQuestionStatus['question_id'].$keyQuestionStatus['student_id'] )
                                        <?php $kq = $keyQuestionStatus['question_id'] . $keyQuestionStatus['student_id'];

                                        ?>
                                        @endif
                                        @endforeach

                                        @if(isset($kq) && $kq ==$value['question_id'].$_SESSION['user_info'][0]['student_id'])

                                        <a style="background: #04d200;" href="quzi?question_id=<?= $value['question_id'] ?>" class="test_index--success">
                                            <i style="color: white" class="fas fa-check"></i>
                                            <?php $biendem++ ?>
                                        </a>

                                        @else
                                        <a href="quzi?question_id=<?= $value['question_id'] ?>" class="test_index">
                                            <?= $biendem++ ?>
                                        </a>
                                        @endif

                                        @else
                                        <a href="quzi?question_id=<?= $value['question_id'] ?>" class="test_index">
                                            <?= $biendem++ ?>
                                        </a>
                                        @endif
                                    <?php   } ?>


                                </div>
                            </div>
                        </div>
                        @endforeach
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
    $(document).ready(function() {
        $('.editNote').click(function(e) {
            e.preventDefault();
            $('.note-lesson-list').css("display", "none");
            var note_id = $(this).data('id');
            $.get("sua-ghi-chu", {
                note_id: note_id
            }, function($data) {
                $('.tab-content-note').html($data);
            })
        })
    })
</script>
@endsection