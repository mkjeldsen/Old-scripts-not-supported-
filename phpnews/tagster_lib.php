<?php
/*
 Version : 3.0
 Author : Lars B. Jensen, lars.jensen@ljweb.com
 Version : 3.1
 Author : Jacob Friis Larsen, jfl@eksperten.dk
 Module Description
 Module to transform URL and E-Mail addresses into clickable links.
 Instruction
 Use the function format to extract and modify all links and emails in a given string.
 The parameters $target handling the target for links and $css_class for handling css on <a> tags are
 both optional.
*/
 class tagster {
 function format ($str, $target = '_blank', $css_class = '') {
 $str = str_replace(array('&', '<', '>'), array('&amp;', '&lt;', '&gt;'), $str);
 $str = $this->url($str, $target, $css_class);
 //$str = $this->email($str, $css_class);
 $str = $this->fix_endchar($str);
 $str = str_replace(array(' ', "\t", "\r", "\n"), array('&nbsp; ', '&nbsp; &nbsp; ', '', '<br />'), $str);
 return $str;
 }
 function url ($str, $target, $css_class) {
 $ins_str = ($css_class != '') ? ' class="'.$css_class.'"' : '';
 if ($target != '') {
 $ins_str .= ' target="'.$target.'"';
 }
 $str = $this->expand($str);
 $str = preg_replace(array('/(ftp|http|https|telnet|news|nntp|file|irc):\/\/([az0-9~#%@&:;=!\',_æøå\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i', '/(\s|tp\:|\(|\[|\&gt;)(www\.)([az0-9~#%@&:;=!\',_æøå\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i', '/(\s|tp\:|\(|\[|\&gt;)(ftp\.)([az0-9~#%@&:;=!\',_æøå\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i'), array('<a
href="\\1://\\2"'.$ins_str.'>\\1://\\2</a>', '\\1<a href="http://\\2\\3"'.$ins_str.'>\\2\\3</a>', '\\1<a
href="ftp://\\2\\3"'.$ins_str.'>\\2\\3</a>'), $str);
 return $this->reduce($str);
 }
 function email ($str, $css_class = '') {
 $ins_class = ($css_class != '') ? ' class="'.$css_class.'"' : '';
 $str = $this->expand($str);
 $str = preg_replace('/([\s"])([\w\.\-_]+)@([\w\-_]+)\.([\w\.\-_]+)/i', '\\1<a
href="mailto:\\2@\\3.\\4"'.$ins_class.'>\\2@\\3.\\4</a>', $str);
 return $this->reduce($str);
 }
 function fix_endchar ($str) {
 return preg_replace(array('/([\'"\)\]\.\,\?\!]+)">/i', '/([\'\"\)\]\.\,\?\!]+)" (target|class)="/i',
'/([\'\"\)\]\.\,\?\!]+)<\/a>/i'), array('">', '" \\2="', '</a>\\1'), $str);
 }
 function expand ($str) {
 return ' '.$str.' ';
 }
 function reduce ($str) {
 return substr($str, 1, -1);
 }
 }
?>
