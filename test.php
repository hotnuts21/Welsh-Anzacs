<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('naa-grab.php');
include('connect.php');
?>
<html>
<head>
  <title>Test Page</title>
</head>
<body>
<?php

function output($title, $view) {
  echo '<h2>' . $title . '</h2>';
  echo '<pre>';
    print_r($view);
  echo '</pre>';
}

  output('Get aaa', get_aaa());
  output('Get nz', get_nz());

?>
</body>
</html>
