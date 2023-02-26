<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>詳細・編集画面</title>
    <link rel="stylesheet" href="./css/detail.css">
    <script src="js/detail.js"></script>
</head>

<style>
    a {
        text-decoration: none;
        color: rgb(0, 0, 0);
    }
</style>

<body>
    <form id="form" class="form-detail" action="./mode/amend.php" method="post">

    <?php 
    if($id = $_GET['id']){
        require_once './DB/conn.php';
        $sql = "select * from list where id =".$id;
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        echo '<input type="hidden" name="id" value="'.$id.'">';
    }
    ?>

        <h3>詳細・編集画面</h3>
        <div class="input-box">
            <label><span class="mandatory">* </span>氏名</label>
            <input type="text" name="name" id="username" value="<?= $data['name'] ?>">
            <span id="s_username" class="error"></span>
        </div>

        <div class="input-box">
            <label><span class="mandatory">* </span>カナ</label>
            <input type="text" name="kana" id="kana" value="<?= $data['kana'] ?>">
            <span id="s_kana" class="error"></span>
        </div>

        <div class="input-box">
            <label><span class="mandatory">* </span>メールアドレス</label>
            <input type="email" name="email" id="email" value="<?= $data['email'] ?>">
            <span id="s_email" class="error"></span>
        </div>

        <div class="input-box">
            <label><span class="mandatory">* </span>電話番号</label>
            <input type="text" name="number" id="number" value="<?= $data['number'] ?>">
            <span id="s_number" class="error"></span>
        </div>

        <div class="input-box">
            <label>性別</label>
            <select name="sex">
                <option <?php if($data['sex'] == 3){ echo 'selected';} ?> value="3">秘密</option>
                <option <?php if($data['sex'] == 1){ echo 'selected';} ?> value="1">男性</option>
                <option <?php if($data['sex'] == 2){ echo 'selected';} ?> value="2">女性</option>
            </select>
            <span id="s_sex" class="error"></span>
        </div>

        <div class="input-box">
            <label>生年月日</label>
            <input type="date" name="birthday" value="<?= $data['birthday'] ?>">
            <span id="s_birthday" class="error" ></span>
        </div>
        
        <div class="input-box">
            <label>住所</label>
            <input type="text" name="address" id="address" value="<?= $data['address'] ?>">
            <span id="s_address" class="error"></span>
        </div>

        <div class="input-box">
            <label>会社</label>
            <input type="text" name="company" id="company" value="<?= $data['company'] ?>">
            <span id="s_company" class="error"></span>
        </div>

        <div class="edit-button">
            <div>
                <button type="submit">保存</button>
                <button type="button"><a href="./mode/del.php?id=<?= $id ?>" 
                    onclick="return confirm('削除しますか')">削除</a></button>
                <button type="button"><a href="./list.php">戻る</a></button>
            </div>
        </div>
        
    </form>
</body>

</html>