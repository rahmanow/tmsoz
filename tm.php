<?php
include('config/vars.php');

/// Sugun
/// Üzümgül
/// Ýaşuly
// ulularyňyň 


/// Sözüň näçe bogunlygyny barlaýar
$bogun = substr_count($tmsoz, 'a')+substr_count($tmsoz, 'o')+substr_count($tmsoz, 'u')+substr_count($tmsoz, 'y')+substr_count($tmsoz, 'e')+substr_count($tmsoz, 'i')+substr_count($tmsoz, 'ü')+substr_count($tmsoz, 'ö')+substr_count($tmsoz, 'ä');


/// Sözüň birinji bogunyndaky çekimli harpy alýar.
if (in_array($birinji_bogun1, $cekimli_sesler)){
		
		$bbc = $birinji_bogun1;
	}
	elseif (in_array($birinji_bogun2, $cekimli_sesler)){
		$bbc = $birinji_bogun2;		
	}


$yonke_uyt = yonkeme_gosulma_gos($tmsoz);
$dusum_uyt = dusum_gosulma_gos($tmsoz);

$yonkemeSondanIkinjiHarpy = mb_substr($yonke_uyt[0],-2, 1); // menlik yonkeme sonky haprpy barlayar
$yonkemeSonkyHarpy = mb_substr($yonke_uyt[2],-1); // Olluk yonkeme sonky harpyny barlayar

$dusumYogynGosulma = array(' ','yň','a','y','da','dan');
$dusumInceGosulma = array(' ','iň','e','i','de','den');
$dusumUcunjiYonkemeYogyn = array (' ','nyň','na','ny','nda','ndan');
$dusumUcunjiYonkemeInce = array (' ','niň','ne','ni','nde','nden');
	
$yonkemeYogynGosulma = array('ym','yň','y','ymyz','yňyz','y');
$yonkemeInceGosulma = array('im','iň','i','imiz','iňiz','i');

	$sh = $GLOBALS['sonky_harp'];

	$bb1 = $GLOBALS['birinji_bogun1'];
	$bb2 = $GLOBALS['birinji_bogun2'];
	
    $sih = $GLOBALS['sondan_ikinji_harp'];
    $s3h = $GLOBALS['sondan_ucunji_harp'];
	$yc = $GLOBALS['yogyn_cekimliler'];
	$ic = $GLOBALS['ince_cekimliler'];



/// SANLAR
$sozs = $tmsoz;

	 switch($sonky_harp) {
        case "a":	 
			 $sozs = $sozs.$san_gosulmalar[0];
            break;
			 	 
		case "e":
		case "ä":	 
			 $sozs = $sozs.$san_gosulmalar[1];
            break;
			 
		case "i":
			 if ($bogun == 2 and in_array($bbc, $gos4))
			 {
				 $sozs = mb_substr($sozs, 0, -1).'ü'.$san_gosulmalar[1];
			 }
			 else	
			 {
				 $sozs = $sozs.$san_gosulmalar[1];
			 }
            break;
			 
		case "y":
			 if ($bogun == 2 and in_array($bbc, $gos3))
			 {
				 $sozs = mb_substr($sozs, 0, -1).'u'.$san_gosulmalar[0];
			 }
			 else	 
			 {
				 $sozs = $sozs.$san_gosulmalar[0];
			 }
            break;
		
        default: // ç, g, k, l, m, n, ň, p, r, s, ş, t, w, ý, z, 
			 if (in_array($sondan_ikinji_harp, $yogyn_cekimliler) or in_array($sondan_ucunji_harp, $yogyn_cekimliler))
			 {
				 $sozs = $sozs.$san_gosulmalar[0];
			 }
			 elseif (in_array($sondan_ikinji_harp, $ince_cekimliler) or in_array($sondan_ucunji_harp, $yogyn_cekimliler))
			 {
				 $sozs = $sozs.$san_gosulmalar[1];
			 }
            break;
    }






