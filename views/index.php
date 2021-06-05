<h1 class="page-title">Тренажёр для студентов</h1>

<div class="open-wordssets-panel">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>


<div class="wordsssets-panel">
    <input class="search" type="text" placeholder="Поиск">

    <?php
    foreach ($wordssets as $i => $wordsset):
    ?>
    <button class="wordsset <?=$i == 0 ? 'choosed-wordsset' : 'enumeration'?>" data-words="<?=$wordsset['words']?>"><?=$wordsset['name']?></button>
    <?php
    endforeach;
    ?>
</div>

<div class="trainer">
    <div class="words-container">
        <!-- words -->
    </div>

    <input class="words-input" disabled type="text" placeholder="Введите слово">

    <button class="begin">Начать</button>
</div>

<a class="logout-button" href="/model/logout.php">Выйти</a>