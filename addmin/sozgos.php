<?php
include 'config.php';
$mysqli = new mysqli($sqlhost, $sqluser, $sqlpass, $sqldb);

$dosya = $_FILES['dosya'];
chmod($dosya, 0777);

if ($dosya['error'] == True) {
	echo "Hatali";
} 
else {
	
?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-0lax">Soz </th>
    <th class="tg-0lax">Okalysy</th>
	  <th class="tg-0lax">Soz Duzumi</th>
    <th class="tg-0lax">Manylary</th>
  </tr>
<?php	
	$file = new SplFileObject($dosya['tmp_name']);
		while (!$file->eof()) {
			$setir = $file->fgets();
			$dizi = explode(',', $setir, 2);
			$okalys = preg_match("/([^\[]+)\[([^\]]+)\]/i", $dizi[0], $eslesen);
			$duyp_soz = explode(' ', $dizi[0],2);
			$soz_duzum_barla = explode('. ', $dizi[1], 2);
			
			if (strlen(explode('. ', $dizi[1], 2)[0]) < 15)
			{
			$soz_duzumi = explode('. ', $dizi[1], 2)[0];
			}
			else {
				$soz_duzumi = '';
				$soz_duzum_barla[1] = $dizi[1];
			}
                if ($okalys) {
					
					
                    echo ' <tr><td class="tg-0lax">'.mb_strtolower($eslesen[1]).' </td><td class="tg-0lax">['.mb_strtolower($eslesen[2]).'] </td><td class="tg-0lax">'.$soz_duzumi.' </td><td class="tg-0lax"> '.$soz_duzum_barla[1].'</td></tr>';	
					
		
					
                } else {
                    
					
					
					echo '<tr><td class="tg-0lax">'.mb_strtolower($dizi[0]).' </td><td class="tg-0lax">['.mb_strtolower($duyp_soz[0]).'] </td><td class="tg-0lax">'.$soz_duzumi.' </td><td class="tg-0lax"> '.$soz_duzum_barla[1].'</td></tr>';
					
	
					
                }
			
		}
	?>
</table>
		<?php
}
?>