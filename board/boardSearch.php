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
    <title>게시판 검색</title>

    <?php
        include "../include/css.php";
    ?>
</head>
<body>

    <?php
        include "../include/header.php";
        $boardType = $_SESSION['boardType'];

        if($boardType == 'R'){
            $boardTypeHead = "리뷰";
            $boardTypeTitle = "리뷰 게시판 검색 결과입니다.";
            $boardTypePage = 'Review';
        } else if($boardType == 'T'){
            $boardTypeHead = "꿀팁";
            $boardTypeTitle = "꿀팁 게시판 검색 결과입니다.";
            $boardTypePage = 'Tip';
        } else if($boardType == 'W'){
            $boardTypeHead = "고민";
            $boardTypeTitle = "고민 게시판 검색 결과입니다.";
            $boardTypePage = 'Worry';
        } else {
            echo "보드타입 못가져옴";
            exit;
        }
    ?>
    

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title"><?=$boardTypeHead?>게시판 검색 결과</h3>
                <p class="section__desc"><?=$boardTypeTitle?></p>
                <div class="board_inner">
                    <div class="board__search">
                        <?php
                            function msg($alert){
                                echo "<p class='result'>총 ".$alert."건이 검색되었습니다.</p>";
                            }

                            $searchKeyword = $_GET['searchKeyword'];
                            $searchOption = $_GET['searchOption'];

                            $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
                            $searchOption = $connect -> real_escape_string(trim($searchOption));

                            //쿼리문 작성
                            //b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView
                            // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
                            // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
                            // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";

                            $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youID, b.regTime, b.boardView FROM TPmyBoard{$boardType} b JOIN TPmyMember m ON(b.memberID = m.memberID) ";

                            switch($searchOption){
                                case 'title':
                                    $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
                                    break;
                                case 'content':
                                    $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
                                    break;
                                case 'name':
                                    $sql .= "WHERE m.youID LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
                                    break;
                            }

                            $result = $connect -> query($sql);

                            if($result){
                                $count = $result -> num_rows;
                                msg($count);
                            }
                        ?>
                    </div>
                    <div class="board__table">
                        <table class="hover">
                            <colgroup>
                                <col style="width: 5%;">
                                <col>
                                <col style="width: 10%;">
                                <col style="width: 12%;">
                                <col style="width: 7%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_GET['page'])){
                                        $page = (int) $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }
                                    $pageView = 10;
                                    $pageLimit = ($pageView * $page) - $pageView;

                                    $sql2 = $sql."LIMIT {$pageLimit}, {$pageView}";

                                    $result = $connect -> query($sql2);
                                    if($result) {
                                        $countt = $result -> num_rows;
                                        if($countt > 0){
                                            for($i=1; $i<=$countt; $i++){
                                                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                                echo "<tr>";
                                                echo "<td>".$boardInfo['boardID']."</td>";
                                                echo "<td class='left'><a href='boardView.php?boardID={$boardInfo['boardID']}&memberID={$boardInfo['memberID']}'>".$boardInfo['boardTitle']."</a></td>";
                                                echo "<td>".$boardInfo['youID']."</td>";
                                                echo "<td>".date('Y-m-d', $boardInfo['regTime'])."</td>";
                                                echo "<td>".$boardInfo['boardView']."</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__pages">
                    <ul>
                    <?php
                        $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youID, b.regTime, b.boardView FROM TPmyBoard{$boardType} b JOIN TPmyMember m ON(b.memberID = m.memberID) ";

                        switch($searchOption){
                            case 'title':
                                $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
                                break;
                            case 'content':
                                $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
                                break;
                            case 'name':
                                $sql .= "WHERE m.youID LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
                                break;
                        }$result = $connect -> query($sql);
                        
                        $count = $result -> num_rows;

                        // echo "<pre>";
                        // var_dump($boardCount);
                        // echo "</pre>";

                        //페이지 넘버 갯수
                        //300/10 = 30
                        //301/10 = 31
                        //309/10 = 31

                        //echo $boardCount;

                        //총 페이지 갯수
                          
                        $count = ceil($count / $pageView);

                        //echo $boardCount;

                        //현재 페이지를 기준으로 보여주고 싶은 갯수
                        $pageCurrent = 3;
                        $startPage = $page - $pageCurrent;
                        $endPage = $page + $pageCurrent;

                        //처음 페이지 초기화
                        if($startPage < 1) $startPage = 1;

                        //마지막 페이지 초기화
                        if($endPage >= $count) $endPage = $count;

                        //처음 페이지
                        if($page != 1){
                            echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
                        }

                        //이전 페이지
                        if($page != 1){
                            $prePage = $page - 1;
                            echo "<li><a href='boardSearch.php?page={$prePage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><svg width='74' height='74' viewBox='0 0 74 74' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M36.9997 22.8566L41.7137 27.5707L32.2856 36.9988L41.7137 46.4269L36.9997 51.1409L22.8575 36.9988L36.9997 22.8566Z' fill='black'/>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M36.9997 0.332031C57.2501 0.332032 73.6663 16.7483 73.6663 36.9987C73.6663 57.2491 57.2501 73.6654 36.9997 73.6654C16.7492 73.6654 0.333007 57.2491 0.333008 36.9987C0.333009 16.7483 16.7492 0.33203 36.9997 0.332031ZM6.99967 36.9987C6.99967 20.4302 20.4311 6.9987 36.9997 6.9987C53.5682 6.9987 66.9997 20.4302 66.9997 36.9987C66.9997 53.5672 53.5682 66.9987 36.9997 66.9987C20.4311 66.9987 6.99967 53.5672 6.99967 36.9987Z' fill='black'/>
                            </svg></a></li>";
                        }

                        //페이지 넘버 표시
                        for($i=$startPage; $i<=$endPage; $i++){
                            $active = "";
                            if($i == $page){
                                $active = "active";
                            }
                            echo "<li class ='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
                        }

                        //다음 페이지
                        if($count != 0 && $page != $count){
                            $nextPage = $page + 1;
                            echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><svg width='74' height='74' viewBox='0 0 74 74' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M33.9523 22.8566L48.0944 36.9988L33.9523 51.1409L29.2383 46.4269L38.6663 36.9988L29.2383 27.5707L33.9523 22.8566Z' fill='black'/>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M36.9997 0.332031C16.7492 0.332031 0.333008 16.7483 0.333008 36.9987C0.333008 57.2491 16.7492 73.6654 36.9997 73.6654C57.2501 73.6654 73.6663 57.2491 73.6663 36.9987C73.6663 16.7483 57.2501 0.332031 36.9997 0.332031ZM66.9997 36.9987C66.9997 20.4302 53.5682 6.9987 36.9997 6.9987C20.4311 6.9987 6.99967 20.4302 6.99967 36.9987C6.99967 53.5672 20.4311 66.9987 36.9997 66.9987C53.5682 66.9987 66.9997 53.5672 66.9997 36.9987Z' fill='black'/>
                        </svg></a></li>";
                        }

                        //마지막 페이지
                        if($count != 0 && $page != $count){
                            echo "<li><a href='boardSearch.php?page={$count}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
                        }
                    ?>
                    </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>