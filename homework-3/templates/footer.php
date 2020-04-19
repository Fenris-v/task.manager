<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/homework-3/include/data.php' ?>

<div class="clearfix">
    <ul class="main-menu bottom">
        <?php
        global $menuNav;
        for ($i = 0; $i < count($menuNav); $i++) {
            echo "<li><a href='#'>$menuNav[$i]</a></li>";
        }
        ?>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr> <?= $date ?></nobr>
    Project .
</div>

</body>
</html>