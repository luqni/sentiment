<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sentiment Analysis Indonesia </title>

    <link rel="stylesheet" href="css/pure-min.css"></head>
	<style>
		.button-success {
			background: rgb(28, 184, 65);
			color: white;
            /* this is a green */
		},
		.warna-font-uji {
			color: ;
		}
	</style>

<body style="margin: 0 auto;width:90%;padding:10px;">
	<h2>Sentiment Analysis Indonesia</h2>
    <form class="pure-form" style="width:100%" action="" method="post">
    
        <fieldset class="pure-group">
            <textarea name="kalimat" class="pure-input-1-2" placeholder="kalimat (contoh: pemimpin pantas menjadi pengayom rakyat)"></textarea>
        </fieldset>
    
        <button type="submit" name="submit" class="pure-button pure-input-1-2 button-success"><p class="warna-font-uji">Uji Sentimen</p></button>
    </form>
	<?php
if(isset($_POST['submit'])){
	if (PHP_SAPI != 'cli') {
		echo "<pre>";
	}

	$strings = array(
		1 => $_POST['kalimat'],
	);

	require_once __DIR__ . '/autoload.php';
	$sentiment = new \PHPInsight\Sentiment();

	$i=1;
	foreach ($strings as $string) {

		// calculations:
		$scores = $sentiment->score($string);
		$class = $sentiment->categorise($string);

		// output:
		if (in_array("pos", $scores)) {
		    echo "Got positif";
		}

		echo "\n\nHasil:";
		echo "\nKalimat: <b>$string</b>\n";
		echo "</br>";
		echo "Arah sentimen: <b>$class</b>, nilai: ";
		// var_dump($scores);
		foreach ($scores as $skor) {
			echo $skor;
		}
		echo "\n\n";
		$i++;
	}
}
?>
<center>
<h3><a target="_blank" href="http://elqoarizme.com/">www.elqoarizme.com</a></h3>
</center>
</body>
</html>