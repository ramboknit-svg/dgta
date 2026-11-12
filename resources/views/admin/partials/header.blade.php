<style nonce="{{ app('cspNonce') }}">
    .main-header {
    position: relative;
    min-height: 60px;
}

.main-header h1 {
    font-size: 24px;
    font-weight: bold;
}

.main-header > div:nth-child(2) {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.main-header > div:last-child {
    margin-left: auto;
}
.ansh{
color: #000000 !important; 
font-weight: bold;
}
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light
            d-flex justify-content-between align-items-center">

    <!-- Left: Menu -->
    <div class="navbar-nav">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <!-- Center: Dashboard Title -->
    <div class="text-center">
        <h1 class="mb-0">TERRITORIAL ARMY DASHBOARD</h1>
    </div>

    <!-- Right: Logout -->
    
<div class="navbar-nav">
    <a href="{{ route('Admin.Logout') }}"
       class="nav-link ansh"
       id="logoutBtn">
        <i class="fas fa-sign-out-alt nav-icon"></i>
        Logout
    </a>
</div>


</nav>
<script nonce="{{ app('cspNonce') }}">
document.addEventListener('DOMContentLoaded', function () {
    const logoutBtn = document.getElementById('logoutBtn');

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function (event) {
            const confirmLogout = confirm(
                'Are you sure you want to logout?'
            );

            if (!confirmLogout) {
                event.preventDefault();
            }
        });
    }
});
</script>
