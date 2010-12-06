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
 
 include("lib/phprhymefind.php");
 
 class Finder {
	 
	 private $rhymefinder;
	 private $greekDic = "dictionaries/el_GR.dic";
	 private $engDic = "dictionaries/en_US.dic";
	 
	 function __construct() {
		 $this->rhymefinder = new RhymeFinder();
	 }
	 
	 function rhymesGreek($suffix) {
		 return $this->rhymefinder->getRhymes($this->greekDic,$suffix);
	 }
	 
	 function rhymesEnglish($suffix) {
		 return $this->rhymefinder->getRhymes($this->engDic,$suffix);
	 }
	 
 }

?>
