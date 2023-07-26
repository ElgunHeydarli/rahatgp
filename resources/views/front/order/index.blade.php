@extends('front.layouts.layout')

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
                <table>
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
                            <th colspan="2">
                                <p class="order_text">
                                    Status:
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="count">
                                    <p class="order_text">
                                        1
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="order_img">
                                    <img src="assets/img/product.png" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="order_detail">
                                    <div class="product_name">
                                        <h4 class="message_bot">
                                            Lorem ipsum dolor sit amet.
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur.
                                        </p>
                                    </div>
                                    <div class="price">
                                        $9999
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="date order_text">
                                    14.02.2023 <br> 14:53:01
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Qara
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Tamamlanıb
                                </p>
                            </td>
                            <td>
                                <a href="#" class="order_link">
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.2925 0.293762C-0.0975 0.683762 -0.0975 1.31376 0.2925 1.70376L4.1725 5.58376L0.2925 9.46376C-0.0975 9.85376 -0.0975 10.4838 0.2925 10.8738C0.6825 11.2638 1.3125 11.2638 1.7025 10.8738L6.2925 6.28376C6.6825 5.89376 6.6825 5.26376 6.2925 4.87376L1.7025 0.283762C1.3225 -0.0962378 0.6825 -0.0962378 0.2925 0.293762Z"
                                            fill="#090909" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="count">
                                    <p class="order_text">
                                        2
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="order_img">
                                    <img src="assets/img/product.png" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="order_detail">
                                    <div class="product_name">
                                        <h4 class="message_bot">
                                            Lorem ipsum dolor sit amet.
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur.
                                        </p>
                                    </div>
                                    <div class="price">
                                        $9999
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="date order_text">
                                    14.02.2023 <br> 14:53:01
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Qara
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Tamamlanıb
                                </p>
                            </td>
                            <td>
                                <a href="#" class="order_link">
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.2925 0.293762C-0.0975 0.683762 -0.0975 1.31376 0.2925 1.70376L4.1725 5.58376L0.2925 9.46376C-0.0975 9.85376 -0.0975 10.4838 0.2925 10.8738C0.6825 11.2638 1.3125 11.2638 1.7025 10.8738L6.2925 6.28376C6.6825 5.89376 6.6825 5.26376 6.2925 4.87376L1.7025 0.283762C1.3225 -0.0962378 0.6825 -0.0962378 0.2925 0.293762Z"
                                            fill="#090909" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="count">
                                    <p class="order_text">
                                        2
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="order_img">
                                    <img src="assets/img/product.png" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="order_detail">
                                    <div class="product_name">
                                        <h4 class="message_bot">
                                            Lorem ipsum dolor sit amet.
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur.
                                        </p>
                                    </div>
                                    <div class="price">
                                        $9999
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="date order_text">
                                    14.02.2023 <br> 14:53:01
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Qara
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Tamamlanıb
                                </p>
                            </td>
                            <td>
                                <a href="#" class="order_link">
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.2925 0.293762C-0.0975 0.683762 -0.0975 1.31376 0.2925 1.70376L4.1725 5.58376L0.2925 9.46376C-0.0975 9.85376 -0.0975 10.4838 0.2925 10.8738C0.6825 11.2638 1.3125 11.2638 1.7025 10.8738L6.2925 6.28376C6.6825 5.89376 6.6825 5.26376 6.2925 4.87376L1.7025 0.283762C1.3225 -0.0962378 0.6825 -0.0962378 0.2925 0.293762Z"
                                            fill="#090909" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="count">
                                    <p class="order_text">
                                        2
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="order_img">
                                    <img src="assets/img/product.png" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="order_detail">
                                    <div class="product_name">
                                        <h4 class="message_bot">
                                            Lorem ipsum dolor sit amet.
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur.
                                        </p>
                                    </div>
                                    <div class="price">
                                        $9999
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="date order_text">
                                    14.02.2023 <br> 14:53:01
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Qara
                                </p>
                            </td>
                            <td>
                                <p class="order_text">
                                    Tamamlanıb
                                </p>
                            </td>
                            <td>
                                <a href="#" class="order_link">
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.2925 0.293762C-0.0975 0.683762 -0.0975 1.31376 0.2925 1.70376L4.1725 5.58376L0.2925 9.46376C-0.0975 9.85376 -0.0975 10.4838 0.2925 10.8738C0.6825 11.2638 1.3125 11.2638 1.7025 10.8738L6.2925 6.28376C6.6825 5.89376 6.6825 5.26376 6.2925 4.87376L1.7025 0.283762C1.3225 -0.0962378 0.6825 -0.0962378 0.2925 0.293762Z"
                                            fill="#090909" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="center_btn">
                <a href="#" class="btn_blue">View more</a>
            </div>
        </div>
    </section>
@endsection
