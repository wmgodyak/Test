<?php
class Model_Admin_Page extends Model {

    private $pdo;

     public  function  __construct() {
         $this->pdo = new Pdo_Object();
     }
    //Get all post from DB
    public  function  get_started_db_data( $page , $obg , $limit, $userQuantity){

        $sortedByValue = $obg['sortedVal'];
        $sortedByWay =$obg['sortedWay'];

        $ofset = ($page-1)*$limit;
        $pagesCount = ceil($userQuantity / $limit);

        //$stm = $pdo->prepare('SELECT * FROM users ORDER BY  data  DESC LIMIT ?, ?');
        $stm = $this->pdo->prepare("SELECT * FROM users ORDER BY " .$sortedByValue ." "."$sortedByWay". "   LIMIT ?, ?");
        $stm->bindValue(1, $ofset, PDO::PARAM_INT);
        $stm->bindValue(2, $limit, PDO::PARAM_INT);
        $stm->execute();
        $sortedRows = $stm->fetchAll();

        return $obgect =  Array( 'sortedRows' => $sortedRows, 'pagesCount' => $pagesCount,);
    }

    //Get Value and Way  sorting
    public  function  get_sorted_val(){
        if ( isset($_SESSION['sortedWay']) && isset($_SESSION['sortedVal'])) {
            $sortedByValue = $_SESSION['sortedVal'];
            $sortedByWay =  $_SESSION['sortedWay'];
        }else {
            $sortedByValue = $_SESSION['sortedWay'] = "data";
            $sortedByWay  = $_SESSION['sortedWay'] = "DESC";
        }
        return $obg = ['sortedVal'=>$sortedByValue , 'sortedWay' => $sortedByWay];
    }

    //Get  currently page
    public  function  get_currently_page(){
        if ( isset($_SESSION['countPage'])) {
            $pagesResult = $_SESSION['countPage'];
        }else {
            $pagesResult =1;
        }
        return $pagesResult;
    }

    //Delete user
    public  function  delete_user($id){
        
            $stmt =  $this->pdo->prepare("DELETE FROM `users` WHERE id = ? LIMIT 1");
            $stmt->execute(array($id));
            return true;
        
    }

    //Update user
    public  function  update_user($id, $text ){

        $stmt = $this->pdo->prepare(" UPDATE `users` SET text = ?  WHERE id = ? LIMIT 1");
        $stmt->execute(array($text, $id));
        return true;

    }

    //Get user range
    public  function  get_user_quantity(){

        $query=$this->pdo->query("SELECT COUNT(*) as count FROM users");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $row=$query->fetch();

        return $members=$row['count'];

    }


}