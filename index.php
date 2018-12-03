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


function viewAllStudents($link)
{

    $query = 'SELECT * FROM student';
    $result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error());

    echo "Список всех студентов";
    echo "</br>";
    echo "<table border='2pt'>\n";
    echo "\t<tr>\n";
        echo "\t\t<td align='center'>id</td>\n";
        echo "\t\t<td align='center'>Name</td>\n";
        echo "\t\t<td align='center'>Lastname</td>\n";
        echo "\t\t<td align='center'>Fathername</td>\n";
        echo "\t\t<td align='center'>Age</td>\n";
        echo "\t\t<td align='center'>E-mail</td>\n";
        echo "\t\t<td align='center'>Birth date</td>\n";
        echo "\t\t<td align='center'>Score</td>\n";
        echo "\t\t<td align='center'>Form</td>\n";
        echo "\t\t<td align='center'>Group</td>\n";
    echo "\t</tr>\n";

    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td align='center'>&nbsp$col_value&nbsp   </td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    echo "</br>";

    mysqli_free_result($result);
}


function viewAllLectors($link)
{

    $query = 'SELECT * FROM Lector';
    $result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error());

    echo "Список всех лекторов";
    echo "</br>";
    echo "<table border='2pt'>\n";
    echo "\t<tr>\n";
    echo "\t\t<td align='center'>id</td>\n";
    echo "\t\t<td align='center'>Name</td>\n";
    echo "\t\t<td align='center'>Lastname</td>\n";
    echo "\t\t<td align='center'>Fathername</td>\n";
    echo "\t\t<td align='center'>Age</td>\n";
    echo "\t\t<td align='center'>E-mail</td>\n";
    echo "\t\t<td align='center'>Birth date</td>\n";
    echo "\t\t<td align='center'>Speciality</td>\n";
    echo "\t\t<td align='center'>Degree</td>\n";
    echo "\t\t<td align='center'>Faculty</td>\n";
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td align='center'>&nbsp$col_value&nbsp</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    echo "</br>";

    mysqli_free_result($result);
}

viewAllStudents($link);
viewAllLectors($link);


mysqli_close($link);
?>