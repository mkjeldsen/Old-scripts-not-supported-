<?php
/*
 Version : 3.0
 Author : Lars B. Jensen, lars.jensen@ljweb.com
 Version : 3.1
 Author : Jacob Friis Larsen, jfl@eksperten.dk
 Version : 4.0
 Author : Michael Bach Elkjær
 Module Description
 Module to transform URL and E-Mail addresses into clickable links.
 Instruction
 Use the function format to extract and modify all links and emails in a given string.
 The parameters $target handling the target for links and $css_class for handling css on <a> tags are
 both optional.
*/

namespace Tagster;

class Tagster
{
    public function format(string $str, string $target = '_blank', string $css_class = ''): string
    {
        $str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
        $str = $this->url($str, $target, $css_class);
        $str = $this->email($str, $css_class);
        $str = $this->fixEndChar($str);
        $str = preg_replace(["/ /", "/\t/", "/\r/", "/\n/"], ['&nbsp; ', '&nbsp; &nbsp; ', '', '<br />'], $str);
        return $str;
    }

    private function url(string $str, string $target, string $css_class): string
    {
        $ins_str = $css_class ? ' class="' . $css_class . '"' : '';
        if ($target) {
            $ins_str .= ' target="' . $target . '"';
        }
        $str = ' ' . $str . ' ';
        $str = preg_replace(
            [
                '/(ftp|http|https|telnet|news|nntp|file|irc):\/\/([a-z0-9~#%@&:;=!\',_\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i',
                '/(\s|tp\:|\(|\[|\&gt;)(www\.)([a-z0-9~#%@&:;=!\',_\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i',
                '/(\s|tp\:|\(|\[|\&gt;)(ftp\.)([a-z0-9~#%@&:;=!\',_\(\)\?\/\.\-\+\[\]\|\*\$\^\{\}]+)/i'
            ],
            [
                '<a href="\\1://\\2"' . $ins_str . '>\\1://\\2</a>',
                '\\1<a href="http://\\2\\3"' . $ins_str . '>\\2\\3</a>',
                '\\1<a href="ftp://\\2\\3"' . $ins_str . '>\\2\\3</a>'
            ],
            $str
        );
        $str = substr($str, 1, -1);
        return $str;
    }

    private function email(string $str, string $css_class = ''): string
    {
        $ins_class = $css_class ? ' class="' . $css_class . '"' : '';
        $str = ' ' . $str . ' ';
        $str = preg_replace(
            '/([\s"])([\w\.\-_]+)@([\w\-_]+)\.([\w\.\-_]+)/i',
            '\\1<a href="mailto:\\2@\\3.\\4"' . $ins_class . '>\\2@\\3.\\4</a>',
            $str
        );
        $str = substr($str, 1, -1);
        return $str;
    }

    private function fixEndChar(string $str): string
    {
        return preg_replace(
            [
                '/([\'"\)\]\.\,\?\!]+)">/i',
                '/([\'"\)\]\.\,\?\!]+)" (target|class)="/i',
                '/([\'"\)\]\.\,\?\!]+)<\/a>/i'
            ],
            [
                '">',
                '" \\2="',
                '</a>\\1'
            ],
            $str
        );
    }
}
?>
