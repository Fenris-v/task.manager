<?php

function renderBooks($array)
{
    foreach ($array['books'] as $key => $book) {
        $email = $book['authorEmail'];
        $author = $array['authors'][$email];

        echo '<p>Книга ' . $book['bookName'] . ', ее написал ' . $author['authorName'] . ' ' . $author['year'] . " ($email)</p>";
    }
}
