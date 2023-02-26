<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録画面</title>
    <link rel="stylesheet" href="./css/register.css">
</head>

<script src="./js/register.js"></script>

<style>
    #am {
        text-decoration: none;
        color: rgb(0, 0, 0);
    }
</style>

<body>
    <form id="form" class="form-register" action="./mode/enroll.php" method="post">
        <h2>登録画面</h2>
        <div class="input-box">
            <label><span class="mandatory">* </span>氏名</label>
            <input type="text" name="name" id="username" />
            <span id="s_username" class="error"></span>
        </div>
        <div class="input-box">
            <label><span class="mandatory">* </span>カナ</label>
            <input type="text" name="kana" id="userkana" />
            <span id="s_userkana" class="error"></span>
        </div>
        <div class="input-box">
            <label><span class="mandatory">* </span>メールアドレス</label>
            <input type="email" name="email">
            <span id="s_email" class="error"></span>
        </div>
        <div class="input-box">
            <label><span class="mandatory">* </span>電話番号</label>
            <input type="text" name="number" id="number" />
            <span id="s_number" class="error"></span>
        </div>
        <div class="input-box">
            <label>性別</label>
            <select name="sex">
                <option value="3">秘密</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
            </select>
        </div>
        <div class="input-box">
            <label>生年月日</label>
            <input type="date" name="birthday">
        </div>
        <div class="input-box">
            <label>住所</label>
            <input type="text" name="address">
        </div>
        <div class="input-box">
            <label>会社</label>
            <input type="text" name="company">
        </div>
        <div class="register-button">
            <div>
                <button type="submit">登録</button>
                <button type="button" id="btn1"><a href="./list.php" id="am">戻る</a></button>
            </div>
        </div>
    </form>



    <!-- <script>
        window.onload = function () {
            //画面遷移（臨時）
            document.getElementById("btn1").onclick = function () {
                location = "./list.php";
            }
        }
    </script> -->

</body>

</html>