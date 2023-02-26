<!DOCTYPE>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./js/list.js"></script>
    <title>一覧</title>
</head>

<link rel="stylesheet" href="./css/list.css">
<?php require_once './DB/pageDB.php'; ?>

<style>
    .list{
        margin-top: 50px;
    }
    .find{
        margin-top: 50px;
        margin-left: 100px;
    }
    .timeLocation{
        margin:auto;
        text-align:right;
    }

    /* body {
    background: url(./img/bg05.jpg) no-repeat;
    background-size: cover;
    } */
    
</style>


<body>

<!-- Topの表示 -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="list.php">アドレス帳</a>
        </div>
    <div>

        

        <!-- 右 -->

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php session_start(); ?>
                <?php if(isset($_SESSION['name'])):?>
                    <?= $_SESSION['name']; ?>
                <?php else:?>
                    田中太郎
                <?php endif ?>
                     <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">個人設定</a>
                    <li class="divider"></li>
                    <li><a href="./mode/logOut.php" onclick="return confirm('ログアウトしますか')">ログアウト</a></li>
                    <li class="divider"></li>
                    <li><a href="./unsubscribe.html" onclick="return confirm('退会しますか')">退会</a></li>
                    <!-- <li><a href="#">Jasper Report</a></li>
                    <li class="divider"></li>
                    <li><a href="#">分离的链接</a></li>
                    <li class="divider"></li>
                    <li><a href="#">另一个分离的链接</a></li> -->
                </ul>
            </li>
        </ul>

        <?php if(isset($_SESSION['loginTime'])):?>
            <p class="navbar-text navbar-right">アクセス日時 : <?= $_SESSION['loginTime']; ?>  　　 </p>
        <?php else:?>
            <p class="navbar-text navbar-right">アクセス日時 : <?php echo date("Y/m/d"); ?> 　　  </p>
        <?php endif ?>
        
    </div>
    </div>
</nav>



    <!-- 検索ボタン -->
    <div style="padding: 50px 100px 0px;">
        <form class="bs-example bs-example-form" role="form">
            <div class="row">
                
                <div class="col-lg-3">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                検索
                            </button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </form>
    </div>

    <!-- <div class="find">
        <input type="text" >
        <button>検索</button>
    </div> -->




    <!-- 表示リスト -->
    <div class="list">
        <div class="sbtn">
        <button type="button" class="btn btn-success" id="sign-up-btn" >登録</button>
        </div>
        <table cellspacing="0" class="table table-hover">
            <tr>
                <!-- <th>ID</th> -->
                <th>名前</th>
                <th>カナ</th>
                <th>性別</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>操作</th>
            </tr>

            <?php foreach ($u_list as $key=>$data) : ?>
                <?php
                    if($data['sex'] == 3){
                        $sex = '秘密';
                    }elseif($data['sex'] == 1){
                        $sex = '男性';
                    }elseif($data['sex'] == 2){
                        $sex = '女性';
                    }else{
                        $sex = '不明';
                    }
                ?>

                <tr>
                <!-- <td><?php //echo htmlspecialchars($data['id'], ENT_QUOTES, 'UTF-8') ?></td> -->
                <td><?= htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['kana'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($sex, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['number'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8')?></td>

                <td>
                    <a href="./detail.php?id=<?= $data['id']  ?>">
                    <button type="button" class="btn btn-info" >編集</button>
                    </a>
                    <a href="./mode/del.php?id=<?= $data['id'] ?>" 
                    onclick="return confirm('削除しますか')">
                    <button type="button" class="btn btn-danger" >削除</button>
                    </a>
                </td>

            </tr>
            <?php endforeach ?>
        </table>
    </div>


    <!-- ページングボタン　start -->
    
    <div class="page-d">



    <!-- <ul class="pagination">

    <li><a href="#">&laquo;</a></li>

    <li class="active"><a href="#">1</a></li>
    <li class="disabled"><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>

    </ul> -->


        <?php //if ($page > 1) : ?>
        <a href="?p=<?php echo $page - 1 == 0 ? 1 : $page - 1; ?>">&lt;</a>
        <?php //endif ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <?php if ($i == $page) : ?>
            <strong><a href="?p=<?php echo $i ?>"><?php echo $i ?></a></strong>
            <?php else : ?>
            <a href="?p=<?php echo $i ?>"><?php echo $i ?></a>
            <?php endif ?>
        <?php endfor ?>

        <?php //if ($page < $totalPages) : ?>
        <a href="?p=<?php echo $page + 1 <= $totalPages? $page + 1 : $totalPages; ?>">&gt;</a>
        <?php //endif ?>

        <!-- <p><?php //echo $from ?>〜<?php //echo $to ?>件を表示／全<?php //echo $totalList ?>件中</p> -->

    </div>
    <!-- ページングボタン end -->


    
</body>
</html>