///// Yöňkeme 
function yonkeme_gosulma_gos($sozY)
{
	$sh = $GLOBALS['sonky_harp'];
	$sih = $GLOBALS['sondan_ikinji_harp'];
	$suh = $GLOBALS['sondan_ucunji_harp'];
	$sg = $GLOBALS['san_gosulmalar'];
	$bb1 = $GLOBALS['birinji_bogun1'];
	$bb2 = $GLOBALS['birinji_bogun2'];
	$bbc = $GLOBALS['bbc'];
	
	$cs = $GLOBALS['cekimli_sesler'];
	
	$dcs = $GLOBALS['dymyk_cekimsizler'];
	$acs = $GLOBALS['acyk_cekimsizler'];
	$zlnrss = $GLOBALS['zlnrss'];
	
	$gos3 = $GLOBALS['gos3'];
	$gos4 = $GLOBALS['gos4'];
	
	$ms = $GLOBALS['masgala_sozler'];
	$as = $GLOBALS['alynma_sozler'];
	$kd1b = $GLOBALS['kadadan_dasary_bir_bogunly_sozler'];

    $bs = $GLOBALS['BeylekiSozler'];
    $YlymMenzes = $GLOBALS['YlymMenzes'];
	
	$bogun = $GLOBALS['bogun'];
	
	
	if ($sh == $dcs[0] && in_array($sih, $cs) && !in_array($sozY, $as) && !in_array($sozY, $kd1b))
		 {
			 $sozY = mb_substr($sozY, 0, -1).$acs[0];
		 }
		 elseif ($sh == $dcs[1] && in_array($sih, $cs) && !in_array($sozY, $as) && !in_array($sozY, $kd1b))
		 {
			 $sozY = mb_substr($sozY, 0, -1).$acs[1];
		 }
		 elseif ($sh == $dcs[2] && in_array($sih, $cs) && !in_array($sozY, $as) && !in_array($sozY, $kd1b))
		 {
			 $sozY = mb_substr($sozY, 0, -1).$acs[2];
		 }
		 elseif ($sh == $dcs[3] && in_array($sih, $cs) && !in_array($sozY, $as) && !in_array($sozY, $kd1b))
		 {
			 $sozY = mb_substr($sozY, 0, -1).$acs[3];
		 }
		 else	
		 {
		 }
	
	switch ($sozY) {
        case (in_array($sozY, $YlymMenzes)):
            $sozY = mb_substr($sozY, 0, -2).mb_substr($sozY, -1);
			$a_b1 = $sozY."ym";
			$a_b2 = $sozY."yň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."ymyz";
			$a_k2 = $sozY."yňyz";
			$a_k3 = $sozY."y";
        break;
		//////// 	-A we -Y	////////////
		case ($sh == "a"):
			$a_b1 = $sozY."m";
			$a_b2 = $sozY."ň";
			$a_b3 = $sozY."sy";
			$a_k1 = $sozY."myz";
			$a_k2 = $sozY."ňyz";
			$a_k3 = $sozY."sy";
		break;
		
		case ($sh == "y"):
			if ($bogun == 2 and in_array($bbc, $gos3))
			 {
				$a_b3 = mb_substr($sozY, 0, -1).'u'."sy";
				$a_k3 = mb_substr($sozY, 0, -1).'u'."sy";
			 }
			 else	 
			 {
				$a_b3 = $sozY."sy";
				$a_k3 = $sozY."sy";
			 }
			$a_b1 = $sozY."m";
			$a_b2 = $sozY."ň";
			
			$a_k1 = $sozY."myz";
			$a_k2 = $sozY."ňyz";
		break;
		////////	-E	////////////
		case ($sh == "e"):
			if (in_array($sozY, $ms)) {
			$a_b1 = $sozY."m";
			$a_b2 = $sozY."ň";
			$a_b3 = $sozY."si";
			$a_k1 = $sozY."miz";
			$a_k2 = $sozY."ňiz";
			$a_k3 = $sozY."si";	
			}
			else {
			$a_b1 = mb_substr($sozY, 0, -1)."ä"."m";
			$a_b2 = mb_substr($sozY, 0, -1)."ä"."ň";
			$a_b3 = $sozY."si";
			$a_k1 = mb_substr($sozY, 0, -1)."ä"."miz";
			$a_k2 = mb_substr($sozY, 0, -1)."ä"."ňiz";
			$a_k3 = $sozY."si";
			}
		break;
		////////	-I	////////////
		case ($sh == "i"):
			 if ($bogun == 2 and in_array($bbc, $gos4))
			 {
				 $a_b3 = mb_substr($sozY, 0, -1).'ü'."si";
				 $a_k3 = mb_substr($sozY, 0, -1).'ü'."si";
			 }
			 else	
			 {
				 $a_b3 = $sozY."si";
				 $a_k3 = $sozY."si";
			 }
			$a_b1 = $sozY."m";
			$a_b2 = $sozY."ň";
			$a_k1 = $sozY."miz";
			$a_k2 = $sozY."ňiz";
		break;
		////////	-Ä	////////////
		case ($sh == "ä"):
			$a_b1 = $sozY."m";
			$a_b2 = $sozY."ň";
			$a_b3 = $sozY."si";
			$a_k1 = $sozY."miz";
			$a_k2 = $sozY."ňiz";
			$a_k3 = $sozY."si";	
		break;
/////////////////////////////////////////////
			
		////////	-A-	////////////
		case ($sih == "a"): 
			$a_b1 = $sozY."ym";
			$a_b2 = $sozY."yň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."ymyz";
			$a_k2 = $sozY."yňyz";
			$a_k3 = $sozY."y";
		break;
		////////	-Y-	 ///////////
		case ($sih == "y"):
			if (in_array($sh, $zlnrss) & $bogun==2)
			{
			$sozY = mb_substr($sozY, 0, -2).mb_substr($sozY, -1);
			$a_b1 = $sozY."ym";
			$a_b2 = $sozY."yň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."ymyz";
			$a_k2 = $sozY."yňyz";
			$a_k3 = $sozY."y";
			}
			else {
			$a_b1 = $sozY."ym";
			$a_b2 = $sozY."yň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."ymyz";
			$a_k2 = $sozY."yňyz";
			$a_k3 = $sozY."y";
			}
		break;
		////////	-O-	 ////////////
		case ($sih == "o"):
			$a_b1 = $sozY."um";
			$a_b2 = $sozY."uň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."umyz";
			$a_k2 = $sozY."uňyz";
			$a_k3 = $sozY."y";
		break;
		////////	-U-	 ////////////
		case ($sih == "u"):
			if (in_array($sh, $zlnrss) && $bogun==2 && !in_array($sozY, $bs))
			{
			$sozY = mb_substr($sozY, 0, -2).mb_substr($sozY, -1);
			$a_b1 = $sozY."um";
			$a_b2 = $sozY."uň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."umyz";
			$a_k2 = $sozY."uňyz";
			$a_k3 = $sozY."y";
			}
		
			else {
			$a_b1 = $sozY."um";
			$a_b2 = $sozY."uň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."umyz";
			$a_k2 = $sozY."uňyz";
			$a_k3 = $sozY."y";	
			}
		break;
		////////	-E-	 ////////////
		case ($sih == "e"):
			$a_b1 = $sozY."im";
			$a_b2 = $sozY."iň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."imiz";
			$a_k2 = $sozY."iňiz";
			$a_k3 = $sozY."i";
		break;	
		////////	-I-	 ////////////
		case ($sih == "i"):
			if (in_array($sh, $zlnrss) && $bogun==2 && !in_array($sozY, $bs))
			{
			$sozY = mb_substr($sozY, 0, -2).mb_substr($sozY, -1);
			$a_b1 = $sozY."im";
			$a_b2 = $sozY."iň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."imiz";
			$a_k2 = $sozY."iňiz";
			$a_k3 = $sozY."i";
			}
			else {
			$a_b1 = $sozY."im";
			$a_b2 = $sozY."iň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."imiz";
			$a_k2 = $sozY."iňiz";
			$a_k3 = $sozY."i";
			}
		break;	
		////////	-Ö-	 ////////////
		case ($sih == "ö"):
			$a_b1 = $sozY."üm";
			$a_b2 = $sozY."üň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."ümiz";
			$a_k2 = $sozY."üňiz";
			$a_k3 = $sozY."i";
		break;
		////////	-Ü-	 ////////////
		case ($sih == "ü"):
			if (in_array($sh, $zlnrss) && $bogun==2 && !in_array($sozY, $bs))
			{
			$sozY = mb_substr($sozY, 0, -2).mb_substr($sozY, -1);
			$a_b1 = $sozY."üm";
			$a_b2 = $sozY."üň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."ümiz";
			$a_k2 = $sozY."üňiz";
			$a_k3 = $sozY."i";
			}
			else {
			$a_b1 = $sozY."üm";
			$a_b2 = $sozY."üň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."ümiz";
			$a_k2 = $sozY."üňiz";
			$a_k3 = $sozY."i";
			}
		break;
		////////	-Ä-	 ////////////
		case ($sih == "ä"):
			$a_b1 = $sozY."im";
			$a_b2 = $sozY."iň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."imiz";
			$a_k2 = $sozY."iňiz";
			$a_k3 = $sozY."i";
		break;	
////////////////////////////////////////////////////
		////////	--A-	////////////
		case ($suh == "a"): 
			$a_b1 = $sozY."ym";
			$a_b2 = $sozY."yň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."ymyz";
			$a_k2 = $sozY."yňyz";
			$a_k3 = $sozY."y";
		break;
		////////	--Y-	 ///////////
		case ($suh == "y"): 
			$a_b1 = $sozY."ym";
			$a_b2 = $sozY."yň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."ymyz";
			$a_k2 = $sozY."yňyz";
			$a_k3 = $sozY."y";
		break;
		////////	--O-	 ////////////
		case ($suh == "o"):
			$a_b1 = $sozY."um";
			$a_b2 = $sozY."uň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."umyz";
			$a_k2 = $sozY."uňyz";
			$a_k3 = $sozY."y";
		break;
		////////	--U-	 ////////////
		case ($suh == "u"):
			$a_b1 = $sozY."um";
			$a_b2 = $sozY."uň";
			$a_b3 = $sozY."y";
			$a_k1 = $sozY."umyz";
			$a_k2 = $sozY."uňyz";
			$a_k3 = $sozY."y";
		break;
		////////	--E-	 ////////////
		case ($suh == "e"):
			$a_b1 = $sozY."im";
			$a_b2 = $sozY."iň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."imiz";
			$a_k2 = $sozY."iňiz";
			$a_k3 = $sozY."i";
		break;	
		////////	--I-	 ////////////
		case ($suh == "e"):
			$a_b1 = $sozY."im";
			$a_b2 = $sozY."iň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."imiz";
			$a_k2 = $sozY."iňiz";
			$a_k3 = $sozY."i";
		break;	
		////////	--Ö-	 ////////////
		case ($suh == "ö"):
			$a_b1 = $sozY."üm";
			$a_b2 = $sozY."üň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."ümiz";
			$a_k2 = $sozY."üňiz";
			$a_k3 = $sozY."i";
		break;
		////////	--Ü-	 ////////////
		case ($suh == "ü"):
			$a_b1 = $sozY."üm";
			$a_b2 = $sozY."üň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."ümiz";
			$a_k2 = $sozY."üňiz";
			$a_k3 = $sozY."i";
		break;
		////////	--Ä-	 ////////////
		case ($suh == "ä"):
			$a_b1 = $sozY."im";
			$a_b2 = $sozY."iň";
			$a_b3 = $sozY."i";
			$a_k1 = $sozY."imiz";
			$a_k2 = $sozY."iňiz";
			$a_k3 = $sozY."i";
		break;	
			
	}
	
	$yonkeme_uytgan = array($a_b1, $a_b2, $a_b3, $a_k1, $a_k2, $a_k3);
	return($yonkeme_uytgan);
}


