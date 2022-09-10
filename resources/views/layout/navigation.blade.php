<header class="top-head">
    <div class="logo-box shadow">
        <img src="{{ asset('img/default-user.png') }}" alt="">
    </div>
    <ul class="d-flex align-items-center justify-content-end p-2 m-0">
        <li>Akmal Keisin ALfateh</li>
        <li class="ms-2">
            <img class="border rounded-circle" src="{{ asset('img/default-user.png') }}" alt="">
        </li>
    </ul>
</header>
<nav class="top-nav">
    <ul class="d-flex">
        <li>
            <a href="#" class="d-flex justify-content-start align-items-center {{ Request::is('dashboard*') ? 'active' : '' }}">
                <i class='me-1 bx bx-bar-chart-square'></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="d-flex justify-content-start align-items-center {{ Request::is('product*') ? 'active' : '' }}">
                <i class='me-1 bx bx-shopping-bag'></i>
                Product
            </a>
        </li>
        <li>
            <a href="#" class="d-flex justify-content-start align-items-center {{ Request::is('category') ? 'active' : '' }}">
                <i class='me-1 bx bx-coin-stack'></i>
                Category
            </a>
        </li>
        <li>
            <a href="#" class="d-flex justify-content-start align-items-center {{ Request::is('checkout-history*') ? 'active' : '' }}">
                <i class='me-1 bx bx-receipt'></i>
                Checkout History
            </a>
        </li>
        <li>
            <a href="#" class="d-flex justify-content-start align-items-center {{ Request::is('product-report*') ? 'active' : '' }}">
                <i class='me-1 bx bx-cart-alt'></i>
                Product Report
            </a>
        </li>
    </ul>
</nav>
