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
    <title>남자다움 - 마이페이지</title>

<?php
    include "../include/css.php"
?>
</head>
<body>
<?php
    include "../include/header.php"
?>

    <main id="main">
        <section id="main">
            <div class="box100" aria-hidden="true"></div>
            <h2 class="ir_so">마이페이지</h2>
            <div class="join__wrap">
                <div class="container">
                    <h3 class="join__title">마이페이지!!</h3>
                    <div class="main__box">
<?php
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>