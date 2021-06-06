<h1 class="page-title">Панель администратора</h1>


<div class="acсounts-management-panel">
    <h2 class="admin-panel-page-title">Все пользователи</h2>
    <input class="search" type="text" placeholder="Поиск">

    <div class="accounts-management-container">
        <?php
        foreach ($usersInfo as $user):
            if ($user['id'] == $_SESSION['id_user']) {
                continue;
            }
        ?>
            <a href="/student-account.php?id=<?=$user['id']?>" class="account enumeration">
                <?=$user['fio']?>
            </a>
        <?php
        endforeach;
        ?>
    </div>
    
    
</div>

<a class="logout-button" href="/model/logout.php">Выйти</a>
