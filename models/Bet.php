<?php
/**
* 
*/
class Bet
{
	 public static function getBetList(){
        $db = Db::getConnection();

        $betList = array();

        $result_bet = $db->query('SELECT * FROM bet '. 'ORDER BY id DESC ');


        $i = 0;
        while ($row = $result_bet->fetch()) {
            $betList[$i]['id'] = $row['id'];
            $id_news_for_bet = $row['id_news'];
            $betList[$i]['id_news'] = $row['id_news'];
            $betList[$i]['login_user'] = $row['login_user'];
            $betList[$i]['name_category'] = $row['name_category'];
            $betList[$i]['date_start'] = $row['date_start'];
            $betList[$i]['date_end'] = $row['date_end'];
            $betList[$i]['bet_score'] = $row['bet_score'];
            $betList[$i]['predict_from'] = $row['predict_from'];
            $betList[$i]['predict_to'] = $row['predict_to'];
            $betList[$i]['type'] = $row['type'];
            $betList[$i]['predict'] = $row['predict'];
            $betList[$i]['prize'] = $row['prize'];
            $result_news = $db->query("SELECT img,title,text FROM news_blockchain WHERE id = $id_news_for_bet")->fetch();
                $betList[$i]['img_news'] = $result_news['img'];
                $betList[$i]['title_news'] = $result_news['title'];
                $betList[$i]['text_news'] = $result_news['text'];
            $i++;
        }

        return $betList;
    }

    public static function getCountBetResult(){

    	$db = Db::getConnection();
		
		$result = $db->query('SELECT COUNT(*) FROM bet WHERE viewed = 0');
		while($row = $result->fetch()){
			$item = $row;
		}
		return $result;
    }


    public static function deleteNotificationNewBet(){
        
        $_SESSION['count_bet_result'] = '';
        return true;

    }
}

?>