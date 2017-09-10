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