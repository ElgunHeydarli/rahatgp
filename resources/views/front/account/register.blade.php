@extends('front.layouts.layout')

@section('content')
    <section class="auth_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="auth_text">
                        <h1 class="h1_bold">
                            Qeydiyyat
                        </h1>
                        <p class="title">
                            Hesabınız yoxdursa, qeydiyyatdan keçin. 
                        </p>
                        <p class="title">
                            Hesabınız var? <a href="{{ route('login') }}">Daxil ol !</a>
                        </p>
                        <img src="{{ asset('front/assets/img/login.png') }}" alt="">
                    </div>

                </div>
                <div class="col-lg-5">
                    <form class="auth_form" method="POST">
                        @csrf
                        <h4 class="h2">Register</h4>
                        <div class="input_list">
                            <div class="mb-15">
                                <input type="email" name="email" placeholder="Emailini daxil et">
                            </div>
                            <div class="mb-15">
                                <input type="text" name="name" placeholder="Yeni İstifadəçi adı yarat">
                            </div>
                            <div class="pass_input mb-15">
                                <input type="password" name="password" class="password_input" placeholder="Şifrə">
                                <span class="close_eye">
                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.37012 5.07186L10.8037 7.4269L10.8152 7.30354C10.8152 6.0662 9.77617 5.06065 8.49759 5.06065L8.37012 5.07186Z"
                                            fill="#9B9B9B" />
                                        <path
                                            d="M8.49849 3.56542C10.6307 3.56542 12.3613 5.24012 12.3613 7.30358C12.3613 7.78581 12.2608 8.2456 12.087 8.668L14.3467 10.8548C15.5133 9.9128 16.4326 8.69418 17.0005 7.30358C15.6601 4.0215 12.3651 1.69635 8.49853 1.69635C7.41694 1.69635 6.38175 1.88325 5.41992 2.21968L7.08863 3.83082C7.52508 3.66635 8.0002 3.56542 8.49849 3.56542Z"
                                            fill="#9B9B9B" />
                                        <path
                                            d="M0.77254 1.52815L2.53396 3.23275L2.88548 3.57293C1.61077 4.53738 0.60259 5.81957 0 7.3036C1.33653 10.5857 4.63531 12.9108 8.49808 12.9108C9.69555 12.9108 10.8389 12.6865 11.8857 12.2791L12.2141 12.5968L14.4661 14.7799L15.4511 13.8304L1.75754 0.574921L0.77254 1.52815ZM5.04477 5.65882L6.23837 6.81391C6.2036 6.97466 6.18043 7.13538 6.18043 7.3036C6.18043 8.54094 7.2195 9.54649 8.49808 9.54649C8.6719 9.54649 8.83801 9.52406 9.00025 9.49042L10.1938 10.6455C9.68008 10.8922 9.10842 11.0418 8.49808 11.0418C6.36584 11.0418 4.63531 9.36706 4.63531 7.3036C4.63531 6.71298 4.78983 6.15972 5.04477 5.65882Z"
                                            fill="#9B9B9B" />
                                    </svg>
                                </span>
                            </div>
                            <div class="pass_input mb-15">
                                <input type="password" name="confirm_password" class="password_input"
                                    placeholder="Şifrəni təkrar daxil edin.">
                                <span class="close_eye">
                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.37012 5.07186L10.8037 7.4269L10.8152 7.30354C10.8152 6.0662 9.77617 5.06065 8.49759 5.06065L8.37012 5.07186Z"
                                            fill="#9B9B9B" />
                                        <path
                                            d="M8.49849 3.56542C10.6307 3.56542 12.3613 5.24012 12.3613 7.30358C12.3613 7.78581 12.2608 8.2456 12.087 8.668L14.3467 10.8548C15.5133 9.9128 16.4326 8.69418 17.0005 7.30358C15.6601 4.0215 12.3651 1.69635 8.49853 1.69635C7.41694 1.69635 6.38175 1.88325 5.41992 2.21968L7.08863 3.83082C7.52508 3.66635 8.0002 3.56542 8.49849 3.56542Z"
                                            fill="#9B9B9B" />
                                        <path
                                            d="M0.77254 1.52815L2.53396 3.23275L2.88548 3.57293C1.61077 4.53738 0.60259 5.81957 0 7.3036C1.33653 10.5857 4.63531 12.9108 8.49808 12.9108C9.69555 12.9108 10.8389 12.6865 11.8857 12.2791L12.2141 12.5968L14.4661 14.7799L15.4511 13.8304L1.75754 0.574921L0.77254 1.52815ZM5.04477 5.65882L6.23837 6.81391C6.2036 6.97466 6.18043 7.13538 6.18043 7.3036C6.18043 8.54094 7.2195 9.54649 8.49808 9.54649C8.6719 9.54649 8.83801 9.52406 9.00025 9.49042L10.1938 10.6455C9.68008 10.8922 9.10842 11.0418 8.49808 11.0418C6.36584 11.0418 4.63531 9.36706 4.63531 7.3036C4.63531 6.71298 4.78983 6.15972 5.04477 5.65882Z"
                                            fill="#9B9B9B" />
                                    </svg>
                                </span>
                            </div>
                            <div class="forget_pass">
                                <a href="#">
 Şifrəni unutdun?
 </a>
                            </div>
                        </div>
                        <div class="auth_btn">
                            <button type="submit" class="btn_blue">Qeydiyyat </button>
                            <a href="{{ route('login') }}" class="btn_outline_blue">
                                Daxil ol
                            </a>
                        </div>
                        <p class="">
                            or continue with
                        </p>
                        <div class="login_other">
                            <a href="#">
                                <img src="{{ asset('front/assets/img/Facebook.png') }}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{ asset('front/assets/img/apple.png') }}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{ asset('front/assets/img/google.png') }}" alt="">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
