<?php

/**
* 
*/
class News
{
	const SHOW_BY_DEFAULT = 6;

    /**
     * Returns an array of products
     */
    public static function getLatestNews()
    {
        
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT * FROM news_blockchain '
                . 'ORDER BY id DESC LIMIT 10');

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['text'] = $row['text'];
            $newsList[$i]['img'] = $row['img'];
            $i++;
        }

        return $newsList;
    }
    
    /**
     * Returns an array of products
     */
    public static function getNewsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            
            $page = intval($page);            
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
            $db = Db::getConnection();            
            $news = array();
            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' AND category_id = '$categoryId' "
                    . "ORDER BY id ASC "                
                    . "LIMIT ".self::SHOW_BY_DEFAULT
                    . ' OFFSET '. $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $news[$i]['id'] = $row['id'];
                $news[$i]['name'] = $row['name'];
                $news[$i]['image'] = $row['image'];
                $news[$i]['price'] = $row['price'];
                $news[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $news;       
        }
    }
    
    
    /**
     * Returns product item by id
     * @param integer $id
     */
    public static function getNewById($id)
    {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
    
    /**
     * Returns total products
     */
    public static function getTotalNewsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM news '
                . 'WHERE category_id ="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    
    /**
     * Returns products
     */
    public static function getNewsByIds($idsArray)
    {
        $news = array();
        
        $db = Db::getConnection();
        
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM news WHERE id IN ($idsString)";

        $result = $db->query($sql);        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $news[$i]['id'] = $row['id'];
            $news[$i]['code'] = $row['code'];
            $news[$i]['name'] = $row['name'];
            $news[$i]['price'] = $row['price'];
            $i++;
        }

        return $news;
    }
        /**
     * Returns an array of recommended products
     */
    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM news '
                . 'WHERE status = "1" AND is_recommended = "1"'
                . 'ORDER BY id DESC ');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['name'] = $row['name'];
            $newsList[$i]['image'] = $row['image'];
            $newsList[$i]['price'] = $row['price'];
            $newsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $newsList;
    }

    public static function addBet(){
        return 42;

        $db = Db::getConnection();
            $login = 'Sergey';
            $score = $_POST['score_bet'];
            $date = $_POST['date'];
            $k = $_POST['k'];   
            $prize = $_POST['prize'];
            $category = $_POST['category'];
            $predict = $_POST['radio_'];
        
        $sql = 'SELECT * FROM users WHERE login = :login';

        $info_user = $db->prepare($sql);
        $info_user->bindParam(':login', $login, PDO::PARAM_INT);
        $info_user->execute();

        $row = $info_user->fetch();
        if ($row['score'] >= $score) {
            $result = $row['score'] - $score;
            $_SESSION['score'] = $result;
            $update_db = $db->exec("UPDATE `users` SET `score`= '$result' WHERE login = '$login'");
            return 1;
        }else{
            return 0;
        }
    }



    public static function getCategory(){
        $db = Db::getConnection();

        $categoriesList = array();
        $sql = 'SELECT * FROM category';

        $result = $db->prepare($sql);
        $result->execute();
        
        $i=0;
        while($row = $result->fetch()){
            $categoriesList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoriesList;
    }
}
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
