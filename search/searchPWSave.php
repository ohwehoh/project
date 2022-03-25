<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 데이터 가져오기
    $youID = $_POST['youID'];
    $youEmail = $_POST['youEmail'];

    // 데이터 가져오기 확인
    //echo $youID, $youEmail;

    // 데이터 불려오기 - 비밀번호 찾기
    $sql = "SELECT youID, youEmail, youPass FROM TPmyMember WHERE youID = '$youID' && youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    // 데이터 불려오기 확인
    $searchPWInfo = $result -> fetch_array(MYSQLI_ASSOC);
    //var_dump($searchPWInfo);

    $count = $result -> num_rows;
    if($count){
        $to = "{$searchPWInfo['youEmail']}";
        $subject = "남자다움 회원님의 비밀번호입니다.";
        $contents = "회원님의 비밀번호는 '{$searchPWInfo['youPass']}'입니다.";
        $headers = "From: ManBeauty@naver.com\r\n";

        mail($to, $subject, $contents, $headers);
        Header("Location: searchPWFinish.php");
    } else {
        Header("Location: searchFail.php");
    }
?>