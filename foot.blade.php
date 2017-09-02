        </div>
        <div class="end"></div>
    </div>
</div>

    <!--footer starts here-->
    <div id="footer">
        <?php
            show_counter();
            show_online();
        ?>
        <div id="copy">
            <b><big>&copy;</big> <i>Copyright</i> 2011-<?=date('Y')?> Music City&#153;</b>
        </div>
        <div id="author"><i class="fa fa-rebel fa-lg text-muted"> <b>Designer By</b></i> <a href="http://realmoney.me" target="_blank" style="margin-left: 2px; border: none;"><img src="/themes/Music_City/style/img/realmoney/logo.png" alt="Real Money&#153;" /></a></div>
        <br>
            <?php
                perfomance();
            ?>
    </div>
    </div>
<?= include_javascript() ?>
</body>
</html>
