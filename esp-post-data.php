<!--
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/cloud-weather-station-esp32-esp8266/

  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.

  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
-->

esp-post-data.php?api_key=tPmAT5Ab3j7F9&sensor=PC&location=bkstar&value=30&value2=50&value=60
<?php
  include_once('esp-database.php');

  // Keep this API Key value to be compatible with the ESP code provided in the project page. If you change this value, the ESP sketch needs to match
  $api_key_value = "tPmAT5Ab3j7F9";

  $api_key= $sensor = $location = $value1 = $value2 = $value3 = "";

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if($api_key == $api_key_value) {
      $sensor = test_input($_GET["sensor"]);
      $location = test_input($_GET["location"]);
      $value1 = test_input($_GET["value1"]);
      $value2 = test_input($_GET["value2"]);
      $value3 = test_input($_GET["value3"]);

      $result = insertReading($sensor, $location, $value1, $value2, $value3);
      echo $result;
    }
    else {
      echo "Wrong API Key provided.";
    }
  }
  else {
    echo "No data posted with HTTP POST.";
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
