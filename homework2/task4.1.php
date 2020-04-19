<?php
require_once __DIR__ . '/task4.2.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <style type="text/css">.red {
            color: red;
        }</style>
</head>
<body>

<h1 class="<?php if ($red) echo 'red'; ?>">
    <?= $title ?>
</h1>
<div>Авторов на портале <?= count($result3['authors']) ?></div>
<!-- Выведите все книги -->
<?php foreach ($result3['books'] as $key => $book):
    $email = $book['authorEmail'];
    $author = $result3['authors'][$email]; ?>

    <p>Книга "<?= $book['bookName'] ?>", ее написал <?= $author['authorName'] . ' ' . $author['year'] ?> (<?= $email ?>)</p>

<?php endforeach; ?>

</body>
</html>
