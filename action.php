<?php
    include 'site.php';
            $textArea = 'content';
            $file = 'note.txt';
            $url = 'http:localhost:8091/site.php';
            if (isset ($_POST[$textArea])){
                //file_put_contents($file,$_POST[$textArea]); 
                $f = fopen($file, 'w+');
                fwrite($f,$_POST[$textArea] );
                fclose($f);
               // exit(); 
            } else {
                $fclear = fopen ($file, "w+");
                fclose($fclear);
            }   
        ?>
