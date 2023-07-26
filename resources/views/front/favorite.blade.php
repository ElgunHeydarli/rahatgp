@extends('front.layouts.layout')

@section('content')
    <section class="products_section">
        <div class="container">
            <div class="products_title">
                <h1 class="h1_bold">
                   Favoritlər
                </h1>
                <h2 class="h2"> Bütün Favorit Məhsullarınız</h2>
                <div class="product_list">
                    @foreach ($favorite as $product)
                        <div class="single_product">
                            <div class="product_box">
                                <div class="product_top">
                                    <div>
                                        <img src="{{ asset('uploads/products/' . $product['image']) }}" alt="">
                                    </div>
                                    <div class="favorite_box">
                                        <a href="/add-to-cart/{{ $product['product_id'] }}" class="basket_box">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_49_1254)">
                                                    <path
                                                        d="M23.0002 9.84407C22.884 10.2746 22.7661 10.7034 22.6499 11.1339C22.2363 12.6763 21.8244 14.2169 21.4109 15.7593C21.3562 15.9627 21.3015 16.1661 21.2468 16.3712C21.1733 16.6508 20.929 16.8373 20.6367 16.8373C17.4769 16.8373 14.3188 16.8373 11.1589 16.8373C10.607 16.8373 10.0567 16.8373 9.48248 16.8373C9.63286 17.6169 9.78325 18.3864 9.93364 19.1644C10.2037 19.1644 10.4668 19.1644 10.7317 19.1644C11.8699 19.1644 13.0097 19.1644 14.1479 19.1644C15.5851 19.1644 17.024 19.1644 18.4613 19.1644C19.2149 19.1644 19.9685 19.1644 20.7222 19.1644C20.9939 19.1644 21.1904 19.2898 21.2725 19.5153C21.3545 19.739 21.2964 19.9847 21.1221 20.1305C21.0127 20.2237 20.8794 20.2542 20.741 20.2644C20.7136 20.2661 20.6863 20.2644 20.6589 20.2644C16.9625 20.2644 13.2661 20.2627 9.56963 20.2695C9.28937 20.2695 8.97834 20.0254 8.92707 19.7458C8.71345 18.5729 8.47762 17.4051 8.25033 16.2339C8.02646 15.0746 7.80259 13.9153 7.57701 12.7559C7.33605 11.5119 7.09509 10.2695 6.85413 9.02542C6.80115 8.75085 6.74475 8.47797 6.69861 8.20339C6.68494 8.12373 6.65589 8.09831 6.57386 8.1C5.92617 8.10339 5.28019 8.10169 4.6325 8.10169C4.43598 8.10169 4.25483 8.06441 4.12495 7.9C3.98311 7.71695 3.9626 7.51356 4.06172 7.30508C4.16938 7.07458 4.37616 7.00169 4.61371 7.00169C5.42545 7 6.23891 7.00339 7.05066 7C7.23864 7 7.40099 7.05593 7.5172 7.19661C7.58555 7.27966 7.64878 7.38475 7.671 7.48814C7.78721 8.04068 7.88804 8.59831 7.9957 9.15254C7.99912 9.16949 8.00595 9.18475 8.0145 9.20847C8.35116 9.20847 8.68782 9.20847 9.02448 9.20847C13.102 9.20847 17.1795 9.20847 21.2571 9.20847C21.6433 9.20847 22.0278 9.20847 22.414 9.20847C22.7045 9.20847 22.9028 9.36102 22.9848 9.64407C22.9882 9.65763 22.9968 9.6678 23.0019 9.68136V9.84576L23.0002 9.84407Z"
                                                        fill="white" />
                                                    <path
                                                        d="M10.9194 25.0001C10.7178 24.9509 10.5041 24.9272 10.3145 24.8492C9.67189 24.5848 9.28055 24.1052 9.14212 23.4272C8.93363 22.4221 9.58303 21.3984 10.6409 21.1611C11.5141 20.9645 12.4455 21.4509 12.8129 22.3069C13.2282 23.273 12.7719 24.4204 11.8012 24.8306C11.615 24.9086 11.4065 24.934 11.2082 24.9831C11.1826 24.9899 11.1553 24.995 11.1279 25.0018H10.9211L10.9194 25.0001ZM10.2 23.0509C10.2085 23.5187 10.5605 23.8899 11.0168 23.8933C11.4885 23.8984 11.861 23.5272 11.8662 23.0594C11.8713 22.6086 11.497 22.2255 11.0527 22.2221C10.5776 22.2204 10.2017 22.5848 10.1982 23.0492L10.2 23.0509Z"
                                                        fill="white" />
                                                    <path
                                                        d="M18.7054 25.0001C18.5055 24.9544 18.297 24.9306 18.109 24.8561C17.3366 24.551 16.8649 23.8205 16.8854 22.9933C16.911 21.9883 17.733 21.1713 18.7447 21.1238C19.6744 21.0798 20.5408 21.7611 20.71 22.6916C20.8997 23.7374 20.2742 24.6933 19.2352 24.9459C19.1292 24.9713 19.0199 24.9832 18.9122 25.0001C18.8439 25.0001 18.7738 25.0001 18.7054 25.0001ZM18.8148 23.8933C19.2882 23.8849 19.6641 23.5001 19.6522 23.0357C19.6402 22.5899 19.2625 22.2205 18.8233 22.2238C18.3448 22.2289 17.9757 22.6035 17.9843 23.0747C17.9928 23.5272 18.3722 23.9001 18.8165 23.8933H18.8148Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_49_1254">
                                                        <rect width="19" height="18" fill="white"
                                                            transform="translate(4 7)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                        <a href="/add-to-favorite/{{ $product['product_id'] }}"
                                            class="favorite_box_item active">
                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.02321 2.11843C13.219 -3.86668 19.2336 4.09251 13.956 10.3705C12.3289 12.2838 10.2651 14.1449 7.88683 15C4.34781 13.0842 0.778234 10.1856 0.119561 6.12037C-0.868665 1.14256 4.49107 -2.42252 8.02321 2.11843Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="product_bottom">
                                    <div class="product_detail">
                                        <div class="product_name">
                                            <h4 class="message_bot">
                                                <a
                                                    href="{{ route('product-detail', $product['slug']) }}">{{ $product['name'] }}</a>
                                            </h4>
                                        </div>
                                        <div class="price">
                                            ${{ $product['price'] }}
                                        </div>
                                    </div>
                                
                                    <div class="shop_now">
                                        <a href="{{ route('product-detail', $product['slug']) }}">
                                          Indi al
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
          
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
        let basketBtn = $('.basket_box');
        basketBtn.on('click', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
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

        let favoriteBtn = $('.favorite_box_item');

        favoriteBtn.on('click', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
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
