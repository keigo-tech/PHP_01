<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>csvファイル書き込み</title>
</head>

<body>
    <div class="container">
        <header>
           <div class="row">
                    <h1>新年度の抱負</h1>
            </div>
        </header>
    </div>

    <hr>

    <div class="container">
    <form action="survey_csv_create.php" method="POST">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="山田 太郎" autofocus required>
                </div>

                <div class="form-group">
                    <label for="email"> メールアドレス</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="例：breakfast@email" required>
                </div>

                <div class="form-group">
                    <label>性別</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="男性" required>男性
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="gender" value="女性" required>女性
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label>年代</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="age" value="10代" required>10代
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="age" value="20代" required>20代
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="age" value="30代" required>30代
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="age" value="40代" required>40代
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="age" value="50代" required>50代
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="age" value="60代" required>60代
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label for="aspiration">今年度の抱負</label>
                    <input type="text" id="aspiration" name="aspiration" class="form-control" placeholder="今年度の抱負" autofocus required>
                </div>
                <button type="submit" class="btn btn-primary">送信する</button>
            </div>
        </form>

        <fieldset>
    <legend class="read">csvファイル書き込み型アンケート（一覧画面）</legend>
    <table border="2">
      <tr>
        <th>名前</th>
        <th>メール</th>
        <th>年代</th>
        <th>性別</th>
        <th>今年の抱負</th>
      </tr>

        <?php
          $file = "data/survey.csv";
          if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
              // echo "<table>\n";
              while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
                  echo "\t<tr>\n";
                  for ( $i = 0; $i < count( $data ); $i++ ) {
                      echo "\t\t<td>{$data[$i]}</td>\n";
                  }
                  echo "\t</tr>\n";
              }
              // echo "</table>\n";
              fclose ( $handle );
          }
        ?>
    </table>
  </fieldset>
    </div>
</body>



</html>
