  <html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
</html>
<?php
  $de_word = trim(preg_replace("/\s+/", ' ', $_POST['text_src']));
  $url = 'http://www.transltr.org/api/translate?text='. '"'. rawurlencode($de_word) .'"' .'&to=en&from=de'; 
          $msg = exec("curl -X GET --header 'Accept: application/json' '". $url ."'"); 
         $data = json_decode($msg, true);   
          $en_text = $data['translationText'];
    // Connecting to database
    if($de_word!="")
    {
    $connection = new MongoDB\Driver\Manager('mongodb://192.168.0.109:27017');
    //$command = new MongoDB\Driver\Command(['ping' => 1]);
    //$connection->executeCommand('local', $command);
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['de_wort'=> $de_word,'en_trans'=> $en_text]);
    $connection->executeBulkWrite('local.trans_de_en', $bulk);
    }
    else
    {
       echo ("<script LANGUAGE='JavaScript' > 
            window.alert('Please enter the word to translate !')
            window.location.href='trans_deutsch.html';
            </script>");
    }
?>
<html>
<body> 
  <br><br>
  <div id = "left" align="center">
  <form id="backform" action = "trans_deutsch.html" method="POST" >
  <textarea rows="5" cols="30" name="text_src" wrap = "soft" placeholder='Deutsch Word' readonly style="font-size:20px;padding: 5px;font-family:sans-serif"><?php echo $de_word ?></textarea>    
  <textarea rows="5" cols="30" name="text_tgt" wrap = "soft" readonly style="background-color: #EFEBEA;font-size:20px;padding: 5px;font-family:sans-serif;border: none;margin-left: 10px"><?php echo $en_text;  ?></textarea> 
  <br><br><br><br>
  <input type="submit" value="Back" id="back_button" align="center">  
  </form>
  </div>
</body>
</html>
