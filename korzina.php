<?php


include'header1.php';
?>
<h1>Ваша корзина</h1>


<?php

$id_sport=$_GET["id_sport"];




$connection = db();
$strSQL1="SELECT COUNT(*) as count FROM basket_sport ";
/// SELECT * FROM tovar ORDER BY id DESC
$result1=mysqli_query($connection,$strSQL1) or die("Не могу выполнить запрос1!");
$row=mysqli_fetch_array($result1);

	if($row["count"]==0)
	{
		?> <tr><td align='center'><b>Ваша корзина пуста!</b></td></tr>
		<?
	} else {
		$strSQL1="SELECT photo, name, price, kolvo, tovar.id_sport FROM tovar, basket_sport WHERE tovar.id_sport=basket_sport.id_sport";
	 $result1=mysqli_query($connection,$strSQL1) or die("Не могу выполнить запрос2!");?>
	 <tr><td> <table border="1" width="100%" align="right" >
	 	<tr>
	 		<td align="left"><i>Товар </i></td>
	 		<td align="center"><i>Название: </i></td>
	 		<td align="center"><i>Цена: </i></td>
	 		<td align="left"><i>Количество: </i></td> <td></td></tr>
	 	<?
	 	$sum=0;
	 	while($row=mysqli_fetch_array($result1))
	 	{
	 		?>
	 		<tr>
	 			<td><? print "<img src='image/".$row['photo']."' width = '110' height='110' /></a>";?></td>
	 			<td><b><?print $row["name"];?></b></td>
	 			<td><b><?print $row["price"];?>.руб</b></td>
	 			 <td  align="center" ><b><?print $row["kolvo"];?></b>
	 			  <a href="dobasket.php?type=1&id_sport= <?print $row["id_sport"];?>" class = 'plus' title="Увеличить">+</a>
	 			  <a href="dobasket.php?type=2&id_sport= <?print $row["id_sport"];?>" class = 'plus' title="Уменьшить">-</a>
	 			</td>
	 			 <td> <a href="dobasket.php?type=3&id_sport= <?print $row["id_sport"];?>">Удалить</a></td> </tr>
	 		<?
	 		$sum=$sum+$row["price"]*$row["kolvo"];
	 	}
	 		?>
	 		<tr>
	 			<td align="right"></td>
	 			<td align="right"><i>ИТОГО: </i></td><td align="right"><?print $sum;?>.pуб</b></td>
	 			<td align="right"></td>
	 		</tr> </table>
	 		<tr><td><center><a href=dobasket.php?type=4  class = 'zakaz'>
	 		 <b>Очистить корзину</b></a></center></td>
	 		</tr> <tr><td><center><a href="zakaz.php" class = 'zakaz'> <b>Оформить заказ</b></a></center></td></tr><?
}


include('footer.php');
?>