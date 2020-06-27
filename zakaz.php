
<?

include 'header1.php';
?>
<h1>Ваш заказ</h1>
<form action="doorder.php" method="post">

<?

$id_sport=$_GET['".$id_sport."'];
function db2 (){
		$hostname="localhost";
		$user="root";
		$password="";

		$connection = mysqli_connect($hostname,$user,$password);
		$db = mysqli_select_db($connection, "shop");
		return $connection;

}
$connection = db2();

$strSQL1="SELECT COUNT(*) as count FROM basket_sport ";
$result1=mysqli_query($connection,$strSQL1) or die("Не могу выполнить запрос1!");
$row=mysqli_fetch_array($result1);
if($row["count"]==0) {
	?><tr>
		<td bgcolor='#ff9999' align='center'> <b>Ваша корзина пуста!</b></td></tr> <?
} else { $strSQL1="SELECT photo, name, price, kolvo, tovar.id_sport FROM tovar, basket_sport WHERE tovar.id_sport=basket_sport.id_sport";
 $result1=mysqli_query($connection,$strSQL1) or die("Не могу выполнить запрос2!"); ?>
 <tr >
 	<td>
 		<table border="1" width="100%" align="right" >Доставка бесплатная <tr>

 			<td align="center"><i>Название: </i></td>
 			<td align="center"><i>Цена: </i></td>
 			<td align="left"><i>Количество: </i></td>
 			</tr> <? $sum=0;
 			while($row=mysqli_fetch_array($result1))  {
 				?>  <tr>
 					<td><b><?print $row["name"];?></b></td>
 					<td><?print $row["price"];?>.руб</td>
 					<td><?print $row["kolvo"];?>.шт</td>
 					</tr>
 					<?
 					$sum=$sum+$row["price"]*$row["kolvo"]; }
 					?>

 					<tr >

 						<td align="right"><i>ИТОГО: </i></td>
 						<td bgcolor="#DC143C" color = "#fff"><?print $sum;?>.pуб</td><td></td></tr>
 						</table>



 									 	</td>
 									 <h1 >Ваши данные</h1>
 							<table class = 'dan' border="0" align="center">
 								    <tr>
      <td>Введите ФИО</td>
      <td align="center"><input class = 'pole' type="string " name="fio" size="25" maxlength="100"></td>
    </tr>
    <tr>
      <td>Введите Номер Карты</td>
      <td align="center"><input class = 'pole' type="string" name="karta" size="25" maxlength="100"></td>
    </tr>
    <tr>
      <td>Введите Номер Телефона</td>
      <td align="center"><input class = 'pole' type="number" name="nomer" size="25" maxlength="100"></td>
    </tr>
    <tr>
      <td>Введите Почту</td>
      <td align="center"><input class = 'pole' type="string " name="email" size="25" maxlength="100"></td>
    </tr>
    <tr>
    <tr>
      <td>Адрес доставки</td>
    </tr>
    <tr>
      <td>Страна</td>
      <td align="center"><input  class = 'pole' type="string " name="strana" size="25" maxlength="20"></td>
    </tr>
    <tr>
      <td>Область (Край,Pеспублика,Округ)</td>
      <td align="center"><input  class = 'pole' type="string " name="oblast" size="25" maxlength="20"></td>
    </tr>
    <tr>
      <td>Город (Поселок,ПГТ)</td>
      <td align="center"><input class = 'pole' type="string " name="city" size="25" maxlength="20"></td>
    </tr>
    <tr>
      <td>Улица (указать бульвар(б-р) или проспект(пр-т))</td>
      <td align="center"><input class = 'pole' type="string " name="strit" size="25" maxlength="20"></td>
    </tr>
    <tr>
      <td>Дом</td>
      <td align="center"><input class = 'pole' type="number" name="home" size="25" maxlength="5"></td>
    </tr>
    <tr>
      <td>Квартира</td>
      <td align="center"><input class = 'pole' type="number" name="flat" size="25" maxlength="5"></td>
    </tr>
</tr>
</table>
 							<tr><td><center><input class = 'zakaz' type = "submit" value="Отправить заказ"></td></a></center></td></tr>
 							</form> <? }


?>
<?
include 'footer.php';
?>