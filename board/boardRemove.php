<?php
include "../connect/connect.php";
include "../connect/session.php";
include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $boardType = $_SESSION['boardType'];
        $memberID = $_SESSION['memberID'];
        $boardID = $_GET['boardID'];
        $boardID = $connect -> real_escape_string($boardID);

        $sql = "SELECT memberID FROM TPmyBoard{$boardType} WHERE boardID = {$boardID}";
        $result = $connect -> query($sql);

        $author = $result -> fetch_array(MYSQLI_ASSOC);
        
        if($author['memberID'] == $memberID){
            if($boardType == 'R'){
                $boardType = 'Review';
            } else if($boardType == 'T'){
                $boardType = 'Tip';
            } else if($boardType == 'W'){
                $boardType = 'Worry';
            } else {
                echo "<script>alert('보드타입 못가져옴');</script>";
                exit;
            }
    
            //쿼리문 작성(보드ID값 삭제하기);
            $sql = "DELETE FROM TPmyBoard{$boardType} WHERE boardID = {$boardID}";
            $connect -> query($sql);

            echo "<script>alert('삭제되었습니다.'); location.href = 'board_{$boardType}.php';</script>";
        }
        else {
            echo "<script>alert('당신은 작성자가 아닙니다.'); history.back(1);</script>";
        }
    ?>
</body>
</html>