<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>남자다움 - 아이디찾기</title>

<?php
    include "../include/css.php"
?>
</head>
<body>
<?php
    include "../include/header.php"
?>
    <main id="main">
        <section id="search">
            <div class="box100" aria-hidden="true"></div>
            <h2 class="ir_so">아이디찾기 페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <h3 class="join__title">아이디 찾기</h3>
                    <form action="searchIDSave.php" name="search" method="post">
                        <fieldset>
                            <legend class="ir_so">아이디찾기 입력폼</legend>
                            <div class="login__box">
                                <div>
                                    <label class="ir_so" for="youName">이름</label>
                                    <input type="text" id="youName" name="youName" maxlength="10" placeholder="이름" autocomplete="off" autofocus required>
                                </div>
                                <div class="mt30">
                                    <label class="ir_so" for="youPhone">핸드폰번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="20" placeholder="핸드폰번호(010-0000-0000)" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="searchBtn" class="login__btn" type="submit">아이디 찾기</button>
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