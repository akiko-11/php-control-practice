<?php
//学生データ
$students = [
    ["name" => "田中太郎", "score" => 85],
    ["name" => "佐藤花子", "score" => 92],
    ["name" => "鈴木一郎", "score" => 78],
    ["name" => "高橋美咲", "score" => 65],
    ["name" => "伊藤健太", "score" => 58],
];

//成績判定の関数
function scoreJudgement(string $name, int $score): string{
    if ($score >= 90){
        //点数が90点以上の場合、評価A
        $grade = "A";

    } elseif ($score >= 80){
        //点数が80点以上の場合、評価B
        $grade = "B";

    }elseif ($score >= 70){
        //点数が70点以上の場合、評価C
        $grade = "C";

    }elseif ($score >= 60){
        //点数が60点以上の場合、評価D
        $grade = "D";

    }else{
        //点数が60点未満の場合、評価F
        $grade = "F";
    }

    return "{$name}: {$score}点 - 評価{$grade}";
}

//合格者・不合格者の集計関数
function countPassFail(array $students): array{
    $pass = 0;//合格者数
    $fail = 0;//不合格者数

    // 学生データを一人ずつ取り出す
    foreach ($students as $student) {

        if ($student["score"] >= 60){
            // 60点以上の場合、合格者に追加
            $pass++;
        } else{
            //60点未満の場合、不合格者に追加
            $fail++;
        }
    }

    // 合格者数と不合格者数を配列で返却
    return [
        "pass" => $pass,
        "fail" => $fail,
    ];

}

// 平均点の計算関数
function calculateAverageScore(array $students): float
{
    $totalSocre = 0;//合計点

    foreach ($students as $student){
        // 各学生の点数を合計点に加算
        $totalSocre += $student["score"];
    }

    //平均点＝合計点 ÷ 生徒の数
    return $totalSocre/ count($students);
}

//関数呼び出し
$passFail = countPassFail($students);
$averageScore = calculateAverageScore($students);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績判定システム</title>
</head>
<body>
    <h1>成績判定システム</h1>
    <h2>【個別成績】</h2>
    <div>
        <?php foreach($students as $student): ?>
        <p>
            <?= scoreJudgement($student["name"], $student["score"]) ?>
        </p>

        <?php endforeach; ?>
    </div>

    <h2>【統計情報】</h2>
    <div>

        <p>合格者: <?= $passFail["pass"] ?>人</p>
        <p>不合格者: <?= $passFail["fail"] ?>人</p>
        <!-- 平均点（小数点第一位まで）を表示 -->
        <p>平均点: <?= number_format($averageScore, 1) ?>点</p>

    </div>
</body>
</html>