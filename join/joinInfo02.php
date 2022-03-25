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
    <title>남자다움 - 회원가입 3단계</title>

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
        <section class="joinInfo02">
            <div class="box100" aria-hidden="true"></div>
            <h2 class="ir_so">회원가입 3단계(맞춤정보입력) 페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <div class="join__number">
                        <span>1</span>
                        <span>2</span>
                        <span class="ative">3</span>
                    </div>
                    <h3 class="join__title"><?=$youID?>님을 자세히 알고싶어요!</h3>
                    <p class="join__titleP">아래 항목을 입력해 주시면<br><?=$youID?>님의 맞춤 정보를 추천해 드릴게요!</p>
                    <form action="joinInfo02Save.php?youID=<?=$youID?>" name="joinInfo02" method="post" onsubmit="return joinChecking()">
                        <fieldset>
                            <legend class="ir_so">맞춤정보 입력폼</legend>
                            <div class="joinInfo02__box">
                                <div>
                                    <label for="skinType">피부타입</label>
                                    <span>피부타입이 무엇인가요?</span>
                                    <select name="skinType" id="skinType">
                                        <option value="건성">건성</option>
                                        <option value="지성">지성</option>
                                        <option value="복합성">복합성</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="skinTone">피부톤</label>
                                    <span>피부톤이 무엇인가요?</span>
                                    <select name="skinTone" id="skinTone">
                                        <option value="웜톤">웜톤</option>
                                        <option value="쿨톤">쿨톤</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="skinWorry">피부고민</label>
                                    <span>피부고민이 무엇인가요?</span>
                                    <select name="skinWorry" id="skinWorry">
                                        <option value="여드름">여드름</option>
                                        <option value="건조함">건조함</option>
                                        <option value="홍조">홍조</option>
                                        <option value="잡티">잡티</option>
                                        <option value="흉터">흉터</option>
                                    </select>
                                </div>
                            </div>
                            <div class="joinInfo02__box">
                                <div>
                                    <label for="hairType">헤어타입</label>
                                    <span>헤어타입이 무엇인가요?</span>
                                    <select name="hairType" id="hairType">
                                        <option value="직모">직모</option>
                                        <option value="곱슬">곱슬</option>
                                        <option value="복합성">복합성</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="hairWorry">헤어고민</label>
                                    <span>헤어고민이 무엇인가요?</span>
                                    <select name="hairWorry" id="hairWorry">
                                        <option value="스타일링">스타일링</option>
                                        <option value="건조함">건조함</option>
                                        <option value="기름짐">기름짐</option>
                                        <option value="탈모">탈모</option>
                                        <option value="두피관리">두피관리</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="freeText">기타고민</label>
                                    <span>기타고민이 무엇인가요?</span>
                                    <input type="text" id="freeText" name="freeText" placeholder="원하는 정보나 고민을 자유롭게 입력하세요!" maxlength="15" autocomplete="off">
                                </div>
                            </div>
                            <div class="join__btns">
                                <button class="join__btn" type="submit">다음</button>
                                <a href="#c" class="join__btn" type="submit" onclick="beforePage()">취소</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        //이전페이지로
        function beforePage(){
            history.back(1);
        }
    </script>
</body>
</html>