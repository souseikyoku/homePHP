window.onload = function () {

    //画面遷移（臨時）
    document.getElementById("btn1").onclick = function () {
        location = "./list.php";
    }


    //1.フォームにonsubmitをつける
    document.getElementById("form").onsubmit = function () {
        //検証メソッドを呼ぶ出す   chekUsername();
        //                       chekPassword();
        //return checkUsername() && checkPassword();

        return checkUsername() && checkUserkana() 
        && checkEmail() && checkNumber();
    }

    //ユーザー名前とパスワードにフォーカスが失う事件をつける。
    document.getElementById("username").onblur = checkUsername;
    document.getElementById("userkana").onblur = checkUserkana;
    document.getElementById("email").onblur = checkEmail;
    document.getElementById("number").onblur = checkNumber;


}

function returnList() {
    location = "./list.php";
}



//ユーザー名前検証
function checkUsername() {
    //1.ユーザー名前の値を取る
    let username = document.getElementById("username").value;
    //2.正規表現を定義する
    let reg_username = /^.{1,20}$/;
    //3.正規表現で名前を確認する。
    let flag = reg_username.test(username);
    //4.提示メッセージ
    let s_username = document.getElementById("s_username");

    if (username.trim().length < 1){
        //空の提示
        s_username.innerHTML = "名前は必須項目です";
        return false;
    } else if (flag) {
        //正常値の提示
        s_username.innerHTML = "<img width='25' height='15' src='img/check.png'/>";
        return flag;
    } else {
        //正常値じゃない提示
        s_username.innerHTML = "名前が正しくない";
        return flag;
    }
}

//ユーザーカナ検証
function checkUserkana() {
    //1.ユーザーカナの値を取る
    let userkana = document.getElementById("userkana").value;
    //2.正規表現を定義する
    let reg_userkana = /^[\u30A0-\u30FF]{1,20}$/;
    //3.正規表現で名前を確認する。
    let flag = reg_userkana.test(userkana);
    //4.提示メッセージ
    let s_userkana = document.getElementById("s_userkana");

    if (userkana.trim().length < 1){
        //空の提示
        s_userkana.innerHTML = "カナは必須項目です";
        return false;
    } else if (flag) {
        //正常値の提示
        s_userkana.innerHTML = "<img width='25' height='15' src='img/check.png'/>";
        return flag;
    } else {
        //正常値じゃない提示
        s_userkana.innerHTML = "カナが正しくない";
        return flag;
    }
}