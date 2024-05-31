<header>
    <div class="popup">
        <a href="10.php">Главная</a>
        <?php if(isset($user_id) && $user_id): ?>
            <a id="show_add_photo" href="#">Фото</a>
        <?php endif; ?>
        <a href="#">Посты</a>
        <a href="user.php">Личный кабинет</a>
    </div>
    <div class="mobile-icon">
        <img src="./free-icon-menu-bar-2311552.png" alt="">
    </div>
    <?php if (isset($user_id) && $user_id): ?>
        <a href="logout.php">Выйти</a>
    <?php endif; ?>
</header>
