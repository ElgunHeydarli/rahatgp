@extends('front.layouts.layout')

@php
    $counter = 0;
@endphp

@section('content')
    <section class="products_section">
        <div class="container">
            <form class="search_area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header_form">
                            <div class="form_box">
                                <div class="search_icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.5006 11.0006H11.7106L11.4306 10.7306C12.6306 9.33063 13.2506 7.42063 12.9106 5.39063C12.4406 2.61063 10.1206 0.390626 7.32063 0.0506256C3.09063 -0.469374 -0.469374 3.09063 0.0506256 7.32063C0.390626 10.1206 2.61063 12.4406 5.39063 12.9106C7.42063 13.2506 9.33063 12.6306 10.7306 11.4306L11.0006 11.7106V12.5006L15.2506 16.7506C15.6606 17.1606 16.3306 17.1606 16.7406 16.7506C17.1506 16.3406 17.1506 15.6706 16.7406 15.2606L12.5006 11.0006ZM6.50063 11.0006C4.01063 11.0006 2.00063 8.99063 2.00063 6.50063C2.00063 4.01063 4.01063 2.00063 6.50063 2.00063C8.99063 2.00063 11.0006 4.01063 11.0006 6.50063C11.0006 8.99063 8.99063 11.0006 6.50063 11.0006Z"
                                            fill="#989898" />
                                    </svg>
                                </div>
                                <input type="search" class="" placeholder="Search Name">
                                <button class="">
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.2925 0.293762C-0.0975 0.683762 -0.0975 1.31376 0.2925 1.70376L4.1725 5.58376L0.2925 9.46376C-0.0975 9.85376 -0.0975 10.4838 0.2925 10.8738C0.6825 11.2638 1.3125 11.2638 1.7025 10.8738L6.2925 6.28376C6.6825 5.89376 6.6825 5.26376 6.2925 4.87376L1.7025 0.283762C1.3225 -0.0962378 0.6825 -0.0962378 0.2925 0.293762Z"
                                            fill="#090909" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="header_form">
                            <div class="form_box">
                                <div class="search_icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.5006 11.0006H11.7106L11.4306 10.7306C12.6306 9.33063 13.2506 7.42063 12.9106 5.39063C12.4406 2.61063 10.1206 0.390626 7.32063 0.0506256C3.09063 -0.469374 -0.469374 3.09063 0.0506256 7.32063C0.390626 10.1206 2.61063 12.4406 5.39063 12.9106C7.42063 13.2506 9.33063 12.6306 10.7306 11.4306L11.0006 11.7106V12.5006L15.2506 16.7506C15.6606 17.1606 16.3306 17.1606 16.7406 16.7506C17.1506 16.3406 17.1506 15.6706 16.7406 15.2606L12.5006 11.0006ZM6.50063 11.0006C4.01063 11.0006 2.00063 8.99063 2.00063 6.50063C2.00063 4.01063 4.01063 2.00063 6.50063 2.00063C8.99063 2.00063 11.0006 4.01063 11.0006 6.50063C11.0006 8.99063 8.99063 11.0006 6.50063 11.0006Z"
                                            fill="#989898" />
                                    </svg>
                                </div>
                                <input type="search" class="" placeholder="Place select data">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="filter_btn btn_outline_blue">
                            Filter
                        </a>
                    </div>
                </div>

            </form>
            <div class="order_list">
                <table class="stripped_table">
                    <thead>
                        <tr>
                            <th colspan="3">

                            </th>
                            <th>
                                <p class="order_text">
                                    Sifariş tarixi:
                                </p>
                            </th>
                            <th>
                                <p class="order_text">
                                    Rəng:
                                </p>
                            </th>
                            <th>
                                <p class="order_text">
                                    Say:
                                </p>
                            </th>
                            <th>
                                <p class="order_text color_blue fw-bold">
                                    Hamısını seç
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($basket as $key => $product)
                            <tr>
                                <td>
                                    <div class="count">
                                        <p class="order_text">
                                            {{ ++$counter }}
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="order_img">
                                        <img src="{{ asset('uploads/products/' . $product['image']) }}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div class="order_detail">
                                        <div class="product_name">
                                            <h4 class="message_bot">
                                                <a
                                                    href="{{ route('product-detail', $product['slug']) }}">{{ $product['name'] }}</a>
                                            </h4>
                                            {{-- <p>
                                                Lorem ipsum dolor sit amet, consectetur.
                                            </p> --}}
                                        </div>
                                        <div class="price">
                                            ${{ $product['price'] * $product['count'] }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="date order_text">
                                        {{ $product['created_at']->format('d.m.Y') }} <br>
                                        {{ $product['created_at']->format('H:i:s') }}
                                    </p>
                                </td>
                                <td>
                                    <p class="order_text">
                                        {{ $product['color'] }}
                                    </p>
                                </td>
                                <td>
                                    <div class="basket_item_count">
                                        <span class="minus" data-id="{{ $product['product_id'] }}">
                                            <svg width="16" height="3" viewBox="0 0 16 3" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 5.24537e-07C14.8284 5.60748e-07 15.5 0.671574 15.5 1.5C15.5 2.32843 14.8284 3 14 3L2 3C1.17157 3 0.5 2.32843 0.5 1.5C0.5 0.671573 1.17157 -3.62117e-08 2 0L14 5.24537e-07Z"
                                                    fill="#889AC9" />
                                            </svg>
                                        </span>
                                        <input type="number" value="{{ $product['count'] }}" min="1">
                                        <span class="plus" data-id="{{ $product['product_id'] }}">
                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8 0C7.17157 0 6.5 0.671573 6.5 1.5V6H2C1.17157 6 0.5 6.67157 0.5 7.5C0.5 8.32843 1.17157 9 2 9H6.5V13.5C6.5 14.3284 7.17157 15 8 15C8.82843 15 9.5 14.3284 9.5 13.5V9H14C14.8284 9 15.5 8.32843 15.5 7.5C15.5 6.67157 14.8284 6 14 6H9.5V1.5C9.5 0.671573 8.82843 0 8 0Z"
                                                    fill="#889AC9" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom_check">
                                        <input type="checkbox" value="{{ $product['product_id'] }}" class="styled-checkbox"
                                            id="item1">
                                        <label for="item1"></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                <span class="btn_blue delete_all" style="float:right;">Seçilmişləri sil</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="center_btn">
                <form action="{{ route('buy') }}" method="post">
                    @csrf
                    <button type="submit" class="btn_blue">Indi al</button>
                </form>
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
        let plus = $('.plus');
        let minus = $('.minus');
        let delete_all = $('.delete_all');
        plus.on('click', function(e) {
            e.preventDefault();
            let count = $(this).siblings('input').val();
            $(this).siblings('input').val(++count);
            let id = $(this).attr('data-id');
            let url = `/add-to-cart/${id}?count=1`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    let total_price = $(this).parents('tr').find('.price');
                    total_price.text(`$${+data.data[id].price * +data.data[id].count}`);
                });
        })

        minus.on('click', function() {
            let count = $(this).siblings('input').val();
            if (count > 1) {
                $(this).siblings('input').val(--count);
                let id = $(this).attr('data-id');
                let url = `/add-to-cart/${id}?count=-1`;
                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        let total_price = $(this).parents('tr').find('.price');
                        total_price.text(`$${+data.data[id].price * +data.data[id].count}`);
                    });
            }

        });

        delete_all.on('click', function() {
            let product_ids = [];
            $('.styled-checkbox:checked').each(function(index, elem) {
                product_ids.push(elem.value);
                elem.parentElement.parentElement.parentElement.remove();
            });
            let url = `/remove-from-basket?product_ids=${product_ids}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    let toastr_type = 'success';
                    if (data.code == 405) {
                        toastr_type = 'warning';
                    } else {
                        toastr_type = 'success';
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
