<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>남자다움 - 아이디찾기 완료</title>

<?php
    include "../include/css.php";
?>
</head>
<body>
<?php
    include "../include/header.php";
?>
    <main id="main">
        <section id="search">
            <div class="box100" aria-hidden="true"></div>
            <h2 class="ir_so">비밀번호찾기 완료 페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <h3 class="join__title">회원님의 비밀번호를 이메일로 전송하였습니다.</h3>
                    <form action="../login/loginSave.php" name="login" method="post">
                        <fieldset>
                            <legend class="ir_so">로그인 입력폼</legend>
                            <div class="login__box">
                                <div>
                                    <label class="ir_so" for="youID">아이디</label>
                                    <input type="text" id="youID" name="youID" maxlength="10" placeholder="아이디" autocomplete="off" autofocus required>
                                </div>
                                <div class="mt30">
                                    <label class="ir_so" for="youPass">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="loginBtn" class="login__btn" type="submit">로그인</button>
                        </fieldset>
                    </from>
                    <div class="login__link mt20">
                        <a href="../search/searchPW.php">비밀번호 찾기</a><span> / </span><a href="../search/searchID.php">아이디 찾기</a><span> / </span><a href="../join/joinAgree.php">회원가입</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>