<?php
    include "../connect/connect.php";

    //변수 설정
    $type = $_POST['type'];
    
    //쿼리문 생성
    $sql = "SELECT youID, youEmail FROM TPmyMember ";
    if($type == "youIDCheck"){
        $youNickName = $connect -> real_escape_string(trim($_POST['youID']));
        $sql .= "WHERE youID = '{$youID}'";
    }
    if($type == "youEmailCheck"){
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
        $sql .= "WHERE youEmail = '{$youEmail}'";
    }
    
    $result = $connect -> query($sql);
    $jsonResult = "bad";
    
    //데이터 유무 확인
    if($result -> num_rows == 0){
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>