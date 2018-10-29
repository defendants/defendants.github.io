<?php
 
/*
 *   Dili is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   Dili is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with Dili; if not, write to the Free Software
 *   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
********************************************************************************
 *  
 * This is the Dili (DIrectory LIsting) script v0.0.1.
 * Place the index.php in the directory you want listed, simple as that. :)
 *  
 * Jorge Barrera Grandon <jorge@atlantiscrew.net>
 * Atlantiscrew <http://www.atlantiscrew.net>
 *
 */
 
$title = basename(dirname(__FILE__)).'/';
 
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
        echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';
        echo '<head>';
        echo '<title>'.$title.'</title>';
        echo '<meta http-equiv="Content-Type" content="text/html" />';
        echo '</head>';
        echo '<body>';
        echo '<h2>Directory listing of '.$title.'</h2>';
 
        $dir = opendir(".");
 
        while(FALSE !== ($file = readdir($dir))) {
            if($file != "." && $file != ".." && $file != "index.php") {
                $myFiles[] = "$file";
            }
        }
 
        closedir($dir);
        sort($myFiles);
        reset($myFiles);
 
        foreach($myFiles as $value) {
            if (is_dir($value)) {
                echo '<p style="margin: 0">[d] - <a href="'.$value.'">'.$value.'/</a></p>';
        } else {
                echo '<p style="margin: 0">[f] - <a href="'.$value.'">'.$value.'</a></p>';
            }
        }
 
        echo '<hr />';
        echo '<p>';
            echo '<a href="http://validator.w3.org/check?uri=referer">';
                echo '<img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict" height="31" width="88" style="border-style: none" />';
            echo '</a>';
            echo '<a href="http://www.atlantiscrew.net">';
                echo '<img src="http://jorge.ulver.no/files/acrew-mini-logo.png" alt="Atlantiscrew Open Source Development" style="border-style: none" />';
            echo '</a>';
        echo '</p>';
        echo '</body>';
        echo '</html>';
?>
