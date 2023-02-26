
window.onload = function () {
    //1.フォームにonsubmitをつける
    document.getElementById("form").onsubmit = function () {
        //検証メソッドを呼ぶ出す   chekUsername();
        //                       chekPassword();
        //return checkUsername() && checkPassword();

        return checkUsername()  && checkEmail() && checkNumber()
        && checkAddress() && checkCompany() && checkKana();
    }

    //ユーザー名前とパスワードにフォーカスが失う事件をつける。
    document.getElementById("username").onblur = checkUsername;
    document.getElementById("email").onblur = checkEmail;
    document.getElementById("number").onblur = checkNumber;
    document.getElementById("address").onblur = checkAddress;
    document.getElementById("company").onblur = checkCompany;
    document.getElementById("kana").onblur = checkKana;

    // document.getElementById("btn").onclick = function(){
    //     location = "./login.html";
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
        s_username.innerHTML = "氏名が必須項目です";
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

    if(number.trim().length > 0){
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
        document.getElementById("s_number").innerHTML = "電話番号が必須項目です";
        return false;
    }
}

//住所
function checkAddress() {

    let email = document.getElementById("address").value;

    if(email.trim().length > 0){
        if (email.trim().length > 80){
            document.getElementById("s_address").innerHTML = "住所は80文字以内で入力してください";
            return false;
        } else{
            document.getElementById("s_address").innerHTML = "<img width='25' height='15' src='img/check.png'/>";
            return ture;
        }
    }else{
        document.getElementById("s_address").innerHTML = "";
        return ture;
    }
}

//会社
function checkCompany() {

    let company = document.getElementById("company").value;

    if(company.trim().length > 0){
        if (company.trim().length > 80){
            document.getElementById("s_company").innerHTML = "住所は80文字以内で入力してください";
            return false;
        } else{
            document.getElementById("s_company").innerHTML = "<img width='25' height='15' src='img/check.png'/>";
            return ture;
        }
    }else{
        document.getElementById("s_company").innerHTML = "";
        return ture;
    }
}


//カナ
function checkKana() {
    //1.メールアドレスの値を取る
    let kana = document.getElementById("kana").value;
    //2.正規表現を定義する
    let reg_kana = /^[\u30A0-\u30FF]{1,20}$/;   //  または /^[ァ-?]+$/
    //3.正規表現でメールアドレスを確認する。
    let flag = reg_kana.test(kana);
    //4.提示メッセージ
    let s_kana = document.getElementById("s_kana");

    if (kana.trim().length < 1){
        //空の提示
        s_kana.innerHTML = "カナが必須項目です";
        return false;
    } else if (flag) {
        //正常値の提示
        s_kana.innerHTML = "<img width='25' height='15' src='img/check.png'/>";
        return flag;
    } else {
        //正常値じゃない提示
        s_kana.innerHTML = "20文字以内のカタカナを入力してください";
        return flag;
    }
}
