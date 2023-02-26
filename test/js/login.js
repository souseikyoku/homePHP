
function pushEyeButton() {
    let txtPass = document.getElementById("textPass");
    let btnEye = document.getElementById("buttonEye");
    if (txtPass.type === "text") {
        txtPass.type = "password";
        btnEye.className = "fa fa-eye";
    } else {
        txtPass.type = "text";
        btnEye.className = "fa fa-eye-slash";
    }
}

function pushLoginButton() {
    let txtEmail = document.getElementById("textEmail");
    
}



window.onload = function () {
    //1.フォームにonsubmitをつける
    document.getElementById("form").onsubmit = function () {
        //検証メソッドを呼ぶ出す   chekUsername();
        //return checkPassword() && checkEmail();

        return checkPassword() && checkEmail();
    }

    //フォーカスが失う事件をつける。
    document.getElementById("textPass").onblur = checkPassword;
    document.getElementById("textEmail").onblur = checkEmail;

    //画面遷移（臨時）
    document.getElementById("btn").onclick = function(){
        location = "./sign-up.html";
    }

}


//メールアドレスチェック
function checkEmail() {
    //1.メールアドレスの値を取る
    let email = document.getElementById("textEmail").value;
    //2.正規表現を定義する
    let reg_email = /^[a-zA-Z0-9_+-]+(.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
    //3.正規表現でメールアドレスを確認する。
    let flag = reg_email.test(email);
    //4.提示メッセージ
    let s_email = document.getElementById("s_email");

    if (email.trim().length < 1){
        //空の提示
        s_email.innerHTML = "メールアドレスを入力してください";
        return false;
    } else if (flag) {
        //正常値の提示
        s_email.innerHTML = "<img width='25' height='15' src='img/check.png'/>";
        return flag;
    } else {
        //正常値じゃない提示
        s_email.innerHTML = "メールアドレスが正しくない";
        return flag;
    }
}


//パスワードチェック
function checkPassword(){
    //1.パスワードの値を取る
    let password = document.getElementById("textPass").value;
    //2.正規表現を定義する
    let reg_password = /^(?=.*?[a-z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]+$/i;
    //3.正規表現でパスワードを確認する。
    let flag = reg_password.test(password);
    //4.提示メッセージ
    let s_password = document.getElementById("s_password");

    if (password.trim().length == 0){
        //空の提示
        s_password.innerHTML = "パスワードを入力してください";
        return false;
    } 
    else if (password.trim().length >= 6 && password.trim().length <= 16) {
        if (flag){
            //正常値の提示
            s_password.innerHTML = "<img width='25' height='15' src='img/check.png'/>";
            return flag;
        }else {
            //正常値じゃない提示
            s_password.innerHTML = "英字、数字、記号の3種類を使用してください";
            return flag;
        }

    }
    else {
        s_password.innerHTML = "パスワードは6~16桁で入力してください";
        return flag;
    }
}


