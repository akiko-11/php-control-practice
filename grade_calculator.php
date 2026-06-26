<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績判定システム</title>
</head>
<body>
    <?php
    //定義
    //学生データ
    $students = [
        ["name" => "田中太郎", "score" => 85],
        ["name" => "佐藤花子", "score" => 92],
        ["name" => "鈴木一郎", "score" => 78],
        ["name" => "高橋美咲", "score" => 65],
        ["name" => "伊藤健太", "score" => 58],
    ];
    ?>

    <!-- タイトル -->
    <p><strong>成績判定システム</strong></p>

    <!-- サブタイトル -->
    <p><strong>【個人成績】</strong></p>

    <?php
    //成績判定ロジック
    foreach ($students as $student) {

        //90点以上の場合、評価A(優秀)
    if ($student['score'] >= 90) {
        echo $student['name']. ': '. $student['score']. '点 - 評価A（優秀）<br>';
    }

    //80点以上90点未満の場合、評価B(良好)
    elseif ($student['score'] >= 80 && $student['score'] < 90) {
        echo $student['name']. ': '. $student['score']. '点 - 評価B（良好）<br>';
    }

    //70点以上80点未満の場合、評価C(普通)
    elseif ($student['score'] >= 70 && $student['score'] < 80) {
        echo $student['name']. ': '. $student['score']. '点 - 評価C（普通）<br>';
    }

    //60点以上70点未満の場合、評価D(要努力)
    elseif ($student['score'] >= 60 && $student['score'] < 70) {
        echo $student['name'].': '. $student['score']. '点 - 評価D（要努力）<br>';
    }

    //60点未満の場合、評価F(不合格)
    else {
    echo $student['name']. ': '. $student['score']. '点 - 評価F（不合格）<br>';
    }

    }
    ?>

    <!-- サブタイトル -->
    <p><strong>【統計情報】</strong></p>
    <?php
    $PassedCount = 0; //合格者
    $FailedCount = 0; //不合格者
    $StudentCount = count($students);//生徒数
    $TotalScore = 0; //合計点

    foreach ($students as $student) {
        //60点以上の場合、合格者に追加
        if ($student['score'] >= 60) {
        $PassedCount += 1;
        }
        //60点未満の場合、不合格者に追加
        else{
            $FailedCount += 1;
        }
    }

    echo '合格者: '. $PassedCount. '人'. '<br>';
    echo '不合格者: '. $FailedCount.'人'. '<br>';

    //平均点
    foreach ($students as $student) {
        $TotalScore += $student['score'];
    }

    echo '平均点: '.($TotalScore / $StudentCount). '点';
    ?>

</body>
</html>