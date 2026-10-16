<!-- Transactions tabs -->
<div class="card sub-menu">
    <div class="card-body">
        <ul class="d-flex">
            <li class="nav-item">
                <a href="{{ route('deposits-history') }}" class="nav-link {{ request()->routeIs('deposits-history') ? 'active' : '' }}">
                    <i class="mdi mdi-heart"></i>
                    <span>Deposits</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('withdrawals-history') }}" class="nav-link {{ request()->routeIs('withdrawals-history') ? 'active' : '' }}">
                    <i class="mdi mdi-pentagon"></i>
                    <span>Withdrawals</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('investments-history') }}" class="nav-link {{ request()->routeIs('investments-history') ? 'active' : '' }}">
                    <i class="mdi mdi-diamond"></i>
                    <span>Investments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('earnings-history') }}" class="nav-link {{ request()->routeIs('earnings-history') ? 'active' : '' }}">
                    <i class="mdi mdi-cash-multiple"></i>
                    <span>Earnings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
