@extends('front.layouts.layout')

@section('content')
    <section class="products_section">
        <div class="container">
            <div class="product_detail">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="product_img_list">
                            <div class="main_img">
                                <img src="{{ asset('uploads/products/' . $product->images[0]) }}" alt="">
                            </div>
                            <ul class="mini_img_list">
                                @foreach ($product->images as $image)
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset('uploads/products/' . $image) }}" alt="">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product_detail_text">
                                    <h4 class="product-name">{{ $product->name }}
                                    </h4>
                                    <div class="product_rating">
                                        <span>
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0L7.95934 4.49139H12.6819L8.86126 7.26722L10.3206 11.7586L6.5 8.98278L2.6794 11.7586L4.13874 7.26722L0.318133 4.49139H5.04066L6.5 0Z"
                                                    fill="#F4732A" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0L7.95934 4.49139H12.6819L8.86126 7.26722L10.3206 11.7586L6.5 8.98278L2.6794 11.7586L4.13874 7.26722L0.318133 4.49139H5.04066L6.5 0Z"
                                                    fill="#F4732A" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0L7.95934 4.49139H12.6819L8.86126 7.26722L10.3206 11.7586L6.5 8.98278L2.6794 11.7586L4.13874 7.26722L0.318133 4.49139H5.04066L6.5 0Z"
                                                    fill="#F4732A" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0L7.95934 4.49139H12.6819L8.86126 7.26722L10.3206 11.7586L6.5 8.98278L2.6794 11.7586L4.13874 7.26722L0.318133 4.49139H5.04066L6.5 0Z"
                                                    fill="#F4732A" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0L7.95934 4.49139H12.6819L8.86126 7.26722L10.3206 11.7586L6.5 8.98278L2.6794 11.7586L4.13874 7.26722L0.318133 4.49139H5.04066L6.5 0Z"
                                                    fill="#F9F9F9" />
                                            </svg>
                                        </span>
                                        <p>
                                            0.5
                                        </p>
                                    </div>
                                    <p class="stock-status in_stock">
                                        <!--                                    if the product is aout of stock the add out_stock-->
                                        <i class="far fa-check"></i>
                                        <span>Anbarda var </span>
                                    </p>
                                    <div class="color_variants">

                                    </div>
                                    {!! $product->material !!}
                                    <p class="product_text">
                                        {!! $product->details !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product_summary">
                                    <div class="product_price">
                                        @if ($product->discount)
                                            <span class="sale_price">
                                                {{ $product->price - $product->discount }} $
                                            </span>
                                            <span class="main_price">
                                                {{ $product->price }} $
                                            </span>
                                        @else
                                            <span class="sale_price">
                                                {{ $product->price }} $
                                            </span>
                                        @endif

                                    </div>
                                    <div class="product_count">
                                        <p class="price_per">
                                            Price per number
                                        </p>
                                        <div class="quantity_box">
                                            <div class="quantity_input">
                                                <span class="far fa-minus"></span>
                                                <input type="number" value="1">
                                                <span class="far fa-plus"></span>
                                            </div>
                                            <span>number</span>
                                        </div>
                                        <div class="summary_btn">
                                            <a href="/add-to-cart/{{ $product->id }}" class="btn_blue">Səbətə əlavə et </a>
                                            <a href="{{ route('buy') }}" class="btn_orange">Indi Al</a>
                                        </div>
                                        <ul class="summary_detail">
                                            <li>
                                                <span>
                                                  Ödənişsiz Çatdırılma 
                                                </span>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="center_btn py-30">
                <!--<a href="#" class="btn_blue">Other product</a>-->
                <a href="/" class="btn_outline_blue">Yeni axtarış</a>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        let minus = $('.quantity_input .fa-minus');
        let plus = $('.quantity_input .fa-plus');

        minus.on('click', function() {
            let quantity = $(this).siblings('input').val();
            if (quantity > 1) $(this).siblings('input').val(--quantity);
        });

        plus.on('click', function() {
            let quantity = $(this).siblings('input').val();
            $(this).siblings('input').val(++quantity);
        });

        let basketBtn = $('.summary_btn .btn_blue');
        basketBtn.on('click', function(e) {
            e.preventDefault();
            let count = $('.quantity_input input').val();
            let url = $(this).attr('href') + '?count=' + count;
            let toastr_type = 'success';
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    switch (data.code) {
                        case 500:
                            toastr_type = 'error';
                            break;
                        case 401:
                            toastr_type = 'warning';
                            break;
                    }

                    toastr[toastr_type](data.message)

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                });

        });
    </script>
@endpush
