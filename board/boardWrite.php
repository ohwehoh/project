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

        if($boardType == 'R'){
            $boardType = "모든 후기를 자유롭게 작성해주세요";
        } else if($boardType == 'T'){
            $boardType = "공유하고 싶은 꿀팁을 적어주세요!";
        } else if($boardType == 'W'){
            $boardType = "고민을 자유롭게 적어주세요!";
        } else {
            echo "보드타입 못가져옴";
            exit;
        }
    ?>

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">게시글 작성하기</h3>
                <p class="section__desc"><?=$boardType?></p>
                <div class="board_inner">
                    <div class="board__write">
                        <form action="boardWriteSave.php" name="boardWrite" method="post">
                            <div class="boardWrite__btn">
                                <button type="submit" class="write-btn">저장하기</button>
                            </div>
                            <fieldset class="boardWriteF">
                                <legend class="ir_so">게시판 작성 영역</legend>
                                <div>
                                    <label for="boardTitle">제목</label>
                                    <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 넣어주세요." required>
                                </div>
                                <div>
                                    <label for="boardContents">내용</label>
                                    <textarea name="boardContents" id="boardContents" placeholder="내용을 넣어주세요." required></textarea>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>