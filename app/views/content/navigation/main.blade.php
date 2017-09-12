<!-- mega menu -->
    <ul class="menu menu-anim-flip menu-response-to-icons">
    
        <!-- home -->
            <li>
                <a href="/"><i class="fa fa-single fa-home"></i></a>
            </li>
				<!--/ home -->

				<!-- about -->
            <li aria-haspopup="true"> <a href="/"><i class="fa fa-star"></i>О нас</a>
                <div class="grid-container4">
                    <ul>
                        <li><a href="/book"><i class="fa fa-book"></i>Гостевая</a></li>
					 		          <li aria-haspopup="true"> <a href="/news"><i class="fa fa-newspaper-o"></i>Новости</a>
								            <div class="grid-container4">
									              <ul>
										                <li><a href="/news/rss"><i class="fa fa-rss"></i>RSS подписка</a></li>
										            </ul>
										        </div>
										    <li aria-haspopup="true"> <a href="/votes"><i class="fa fa-gavel"></i>Голосования</a>
								            <div class="grid-container4">
									              <ul>
										                <li><a href="/votes/history"><i class="fa fa-history"></i>Архив голосований</a></li>
										            </ul>
										        </div>
										    <li aria-haspopup="true"> <a href="/searchuser"><i class="fa fa-user-secret"></i>Поиск пользователя</a>
								            <div class="grid-container4">
									              <ul>
										                <li><a href="/userlist"><i class="fa fa-users"></i>Список юзеров <?=stats_users()?></a></li>
										                <li><a href="/adminlist"><i class="fa fa-rebel"></i>Администрация сайта <?=stats_admins()?></a></li>
										            </ul>
										        </div>
										    
										    <li aria-haspopup="true"> <a href="/page/stat"><i class="fa fa-pie-chart"></i>Статистика сайта</a>
								            <div class="grid-container4">
									              <ul>
										                <li><a href="/ratinglist"><i class="fa fa-line-chart"></i>Рейтинг толстосумов</a></li>
										                <li><a href="/authoritylist"><i class="fa fa-line-chart"></i>Рейтинг репутации</a></li>
										                <li><a href="/statusfaq"><i class="fa fa-paperclip"></i>Статусы юзеров</a></li>
										                <li><a href="/who"><i class="fa fa-street-view"></i>Кто-где</a></li>
										                <li><a href="/onlinewho"><i class="fa fa-users"></i>Кто онлайн</a></li>
										                <li><a href="/api"><i class="fa fa-shield"></i>API интерфейс</a></li>
										            </ul>
										        </div>
										    <li aria-haspopup="true"> <a href="/page"><i class="fa fa-user-secret"></i>Сервисы сайта</a>
								            <div class="grid-container4">
									              <ul>
										                <li><a href="/tags"><i class="fa fa-tags"></i>Справка по тегам</a></li>
										                <li><a href="/smiles"><i class="fa fa-smile-o"></i>Галерея cмайлов</a></li>
										                <li><a href="/faq"><i class="fa fa-leanpub"></i>FAQ (Чаво)</a></li>
										            </ul>
										        </div>
                        <li><a href="/mail"><i class="fa fa-envelope-o"></i>Обратная связь</a></li>
                    </ul>
                </div>
            </li>
				<!--/ about -->

				<!-- categories -->
				    <li aria-haspopup="true"> <a href="/load"><i class="fa fa-download"></i>Категории</a>
                <div class="grid-container4">
                    <ul>
                        <?php
                            if (count($downs) > 0) {    
                                $output = [];
                                    foreach ($downs as $row) {
                                        $id = $row['id'];
                                        $fp = $row['parent'];
                                        $output[$fp][$id] = $row;
                                    }

                            $totalnew = DB::run() -> querySingle("SELECT count(*) FROM `downs` WHERE `active`=? AND `time`>?;", [1, SITETIME-3600 * 120]);
                            echo '<li><a href="/load/fresh"><i class="fa fa-music"></i>Свежие '.$totalnew.'</a></li>';

                            foreach($output[0] as $key => $data) {
                                echo '<li><a href="/load/down?cid='.$data['id'].'"><i class="fa fa-music"></i>'.$data['name'].' ';
                                $subcnt = (empty($data['subcnt'])) ? '' : '/'.$data['subcnt'];
                                $new = (empty($data['new'])) ? '' : '/<span style="color:#ff0000">+</span>'.$data['new'].'';
                                echo '('.$data['count'] . $subcnt . $new.')</a></li>';
                                    if (isset($output[$key])) {
                                        foreach($output[$key] as $odata) {
                                            $subcnt = (empty($odata['subcnt'])) ? '' : '/'.$odata['subcnt'];
                                            $new = (empty($odata['new'])) ? '' : '/<span style="color:#ff0000">+'.$odata['new'].'</span>';
                                            echo '<li><a href="/load/down?cid='.$odata['id'].'"><i class="fa fa-music"></i>'.$odata['name'].' ';
                                            echo ''.$odata['count'] . $subcnt . $new.'</a></li>';
                                        }
                                    }
                            }
                            } else {
                                echo '<li><a href="/load/fresh"><i class="fa fa-music"></i>Свежие 0</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </li>
				<!--/ categories -->

				<!-- rules -->
            <li aria-haspopup="true" class="right"> <a href="/rules"><i class="fa fa-gavel"></i>Правила</a>
                <div class="grid-container4">
                    <ul>
                        <li><a href="/razban"><i class="fa fa-ban"></i>Исправительная</a></li>
                    </ul>
                </div>
            </li>
				<!--/ rules -->

				<!-- share -->
            <li aria-haspopup="true" class="right"> <a href="#"><i class="fa fa-bullhorn"></i>Поделиться</a>
                <div class="grid-container3">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                        <li><a href="whatsapp://send?text=http://realmoney.me" data-href="http://realmoney.me" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i>WhatsApp</a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                    </ul>
                </div>
            </li>
				<!--/ share -->

    </ul>
<!--/ mega menu -->
