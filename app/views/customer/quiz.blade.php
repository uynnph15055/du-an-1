@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')
<div style="margin-top:130px" class="container bgr-white">
    <div class="container-fluid ">
        <div class="quiz-lesson-container">
            <div class="quiz-container">
                @if(isset($dataQuestion))
                <h5 class="quiz__question">
                    {{$dataQuestion['question']}}
                </h5>
                @endif
                <div class="quiz__img">
                    <img class="img-fluid" src="./public/img/{{$dataQuestion['question_img']}}" alt="">
                </div>
                <div class="quiz-content">
                    <form action="quzi-answer" method="POST" class="quiz-answer">
                        @if($countAnswers>1)
                        <div class="list-answer">
                            <div class="inputGroup">
                                <input type="hidden" name="question_id" value="{{$dataQuestion['question_id']}}">
                                <input id="option1" name="anwer_one" value="1" type="checkbox" />
                                <label class="" for="option1">
                                    <div class="grid">
                                        <span class="index-option">A</span>
                                        <p>
                                            {{$dataQuestion['anwer_one']}}
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
                                            {{$dataQuestion['anwer_two']}}
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
                                            {{$dataQuestion['anwer_three']}}
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
                                            {{$dataQuestion['anwer_four']}}
                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @else

                        <div class="list-answer">
                            <div class="inputGroup">
                                <input id="option1" name="anwer_one" value="1" type="radio" />
                                <label class="" for="option1">
                                    <div class="grid">
                                        <span class="index-option">A</span>
                                        <p>
                                            {{$dataQuestion['anwer_one']}}
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
                                            {{$dataQuestion['anwer_two']}}
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
                                            {{$dataQuestion['anwer_three']}}
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
                                            {{$dataQuestion['anwer_four']}}
                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @endif
                        <div class="btn-submit">
                            <button type="submit"  class="btn-primary">Submit</button>
                        </div>
                     
                    </form>
                </div>
            </div>

            <aside class="play-list">
                <h3 class="course__title">
                    REACT JS
                </h3>

                <div class="lesson-list">
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                    <div class="lesson-item">
                        <a href="" class="lesson-item-info">
                            <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                            <h4 class="lesson-item__title">
                                Bài 1: Xây dựng môi trường
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
                </div>
            </aside>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

@endsection
<!-- @extends('customer.layout.layout')
@section('title', 'Câu hỏi ')
@section('main_content')


@endsection -->
