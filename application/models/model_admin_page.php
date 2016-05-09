<?php
class Model_Admin_Page extends Model {

    public  function  get_started_db_data( $page , $obg , $limit){

        $sortedByValue = $obg['sortedVal'];
        $sortedByWay =$obg['sortedWay'];

        $pdo = new Pdo_Object();
        $ofset = ($page-1)*$limit;
        $allData = $pdo->query("SELECT * FROM users  ");
        $pagesCount = ceil(count($allData->fetchAll()) / $limit);

        //$stm = $pdo->prepare('SELECT * FROM users ORDER BY  data  DESC LIMIT ?, ?');
        $stm = $pdo->prepare("SELECT * FROM users ORDER BY " .$sortedByValue ." "."$sortedByWay". "   LIMIT ?, ?");
        $stm->bindValue(1, $ofset, PDO::PARAM_INT);
        $stm->bindValue(2, $limit, PDO::PARAM_INT);
        $stm->execute();
        $sortedRows = $stm->fetchAll();

        return $obgect =  Array( 'sortedRows' => $sortedRows, 'pagesCount' => $pagesCount,);
    }

    public  function  getSortedVal(){
        if ( isset($_SESSION['sortedWay']) && isset($_SESSION['sortedVal'])) {
            $sortedByValue = $_SESSION['sortedVal'];
            $sortedByWay =  $_SESSION['sortedWay'];
        }else {
            $sortedByValue = $_SESSION['sortedWay'] = "data";
            $sortedByWay  = $_SESSION['sortedWay'] = "DESC";
        }
        return $obg = ['sortedVal'=>$sortedByValue , 'sortedWay' => $sortedByWay];
    }


    public  function  getCountPage(){
        if ( isset($_SESSION['countPage'])) {
            $pagesResult = $_SESSION['countPage'];
        }else {
            $pagesResult =1;
        }
        return $pagesResult;
    }

    public  function  deleteUser($id){
        
        $pdo = new Pdo_Object();
        $stmt = $pdo->query(" SELECT count(*) FROM users WHERE id = '".$id."';");
        $result = $stmt->fetch();
        if ( $result[0]!=0){
            $pdo->query("DELETE FROM `users` WHERE id = '".$id."';");
            return true;
        }else {
           return false;
        }
        
    }

    public  function  updateUser($id , $text ){

        $pdo = new Pdo_Object();
        $pdo->query(" UPDATE `users` SET text ='".$text."'  WHERE id = '".$id."';");
        return true;

    }





}