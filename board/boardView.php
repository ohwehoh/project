<?php
    include "../connect/connect.php";
    include "../connect/session.php";
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

        if($boardType == 'R'){
            $boardTypeTitle = "리뷰 게시글";
        } else if($boardType == 'T'){
            $boardTypeTitle = "꿀팁 게시글";
        } else if($boardType == 'W'){
            $boardTypeTitle = "고민 게시글";
        } else {
            echo "보드타입 못가져옴";
            exit;
        }
    ?>

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">게시글 보기</h3>
                <p class="section__desc"><?=$boardTypeTitle?></p>
                <div class="board_inner">
                    <?php
                        $boardID = $_GET['boardID'];
                        $memberID = $_GET['memberID'];
                        
                        $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents, b.love, b.hate, b.cmtCount FROM TPmyBoard{$boardType} b JOIN TPmyMember m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
                        $result = $connect -> query($sql);
                        
                        $sql = "UPDATE TPmyBoard{$boardType} SET boardView = boardView + 1 WHERE boardID = {$boardID}";
                        $connect -> query($sql);

                        if($result){
                            $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                    ?>
                    <div class="content_info_wrap">
                        <div class="content_info">
                            <img src="../assets/img/love.svg" alt="좋아요">
                            <p class="amount"><?=$boardInfo['love']?></p>
                        </div>
                        <div class="content_info">
                            <img src="../assets/img/hate.svg" alt="싫어요">
                            <p class="amount"><?=$boardInfo['hate']?></p>
                        </div>
                        <div class="content_info">
                            <img src="../assets/img/view.svg" alt="조회수">
                            <p class="amount"><?=$boardInfo['boardView']?></p>
                        </div>
                        <div class="content_info">
                            <img src="../assets/img/cmt.svg" alt="댓글수">
                            <p class="amount"><?=$boardInfo['cmtCount']?></p>
                        </div>
                        <div class="content_info">
                            <img src="../assets/img/share.svg" alt="공유하기">
                        </div>
                        <div class="content_info">
                            <img src="../assets/img/report.svg" alt="신고하기">
                        </div>
                    </div>
                    <div class="board__table">
                        <table>
                            <colgroup>
                                <col style="width: 70%">
                                <col style="width: 30%">
                            </colgroup>
                            <tbody>
                                    
                                <?php
                                        echo "<tr><td rowspan='2' class='view_title b_right'>{$boardInfo['boardTitle']}</td><td>{$boardInfo['youName']}</td></tr>";
                                        echo "<tr><td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
                                        echo "<tr><td colspan='4' class='left height' style='font-size: 20px;'>{$boardInfo['boardContents']}</td></tr>";
                                    }
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
                            </tbody>
                        </table>
                    </div>
                    <div class="board__btn">
                        <a href="board_<?=$boardType?>.php">목록보기</a>
                        <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="boardModify.php?boardID=<?=$boardID?>&memberID=<?=$memberID?>">수정하기</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?", "");

            return notice;
        }
    </script>
    
</body>
</html>