<?php 
ini_set('display_errors',1); 
 error_reporting(E_ALL);
require_once('classes/extractor.class.php');
$extract = new extractor();
/*
$data = $extract->processWords("In probability theory and statistics, Bayes' theorem (alternatively Bayes' law or Bayes' rule) is a result that is of importance in the mathematical manipulation of conditional probabilities. It is a result that derives from the more basic axioms of probability.
 When applied, the probabilities involved in Bayes' theorem may have any of a number of probability interpretations. In one of these interpretations, the theorem is used directly as part of a particular approach to statistical inference. ln particular, with the Bayesian interpretation of probability, the theorem expresses how a subjective degree of belief should rationally change to account for evidence: this is Bayesian inference, which is fundamental to Bayesian statistics. However, Bayes' theorem has applications in a wide range of calculations involving probabilities, not just in Bayesian inference.");
 */
$data = $extract->processWords("If you wanted to see a gripping thriller with incredible characters, you have come to the perfect place. 'Homeland' is the new Showtime Drama that entertains you throughout and never lets you go, thus succeeding in slipping in some really unexpected twists in the plot. With writers who've previously written for '24', the show does look inspired when it comes to keeping the audience in the dark. The show is blessed with a small but amazing cast whose performance is worth every penny. Claire Danes plays an intense CIA analyst who believes that recently recovered P.O.W. (Damian Lewis) is plotting to attack America. Her character is unstable and makes it hard for the audience to believe her which adds to the beauty of the script. Damian Lewis, on the other hand, plays the 'guy in uniform' with ease as he did splendidly in 'Band of Brothers'. The show hasn't revealed much about Damian's character and I have a feeling they wouldn't do that any time soon, since it keeps the suspense going. The pilot was top-notch and certainly the best that premiered this fall. If the show continues to be intriguing and maintains the high quality of the pilot, it can surely be a genius.");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="apostolis chaitalis" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	</head>
	<body>
		<pre>
			<? print_r($data); ?>
		</pre>
		
	</body>
</html>
