<?php
    if ($_POST['tp']=="store")
    {
        $db_name="db.txt";
        $a=file($db_name);
        foreach ($a as $kk=>$vv)
        {
            $c=explode(";",$vv);
            if ($c[0] == $_POST['login']) {
                echo 'Login already exist';
                exit();
            }
        }
        db_store($_POST['login'],$_POST['pass'],$_POST['f'],$_POST['i'],$_POST['o'],$_POST['age'],$_POST['salary']);
        header('Location: /test');
    }
    else if ($_POST['tp']=="search")
    {
        $db_name="db.txt";
        $a=file($db_name);
        foreach ($a as $kk=>$vv)
        {
            $c=explode(";",$vv);
            if ($c[0] == $_POST['login'] and $c[1] == $_POST['pass']) {

                echo 'Success';
                setcookie('user[0]', $_POST['login'], time() + 3600*24*30, '/');
                setcookie('user[1]', $_POST['pass'], time() + 3600*24*30, '/');
                setcookie('user[2]', $c[2], time() + 3600*24*30, '/');
                setcookie('user[3]', $c[3], time() + 3600*24*30, '/');
                setcookie('user[4]', $c[4], time() + 3600*24*30, '/');
                setcookie('user[5]', $c[5], time() + 3600*24*30, '/');
                setcookie('user[6]', $c[6], time() + 3600*24*30, '/');

                header('Location: /test');
                exit();
            }
        }
        echo 'Error';
        exit();
    }


    function db_store($login, $pass, $f, $i, $o, $age, $salary)
    {
        $db_name="db.txt";
        $ff=fopen($db_name,"a+");
        $str=$login.";".$pass.";".$f.";".$i.";".$o.";".$age.";".$salary."\n";
        fwrite($ff,$str);
        fclose($ff);
    }



