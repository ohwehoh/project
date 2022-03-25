<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>남자다움 - 회원가입 1단계</title>

<?php
    include "../include/css.php"
?>
</head>
<body>
<?php
    include "../include/header.php"
?>
    <main id="main">
        <section id="joinAgree">
            <div class="box100" aria-hidden="true"></div>
            <h2 class="ir_so">회원가입 1단계(개인정보동의) 페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <div class="join__number">
                        <span class="ative">1</span>
                        <span>2</span>
                        <span>3</span>
                    </div>
                    <h3 class="join__title">남자다움</h3>
                    <form action="joinAgreeSave.php" name="joinAgree" method="post">
                        <fieldset>
                            <legend class="ir_so">개인정보동의 입력폼</legend>
                            <div class="joinAgree__box">
                                <div class="joinAgree__check">
                                    <div class="joinAgree__checkBox">
                                        <label for="select1">
                                            <input type="checkbox" id="select1" name="select1" value="agree">
                                            <div class="joinAgree__checkBtn"></div>
                                        </label>
                                        <p class="joinAgree__checkDoc">
                                            남자다움 이용약관(필수)
                                        </p>
                                    </div>
                                </div>
                                <div class="joinAgree__check">
                                    <div class="joinAgree__checkBox">
                                        <label for="select2">
                                            <input class="select" type="checkbox" id="select2" name="select2" value="agree">
                                            <div class="joinAgree__checkBtn"></div>
                                        </label>
                                        <p class="joinAgree__checkDoc">
                                            개인정보 수집 및 이용(필수)
                                        </p>
                                    </div>
                                </div>
                                <div class="joinAgree__check">
                                    <div class="joinAgree__checkBox">
                                        <label for="select3">
                                            <input class="select" type="checkbox" id="select3" name="select3" value="agree">
                                            <div class="joinAgree__checkBtn"></div>
                                        </label>
                                        <p class="joinAgree__checkDoc">
                                            위치정보 이용약관(필수) 개인 페이지에서 변경 가능
                                        </p>
                                    </div>
                                </div>
                                <div class="joinAgree__check">
                                    <div class="joinAgree__checkBox">
                                        <label for="select4">
                                            <input class="select" type="checkbox" id="select4" name="select4" value="agree">
                                            <div class="joinAgree__checkBtn"></div>
                                        </label>
                                        <p class="joinAgree__checkDoc">
                                            프로모션 정보 수신(필수) 개인 페이지에서 변경 가능
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="join__btns">
                                <button class="join__btn" type="submit">다음</button>
                                <a href="../main/main.php" class="join__btn" type="submit">취소</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>