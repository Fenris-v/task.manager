<div class="clearfix menu_bottom">
    <?php
    render\sortArray($menuNav, 'sort', SORT_DESC);
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php';
    ?>
</div>

<div class="footer">&copy;&nbsp;<nobr> <?= $date ?></nobr>
    Project .
</div>

</body>
</html>
