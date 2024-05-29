<header>
    <div class="popup">
        <a href="index.php">Главная</a>
        <?php if($user_id): ?> 
        <a id="show_add_photo" href="#">Фото</a>
        <?php endif; ?>
        <a href="#">Посты</a>
        <a href="user.php">Личный кабинет</a>
    </div>
    <div class="mobile-icon">
        <img src="/assets/free-icon-menu-bar-5894506.png" alt="">
    </div>
    <?php if ($user_id): ?>
        <a href="logout.php">Выйти</a>
    <?php endif; ?>
</header>