@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')
<div class="container bgr-img">
    <div class="container-fluid">
        <div class="contact-section">
            <div class="contact-text">
                <div class="contact-text-head">
                    <h2 class="contact__title">
                        Liên hệ
                    </h2>
                    <p class="contact__subtitle">
                        Hãy nói cho chúng tôi biết những thắc mắc của bạn
                    </p>
                </div>
                <div class="contact-text-body">
                    <div class="text-body-item">
                        <i class="fas fa-envelope"></i>
                        <span class="item__text">courses@gmail.com</span>
                    </div>
                    <div class="text-body-item">
                        <i class="fas fa-phone-alt"></i>
                        <span class="item__text">+84 12345689</span>
                    </div>
                    <div class="text-body-item">
                        <i class="fas fa-map-marked-alt"></i>
                        <span class="item__text">Hà Nội, Việt Nam</span>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form action="" class="contact__form">
                    <label class="form__title" for="">Họ tên</label>
                    <input type="text" placeholder="Họ và tên" class="form__input">
                    <label class="form__title" for="">Email</label>
                    <input type="email" placeholder="Email" class="form__input">
                    <label class="form__title" for="">Nội dung</label>
                    <textarea class="form__input" placeholder="Nội dung" name="" id="" cols="30" rows="10"></textarea>
                    <div class="btn-right">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection