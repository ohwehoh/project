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
    <title>게시글보기</title>

    <?php
    include "../include/css.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";

        $boardType = $_SESSION['boardType'];

        $boardID = $_GET['boardID'];
        $memberID = $_GET['memberID'];

        $sql = "SELECT boardID, boardTitle, boardContents FROM TPmyBoard{$boardType} WHERE boardID = {$boardID}";
        $result = $connect -> query($sql);
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

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
    ?>

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">게시글 수정하기</h3>
                <p class="section__desc"><?=$boardTitle?>수정하기</p>
                <div class="board_inner">
                    <div class="board__write">
                        <form action="boardModifySave.php" name="boardWrite" method="post">
                            <div class="boardWrite__btn">
                                <button type="submit" class="write-btn">수정하기</button>
                            </div>
                            <fieldset class="boardWriteF">
                                <legend class="ir_so">게시판 수정 영역</legend>
                                <?php
                                    
                                    if($result){
                                        
                                        echo "<div style='display:none;'><label for='memberID'>회원번호</label><input type='text' name='memberID' id='memberID' value='".$memberID."'></div>";
                                        echo "<div style='display:none;'><label for='boardID'>번호</label><input type='text' name='boardID' id='boardID' value='".$boardInfo['boardID']."'></div>";
                                        echo "<div><label for='boardTitle'>제목</label><input type='text' name='boardTitle' id='boardTitle' value='".$boardInfo['boardTitle']."'></div>";
                                        echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents'>".$boardInfo['boardContents']."</textarea></div>";
                                        echo "<div><label for='boardPass'>비밀번호</label><input type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!!' autocomplete='off' required></div>";
                                    }
                                ?>
                            </fieldset>
                        </form>
                        <div class="board__btn">
                            <a href="board<?=$boardType?>.php">목록보기</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>