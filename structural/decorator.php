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

abstract class ShapeDecorator implements Shape {
  protected $decoratedShape;

  function __construct(Shape $decoratedShape) {
    $this->decoratedShape = $decoratedShape;
  }

  function draw() {
    $this->decoratedShape->draw();
  }
}

class RedShapeDecorator extends ShapeDecorator {
  function __construct(Shape $decoratedShape) {
    parent::__construct($decoratedShape);
  }

  private function setRedBorder() {
    print 'border color red';
  }

  function draw() {
    $this->decoratedShape->draw();
    $this->setRedBorder();
  }
}

$circle = new Circle();
$redCircle = new RedShapeDecorator(new Circle() );


$circle->draw();
$redCircle->draw();