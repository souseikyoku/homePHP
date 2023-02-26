<?php

// 初期パラメータセット
$maxListPerPage = 5;
$page = 1;
if (isset($_GET['p']) && preg_match('/^[1-9][0-9]*$/', $_GET['p'])) {
    $page = $_GET['p'];
}
$offset = ($page - 1) * $maxListPerPage;

// データベーへの接続
try {
    $dbh = new PDO('mysql:host=localhost;dbname=address;charset=utf8', 'root','', array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
    var_dump($e->getMessage());
    exit;
}
    // 記事データ取得
    $sql = "select * from list limit ? offset ?";
    $stmt = ($dbh->prepare($sql));
    $stmt->execute(array($maxListPerPage, $offset));
    $u_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 合計記事数、ページ数を算出
    $totalList = $dbh->query("select count(id) from list")->fetchColumn();
    $totalPages = ceil($totalList / $maxListPerPage);

    // 表示中の記事数表示
    $from = $offset + 1;
    $to   = $offset + $maxListPerPage;
    if ($to > $totalList) {
        $to = $totalList;
    }
?>