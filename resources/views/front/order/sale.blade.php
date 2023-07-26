@extends('front.layouts.layout')

@section('content')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 border_right_sale">
                    <div class="payment_detail">
                        <form action="">
                            <h2 class="h2 text-center">
                                Ödəniş məlumatlarınızı daxil edin 
                            </h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card_inputs">
                                        <input type="text" placeholder="Card number" class="card_number">
                                        <input type="text" placeholder="MM/YY" class="card_date">
                                        <input type="password" placeholder="CVC" class="card_cvv">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Street Adrees" class="normal_input">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Country" class="normal_input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="City" class="normal_input">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" placeholder="State" class="normal_input mini_input">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" placeholder="Zip code" class="normal_input mini_input">
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-check mt-15">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label message_user" for="flexCheckDefault">
                                            <a href="#">
                                                Ödəniş şərtlərini oxumaq üçün klikləyin.
                                            </a> <br>
                                            Oxuduqdan sonra təsdiqləyin.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault1">
                                        <label class="form-check-label message_user" for="flexCheckDefault1">
                                            Ödəniş şərtləri ilə tanış oldum və qəbul edirəm
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="price_list">
                        <div class="price_list_box">
                            <h3 class="">
                               Məhsulların siyahısı 

                            </h3>
                            <ul>
                                @foreach ($basket as $item)
                                    <li>
                                        <div class="order_detail">
                                            <div class="product_name">
                                                <h4 class="message_bot">
                                                    {{ $item['name'] . ' X ' . $item['count'] }}
                                                </h4>
                                                <p>
                                                    Product shop name
                                                </p>
                                            </div>
                                            <div class="price">
                                                ${{ $item['price'] }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="price_list_btn">
                                <form method="POST">
                                    @csrf

                                    <button style="width:100%" type="submit" class="btn_blue ">
                                       Sifariş et
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
