<?php

interface Strategy{function doOperation($n1, $n2);}

class Add implements Strategy{
  function doOperation($n1, $n2) {
    return $n1 + $n2;
  }
}
class Sub implements Strategy{
  function doOperation($n1, $n2) {
    return $n1 - $n2;
  }
}
class Mult implements Strategy{
  function doOperation($n1, $n2) {
    return $n1 * $n2;
  }
}

class Context {
  private $strategy;
  function __construct(Strategy $strategy) {
    $this->strategy = $strategy;
  }

  function execute($n1, $n2){
    return $this->strategy->doOperation($n1, $n2);
  }
}

$context = new Context(new Add);
echo $context->execute(5, 9)."\n";