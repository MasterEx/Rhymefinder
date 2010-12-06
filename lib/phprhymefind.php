<?php
/**
 * This is a implementation of rhymefind script in PHP.
 * 
 * Copyright 2010-2011, Periklis Ntanasis <pntanasis@gmail.com>
 * 
 * Licensed under the GNU General Public License, version 3 (GPLv3)
 * Redistributions of files must retain the above copyright notice.
 * 
 * @license GPLv3 License (http://www.opensource.org/licenses/gpl-3.0.html)
 */
 
 class RhymeFinder {
	 
	 function createArray($filename,$debug) {
		 $fh = @fopen($filename,'r');
		 if ($fh) {
			while (($buffer = fgets($fh, 4096)) !== false) {
				$words_array[] = trim($buffer);
			}
			if (!feof($handle) && $debug) {
				echo "Error: unexpected fgets() fail\n";
			}
			fclose($fh);
		}
		return($words_array);
	 }
	 
	 function findRhymes($suffix,$words_array) {
		 // weird utf 8 and regex boundary (\b) thing in PHP
		 // http://stackoverflow.com/questions/2432868/php-regex-word-boundary-matching-in-utf-8
		 return preg_grep("/$suffix(?!\pL)/i",$words_array);
	 }
	 
 }

?>
