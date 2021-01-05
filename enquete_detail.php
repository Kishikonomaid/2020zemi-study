<?php
require_once('db_connect.php');
$pdo = get_pdo();
$enquete_id = (int)$_GET['id'];

$statement = $pdo->prepare(
    'SELECT *
    FROM アンケート一覧
    INNER JOIN situmonnichirann
    ON アンケート一覧.ID = situmonnichirann.アンケートID
    WHERE アンケート一覧.ID = :enquete_id
    ');
 if (
    isset($_POST["解答1"])
) {
  // アンケート一覧に挿入したレコードのIDを取得
  $statement = $pdo->query('SELECT LAST_INSERT_ID() AS ID FROM situmonnichirann LIMIT 1;');
  $situmonn_id = $statement->fetch()['ID'];
  var_dump($situmonn_id);

  $statement = $pdo->prepare(
    "INSERT INTO answer (解答内容, 質問)
    VALUES
    (:answer1, :situmonn1),
    (:answer2, :situmonn2),
    (:answer3, :situmonn3),
    (:answer4, :situmonn4);"
    );
    $statement->execute([
        ':answer1' => $_POST["解答1"],
        ':answer2' => $_POST['解答2'],
        ':answer3' => $_POST['解答3'],
        ':answer4' => $_POST['解答4'],
        ':situmonn1' => $situmonn_id,
        ':situmonn2' => $situmonn_id,
        ':situmonn3' => $situmonn_id,
        ':situmonn4' => $situmonn_id,
    ]);
}   
$statement->execute([':situmonn_id' => $situmonn_id]);
$answer_data = $statement->fetchAll();

$statement->execute([':enquete_id' => $enquete_id]);
$enquete_data = $statement->fetchAll();
?>
<html>
<body>
<form action="enquete_detail.php" method="post">
    <ul>
        <?php foreach ($enquete_data as $row): ?>
            <li>
                質問ID: <?php echo htmlspecialchars($row['ID']); ?>
                <?php echo nl2br(htmlspecialchars($row['質問文'])); ?>
         <p>
         <input type="text" name="answer1" size=40 >
        </P>
        <p>
         <input type="submit" value="送信">
        </P>
            </li>
        <?php endforeach; ?>
    </ul>
        </form>
</body>
</html>