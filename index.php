<?php
require 'db.php';

// Добавление объявления
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO ad (email, title, description, category) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['email'], $_POST['title'], $_POST['description'], $_POST['category']]);
    echo "Объявление добавлено!<br><br>";
}

// Чтение объявлений
$ads = $pdo->query("SELECT * FROM ad ORDER BY created DESC")->fetchAll();
?>

<form method="POST">
    Email: <input name="email"><br>
    Заголовок: <input name="title"><br>
    Описание: <textarea name="description"></textarea><br>
    Категория: <input name="category"><br>
    <button type="submit">Добавить объявление</button>
</form>

<h2>Объявления:</h2>
<ul>
<?php foreach ($ads as $ad): ?>
    <li><strong><?= htmlspecialchars($ad['title']) ?></strong> (<?= $ad['email'] ?>): <?= $ad['description'] ?></li>
<?php endforeach; ?>
</ul>
