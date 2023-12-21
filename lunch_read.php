<?php

$dbn ='mysql:dbname=gs_d14_03;charset=utf8mb4;port=3306;host=localhost';  //gs_d14_03はDB名
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// 場所とジャンルをチョイス
$place = $_GET['place'] ?? null;
$genre = $_GET['genre'] ?? null;


$conditions = [];
if ($place) {
    $conditions[] = "place = :place";
  }
if ($genre) {
  $conditions[] = "genre = :genre";
}
// ここまで


$conditionSql = '';
if (count($conditions) > 0) {
  $conditionSql = ' WHERE ' . implode(' AND ', $conditions);
}

// SQL作成&実行
$sql = 'SELECT * FROM kadai' . $conditionSql;

$stmt = $pdo->prepare($sql);


// 場所とジャンル
if ($place) {
    $stmt->bindValue(':place', $place, PDO::PARAM_STR);
  }

if ($genre) {
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
  }
// ここまで


try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }

// SQL実行の処理

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// グラフへのデータ
$genreCounts = array_count_values(array_column($result, 'genre'));

// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();

$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["place"]}</td>
      <td>{$record["genre"]}</td>
      <td>{$record["store"]}</td>
      <td>{$record["score"]}</td>
      <td>{$record["comment"]}</td>
      <td>{$record["date"]}</td>
    </tr>
  ";
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>おすすめランチ一覧</title>
  <style>
    table {
        border-collapse: collapse; 
    }
    th, td {
        border: 1px solid black;
    }
    .box {
        width: 700px;
    }

    .graph {
        width: 500px;
        height: 300px;
    }
  </style>
</head>

<body>

  <form action="lunch_read.php" method="GET">
     <label for="place_choice">場所:</label>
          <select name="place">
            <option value=""></option>
            <option value="東区">東区</option>
            <option value="博多区">博多区</option>
            <option value="中央区">中央区</option>
            <option value="南区">南区</option>
            <option value="城南区">城南区</option>
            <option value="早良区">早良区</option>
            <option value="西区">西区</option>
          </select>
          <label for="genre_choice">ジャンル:</label>
            <select name="genre">
            <option value=""></option>
            <option value="定食">定食</option>
            <option value="揚げ物">揚げ物</option>
            <option value="どんぶり">どんぶり</option>
            <option value="ラーメン">ラーメン</option>
            <option value="うどん">うどん</option>
            <option value="中華">中華</option>
         </select>
  <button type="submit">絞り込む</button>
</form>

<fieldset class="box">
    <legend>おすすめランチ一覧</legend>
    <a href="lunch_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>場所</th>
          <th>ジャンル</th>
          <th>店舗名</th>
          <th>点数</th>
          <th>コメント</th>
          <th>日付</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  
  <fieldset class=graph>
  <canvas id="genreChart" class="canvas"></canvas>
  </fieldset>

  <script>
        var genreData = <?= json_encode($genreCounts) ?>;
  </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('genreChart').getContext('2d');
    const genreChart = new Chart(ctx, {
        type: 'bar', // Changed from 'pie' to 'bar'
        data: {
            labels: Object.keys(genreData),
            datasets: [{
                label: 'ジャンル',
                data: Object.values(genreData),
                backgroundColor: [
                    'red', 'blue', 'yellow', 'green', 'purple', 'orange' // You can customize these colors
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            }
        }
    });
</script>

 
</body>

</html>