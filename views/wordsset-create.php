<h1 class="page-title">Панель администратора</h1>

<form class="student-registration" method="POST" enctype="multipart/form-data" action="./../model/wordsset-create.php">
    <h2 class="admin-panel-page-title">Создать набор слов</h2>
    
    <input type="text" name="name" placeholder="Название">
    <label for="file">Выберите файл</label>
    <input id="file" style="display: none;" type="file" name="file">
    <input type="submit" value="Создать">

</form>

<a class="logout-button" href="/model/logout.php">Выйти</a>
