<?php

interface Shape {
  function draw();
}

class Rectangle implements Shape {

  function draw() {
    // TODO: Implement draw() method.
    echo __METHOD__ . "\n";
  }
}

class Square implements Shape {

  function draw() {
    // TODO: Implement draw() method.
    echo __METHOD__ . "\n";
  }
}

class Circle implements Shape {

  function draw() {
    // TODO: Implement draw() method.
    echo __METHOD__ . "\n";
  }
}

////////////////////////////////////////////////

class ShapeFactory {
  function getShape($type) {
    $type = strtolower($type);
    switch ($type) {
        case 'rectangle': return new Rectangle();
        case 'square': return new Square();
        case 'circle': return new Circle();
      default: throw new Exception('Неправильный тип');
    }
  }
}

////////////////////////////////////////////////

$factory = new ShapeFactory();
$rectangle = $factory->getShape('rectangle');
$sqquare = $factory->getShape('square');
$circle = $factory->getShape('circle');
$rectangle->draw();
$sqquare->draw();
$circle->draw();

