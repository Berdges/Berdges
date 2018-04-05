<?php include ROOT . '/views/layouts/header.php'; ?>
<?php function viewDate($date_bd){
    $dateStart = $date_bd;
    $monthes = array(
        1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
        5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
        9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
    );
    $piecesOfDate = explode("-", $dateStart);
    $piecesOfDate[1] = $monthes[intval($piecesOfDate[1])]; // кусок

    $temp1 = substr($piecesOfDate[2],2,-3);

    $temp2 = substr($piecesOfDate[2], 0,2);
    $piecesOfDate[2] = $piecesOfDate[0];
    $piecesOfDate[0] = $temp2;

    array_push($piecesOfDate, $temp1);
    $newDate = implode(" ", $piecesOfDate);

    return $newDate;
}?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include ROOT . '/views/layouts/aside.php'; ?>
        </div>
        <div class="col-md-9">
            <h1>Ставки</h1>
            <div class="all_bet">
                <?php foreach($BetList as $betListItem):?>
                    <div class="info_about_bet">
                        <div class="top_part_info_bet">
                            <a href="#">Blockchain</a>.<?php echo $betListItem['name_category'];?>
                            <p><?php
                                    echo viewDate($betListItem['date_start']);
                                ?>
                            </p>
                        </div>
                        <div class="middle_part_info_bet">
                            <span>Дата: <?php echo viewDate($betListItem['date_end']);?></span>
                            <?php
                            if($betListItem['type'] == 'up_or_down'){
                                if($betListItem['predict'] == 'up'){
                                    echo "<span class='info_bet_predict_icon_up'><i class='fas fa-arrow-circle-up'></i></span>";
                                }else if($betListItem['predict'] == 'down'){
                                    echo "<span class='info_bet_predict_icon_down'><i class='fas fa-arrow-circle-down'></i></span>";
                                }
                            }else if($betListItem['type'] == 'bet_on_value'){
                                echo "<div class='predict_bet_from_to'> <p>".$betListItem['predict_from']."</p><p>"
                                 .$betListItem['predict_to']."</p></div>";
                            }
                            ?>
                            <div class="info_about_bet_history">
                                <p>Ставка: <?php echo $betListItem['bet_score'];?></p>
                                <p>Прибыль: <?php echo $betListItem['prize'];?></p>
                            </div>

                        </div>
                        <div class="down_part_info_bet" style="background-image: url(<?php echo $betListItem['img_news']?>);">
                            <div class="wrap_shadow_for_down_part">
                                <h2><?php echo $betListItem['title_news']?></h2>
                                <div class="wrap_for_read_news_on_bet">
                                    <a read-more-about-news-on-bet="<?php echo $betListItem['id_news']?>" class="js-button-campaign_bet js-button-campaign_read_news_on_bet">Читать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<div class="overlay_news_on_bet js-overlay-campaign">
    <div class="popup_news_on_bet js-popup-campaign">

       <?php echo $_COOKIE['id_news'];?>

        <div class="close-popup js-close-campaign_news_on_bet"></div>
    </div>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>