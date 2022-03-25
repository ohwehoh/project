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
    <title>남자다움 - 회원가입 완료</title>

    <?php
        include "../include/css.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
        $youID = $_GET['youID'];
    ?>
    <main id="main">
        <section id="joinFinish">
            <div class="box100" aria-hidden="true"></div>
            <h2 class="ir_so">회원가입 완료 페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <h3 class="join__title">회원가입 완료</h3>
                    <p class="join__titleP2">남자자움은 <?=$youID?>님을 환영합니다.</p>
                    <div class="join__btns2">
                        <a href="../main/main.php" class="join__btn2">메인페이지로 이동</a>
                        <a href="../login/login.php" class="join__btn2">로그인페이지로 이동</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>