/////// San + Yonkeme
$sanGosulmaBarla = mb_substr($sozs, -3);

$sanYonkemeUytgan = array();

if ($sanGosulmaBarla == $san_gosulmalar[0])
{
	foreach ($yonkemeYogynGosulma as $i) { $sanYonkemeUytgan[] = $sozs.$i;}
}
elseif ($sanGosulmaBarla = $san_gosulmalar[1])
{
	foreach ($yonkemeInceGosulma as $i) { $sanYonkemeUytgan[] = $sozs.$i;}
}
else {
	echo "Sanlarda uytgemedi";
}



//////// Düşüm

function dusum_gosulma_gos ($sozD)
{
	$sh = $GLOBALS['sonky_harp'];
	$sih = $GLOBALS['sondan_ikinji_harp'];
	$suh = $GLOBALS['sondan_ucunji_harp'];
	$sg = $GLOBALS['san_gosulmalar'];
	$bb1 = $GLOBALS['birinji_bogun1'];
	$bb2 = $GLOBALS['birinji_bogun2'];
	$bbc = $GLOBALS['bbc'];
	
	$cs = $GLOBALS['cekimli_sesler'];
	$ic = $GLOBALS['ince_cekimliler'];
	$yc = $GLOBALS['yogyn_cekimliler'];
	
	$dcs = $GLOBALS['dymyk_cekimsizler'];
	$acs = $GLOBALS['acyk_cekimsizler'];
	$zlnrss = $GLOBALS['zlnrss'];
	
	$gos1 = $GLOBALS['gos1'];
	$gos2 = $GLOBALS['gos2'];
	$gos3 = $GLOBALS['gos3'];
	$gos4 = $GLOBALS['gos4'];
	
	$ms = $GLOBALS['masgala_sozler'];
	$as = $GLOBALS['alynma_sozler'];
	
	$bogun = $GLOBALS['bogun'];
	$kd1b = $GLOBALS['kadadan_dasary_bir_bogunly_sozler'];
	$bs = $GLOBALS['BeylekiSozler'];
	
	
	$a_bad = $sozD;
	switch ($sozD) {
		case ($sh == "a"):
			$a_eyd = $sozD."nyň";
			$a_yod = mb_substr($sozD, 0, -1)."a";
			$a_yed = $sozD."ny";
			$a_wod = $sozD."da";
			$a_cyd = $sozD."dan";
		break;
		
		case ($sh == "y"):
			if ($bogun == 2 and in_array($bbc, $gos3))
			 {
				$a_wod = mb_substr($sozD, 0, -1).'u'."da";
				$a_cyd = mb_substr($sozD, 0, -1).'u'."dan";
			 }
			 else	 
			 {
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			 }

			$a_eyd = $sozD."nyň";
			$a_yod = mb_substr($sozD, 0, -1)."a";
			$a_yed = $sozD."ny";
			
		break;
		
		case ($sh == "i"):
			if ($bogun == 2 and in_array($bbc, $gos4))
			 {
				$a_wod = mb_substr($sozD, 0, -1).'ü'."de";
				$a_cyd = mb_substr($sozD, 0, -1).'ü'."den";
			 }
			 else	 
			 {
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			 }
			
			$a_eyd = $sozD."niň";
			$a_yod = mb_substr($sozD, 0, -1)."ä";
			$a_yed = $sozD."ni";
		break;
		
		case ($sh == "ä"):
			$a_eyd = $sozD."niň";
			$a_yod = mb_substr($sozD, 0, -1)."ä";
			$a_yed = $sozD."ni";
			$a_wod = $sozD."de";
			$a_cyd = $sozD."den";
		break;
		
		case ($sh == "e"):
			$a_eyd = mb_substr($sozD, 0, -1)."ä"."niň";
			$a_yod = mb_substr($sozD, 0, -1)."ä";
			$a_yed = mb_substr($sozD, 0, -1)."ä"."ni";
			$a_wod = $sozD."de";
			$a_cyd = $sozD."den";
		break;	
			
			//////////////////////
		case (in_array($sih, $yc)):
			if ($sh == $dcs[0] && !in_array($sozD, $as) && !in_array($sozD, $kd1b))// kd1b - kadadan dasary 1 bogun
		 	{
				$a_eyd = mb_substr($sozD, 0, -1).$acs[0]."yň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[0]."a";
				$a_yed = mb_substr($sozD, 0, -1).$acs[0]."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			}
			elseif ($sh == $dcs[1] && !in_array($sozD, $as) && !in_array($sozD, $kd1b))// kd1b - kadadan dasary 1 bogun
		 	{
			 	$a_eyd = mb_substr($sozD, 0, -1).$acs[1]."yň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[1]."a";
				$a_yed = mb_substr($sozD, 0, -1).$acs[1]."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			}
			elseif ($sh == $dcs[2] && !in_array($sozD, $as) && !in_array($sozD, $kd1b))// kd1b - kadadan dasary 1 bogun
		 	{
			 	$a_eyd = mb_substr($sozD, 0, -1).$acs[2]."yň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[2]."a";
				$a_yed = mb_substr($sozD, 0, -1).$acs[2]."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			}
			elseif ($sh == $dcs[3] && !in_array($sozD, $as) && !in_array($sozD, $kd1b))// kd1b - kadadan dasary 1 bogun
		 	{
			 	$a_eyd = mb_substr($sozD, 0, -1).$acs[3]."yň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[3]."a";
				$a_yed = mb_substr($sozD, 0, -1).$acs[3]."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			}
			elseif ($bogun == 1 && in_array($bbc, $gos3))
			{
				$a_eyd = $sozD."uň";
				$a_yod = $sozD."a";
				$a_yed = $sozD."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			}
			elseif ($bogun == 2 && in_array($sh, $zlnrss) && !in_array($sozD, $bs) ) 
			{
				$a_eyd = mb_substr($sozD, 0, -2).mb_substr($sozD, -1)."yň";
				$a_yod = mb_substr($sozD, 0, -2).mb_substr($sozD, -1)."a";
				$a_yed = mb_substr($sozD, 0, -2).mb_substr($sozD, -1)."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			}
			else {
				$a_eyd = $sozD."yň";
				$a_yod = $sozD."a";
				$a_yed = $sozD."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
			}
		break;	
			
		case (in_array($sih, $ic)):
			if ($sh == $dcs[0] && !in_array($sozD, $as) && !in_array($sozD, $kd1b))// kd1b - kadadan dasary 1 bogun
		 	{
				$a_eyd = mb_substr($sozD, 0, -1).$acs[0]."iň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[0]."e";
				$a_yed = mb_substr($sozD, 0, -1).$acs[0]."i";
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			}
			elseif ($sh == $dcs[1] && !in_array($sozD, $as) && !in_array($sozD, $kd1b))// kd1b - kadadan dasary 1 bogun
		 	{
			 	$a_eyd = mb_substr($sozD, 0, -1).$acs[1]."iň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[1]."e";
				$a_yed = mb_substr($sozD, 0, -1).$acs[1]."i";
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			}
			elseif ($sh == $dcs[2] && !in_array($sozD, $as) && !in_array($sozD, $kd1b))// kd1b - kadadan dasary 1 bogun
		 	{
			 	$a_eyd = mb_substr($sozD, 0, -1).$acs[2]."iň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[2]."e";
				$a_yed = mb_substr($sozD, 0, -1).$acs[2]."i";
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			}
			elseif($sh == $dcs[3] && !in_array($sozD, $as) && !in_array($sozD, $kd1b)) // kd1b - kadadan dasary 1 bogun
		 	{
			 	$a_eyd = mb_substr($sozD, 0, -1).$acs[3]."iň";
			 	$a_yod = mb_substr($sozD, 0, -1).$acs[3]."e";
				$a_yed = mb_substr($sozD, 0, -1).$acs[3]."i";
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			}
			elseif ($bogun == 1 && in_array($bbc, $gos4) ) //1 bogunly we birinji bogundaky çekimli ö,ü 
			{
				$a_eyd = $sozD."üň";
				$a_yod = $sozD."e";
				$a_yed = $sozD."i";
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			}
			elseif ($bogun == 2 && in_array($sh, $zlnrss) && !in_array($sozD, $bs)) // iki bogunly we sonky harpy z l n r ş s bolan we beýleki sözler bolmaýan
			{
				$a_eyd = mb_substr($sozD, 0, -2).mb_substr($sozD, -1)."iň";
				$a_yod = mb_substr($sozD, 0, -2).mb_substr($sozD, -1)."e";
				$a_yed = mb_substr($sozD, 0, -2).mb_substr($sozD, -1)."i";
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			}
			else
			{	
				$a_eyd = $sozD."iň";
			 	$a_yod = $sozD."e";
				$a_yed = $sozD."i";
				$a_wod = $sozD."de";
				$a_cyd = $sozD."den";
			}
	
		break;
        
        case (in_array($sozD, $GLOBALS['BagtMenzesYogyn'])):
				$a_eyd = $sozD."yň";
			 	$a_yod = $sozD."a";
				$a_yed = $sozD."y";
				$a_wod = $sozD."da";
				$a_cyd = $sozD."dan";
        break;	
        
		default: 
			$a_bad = $sozD;
		
	}

	$dusum_uytgan = array($a_bad, $a_eyd, $a_yod, $a_yed, $a_wod, $a_cyd);
	return($dusum_uytgan);
	

	
}

///////// San + Düşüm

$sanDusumUytgan = array();

if ($sanGosulmaBarla == $san_gosulmalar[0])
{
	foreach ($dusumYogynGosulma as $i) { $sanDusumUytgan[] = $sozs.$i;}
}
elseif ($sanGosulmaBarla = $san_gosulmalar[1])
{
	foreach ($dusumInceGosulma as $i) { $sanDusumUytgan[] = $sozs.$i;}
}
else {
	echo "Sanlarda uytgemedi";
}

//////  Yöňkeme + Düşüm


if (in_array($yonkemeSondanIkinjiHarpy, $yc))
{	
	$menYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $menYonkemeDusumUytgan[] = $yonke_uyt[0].$a;}
	$senYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $senYonkemeDusumUytgan[] = $yonke_uyt[1].$a;}
	$bizYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $bizYonkemeDusumUytgan[] = $yonke_uyt[3].$a;}
	$sizYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $sizYonkemeDusumUytgan[] = $yonke_uyt[4].$a;}
	
	/// Olluk yonkeme ayratyn gosulma
	$olYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeYogyn as $a) { $olYonkemeDusumUytgan[] = $yonke_uyt[2].$a;}
	$olarYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeYogyn as $a) { $olarYonkemeDusumUytgan[] = $yonke_uyt[5].$a;}

}
elseif (in_array($yonkemeSondanIkinjiHarpy, $ic))
{
	$menYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $menYonkemeDusumUytgan[] = $yonke_uyt[0].$a;}
	$senYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $senYonkemeDusumUytgan[] = $yonke_uyt[1].$a;}
	$bizYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $bizYonkemeDusumUytgan[] = $yonke_uyt[3].$a;}
	$sizYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $sizYonkemeDusumUytgan[] = $yonke_uyt[4].$a;}
	
	/// Olluk Yonkeme ince
	$olYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeInce as $a) { $olYonkemeDusumUytgan[] = $yonke_uyt[2].$a;}
	$olarYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeInce as $a) { $olarYonkemeDusumUytgan[] = $yonke_uyt[5].$a;}
}
else {
	echo "Sanlarda uytgemedi";
}


