<?php
/*
	File : tagster_lib.php
	Version : 2.2
	Date : 18. april 2002
	Author : Lars B. Jensen, lars.jensen@eug.dk

	Module Description
	Module to transform URL and E-Mail addresses into clickable links.

	Note
	This module library has support for the special scandinavian specialchars ז, ר and ו. 

	Public Functions
	--------------------------------------------------------------´
	function tagster_format($str)
	function tagster_url($str, $target, $class)
	function tagster_email($str, $class)

	Private Functions
	--------------------------------------------------------------´
	function tagster_fix_endchar($str)
	function tagster_expand($str)
	function tagster_reduce($str)
*/
	function tagster_format($str, $target="_blank", $css_class="") {
		$str = str_replace("&", "&amp;", $str);
		$str = str_replace("<", "&lt;", $str);
		$str = str_replace(">", "&gt;", $str);
		$str = tagster_url($str, $target, $css_class);
		$str = tagster_email($str, $css_class);
		$str = tagster_fix_endchar($str);
		$str = str_replace("  ", "&nbsp; ", $str);
		$str = str_replace("\t", "&nbsp;&nbsp;&nbsp; ", $str);
		$str = str_replace("\r", "", $str);
		$str = str_replace("\n", "<br>", $str);
		return $str;
	}


	function tagster_url($str, $target, $css_class) {
		$ins_str = "";
		if ($css_class) $ins_str .= " class=\"".$css_class."\"";
		if ($target) $ins_str .= " target=\"".$target."\"";
		$str = tagster_expand($str);
		$str = preg_replace ("/(ftp|http|https|telnet|news|nntp|file|irc):\/\/([a-z0-9~#%@&:;=!',_זרו\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i", "<a href=\"\\1://\\2\"".$ins_str.">\\1://\\2</a>", $str);
		$str = preg_replace ("/(\s|tp\:|\(\[)(www\.)([a-z0-9~#%@&:;=!',_זרו\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i", "\\1<a href=\"http://\\2\\3\"".$ins_str.">\\2\\3</a>", $str);
		$str = preg_replace ("/(\s|tp\:|\(\[)(ftp\.)([a-z0-9~#%@&:;=!',_זרו\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i", "\\1<a href=\"ftp://\\2\\3\"".$ins_str.">\\2\\3</a>", $str);
		return tagster_reduce($str);
	}


	function tagster_email($str, $css_class="") {
		$ins_class = "";
		if ($css_class) $ins_class = " class=\"".$css_class."\"";
		$str = tagster_expand($str);
		$str = preg_replace ("/([\s|\"])([\w|\.|\-|_]+)@([\w||\-|_]+)\.([\w|\.|\-|_]+)/i", "\\1<a href=\"mailto:\\2@\\3.\\4\"".$ins_class.">\\2@\\3.\\4</a>", $str);
		return tagster_reduce($str);
	}


	function tagster_fix_endchar($str) {
		$str = preg_replace ("/([\'\"\)\]\.\,\?\!]+)\">/i", "\">", $str);
		$str = preg_replace ("/([\'\"\)\]\.\,\?\!]+)\" (target|class)=\"/i", "\" \\2=\"", $str);
		$str = preg_replace ("/([\'\"\)\]\.\,\?\!]+)<\/a>/i", "</a>\\1", $str);
		return $str;
	}


	function tagster_expand($str) {
		return " ".$str." ";
	}


	function tagster_reduce($str) {
		return substr($str, 1, -1);
	}
?>
