<?php
$dsn = "mysql:host=localhost;dbname=productdb;charset=utf8";
 $user = "productdb_admin";
 $password = "admin123";

try {
	$pdo = new PDO($dsn, $user, $password);
	$sql = "select * from product";
	$pstmt = $pdo->prepare($sql);
	$pstmt->execute();
	while ($record = $pstmt->fetch(PDO::FETCH_ASSOC)) { 

    echo "{$record["id"]}：";
    echo "{$record["name"]}：";
    echo "{$record["price"]}："; 
    echo "{$record["category"]}："; 
    echo "{$record["detail"]}<br />"; 
     } 
echo "全レコードを取得しました。";
	unset($pstmt);
	unset($pdo);
} catch (PDOException $e) {
	echo $e->getMessage();
}
