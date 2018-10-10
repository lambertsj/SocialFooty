<?php
// To loop through a txt file
// contains rows which are constructed like
// lionelmessi = 123456789000
// dsasdfsdfsdfds = 222222222222
// The first line contains a text [users]
// Some lines may be empty
$filename = 'LATEST.txt';


$handle = fopen($filename, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
          echo "Looping";
          echo "<br />";

        if (strpos($line, 'users') !== false || strpos($line, '=') === false) {
            //echo 'true';
            // We found the line with [users] in it
            // or the line does not contain an =
            echo "Foutieve regel gevonden. = Regel met users er in, of een lege regel -------------------------------------------";
        }
        else {

          $username = strtok($line, '=');
          echo $username; // home
          echo "<br />";
          $timeinEpoch = substr($line, strpos($line, "=") + 2);
          echo $timeinEpoch;
          echo "<br />";

          $dt = new DateTime("@$timeinEpoch");  // convert UNIX timestamp to PHP DateTime
          echo $dt->format('Y-m-d H:i:s'); // output = 2017-01-01 00:00:00
          echo "<br />";
        }

    }

    fclose($handle);
} else {
    echo "error opening the file.";
}



?>
