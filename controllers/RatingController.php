<?php

/**
* 
*/
class RatingController
{
	public function actionViews(){
		if (isset($_SESSION['login'])){
		$CountBetResult = Bet::getCountBetResult();
		require_once(ROOT . '../views/rating/index.php');
		return true;
	}else{
		header("Location: ../");
		return false;
	}
	}
}

?>