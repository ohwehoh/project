<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE TPmyBoardT (";
    $sql .= "boardID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(50) NOT NULL,";
    $sql .= "boardContents longtext NOT NULL,";
    $sql .= "boardView int(10) NOT NULL,";
    $sql .= "love int(10) NOT NULL,";
    $sql .= "hate int(10) NOT NULL,";
    $sql .= "cmtCount int(10) NOT NULL,";
    $sql .= "boardType enum('R', 'T', 'W') default 'W' NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (boardID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>