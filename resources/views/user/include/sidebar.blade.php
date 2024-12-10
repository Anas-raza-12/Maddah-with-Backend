<div style="display: flex; flex-direction: column;" class="col-lg-2 sider-bar">
    <a href="{{ route('user.dashboard') }}" id="My-Profile" class="section-link">My Profile</a>
    <br>
    <a href="{{ route('myaccount.password.change') }}" id="password" class="section-link">Change Password</a>
    <br>
    <!-- <a id="address" class="section-link">Addresses Book</a> -->
    <a href="{{ route('orders') }}" id="Orders" class="section-link">My Orders</a>
    <br>
    <a style="color:#f34031;" href="{{ route('logout') }}" class="section-link">Logout</a>
</div>
