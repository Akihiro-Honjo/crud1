<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ランチリスト</title>
  <style>
    .box {
        width: 300px;
        height: 260px;
    }
  </style>
</head>

<body>
  <form action="lunch_create.php" method="POST">
    <fieldset class="box">
      <legend>おすすめランチ（入力画面）</legend>
      <a href="lunch_read.php">一覧画面</a>
      <div>
        場　所　： <select name="place">
                   <option value=""></option>
                   <option value="東区">東区</option>
                   <option value="博多区">博多区</option>
                   <option value="中央区">中央区</option>
                   <option value="南区">南区</option>
                   <option value="城南区">城南区</option>
                   <option value="早良区">早良区</option>
                   <option value="西区">西区</option>
                   </select>
      </div>
      <div>
        ジャンル： <select name="genre">
                   <option value=""></option>
                   <option value="定食">定食</option>
                   <option value="揚げ物">揚げ物</option>
                   <option value="どんぶり">どんぶり</option>
                   <option value="ラーメン">ラーメン</option>
                   <option value="うどん">うどん</option>
                   <option value="中華">中華</option>
                   </select>
      </div>
      <div>
        店　名　： <input type="text" name="store">
      </div>
      <div>
        点　数　：  <select name="score">
                   <option value=""></option>
                   <option value="5">5点</option>
                   <option value="4">4点</option>
                   <option value="3">3点</option>
                   <option value="2">2点</option>
                   <option value="1">1点</option>
                   </select>
      </div>
      <div>
        コメント： <input type="text" name="comment">
      </div>
      <div>
        日　付　： <input type="date" name="date">
      </div>
      <div>
        <button>送信</button>
      </div>
    </fieldset>
  </form>

</body>

</html>