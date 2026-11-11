<nav class="rx-bottomnav" aria-label="Mobile navigation">
    <ul>
        <li>
            <a href="{{ route('user_dashboard') }}">
                <i class="fe fe-grid"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user_trade') }}">
                <i class="fe fe-trending-up"></i>
                <span>Trade</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user_deposit') }}">
                <i class="fe fe-arrow-down-circle"></i>
                <span>Deposit</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user_withdraw') }}">
                <i class="fe fe-arrow-up-circle"></i>
                <span>Withdraw</span>
            </a>
        </li>
        <li>
            <a href="{{ route('account_settings') }}">
                <i class="fe fe-user"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</nav>
