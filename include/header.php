<header id="header">
    <div class="header container">
        <h1 class="logo"><a href="../main/main.php">남자다움</a></h1>
        <nav class="menu">
            <h2 class="ir_so">메인 메뉴</h2>
            <ul>
                <li><a href="#">개인</a></li>
                <li><a href="../board/board_Review.php">리뷰</a></li>
                <li><a href="../board/board_Tip.php">꿀팁</a></li>
                <li><a href="../board/board_Worry.php">고민</a></li>
            </ul>
        </nav>
        <div class="member">
                <span class="ir_so">회원 정보 영역</span>
<?php   if(isset($_SESSION['memberID'])){?>
                <a href="../mypage/mypage.php" class="setting"><?=$_SESSION['youID']?>님</a>
                <span> / </span>
                <a href="../login/logout.php">로그아웃</a>
<?php   } else { ?>
                <a href="../join/joinAgree.php">회원가입</a>
                <span> / </span>
                <a href="../login/login.php">로그인</a>
<?php   }  ?>
        </div>
    </div>
</header>
