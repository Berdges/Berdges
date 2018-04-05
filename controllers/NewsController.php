<?php

/**
* 
*/
class NewsController
{
	public function actionViews(){
		if (isset($_SESSION['login'])){
			$news = array();
	        $news = News::getLatestNews();
            $cateegories = News::getCategory();
	        $CountBetResult = Bet::getCountBetResult();
			require_once(ROOT . '../views/news/index.php');
			return true;
		}else{
			require_once(ROOT . '../views/site/index.php');
			return true;
		}
	}
}
?>