@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')
<main class="bgr-light" style="margin-top: 80px;">
    <div class="learning-section">
        <div class="container-fluid">
            <div class="learning-fluid">
                <div class="learning-space">
                    <div class="learning__video" style="margin-bottom: 20px;">
                        @if(isset($lessonFist))
                        <iframe width="98%" height="520" src="https://www.youtube.com/embed/{{$lessonFist['lesson_link']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                        <h2 style="font-size: 20px;text-align:center;margin-top:15px">{{$lessonFist['lesson_name']}}</h2>
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
                                <span>10 bình luận</span>
                            </div>
                            <div class="form-comment-input ">
                                <div class="comment-img">
                                    <img src="./public/img/{{$userInfo['student_avatar']}}" alt="" class="img-fluid">
                                </div>
                                <form method="POST" action="binh-luan-bai-hoc?student_id={{$userInfo['student_id']}}">
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
                                        <img src="./public/img/{{$key['student_avatar']}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="comment-text">
                                        <span class="comment-item__name">
                                            {{$key['student_name']}}
                                        </span>
                                        <span class="comment-item__date" style="margin-left: 30px;">
                                            {{$key['date_cmtt']}}
                                        </span>
                                        <p class="comment-item__content">
                                            {{$key['comment_content']}}
                                        </p>
                                    </div>
                                    <div class="action-ctrl">
                                        <button class="item-ctrl-btn"><a href=""><i class="fas fa-trash"></i></a></button>
                                        <button class="item-ctrl-btn"><a href=""><i class="fas fa-pen"></i></a></button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="note-lesson" class="tab-content">
                            <form class="form__note" action="">
                                <label class="form__note__title" for="">Tạo ghi chú mới</label>
                                <div class="note-section-content">
                                    <input class="input__time-note" type="text" placeholder="Thời gian">
                                    <textarea class="input__content-note" type="text" placeholder="Nội dung ghi chú"> </textarea>
                                    <button type="submit" class="btn btn-note">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="note-lesson-list">
                                <div class="note-lesson-item">
                                    <span class="note__time">
                                        3:15
                                    </span>
                                    <div class="note-text-container">
                                        <span class="lesson-title">Bài 1: Làm quen js</span>
                                        <p class="note-content">
                                            Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay
                                            Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay
                                        </p>
                                    </div>
                                    <div class="action-ctrl note-item-ctrl">
                                        <button class="item-ctrl-btn">
                                            <a href=""><i class="fas fa-pencil-alt"></i></a>
                                        </button>
                                        <button class="item-ctrl-btn">
                                            <a href=""><i class="fas fa-trash"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="play-list">
                    <h3 class="course__title" style="font-size: 23px;margin-top:-10px">
                        Khóa học {{$subjectName}}
                    </h3>
                    <?php
                    $index = 1;
                    ?>
                    <div class="lesson-list">
                        @foreach($dataLesson as $key)
                        <div class="lesson-item">
                            <a data-id="{{$key['lesson_id']}}" href="" class="lesson-item-info">
                                <span class="lesson__index" style="margin-top: 10px;margin-left:5px"><i class="fas fa-play-circle"></i></span>
                                <h4 class="lesson-item__title" style="line-height: 1.4;">
                                    Bài <?= $index++ ?>: {{$key['lesson_name']}}
                                </h4>
                                <span class="lesson__time">
                                    10:10
                                </span>
                            </a>
                            <div class="lesson-item-test">
                                <a href="" class="test_index">
                                    1
                                </a>
                                <a href="" class="test_index">
                                    2
                                </a>
                                <a href="" class="test_index">
                                    3
                                </a>
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
        $('.lesson-item-info').click(function(e) {
            e.preventDefault();
            var lesson_id = $(this).data('id');
            $.get("bai-hoc-tiep-theo", {
                lesson_id: lesson_id
            }, function($data) {
                $('.learning__video').html($data);
            })
        })
    })
</script>
@endsection