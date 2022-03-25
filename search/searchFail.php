<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>남자다움 - 회원정보 찾기 실패</title>

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
            <h2 class="ir_so">회원정보 찾기 실패 페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <h3 class="join__title">회원정보 없음</h3>
                    <div class="join__titleP">회원정보가 없습니다. 회원가입 하시겠습니까?</div>
                    <div class="join__btns2">
                        <a href="javascript:history.back();" class="join__btn2">다시하기</a>
                        <a href="../join/joinAgree" class="join__btn2">회원가입</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>