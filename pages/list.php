<?php

require_once "process.php";
require_once "product.php";
?>
<?php
try {
	$pdo = connectDB();
	$sql = "select * from product;";
	$pstmt = $pdo->prepare($sql);
	$pstmt->execute();
	$records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	    
} catch (PDOException $e) {
	echo $e->getMessage();
	die;
} finally {
	unset($pstmt);
	unset($pdo);
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>商品データベース</title>
	<link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
<header>
	<h1>商品データベース</h1>
</header>
<main id="list">
	<h2>商品一覧</h2>
	<table class="list">
		<tr>
			<th>商品ID</th>
			<th>カテゴリ</th>
			<th>商品名</th>
			<th>価格</th>
			<th></th>
		</tr>
	<?php
	    while ($row = fetchAll(PDO::FETCH_ASSOC($records)))?>
		<tr>
			<td>echo [$Id]</td>
			<td>財布・小物入れ</td>
			<td>和財布(女性用)</td>
			<td>&yen;4100</td>
			<td class="buttons">
				<form name="inputs">
					<input type="hidden" name="id" value="" />
					<button formaction="update.php" formmethod="post" name="action" value="update">更新</button>
					<button formaction="confirm.php" formmethod="post" name="action" value="delete">削除</button>
				</form>
			</td>
		</tr>
	</table>
</main>
<footer>
	<div id="copyright">&copy; 2021 The Applied Course of Web System Development.</div>
</footer>
</body>
</html>