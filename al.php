<!doctype html>

<?php
header('Content-Type: text/html; charset=UTF-8');
$tmsoz = mb_strstr($_GET['name'] . ' ', ' ', true );

    //$bul = array("%C5%BE", "%C3%BD", "%C3%A4", "%C3%BC", "%C3%A7", "%C3%B6", "%C5%9F", "%C5%88");
    //$degistir = array("ž", "ý", "ä", "ü", "ç", "ö", "ş", "ň");
		//$tmsoz = str_replace($bul, $degistir, $tmso);

include 'config/vars.php';
include 'tm.php';
include 'config/config.php';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
mysqli_set_charset($db,"utf8");

// Get search term
$query = $db->query("SELECT * FROM tayyar_sozler WHERE soz ='{$_GET['name']}'");
$row = $query->fetch_assoc();
?>

<html>
<head>
<title> </title>
	<link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
</head>
<body>
<script type="text/javascript">
$(function() {

$(".acyap").elimore({
    maxLength: 100,
    moreText: "Manysyny doly görkez",
    lessText: "Kiçelt"
});

});

</script>
<?php
echo '<div id="many"> <strong>Okalyşy: </strong>'.$row['okalys'].'<br>';
echo ' <strong>Söz düzümi: </strong>'.$row['soz_duzumi'].'<br>';
echo ' <strong>Manysy: </strong><div class="acyap">'.$row['manysy'].'</div></div>';

if (preg_match('/\bat\b/',$row['soz_duzumi']) or preg_match('/\bsyp\b/',$row['soz_duzumi']))

{

?>
<div class="container">
  <div class="row">
    <div class="">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <tbody>
          		<tr>
             		<th>Düýp söz</th>
              		<td><b><i><?php echo $tmsoz; ?> </i></b></td>
			  	</tr>
                
				<tr>
             		<th>Sanlar</th>
              		<td><i><?php echo $sozs; ?></i></td>
			  	</tr>
			  	
				  <tr>
             		<th colspan="2" width="25%">Yöňkemeler</th>
              		<th colspan="2" width="25%">San + Ýöňkeme</th>
			  	</tr>
				  <tr>
			  		<td class="solakRenk"> <?php foreach ($yonkeme_at as $yon) {echo $yon . "<br />";}; ?> </td>
			  		<td> <i><?php foreach (yonkeme_gosulma_gos($tmsoz) as $yonkemeler) {echo $yonkemeler."<br />";}; ?> </i> </td>
			  		<td class="solakRenk"> <?php foreach ($yonkeme_at as $yon) {echo $yon . "<br />";}; ?> </td>
			 		<td> <i><?php foreach ($sanYonkemeUytgan as $i) {echo $i."<br />";}; ?> </i> </td> 		
			 	</tr>

				<tr>	
              		<th colspan="2" width="25%">Düşümler</th>
              		<th colspan="2" width="25%">San + Düşüm</th>
			  	</tr>
			  	
				<tr>
					<td class="solakRenk">  <?php foreach ($dusum_at as $yon) {echo $yon . "<br />";}; ?> </td>
					<td><i> <?php foreach (dusum_gosulma_gos($tmsoz) as $yonkemeler) {echo $yonkemeler."<br />";}; ?></i> </td>
			 		<td class="solakRenk"> <?php foreach ($dusum_at as $yon) {echo $yon . "<br />";}; ?> </td>
			 		<td> <i> <?php foreach ($sanDusumUytgan as $i) {echo $i."<br />";}; ?> </i>  </td> 	
			 	</tr>

		</tbody> 
	</table>
	  <table class="table table-bordered table-hover">
	   <tbody>	
	   			<tr class="solakRenk">
	   				<td><b>Ýöňkeme + Düşüm</b></td>
	   				<td><?php echo $yonkeme_at[0] ?></td>
	   				<td> <?php echo $yonkeme_at[1] ?></td>
	   				<td> <?php echo $yonkeme_at[2] ?></td>
	   				<td><?php echo $yonkeme_at[3] ?></td>
	   				<td> <?php echo $yonkeme_at[4] ?></td>
	   				<td> <?php echo $yonkeme_at[5] ?></td>
	   			</tr>
	   		 			 
				<tr>
		 			<td class="solakRenk"> <?php foreach ($dusum_at as $yon) {echo $yon . "<br />";}; ?> </td>
			 		<td><i> <?php foreach ($menYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?> </i> </td>
			 		<td><i> <?php foreach ($senYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?> </i> </td>
					<td><i><?php foreach ($olYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?>   </i> </td>
					<td><i><?php foreach ($bizYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?>  </i> </td>
				 	<td><i><?php foreach ($sizYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?>  </i> </td>
				 	<td><i><?php foreach ($olarYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?> </i> </td>
			 	</tr>			 	
			 	
				 <tr class="solakRenk">
	   				<td><b>San + Ýöňkeme + Düşüm</b></td>
	   				<td><?php echo $yonkeme_at[0] ?></td>
	   				<td> <?php echo $yonkeme_at[1] ?></td>
	   				<td> <?php echo $yonkeme_at[2] ?></td>
	   				<td><?php echo $yonkeme_at[3] ?></td>
	   				<td> <?php echo $yonkeme_at[4] ?></td>
	   				<td> <?php echo $yonkeme_at[5] ?></td>
	   			</tr>

		 	 	<tr>
		 	 		<td class="solakRenk"> <?php foreach ($dusum_at as $yon) {echo $yon . "<br />";}; ?> </td>
			 		<td><i><?php foreach ($menSanYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?> </i> </td>
			 		<td><i><?php foreach ($senSanYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?> </i> </td>
					<td><i><?php foreach ($olSanYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?>  </i> </td>
					<td><i><?php foreach ($bizSanYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?> </i> </td>
				 	<td><i><?php foreach ($sizSanYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?> </i> </td>
				 	<td><i><?php foreach ($olarSanYonkemeDusumUytgan as $x) {echo $x."<br />";}; ?></i> </td>	
			 	</tr>
          </tbody>
		  <!--<tfoot>
			<tr>
			  <td colspan="5" class="text-center">
			  Söz hakynda maglumatlar: <br />
			  Bogun sany:<?php echo $bogun; ?> <br />
			  Soňy <b>"<?php echo $sonky_harp; ?>"</b> bilen gutarýar. <br />
			  Soňdan ikinji harp: <b>"<?php echo $sondan_ikinji_harp; ?>"</b> <br />
			  Soňdan üçünji harp: <b>"<?php echo $sondan_ucunji_harp; ?>"</b><br />

			  San goşulmasy: <b>"<?php echo $sanGosulmaBarla; ?>"</b> <br />
			  </td>
			</tr> 
		  </tfoot>-->
        </table>




      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>
<?php
         }
        else
        {
            echo '<br><br><b style="color:red">Bagyşlaň! Gözleýän sözüňiz üçin barlag taýýar däl</b>';
        } 


?>
	</body>

</html>