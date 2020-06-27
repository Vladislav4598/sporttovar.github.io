

<?php


function search ($query){
    $connection = db();
    $query = trim($query);
    $query = mysqli_real_escape_string($connection,$query);
    $query = htmlspecialchars($query);

    if (!empty($query))
    {
        if (strlen($query) < 2) {
            $text1 = '<p>Слишком короткий поисковый запрос.</p>';
            echo $text1;
        } else if (strlen($query) > 128) {
            $text1 = '<p>Слишком длинный поисковый запрос.</p>';
            echo $text1;
        } else {
           // $q = "SELECT name FROM tovar WHERE `text` LIKE '%$query%'";


            $result = mysqli_query($connection, "SELECT * FROM tovar WHERE name LIKE  + '%$query%' ORDER BY id_sport DESC");

            if ((mysqli_num_rows($result) > 1)) {
                $row = mysqli_fetch_assoc($result);
                $num = mysqli_num_rows($result);

                //$text1 = '<p class = "pol" >По запросу <b>'.$query.'</b> найдено '.$num.' совпадений </p>';
                //echo $text1;

                do {

                    //$q1 = "SELECT  * FROM tovar WHERE name = '$row[name]'";
                    $result1 = mysqli_query($connection,"SELECT  * FROM tovar WHERE name = '$row[р]' ");

                    if (mysqli_affected_rows($connection) > 1) {
                        $row1 = mysqli_fetch_assoc($result1);
                        $num1 = mysqli_num_rows($result1);
                    }

                    $text .= "<div class = 'block411'>
                        <ul>
                     <li><img src='image/".$row['photo']."' width = '220' height='220' /></a></li>
                     <li><label>".$row['name']."</label></li>
                     <li> Цена <b>".$row['price']."</b>p.</li>
                     <li><a href = 'dobasket.php?type=1&id_sport= ".$row["id_sport"]."'class = 'korzina'>В корзину</a></li>
                     </ul>
                        </div>";

                } while ($row = mysqli_fetch_assoc($result));
            } else {
                $text1 = '<p >По вашему запросу ничего не найдено.</p>';
                echo $text1;

            }
        }
    } else {
        $text1 = '<p>Задан пустой поисковый запрос.</p>';
        echo $text1;

    }

    return $text;

}
?>
<?php
if (!empty($_POST['query'])) {
    $search_result = search ($_POST['query']);
    echo $search_result;
}
?>

