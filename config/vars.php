<?php 

	$encoding = 'UTF-8';  

    $sonky_harp  =  mb_substr (mb_strtolower($tmsoz,$encoding),-1); // Son harfi alma
    $sonky_iki_harp  =  mb_substr (mb_strtolower($tmsoz,$encoding),-2); // Son harfi alma
	$sondan_ikinji_harp =  mb_substr (mb_strtolower($tmsoz,$encoding),-2,1); // Sondan bir önceki harfi alma
	$sondan_ucunji_harp =  mb_substr (mb_strtolower($tmsoz,$encoding),-3,1); // Sondan bir önceki harfi alma
	
	$birinji_bogun1 =  mb_substr(mb_strtolower($tmsoz,$encoding),0,1);
	$birinji_bogun2 =  mb_substr(mb_strtolower($tmsoz,$encoding),1,1);
	
    $cekimli_sesler = array('a', 'o', 'u', 'y', 'e', 'i', 'ü', 'ö', 'ä'); // Sesli harfler
	$ince_cekimliler = array('ä','ö','i','ü','e');
	$yogyn_cekimliler = array('a','o','u','y');
	$turkmen_harp = 'ýüöäçşň';
	$dar_cekimliler = array('y', 'i', 'u', 'ü');
	$gin_cekimliler = 'aäoöe';
	
	$dymyk_cekimsizler = array('k', 'p', 't', 'ç');
	$acyk_cekimsizler = array('g', 'b', 'd', 'j');
	$zlnrss = array('z', 'l', 'n', 'r', 's', 'ş');



	$dodaklanyan_cekimliler = 'ouöü';
		$gin_dodak_cekimliler = 'o,ö';
		$dar_dodak_cekimliler = 'u,ü';
	
	$dodaklanmayan_cekimliler = 'aäyie';
	
	$gos1 = array('a', 'y');
	$gos3 = array('o', 'u');
	$gos2 = array('e','i','ä');
	$gos4 = array('ö', 'ü');
$yonkeme_at = array('Meniň', 'Seniň', 'Onuň', 'Biziň', 'Siziň', 'Olaryň');
$dusum_at = array('Baş', 'Eýelik', 'Ýöneliş', 'Ýeňiş', 'Wagt-orun', 'Çykyş');

$gosulma = array (
'yynd1'=> array('m','ň','sy','myz','ňyz','sy'),  //Yönkeme yogyn normal dodaklanyan
'yind1'=> array('m','ň','si','miz','ňiz','si'), //Yönkeme inçe normal dodaklanyan
'yyn2'=> array('ym','yň','y','ymyz','yňyz','y'),  
'yyd2'=> array('um','uň','y','umyz','uňyz','y'),
'yin2'=> array('im','iň','i','imiz','iňiz','i'),
'yid2'=> array('üm','üň','i','ümiz','üňiz','i'),
'dy1'=> array(' ','nyň','na','ny','da','dan'),
'dya1'=> array(' ','nyň',' ','ny','da','dan'),
'dyy1'=> array(' ','nyň','a','ny','da','dan'),
'die1'=> array(' ','niň','ä','ni','de','den'),
'dii1'=> array(' ','niň','&#228;','ni','de','den'),
'dial'=> array(' ','niň','ä','ni','de','den'),
'dy2'=> array(' ','yň','a','y','da','dan'),
'dyd2'=> array(' ','uň','a','y','da','dan'),
'di2'=> array(' ','iň','e','i','de','den'),
'di1'=> array(' ','niň','ne','ni','de','den'),
'yon3y'=> array (' ','nyň','na','ny','nda','ndan'), // 3nji yönkeme yogyn y 
'yon3i'=> array (' ','niň','ne','ni','nde','nden')// 3nji yönkeme inçe i
);
	
	$san_gosulmalar = array('lar', 'ler');
	$masgala_sozler = array('eje', 'ene');
	$kadadan_dasary_bir_bogunly_sozler = array('bok');
$BeylekiSozler = array('sugun', 'bazar');
$YlymMenzes = array('ylym');
$BagtMenzesYogyn = array('bagt', 'tagt', 'nagt');


$alynma_sozler = array('jemagat', 
'syýasat', 
'syýahat', 
'millet', 
'minnet', 
'hökümet', 
'medeniýet', 
'sungat', 
'edebiýat',
'tebigat', 
'adalat',
'keramat',
'bilet',
'maglumat',
'döwlet',
'bereket',
'niýet'
);
?>