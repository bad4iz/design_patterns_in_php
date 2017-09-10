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
  function __construct(Strategy $operation) {
      switch ($operation) {
          case '+':
              $this->strategy = new Add();
            break;
          case '-':
              $this->strategy = new Sub();
              break;
          case '*':
              $this->strategy = new Mult();
              break;
          default: throw new Exception('Неправильный тип');
      }
  }

  function execute($n1, $n2){
    return $this->strategy->doOperation($n1, $n2);
  }
}

$context = new Context("+");
echo $context->execute(5, 9)."\n";