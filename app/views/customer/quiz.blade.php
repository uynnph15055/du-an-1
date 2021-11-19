@extends('customer.layout.layout')
@section('title', 'Câu Hỏi')
@section('link')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200&family=Lora:wght@500&family=Montserrat:ital,wght@0,200;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
@endsection
@section('main_content')
<!-- <div style="margin-top:130px" class="container bgr-white">
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

     
        </div>
    </div>
</div> -->

<div style="margin-top:100px" class="container bgr-white">
    <div class="container-fluid ">
        <div class="quiz-lesson-container">
            <aside class="aside__question">

                <h3 class="course__name">
                    {{ $dataLessonJoinQuestion['subject_name']}}
                </h3>
                <h4 class="lesson__title">Bài học: {{ $dataLessonJoinQuestion['lesson_name']}} </h4>
                <h5 class="quiz__question">
                    <span class="subtitle">Bài tập</span>
                   <?=$dataQuestion['question']?>

                </h5>
                <div class="quiz__img">
                    <img class="img-fluid" src="./public/img/{{$dataQuestion['question_img']}}" alt="">
                </div>
                <div class="quiz-hint">
                    <h5 class="subtitle quiz-hint__title">Gợi ý</h5>
                    Chọn {{$countAnswers}} đáp án
                </div>
            </aside>
            <div class="quiz-container">
                <div class="index-quiz">
                    <?php $index=1 ?>
                    @foreach(  $dataQuestionInLesson as $key)
                    <a href="quzi?question_id={{$key['question_id']}}" class="index__quiz"><?=$index++?></a>
                   @endforeach
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
                                            {{$dataQuestion['answer_one']}}
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
                                            {{$dataQuestion['answer_two']}}
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
                                            {{$dataQuestion['answer_three']}}
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
                                            {{$dataQuestion['answer_four']}}
                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @else

                        <div class="list-answer">
                            <div class="inputGroup">
                            <input type="hidden" name="question_id" value="{{$dataQuestion['question_id']}}">
                                <input id="option1" name="anwer_one" value="1" type="radio" />
                                <label class="" for="option1">
                                    <div class="grid">
                                        <span class="index-option">A</span>
                                        <p>
                                            {{$dataQuestion['answer_one']}}
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
                                            {{$dataQuestion['answer_two']}}
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
                                            {{$dataQuestion['answer_three']}}
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
                                            {{$dataQuestion['answer_four']}}
                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @endif
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

@endsection