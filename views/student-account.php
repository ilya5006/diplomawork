<h1 class="page-title">Панель администратора</h1>

<div class="wrapper">
    <h2 class="admin-panel-page-title">Учётная запись студента</h2>
    
    <div class="student-account">
        <p class="fio">ФИО: <?=$userInfo['fio']?></p>
        <p class="login">Логин: <?=$userInfo['login']?></p>
        <?php
        if ($userInfo['role'] == 'Студент'):
        ?>
        <p class="group">Группа: <?=$userInfo['group']?></p>
        <?php
        endif;
        ?>
        <p class="role"><?=$userInfo['role']?></p>
        <a href="/model/delete-account.php?id=<?=$userInfo['id']?>">Удалить аккаунт</a>
    </div>
</div>

<a class="logout-button" href="/model/logout.php">Выйти</a>
