<div class="bottom-navbar">
    <ul>
        <li>
            <a href="{{ route('user_dashboard') }}" class="{{ request()->routeIs('user_dashboard') ? 'active' : '' }}">
                <i class="fe fe-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user_deposit') }}" class="{{ request()->routeIs('user_deposit', 'user_sub_deposit') ? 'active' : '' }}">
                <i class="fe fe-arrow-down-circle"></i>
                <span>Deposit</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user_deposit_history') }}" class="{{ request()->routeIs('user_deposit_history', 'user_trade_history', 'user_withdraw_history') ? 'active' : '' }}">
                <i class="fe fe-clock"></i>
                <span>History</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user_withdraw') }}" class="{{ request()->routeIs('user_withdraw') ? 'active' : '' }}">
                <i class="fe fe-arrow-up-circle"></i>
                <span>Withdraw</span>
            </a>
        </li>
    </ul>
</div>
