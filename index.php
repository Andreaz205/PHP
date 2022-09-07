<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 15</title>
</head>
<body>
    <?php if(isset($_COOKIE['user']) == false): ?>
    <h2>Регистрация</h2>
    <form action="scripts/script.php" method=POST>
        Login   : <input type="text" name="login"><br>
        Password: <input type="password" name="pass"><br>
        F       : <input type=text name=f><br>
        I       : <input type=text name=i><br>
        O       : <input type=text name=o><br>
        Age     : <input type=text name=age><br>
        Salary  : <input type=text name=salary><br>
        <input type=hidden name=tp value="store">
        <input type=submit value="Регистрация"><br>
    </form>

    <hr>

    <h2>Авторизация</h2>
    <form action="scripts/script.php" method=POST>
        Login: <input type="text" name="login"><br>
        Password: <input type="password" name="pass"><br>
        <input type=hidden name=tp value="search">
        <input type=submit value="Войти"><br>
    </form>
    <?php else: ?>
    <div>
        User is logged in.
        <p>Логин <?=$_COOKIE['user'][0]?></p>
        <p>Пароль <?=$_COOKIE['user'][1]?></p>
        <p>Фамилия <?=$_COOKIE['user'][2]?></p>
        <p>Имя <?=$_COOKIE['user'][3]?></p>
        <p>Отчество <?=$_COOKIE['user'][4]?></p>
        <p>Возраст <?=$_COOKIE['user'][5]?></p>
        <p>Зарплата <?=$_COOKIE['user'][6]?></p>
        <?php
            if ($_COOKIE['user'][5] < 18) {
                echo 'Акция для несовершеннолетних';
            }
            if ($_COOKIE['user'][5] > 50) {
                echo 'Акция для пенсионеров';
            }
        ?>


        <form action="scripts/exit.php">
            <input type="submit" value="Выйти">
        </form>
    </div>
    <?php endif; ?>


</body>
</html>