
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
    <title>꿀팁 게시판</title>

<?php
    include "../include/css.php";
?>
</head>
<body>
<?php
    include "../include/header.php";
    $_SESSION['boardType'] = 'T';
?>
    <!-- //header -->

    <main class="contents" class="border">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">꿀팁 게시판</h3>
                <p class="section__desc">공유하고 싶은 꿀팁을 적어주세요!</p>
                <div class="board_inner">
                    <div class="board__search">
                    <form action="boardSearch.php" name="boardSearch" method="get">
                            <fieldset>
                                <legend class="ir_so">게시판 검색 영역</legend>
                                <div class="boardSearch__input">
                                    <div class="boardSearch__select">
                                        <select name="searchOption" class="search_option">
                                            <option value="title">제목</option>
                                            <option value="content">내용</option>
                                            <option value="name">등록자</option>
                                        </select>
                                    </div>
                                    <input type="text" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요!" aria-label="search" required>
                                    
                                </div>
                                <button type="submit" class="search-btn">
                                    <svg width="40" height="40" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.416 11.832C9.40717 11.832 11.832 9.40717 11.832 6.416C11.832 3.42483 9.40717 1 6.416 1C3.42483 1 1 3.42483 1 6.416C1 9.40717 3.42483 11.832 6.416 11.832Z" stroke="#222222" stroke-width="1.12"/>
                                        <path d="M10.397 10.397L13.918 13.918" stroke="#222222" stroke-width="1.12"/>
                                    </svg>
                                </button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="boardWrite__btn">
                        <a href="boardWrite.php" class="write-btn">작성하기</a>
                    </div>
                    <div class="board__table">
                        <table class="hover">
                            <span class="boardTable__title">인기 TOP5</span>
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 5%;">
                                <col>
                                <col style="width: 10%;">
                                <col style="width: 12%;">
                                <col style="width: 7%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>순위</th>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT row_number() OVER (ORDER BY b.boardView DESC) r, b.boardID, b.boardTitle, m.youID, b.regTime, b.boardView, m.memberID, b.boardType FROM TPmyBoardT b JOIN TPmyMember m ON(m.memberID = b.memberID) ORDER BY boardView DESC LIMIT 0, 5";

                                    $result = $connect -> query($sql);
                                    if($result) {
                                        $count = $result -> num_rows;

                                        if($count > 0){
                                            for($i=1; $i<=$count; $i++){
                                                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                                echo "<tr>";
                                                echo "<td>".$boardInfo['r']."</td>";
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
                    <div class="board__table">
                        <table class="hover">
                        <span class="boardTable__title">최신 게시물</span>
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
                                    $sql = "SELECT b.boardID, b.boardTitle, m.youID, b.regTime, b.boardView, m.memberID, b.boardType FROM TPmyBoardT b JOIN TPmyMember m ON(m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";

                                    $result = $connect -> query($sql);
                                    if($result) {
                                        $count = $result -> num_rows;

                                        if($count > 0){
                                            for($i=1; $i<=$count; $i++){
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
                        <div class="board__pages">
                            <ul>                              
                                <?php
                                    include "boardPage.php";
                                ?>                             
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <script>
        
    </script>
</body>
</html>