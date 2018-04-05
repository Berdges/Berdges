<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include ROOT . '/views/layouts/aside.php'; ?>
        </div>
		<div class="col-md-8">
			<section>
				<div class="list_news">
					<h2>Новости</h2>
					<?php foreach ($news as $newsItem):?>
					<div class="post_news" style="background-image: url(<?php echo $newsItem['img']?>);">
						<div class="short_info_news">
							<h2><?php echo $newsItem['title']?></h2>
                            <div class="wrap_for_makebet"><a data-read-id = "<?php echo $newsItem['id']?>" class="js-button-campaign_bet">Сделать ставку</a></div>
						</div>
					</div>
					<div id="<?php echo $newsItem['id']?>" class="shadow">
						<p><?php echo $newsItem['text']?></p>
					</div>
					<div class="line_gap"></div>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
    </div>
</div>
    <div class="overlay_bet js-overlay-campaign">
        <div class="popup_bet js-popup-campaign">
            <div class="bet">
                <div class="choose_way">
                    <div class="active_choose_way"><span>Рост/Падение</span></div><div class="inactive_choose_way"><span>Значение</span></div>
                </div>

                <form id="up_or_down" action="" method="POST" name="makeBet_up_or_down">
                    <select name="category">
                        <?php foreach($cateegories as $categoryItem):?>
                            <option value="<?php echo $categoryItem['name']?>"><?php echo $categoryItem['name']?></option>
                        <?php endforeach;?>
                    </select>

                    <div class="choose_date">
                        <span>Изменение к дате</span><input id="date_up_or_down" type="date" name="date" value="<?php $d=strtotime("+1 day"); echo date("Y-m-d")?>" min="<?php echo date("Y-m-d")?>">
                    </div>
                    <ul class="setting_param_bet">
                        <li><span>Ставка</span><input id="score_bet" class = "score_bet" type="text" name="score_bet" ></li>
                        <li><span>Коэф-т</span><input id="k_bet" class = "k_bet" type="text" name="k" value="2"></li>
                        <li><span>Прибыль</span><input id="prize_bet" class = "prize_bet" type="text" name="prize" value="0"></li>
                    </ul>
                    <input type="hidden" name="id_post_news" class="id_post_news">
                    <div class="predict">
                        <label>
                            <input id="radio_predict" type="radio" name="radio_" value="up">
                            <i class="fas fa-level-up-alt"></i>
                        </label>
                        <label>
                            <input type="radio" name="radio_" value="down">
                            <i class="fas fa-level-down-alt"></i>
                        </label>
                    </div>
                    <input id="make_bet_up_or_down" type="submit" name="make_bet" value="Сделать ставку">
                </form>

                <form id="bet_on_value" action="" method="POST" name="makeBet_on_value">
                    <select name="category">
                        <?php foreach($cateegories as $categoryItem):?>
                            <option value="<?php echo $categoryItem['name']?>"><?php echo $categoryItem['name']?></option>
                        <?php endforeach;?>
                    </select>
                    <div class="choose_date">
                        <span>Курс к дате</span><input id="date_on_value" type="date" name="date" value="<?php $d=strtotime("+1 day"); echo date("Y-m-d")?>" min="<?php echo date("Y-m-d")?>">
                    </div>
                    <ul class="setting_param_bet">
                        <li><span>От</span><input class = "bet_from" type="number" name="bet_from"></li>
                        <li><span>До</span><input class = "bet_to" type="number" name="bet_to"></li>
                        <li><span>Ставка</span><input class = "score_bet" type="text" name="score_bet"></li>
                        <li><span>Прибыль</span><input class = "prize_bet" type="text" name="prize"></li>
                    </ul>
                    <input type="hidden" name="id_post_news" class="id_post_news">
                    <input id="make_bet_bet_on_value" type="submit" name="make_bet" value="Сделать ставку">
                </form>
            </div>
            <div class="close-popup js-close-campaign_bet"></div>
        </div>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>