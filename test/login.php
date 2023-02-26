<!DOCTYPE html>
<html lang="ja">

<meta charset="UTF-8">
<title>ログイン画面</title>
<link rel="stylesheet" href="./css/login.css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<script src="js/login.js"></script>

<body>
    <form id="form" class="form-login" action="./mode/logIn.php" method="post">
        <h1>ログイン画面</h1>
        <div class="input-box">
            <label>メールアドレス：</label>
            <input type="email" id="textEmail" name="email">
            <span id="s_email" class="error"></span>
        </div>
        <div class="input-box">
            <label>パスワード</label>
            <div class="fieldPassword">
                <input type="password" id="textPass" name="password">
                <span id="buttonEye" class="fa fa-eye" onclick="pushEyeButton()"></span>
            </div>
            <!-- <span id="s_password" class="error"></span> -->

            <!-- ログイン失敗エラー -->
            <?php session_start(); ?>
            <?php if(isset($_SESSION['loginErro'])): ?>
                <span id="s_password" class="error"> <?= $_SESSION['loginErro'] ?> </span>
                <?php session_destroy(); ?>
            <?php else: ?>
                <span id="s_password" class="error"></span>
                <?php session_destroy(); ?>
            <?php endif ?>

        </div>
        <div class="loginbutton">
            <div>
                <button type="submit">ログイン</button>
                <button type="button" id="btn">新規登録</button>
            </div>
        </div>
    </form>
</body>

</html>