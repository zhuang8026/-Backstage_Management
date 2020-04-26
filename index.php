<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./asset/css/_react.css">
    <link rel="stylesheet" href="./asset/css/_login.css">
</head>
<body>
    <div class="login-wrap" >
        <div class="login-html">
            <!-- 轉換按鈕 -->
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

            <!-- 總登入 & 登出 -->
            <div class="login-form" id="app">
                <!-- 登入 -->
                <form class="sign-in-htm" name="managerForm" method="post" action="./api/w_login_api.php">
                    <input type="radio" id="r1" name="identity" value="user"/>
                    <label for="r1"><span class="iconId"></span>User</label>
                    <input type="radio" id="r2" name="identity" value="admin"/>
                    <label for="r2"><span class="iconId"></span>Seller</label>
                    <input type="radio" id="r3" name="identity" value="manager" checked/>
                    <label for="r3"><span class="iconId"></span>Manager</label>
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input name="username" id="user" type="text" class="input" placeholder="請輸入ID">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input name="pwd" id="pass" type="password" class="input" data-type="password" placeholder="請輸入PASSWORD">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check">
                            <span class="icon"></span> Keep me Signed in
                        </label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#">Forgot Password?</a>
                    </div>
                </form>

                <!-- 註冊 -->
                <!-- <form class="sign-up-htm" name="managerForm" method="POST" action="#">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input">
                    </div>
                    <div class="group">
                            <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="text" class="input">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                    </div>
                </form> -->
            </div>
        </div>
    </div>
</body>
</html>