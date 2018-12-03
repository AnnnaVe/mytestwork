<?php
//Устанавливаем доступы к базе данных:
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = 'anny___'; //пароль, по умолчанию пустой
$db_name = 'testwork'; //имя базы данных

$link = mysqli_connect($host, $user, $password)
or die('Не удалось соединиться: ' . mysqli_error());
//echo 'Соединение успешно установлено';
mysqli_select_db($link, $db_name) or die('Не удалось выбрать базу данных');

function createNewStudent($link)
{

    $method = $_SERVER["REQUEST_METHOD"];
    if ($method == "GET") $queryhtml = "_GET";
    elseif ($method == "POST") $queryhtml = "_POST";
    else die("$method is not supported!");

    $q = $$queryhtml;
    $id = $q["id"];
    $name = $q["name"];
    $lastname = $q["lastname"];
    $fathername = $q["fathername"];
    $age = $q["age"];
    $email = $q["email"];
    $birth = $q["birth"];
    $score = $q["score"];
    $form = $q["form"];
    $groupa = $q["groupa"];

    $query = 'INSERT INTO student (id, name, lastname, fathername, age, email, birth, score,form, groupa) 
    VALUES (\'".$id."\', \'".$name."\', \'".$lastname."\', \'".$fathername."\', \'".$age."\',\'".$id."\',\'".$email."\',\'".$birth."\',\'".$score."\',\'".$form."\', \'".$groupa."\' )';
    $result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error());

// Выводим результаты в html
    echo "<table>\n";
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";

    mysqli_free_result($result);
}


mysqli_close($link);
?>