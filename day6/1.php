<?php

// Create the grid
$grid = array();
for ($i = 0; $i < 1000; $i++) {
  for ($j = 0; $j < 1000; $j++) {
    $grid[$i][$j] = false;
  }
}

// Read the instructions
$fp = fopen('input.txt', 'r');

while ($line = trim(fgets($fp))) {
  $parts = explode(' ', $line);

  if ($parts[0] == 'turn') {
    // Turn something on or ofF
    $value = $parts[1] == 'on';

    $corner1 = explode(',', $parts[2]);
    $corner2 = explode(',', $parts[4]);

    for ($i = $corner1[0]; $i <= $corner2[0]; $i++) {
      for ($j = $corner1[1]; $j <= $corner2[1]; $j++) {
        $grid[$i][$j] = $value;
      }
    }
  } else {
    // Switch
    $corner1 = explode(',', $parts[1]);
    $corner2 = explode(',', $parts[3]);

    for ($i = $corner1[0]; $i <= $corner2[0]; $i++) {
      for ($j = $corner1[1]; $j <= $corner2[1]; $j++) {
        $grid[$i][$j] = ($grid[$i][$j]) ? false : true;
      }
    }
  }
}

// Count
$count = 0;
for ($i = 0; $i < 1000; $i++) {
  for ($j = 0; $j < 1000; $j++) {
    if ($grid[$i][$j]) {
      $count++;
    }
  }
}
fclose($fp);

echo $count . "\r\n";

