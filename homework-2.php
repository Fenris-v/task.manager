<pre>
    <?php
        require_once __DIR__ . '/data/dataHomework2.php';
    ?>
</pre>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заголовок</title>
    <style type="text/css">.red {
            color: red;
        }</style>
</head>
<body>
<h1 class="<?= $class ?>"><?= $title ?></h1>
<div>Авторов на портале <?= count($result3['authors']) ?></div>
<!-- Выведите все книги -->
<?php foreach ($result3['books'] as $key => $book):
    $email = $book['authorEmail'];
    $author = $result3['authors'][$email]; ?>

    <p>Книга "<?= $book['bookName'] ?>", ее написал <?= $author['authorName'] . ' ' . $author['year'] ?> (<?= $email ?>)</p>

<?php endforeach;
    
    shuffle($result3['books']);
    
    foreach ($result3['books'] as $key => $book):
        $email = $book['authorEmail'];
        $author = $result3['authors'][$email]; ?>

        <p>Книга "<?= $book['bookName'] ?>", ее написал <?= $author['authorName'] . ' ' . $author['year'] ?> (<?= $email ?>)</p>
    
    <?php endforeach; ?>
</body>
</html>
