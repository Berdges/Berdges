<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.04.2018
 * Time: 11:16
 */

class BetController
{
    public function actionIndex(){
        if (isset($_SESSION['login'])){
            $BetList = Bet::getBetList();
            require_once(ROOT . '/views/bets/index.php');
            return true;
        }else{
            header("Location: ../");
            return false;
        }
    }
}