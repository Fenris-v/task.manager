<div class="clearfix">
    <ul class="main-menu bottom">
        <?php for ($i = 0; $i < count($menuNav); $i++) : ?>
            <li><a href='#'><?= $menuNav[$i] ?></a></li>
        <?php endfor; ?>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr> <?= $date ?></nobr>
    Project .
</div>

</body>
</html>
