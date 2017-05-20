<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
</html>
<?php
  $handle1 = fopen("mycontext.txt", "w");
  $de_word = $_POST['text_src'];
    if($de_word=="")
    {
       echo ("<script LANGUAGE='JavaScript' > 
            window.alert('Please enter the text to translate !')
            window.location.href='trans_context.html';
            </script>");
    }
    else
    {
      fputs($handle1, $de_word);
      //exec('chmod 777 mycontext.txt');
      //echo exec('/usr/bin/python context.py 2>&1');///usr/bin/python /var/www/html/deutsch/context.py');
      exec('sudo /usr/bin/python context_nltk.py');
      $handle2 = fopen("mycontext_temp.txt", "r");
      while(!feof($handle2)) {
        $line = fgets($handle2);
        $url = 'http://www.transltr.org/api/translate?text='. '"'. rawurlencode($line) .'"' .'&to=en&from=de'; 
        $msg = exec("curl -X GET --header 'Accept: application/json' '". $url ."'"); 
        $data = json_decode($msg, true);   
        $en_text = $data['translationText'];
        echo 'DE: ' . $line . "<br>";
        echo 'EN: ' . $en_text;
        echo '<br><br>';
        } 
    fclose($handle1);
    fclose($handle2); 
    }
?>
<html>
<body> 
  <br><br>
  <div id = "left" align="center">
  <form id="backform" action = "trans_context.html" method="POST" >   
  <br><br><br><br>
  <input type="submit" value="Back" id="back_button" align="center">  
  </form>
  </div>
</body>
</html>
