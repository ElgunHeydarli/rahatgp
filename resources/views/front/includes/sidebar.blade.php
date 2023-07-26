<div class="sidebar_box sidebar_container light_bg">
    <div class="sidebar_top_profile">
        <div class="user_photo">
            <img src="{{ asset('front/assets/img/user.jpeg') }}" alt="">
            <h4 class="user_name">
                {{ auth()->user()->fullname() }}
            </h4>
        </div>
        <ul class="sidebar_menu_list">
            <h4 class="">Tənzimləmələr </h4>
            <li>
                <a href="profile-order.html">
                   Bütün Sifarişlər
                </a>
            </li>
            <li>
                <a href="favorites.html">
                    Favoritlər
                </a>
            </li>
            <li>
                <a href="basket.html">
                    Səbətim
                </a>
            </li>
            <li>
                <a href="chat-history.html">
                    Mesajlaşma tarixçəsi
                </a>
            </li>
        </ul>
        <ul class="sidebar_menu_list">
            <h4 class="">Hesab parametrləri</h4>
            <li>
                <a href="profile-setting.html" class="active">
                   Hesab parametrləri
                </a>
            </li>
            <li>
                <a href="saved-cards.html">
                    Saxlanılmış kartlar
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar_bottom">
        <p>
            Free Research Preview.
        </p>
        <p class="app_version">
            Rahatgp IIVersion beta
        </p>
    </div>
</div>
