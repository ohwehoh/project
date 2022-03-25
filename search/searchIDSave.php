<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 데이터 가져오기
    $youName = $_POST['youName'];
    $youPhone = $_POST['youPhone'];

    // 데이터 가져오기 확인
    //echo $youName, $youPhone;

    //휴대폰 번호 유효성 검사
    $check_phone = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);
    if($check_phone == false){
        echo "<script>alert('비밀번호 입력 양식이 잘못되었습니다. 다시 확인해주세요.'); history.back(1)</script>";
        exit;
    }

    // 데이터 불려오기 - 아이디 찾기
    $sql = "SELECT youID, youName, youPhone FROM TPmyMember WHERE youName = '$youName' && youPhone = '$youPhone'";
    $result = $connect -> query($sql);
    
    // 데이터 불려오기 확인
    $searchIDInfo = $result -> fetch_array(MYSQLI_ASSOC);
    //var_dump($searchIDInfo);

    $count = $result -> num_rows;
    if($count){
        Header("Location: searchIDFinish.php?youID={$searchIDInfo['youID']}");
    } else {
        Header("Location: searchFail.php");
    }
?>