<header class="top-head" style="position: relative;">
    <div class="logo-box shadow">
        <img src="{{ asset('img/logo.jpeg') }}" alt="">
    </div>
    <ul class="d-flex align-items-center justify-content-end p-2 m-0">
        <li>{{ Auth::user()->name }}</li>
        <li class="ms-2">
            <img class="border rounded-circle" src="{{ asset('img/default-user.png') }}" alt="">
        </li>
    </ul>
</header>
<nav class="top-nav d-flex justify-content-between">
    <ul class="d-flex">
        <li>
            <a href="/" class="d-flex justify-content-start align-items-center {{ Request::is('dashboard*') ? 'active' : '' }}">
                <i class='me-1 bx bx-bar-chart-square'></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/product" class="d-flex justify-content-start align-items-center {{ Request::is('product*') ? 'active' : '' }}">
                <i class='me-1 bx bx-shopping-bag'></i>
                Product
            </a>
        </li>
        <li>
            <a href="/category" class="d-flex justify-content-start align-items-center {{ Request::is('category*') ? 'active' : '' }}">
                <i class='me-1 bx bx-coin-stack'></i>
                Category
            </a>
        </li>
        <li>
            <a href="/sales-report" class="d-flex justify-content-start align-items-center {{ Request::is('sales-report*') ? 'active' : '' }}">
                <i class='me-1 bx bx-cart-alt'></i>
                Sales Report
            </a>
        </li>
        <li>
            <a href="/user" class="d-flex justify-content-start align-items-center {{ Request::is('user*') ? 'active' : '' }}">
                <i class='me-1 bx bx-user-circle' ></i>
                User
            </a>
        </li>
        <li>
            <a href="/admin" class="d-flex justify-content-start align-items-center {{ Request::is('admin*') ? 'active' : '' }}">
                <i class='me-1 bx bx-chip'></i>
                Admin
            </a>
        </li>
    </ul>
    <ul class="d-flex me-4">
        <li class="d-flex justify-content-start align-items-center">
            <form action="/logout" class="" method="post">
                @csrf
                <button class="btn d-flex justify-content-start align-items-center border-none">
                    <i class='me-1 bx bx-log-out'></i>
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav>
