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
        include "../connect/connect.php";
        include "../connect/session.php";

        $memberID = $_SESSION['memberID'];
        $boardType = $_SESSION['boardType'];
        $boardTitle = $_POST['boardTitle'];
        $boardContents = $_POST['boardContents'];
        $boardView = 1;
        $regTime = time();

        $boardTitle = $connect -> real_escape_string($boardTitle);    //특수문자 방지
        $boardContents = $connect -> real_escape_string($boardContents);    //특수문자 방지

        //echo $memberID, $boardTitle, $boardContents, $boardView, $regTime;

        $sql = "INSERT INTO TPmyBoard{$boardType}(memberID, boardTitle, boardContents, boardView, love, hate, cmtCount, boardType, regTime) VALUES('$memberID', '$boardTitle', '$boardContents', '$boardView', '0', '0', '0', '$boardType', '$regTime')";
        $connect-> query($sql);

        if($boardType == 'R'){
            $boardType = 'Review';
        } else if($boardType == 'T'){
            $boardType = 'Tip';
        } else if($boardType == 'W'){
            $boardType = 'Worry';
        } else {
            echo "보드타입 못가져옴";
            exit;
        }
        Header("Location: board_{$boardType}.php");
    ?>
</body>
</html>