<?php
    include "../connect/connect.php";

    for($i=1; $i<=300; $i++){
        $regTime = time();

        //$sql = "INSERT INTO TPmyBoardR(memberID, boardTitle, boardContents, boardView, love, hate, cmtCount, boardType, regTime) values(1, '리뷰 게시판 타이틀${i}입니다.', '리뷰 게시판 내용${i}입니다. 빨리 하고싶은데 생각대로 잘 안되네요 하하하하', '1', '0', '0', '0', 'R', '$regTime');";
        //$sql = "INSERT INTO TPmyBoardT(memberID, boardTitle, boardContents, boardView, love, hate, cmtCount, boardType, regTime) values(1, '꿀팁 게시판 타이틀${i}입니다.', '꿀팁 게시판 내용${i}입니다. 빨리 하고싶은데 생각대로 잘 안되네요 하하하하', '1', '0', '0', '0', 'T', '$regTime');";
        $sql = "INSERT INTO TPmyBoardW(memberID, boardTitle, boardContents, boardView, love, hate, cmtCount, boardType, regTime) values(1, '고민 게시판 타이틀${i}입니다.', '고민 게시판 내용${i}입니다. 빨리 하고싶은데 생각대로 잘 안되네요 하하하하', '1', '0', '0', '0', 'W', '$regTime');";
        $connect -> query($sql);
    }

?>