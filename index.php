<?php
/**
* Copyright 2010-2011, Paulos Sarbinowski <onexemailx@gmail.com>
*
* Licensed under the GNU General Public License, version 3 (GPLv3)
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright 2010-2011, Paulos Sarbinowski <onexemailx@gmail.com>
* @license GPLv3 License (http://www.opensource.org/licenses/gpl-3.0.html)
*/

include("rhymefind.php");

$finder = new Finder();

?>

<html>
 <head>
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-7">
   <META AUTHOR="cypha">
   <meta name="description" content="Rhyme finder page."/> 
   <meta name="keywords" content="cypher, rhyme, greek, english, find, page"/> 
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"> 
   <link rel="stylesheet" href="style.css" type="text/css" media="screen,projection" />
  <title>Rhyme finder</title>
 </head>
 <body></br><img src="rhymefinder.png" alt="rhyme finder logo" /> </br></br>
 <form name="find" action="index.php" method="post">
	<label for="word"><h2 class="first">Find rhymes for the suffixe(s):</h2></label> <input type="text" name="word" size="40" maxlength="75"/><br />
	<label for="language"><h2 class="first">Language: </h2></label> <select style=" margin: 0px 15px 15px 15px; width: 70px;" name="languageChoice">
												<option value="GR">Greek</option>
												<option value="EN">English</option>
											 </select> </br>
	<input type="submit" style=" color:#121212;" value="Find rhymes" /><input type="reset" style=" color:#121212;" value="Clear"><br />
<textarea name="results" rows="15" cols="100" readonly="readonly"><?php 
				 
				if(filter_has_var(INPUT_POST, "word")){
					$word = filter_input(INPUT_POST,  "word", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
					if($word!="" && filter_has_var(INPUT_POST, "languageChoice")){
						$lang = filter_input(INPUT_POST, "languageChoice", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
						if($lang=="GR"){
							$rhymes = $finder->rhymesGreek($word);
							foreach ($rhymes as $rhyme)
								echo $rhyme." ";
						}elseif($lang=="EN"){
							$rhymes = $finder->rhymesEnglish($word);
							foreach ($rhymes as $rhyme)
								echo $rhyme." ";
						}
					}
				}
?></textarea></br>
<label for="lirycs"><h2 class="first">Current lirycs:</h2></label>
<textarea name="lirycs" rows="15" cols="100" maxlength="700"><?php  
echo stripslashes($_REQUEST["lirycs"]);
?></textarea></form>
 </body>
</html>
