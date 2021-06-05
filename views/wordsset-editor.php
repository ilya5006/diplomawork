<h1 class="page-title">Панель администратора</h1>

<div class="words">
    <h2 class="admin-panel-page-title">
        Редактирование набора слов 
        <br>
        "Для программистов"
    </h2>


    <div class="words-container">
        <?php
        foreach ($words as $word):
        ?>
        <p class="word"><?=$word?></p>
        <?php
        endforeach; 
        ?>
    </div>
    
    <input type="text" class="enter-new-word" placeholder="Введите слово">
    <button class="add-new-word">Добавить</button>
</div>

<button class="update">Обновить</button>
<button class="delete">Удалить выбранное</button>

<a class="logout-button" href="/model/logout.php">Выйти</a>