//// San + Ýöňkeme + Düşüm

$sanYonkemeSondanIkinjiHarpy = mb_substr($sanYonkemeUytgan[0],-2, 1);
if (in_array($sanYonkemeSondanIkinjiHarpy, $yc))
{	
	$menSanYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $menSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[0].$a;}
	$senSanYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $senSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[1].$a;}
	$bizSanYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $bizSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[3].$a;}
	$sizSanYonkemeDusumUytgan = array();
	foreach ($dusumYogynGosulma as $a) { $sizSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[4].$a;}
	
	/// Olluk yonkeme ayratyn gosulma
	$olSanYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeYogyn as $a) { $olSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[2].$a;}
	$olarSanYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeYogyn as $a) { $olarSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[5].$a;}

}
elseif (in_array($sanYonkemeSondanIkinjiHarpy, $ic))
{
	$menSanYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $menSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[0].$a;}
	$senSanYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $senSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[1].$a;}
	$bizSanYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $bizSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[3].$a;}
	$sizSanYonkemeDusumUytgan = array();
	foreach ($dusumInceGosulma as $a) { $sizSanYonkemeDusumUytgan[] = $sanYonkemeUytgan[4].$a;}
	
	/// Olluk Yonkeme ince
	$olSanYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeInce as $a) { $olYonkemeDusumUytgan[] = $yonke_uyt[2].$a;}
	$olarSanYonkemeDusumUytgan = array();
	foreach ($dusumUcunjiYonkemeInce as $a) { $olarYonkemeDusumUytgan[] = $yonke_uyt[5].$a;}
}
else {
	echo "Sanlarda uytgemedi";
}


?>