<h1 class="page-title">Панель администратора</h1>


<div class="wordsssets-panel">
    <h2 class="admin-panel-page-title">Наборы слов</h2>
    <input class="search" type="text" placeholder="Поиск">
    <div class="wordssets-container">
        <?php 
        foreach ($wordssets as $wordsset):
        ?>
        <a class="wordsset enumeration" href="/wordsset-editor.php?id=<?=$wordsset['id']?>"><?=$wordsset['name']?></a>
        <?php
        endforeach;
        ?>
    </div>
    
</div>

<a class="logout-button" href="/model/logout.php">Выйти</a>
