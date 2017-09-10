<?php
function numbers() {
  echo  "start \n";
  for ($i = 0; $i < 5; $i++) {
    yield $i;
    echo "Value: $i \n";
  }
  echo "finish \n";
}

foreach (numbers() as $number);

/**
 * чтение данных из файла с помощью генератора
 **/
function getLines($file) {
  $file = fopen($file,'r');
  if (!$file) {
    throw new Exception();
  }
  while ($line = fgets($file)){
    yield $line;
    echo "$line";
  }
  fclose($file);
}

foreach (getLines('data.txt') as $getLine);
