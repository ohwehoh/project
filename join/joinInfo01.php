<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>남자다움 - 회원가입 2단계</title>

<?php
    include "../include/css.php"
?>
</head>
<body>
<?php
    include "../include/header.php"
?>
    <main id="main">
        <section id="joinInfo01">
            <div class="box100" aria-hidden="true"></div>
            <h2 class="ir_so">회원가입 2단계(개인정보 입력) 페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <div class="join__number">
                        <span>1</span>
                        <span class="ative">2</span>
                        <span>3</span>
                    </div>
                    <h3 class="join__title">남자다움</h3>
                    <form action="joinInfo01Save.php" name="joinInfo01" method="post" onsubmit="return joinChecking()">
                        <fieldset>
                            <legend class="ir_so">회원정보 입력폼</legend>
                            <div class="joinInfo01__box">
                                <div class="overlap">
                                    <label for="youID">아이디</label>
                                    <input type="text" id="youID" name="youID" placeholder="abc123" maxlength="10" autocomplete="off" required autofocus>
                                    <a href="#c" class="test" onclick="youIDChecking()">중복검사</a>
                                    <p class="comment" id="youID__comment"></p>
                                </div>
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" placeholder="비밀번호" maxlength="20" autocomplete="off" required>
                                    <p class="comment" id="youPass__comment"></p>
                                </div>
                                <div>
                                    <label for="youPassC">비밀번호 확인</label>
                                    <input type="password" id="youPassC" name="youPassC" placeholder="비밀번호 확인"  maxlength="20" autocomplete="off" required>
                                    <p class="comment" id="youPassC__comment"></p>
                                </div>
                                <div class="overlap">
                                    <label for="youEmail">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="abc123@naver.com" maxlength="30" autocomplete="off" required>
                                    <a href="#c" class="test" onclick="youEmailChecking()">중복검사</a>
                                    <p class="comment" id="youEmail__comment"></p>
                                </div>
                                <div>
                                    <label for="youName">이름</label>
                                    <input class="joinInfo1" id="youName" name="youName" placeholder="이름" maxlength="5" autocomplete="off" required>
                                    <p class="comment" id="youName__comment"></p>
                                </div>
                                <div>
                                    <label for="youBirth">생년월일</label>
                                    <input class="joinInfo1" id="youBirth" name="youBirth" placeholder="YYYY-MM-DD" maxlength="12" autocomplete="off" required>
                                    <p class="comment" id="youBirth__comment"></p>
                                </div>
                                <div>
                                    <label for="youPhone">휴대전화</label>
                                    <input class="joinInfo1" id="youPhone" name="youPhone" placeholder="000-0000-0000" maxlength="15" autocomplete="off" required>
                                    <p class="comment" id="youPhone__comment"></p>
                                </div>
                                <div>
                                    <label for="youGender">성별</label>
                                    <select name="youGender" id="youGender">
                                        <option value="남자">남자</option>
                                        <option value="여자">여자</option>
                                    </select>
                                </div>
                            </div>
                            <div class="join__btns">
                                <button class="join__btn" type="submit">다음</button>
                                <a href="#C" class="join__btn" type="submit" onclick="beforePage()">취소</a>
                            </div>
                        </fieldset>                
                    </from>
                </div>
            </div>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //이전페이지로
        function beforePage(){
            history.back(1);
        }

        //아이디 중복검사
        let youIDCheck = false;
        function youIDChecking(){
            let youID = $("#youID").val();
            if(youID == null || youID == ''){
                //아이디를 입력하지 않은 경우
                $("#youID__comment").text("아이디를 입력해주세요!");
            } else {
                //아이디를 입력한 경우
                $.ajax({
                    type : "POST",           
                    url : "joinCheck.php",     
                    data : {"youID": youID, "type": "youIDCheck"},     
                    dataType : "json",
                    success : function(data){ 
                        if(data.result == "good"){
                            //존재하지 않은 경우
                            $("#youID__comment").text("사용 가능한 아이디입니다.");
                            youIDCheck = true;
                        } else {
                            //존재하는 경우
                            $("#youID__comment").text("이미 존재하는 아이디입니다. 로그인을 해주세요!");
                            youIDCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                });
            }
        }

        //이메일 중복검사
        let youEmailCheck = false;
        function youEmailChecking(){
            let youEmail = $("#youEmail").val();
            if(youEmail == null || youEmail == ''){
                //이메일을 입력하지 않은 경우
                $("#youEmail__comment").text("이메일을 입력해주세요!");
            } else {
                //이메일을 입력한 경우
                $.ajax({
                    type : "POST",           
                    url : "joinCheck.php",     
                    data : {"youEmail": youEmail, "type": "youEmailCheck"},     
                    dataType : "json",

                    success : function(data){ 
                        if(data.result == "good"){
                            //존재하지 않은 경우
                            $("#youEmail__comment").text("사용 가능한 이메일입니다.");
                            youEmailCheck = true;
                        } else {
                            //존재하는 경우
                            $("#youEmail__comment").text("이미 존재하는 이메일입니다. 다른 이메일을 적어주세요!");
                            youEmailCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                });
            }
        }

        //회원정보 유효성 검사
        function joinChecking(){
            //아이디 유효성 검사
            let getNick = RegExp(/^[A-Z|a-z|가-힣|0-9]+$/);
            if(!getNick.test($("#youID").val())){
                $("#youID__comment").text("아이디에는 특수문자를 사용할 수 없습니다!");
                alert("아이디에는 특수문자를 사용할 수 없습니다!");
                return false;
            }

            //아이디 중복 검사
            if(youIDCheck == false){
                $("#youID__comment").text("아이디 중복 검사를 확인해주세요");
                alert("아이디 중복 검사를 확인해주세요!");
                return false;
            }

            //비밀번호 유효성 검사
            let getPass = $("#youPass").val();
            let getPassNum = getPass.search(/[0-9]/g);
            let getPassEng = getPass.search(/[a-z]/ig);
            let getPassSpe = getPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
            if(getPass.length < 8 || getPass.length > 20){
                $("#youPass__comment").text("8자리 ~ 20자리 이내로 입력해주세요.");
                alert("조건에 맞도록 비밀번호를 입력해주세요!");
                return false;
            } else if (getPass.search(/\s/) != -1){
                $("#youPass__comment").text("비밀번호는 공백 없이 입력해주세요.");
                alert("조건에 맞도록 비밀번호를 입력해주세요!");
                return false;
            } else if(getPassNum < 0 || getPassEng < 0 || getPassSpe < 0 ){
                $("#youPass__comment").text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
                alert("조건에 맞도록 비밀번호를 입력해주세요!");
                return false;
            } else {
                $("#youPass__comment").text("사용가능한 비밀번호입니다.");
            }

            //비밀번호가 동일한지 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassC__comment").text("비밀번호가 동일하지 않습니다.");
                alert("비밀번호가 동일하지 않습니다.");
                return false;
            } else {
                $("#youPassC__comment").text("사용가능한 비밀번호입니다.");
            }

            //이메일 유효성 검사
            let getMail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if(!getMail.test($("#youEmail").val())){
                $("#youEmail__comment").text("이메일 형식에 맞게 작성해주세요!");
                $("#youEmail").val("");
                return false;
            } 

            //이메일 중복 검사
            if(emailCheck == false){
                $("#youEmail__comment").text("이메일 중복 검사를 확인해주세요!");
                alert("이메일 중복 검사를 확인해주세요!");
                return false;
            }

            //이름 유효성 검사
            let getName = $("#youName").val();
            let getNameTT = getName.search(/^[가-힣]/g);
            if(getNameTT < 0){
                $("#youName__comment").text("이름은 한글만 사용할 수 있습니다!");
                alert("이름은 한글만 사용할 수 있습니다!");
                $("#youName").val("");
                return false;
            } else if (getName.length < 2 || getName.length > 5){
                $("#youName__comment").text("이름을 다시 확인해주세요!");
                alert("이름을 다시 확인해주세요!");
                return false;
            } else {
                $("#youName__comment").text("사용가능한 이름입니다.");
            }

            //생년월일 유효성 검사
            let getBirth = RegExp(/^(19[0-9][0-9]|20[0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/);
            if(!getBirth.test($("#youBirth").val())){
                $("#youBirth__comment").text("조건에 맞도록 생년월일을 입력해주세요!");
                alert("조건에 맞도록 생년월일을 입력해주세요!");
                $("#youBirth").val("");
                return false;
            } else {
                $("#youBirth__comment").text("사용가능한 생년월일입니다.");
            }

            //휴대폰 번호 유효성 검사
            let getPhone = RegExp(/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/);
            if(!getPhone.test($("#youPhone").val())){
                $("#youPhone__comment").text("조건에 맞도록 휴대폰 번호를 입력해주세요!");
                alert("조건에 맞도록 휴대폰 번호를 입력해주세요!");
                $("#youPhone").val("");
                return false;
            } else {
                $("#youPhone__comment").text("사용가능한 휴대폰 번호입니다.");
            }
        }
    </script>
</body>
</html>