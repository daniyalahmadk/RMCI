<?php
error_reporting(0); //HIDE ALL WARNINGS FOR DIRECTORY
/*
Remove Malicous Code Instantly
***
@author Daniyal Ahmed
@RMCI Version 1.0
***
*/
?>
<!DOCTYPE html>
<html>
<title>RMCI - Remove Malicious Code Instantly</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<body>
  <br />
  <h3 class="text-center">Remove Malicious Code Instantly</h3>
  <em><h6 class="text-center">Make files clean, Good bye Malicious code</h6></em>
  <br />
  <hr />
  <br />
  <h4 class="text-center">Put Malicious code, right there in box and hit submit</h4>
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
        <form action="" method="POST">
          <textarea name="code_to_remove" class="form-control" rows="10"></textarea>
          <br />
          <div class="form-group text-center">
            <input type="submit" value="Remove Now" class="btn btn-default" />
          </div>
        </form>
        <?php
        if(isset($_POST['code_to_remove'])):
        $code_to_remove = $_POST['code_to_remove']; // Put which code you need to remove
        function getDirContents($dir, &$results = array()){
            $files = scandir($dir);
            foreach($files as $key => $value){
                $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
                if(!is_dir($path)) {
                    $results[] = $path;
                } else if(is_dir($path) && $value != "." && $value != "..") {
                    getDirContents($path, $results);
                    $results[] = $path;
                }
            }
            return $results;
        }
        foreach (getDirContents(getcwd()) as $key) {
          $all_content = file_get_contents($key);
          $data_to_write = str_replace($code_to_remove,"",$all_content);
          file_put_contents($key, $data_to_write);
        }
        ?>
        <div class="alert alert-success">
          All done, have fun.
        </div>
        <?php
        endif;
        ?>
  </div>
  <div class="col-md-4">
  </div>
</body>
</html>
