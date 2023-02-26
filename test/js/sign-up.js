
window.onload = function () {
    //1.フォームにonsubmitをつける
    document.getElementById("form").onsubmit = function () {
        //検証メソッドを呼ぶ出す   chekUsername();
        //                       chekPassword();
        //return checkUsername() && checkPassword();

        return checkUsername() && checkPassword() 
        && checkpassword() && checkEmail() && checkNumber();
    }

    //ユーザー名前とパスワードにフォーカスが失う事件をつける。
    document.getElementById("username").onblur = checkUsername;
    document.getElementById("password").onblur = checkPassword;
    document.getElementById("password2").onblur = checkpassword;
    document.getElementById("email").onblur = checkEmail;
    document.getElementById("number").onblur = checkNumber;

    // document.getElementById("btn").onclick = function(){
    //     location = "./login.php";
    // }

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
        s_username.innerHTML = "名前が必須項目です";
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

//パスワードチェック
function checkPassword(){
    //1.パスワードの値を取る
    let password = document.getElementById("password").value;
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
    } else if (password.trim().length >= 6 && password.trim().length <= 16) {
        if (flag){
            //正常値の提示
            s_password.innerHTML = "<img width='25' height='15' src='img/check.png'/>";
            return flag;
        }else {
            //正常値じゃない提示
            s_password.innerHTML = "英字、数字、記号の3種類を使用してください";
            return flag;
        }

    }else {
        s_password.innerHTML = "パスワードは6~16桁で入力してください";
        return flag;
    }
}


//パスワード再チェック
function checkpassword() {
    var password = document.getElementById("password").value;
    var repassword = document.getElementById("password2").value;

    if(password.length > 0){
        if(password === repassword) {
            document.getElementById("s_password2").innerHTML="<img width='25' height='15' src='img/check.png'/>";
            return true;
        }else {
            document.getElementById("s_password2").innerHTML="パスワードが一致していない!";
            return false;
        }

    }else{
        document.getElementById("s_password2").innerHTML="パスワードを入力してください!";
        return false;
    }
}



//メールアドレスチェック
function checkEmail() {
    //1.メールアドレスの値を取る
    let email = document.getElementById("email").value;
    //2.正規表現を定義する
    let reg_email = /^[a-zA-Z0-9_+-]+(.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
    //3.正規表現でメールアドレスを確認する。
    let flag = reg_email.test(email);
    //4.提示メッセージ
    let s_email = document.getElementById("s_email");

    if (email.trim().length < 1){
        //空の提示
        s_email.innerHTML = "メールアドレスが必須項目です";
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


//電話番号チェック
function checkNumber() {
    //1.電話番号の値を取る
    let number = document.getElementById("number").value;
    
    //電話番号に値があればチェックする。
    if(number.length >0){
        //2.正規表現を定義する
        let reg_number = /^0[0-9]{9,10}$/;
        //3.正規表現で電話番号を確認する。
        let flag = reg_number.test(number);
        //4.提示メッセージ
        let s_number = document.getElementById("s_number");
        // let s_username0 = document.getElementById("s_username0");
        if (flag) {
            //正常値の提示
            s_number.innerHTML = "<img width='25' height='15' src='img/check.png'/>";
        } else {
            //正常値じゃない提示
            s_number.innerHTML = "電話番号が正しくない";
        }
        return flag;
    }else{
        document.getElementById("s_number").innerHTML = " ";
        return true;
    }
    
}

//パスワードの表示非表示1
function pushEyeButton() {
    let txtPass = document.getElementById("password");
    let btnEye = document.getElementById("buttonEye");
    if (txtPass.type === "text") {
        txtPass.type = "password";
        btnEye.className = "fa fa-eye";
    } else {
        txtPass.type = "text";
        btnEye.className = "fa fa-eye-slash";
    }
}

//パスワードの表示非表示2
function pushEyeButton2() {
    let txtPass = document.getElementById("password2");
    let btnEye = document.getElementById("buttonEye2");
    if (txtPass.type === "text") {
        txtPass.type = "password";
        btnEye.className = "fa fa-eye";
    } else {
        txtPass.type = "text";
        btnEye.className = "fa fa-eye-slash";
    }
}