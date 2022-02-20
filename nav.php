<div class="navbar">
        <div class="item"><a href="/login-demo/">Home</a></div>
        <?php if (isset($_SESSION['username'])): ?>
        <div class="item"><a href="/login-demo/dashboard/">Dashboard</a></div>
        <?php endif ?>
        <div class="item"><a href="/login-demo/register/">Register</a></div>
        <?php if (!isset($_SESSION['username'])): ?>
        <div class="item"><a href="/login-demo/login/">Login</a></div>
        <?php else: ?>
        <div class="item"><a href="/login-demo/logout.php">Logout</a></div>
        <?php endif ?>
</div>