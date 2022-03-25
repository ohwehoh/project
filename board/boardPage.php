<?php
    include "../connect/session.php";
    $boardType = $_SESSION['boardType'];
    $sql = "SELECT count(boardID) FROM TPmyBoard{$boardType}";
    $result = $connect -> query($sql);
    
    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(boardID)'];

    if($boardType == 'R'){
        $boardType = 'Review';
    } else if($boardType == 'T'){
        $boardType = 'Tip';
    } else if($boardType == 'W'){
        $boardType = 'Worry';
    } else {
        echo "보드타입 못가져옴";
        exit;
    }

    //총 페이지 갯수
    $boardCount = ceil($boardCount / $pageView);

    //echo $boardCount;

    //현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 3;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    //처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    //마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;

    //처음 페이지
    if($page != 1){
        echo "<li><a href='board_{$boardType}.php?page=1'>처음으로</a></li>";
    }

    //이전 페이지
    if($page != 1){
        $prePage = $page - 1;
        echo "<li>
        <a href='board_{$boardType}.php?page={$prePage}'>
            <svg width='74' height='74' viewBox='0 0 74 74' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path d='M36.9997 22.8566L41.7137 27.5707L32.2856 36.9988L41.7137 46.4269L36.9997 51.1409L22.8575 36.9988L36.9997 22.8566Z' fill='black'/>
            <path fill-rule='evenodd' clip-rule='evenodd' d='M36.9997 0.332031C57.2501 0.332032 73.6663 16.7483 73.6663 36.9987C73.6663 57.2491 57.2501 73.6654 36.9997 73.6654C16.7492 73.6654 0.333007 57.2491 0.333008 36.9987C0.333009 16.7483 16.7492 0.33203 36.9997 0.332031ZM6.99967 36.9987C6.99967 20.4302 20.4311 6.9987 36.9997 6.9987C53.5682 6.9987 66.9997 20.4302 66.9997 36.9987C66.9997 53.5672 53.5682 66.9987 36.9997 66.9987C20.4311 66.9987 6.99967 53.5672 6.99967 36.9987Z' fill='black'/>
            </svg>
        </a>
        </li>";
    }

    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class ='{$active}'><a href='board_{$boardType}.php?page={$i}'>{$i}</a></li>";
    }

    //다음 페이지
    if($page != $boardCount){
        $nextPage = $page + 1;
        echo "<li><a href='board_{$boardType}.php?page={$nextPage}'>
        <svg width='74' height='74' viewBox='0 0 74 74' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path d='M33.9523 22.8566L48.0944 36.9988L33.9523 51.1409L29.2383 46.4269L38.6663 36.9988L29.2383 27.5707L33.9523 22.8566Z' fill='black'/>
            <path fill-rule='evenodd' clip-rule='evenodd' d='M36.9997 0.332031C16.7492 0.332031 0.333008 16.7483 0.333008 36.9987C0.333008 57.2491 16.7492 73.6654 36.9997 73.6654C57.2501 73.6654 73.6663 57.2491 73.6663 36.9987C73.6663 16.7483 57.2501 0.332031 36.9997 0.332031ZM66.9997 36.9987C66.9997 20.4302 53.5682 6.9987 36.9997 6.9987C20.4311 6.9987 6.99967 20.4302 6.99967 36.9987C6.99967 53.5672 20.4311 66.9987 36.9997 66.9987C53.5682 66.9987 66.9997 53.5672 66.9997 36.9987Z' fill='black'/>
        </svg>
    </a></li>";
    }

    //마지막 페이지
    if($page != $boardCount){
        echo "<li><a href='board_{$boardType}.php?page={$boardCount}'>마지막으로</a></li>";
    }
?>