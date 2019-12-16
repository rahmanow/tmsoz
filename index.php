<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>
<title>Türkmençe söz barlagy</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jsCSS/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="jsCSS/jquery.autocomplete.css" />

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="jsCSS/stil1.css" />

<script src="jsCSS/ishle.js" charset="utf-8"></script>
</head>
<body>
<div class="container">
    <div id="hold" align="center">
    <span><i>Türkmen diliniň söz bazasy</i></span><br>
        <div id="inputp"><input type="text" id="input" class="input" name="tmsoz" autocomplete="off" /><img id="gozlenyar" style="display: none;" src="image/ajax-loader.gif" />
    </div>
    </div>

    <div id="manysy">
    </div>

    <div id="result" class="container-fluid">
    </div>
    <div id="sozlist">
    </div>
    <div align="center" class="solakRenk">
    <i>Taýýar harplar: <b>"a"</b> we <b>"b"</b>.</i><br>
    <i>Taýýar söz düzümleri <b>"atlar"</b> we <b>"sypatlar"</b>.</i><br><br>

        <p>COPYRIGHT &copy; 2019. Ähli haklary goralan</p>
    </div>
</div>
</body>
</html>

