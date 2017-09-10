<?php

class NumbersSquared implements Iterator {
  private $_cur;
  private $_obj;

  function __construct($obj) {
    $this->_obj = $obj;
  }

  /**
   * Rewind the Iterator to the first element
   * @link http://php.net/manual/en/iterator.rewind.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function rewind() {
    $this->_cur = $this->_obj->getStart();
  }

  /**
   * Return the key of the current element
   * @link http://php.net/manual/en/iterator.key.php
   * @return mixed scalar on success, or null on failure.
   * @since 5.0.0
   */
  public function key() {
    return $this->_cur;
  }

  /**
   * Return the current element
   * @link http://php.net/manual/en/iterator.current.php
   * @return mixed Can return any type.
   * @since 5.0.0
   */
  public function current() {
    return pow($this->_cur, 2);
  }

  /**
   * Move forward to next element
   * @link http://php.net/manual/en/iterator.next.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function next() {
    $this->_cur++;
  }

  /**
   * Checks if current position is valid
   * @link http://php.net/manual/en/iterator.valid.php
   * @return boolean The return value will be casted to boolean and then evaluated.
   * Returns true on success or false on failure.
   * @since 5.0.0
   */
  public function valid() {
    return $this->_cur <= $this->_obj->getEnd();
  }
}

class NumbersSquareRoot implements Iterator{

  private $_cur;
  private $_obj;

  function __construct($obj) {
    $this->_obj = $obj;
  }

  /**
   * Return the current element
   * @link http://php.net/manual/en/iterator.current.php
   * @return mixed Can return any type.
   * @since 5.0.0
   */
  public function current() {
    return    sqrt($this->_cur);
  }

  /**
   * Move forward to next element
   * @link http://php.net/manual/en/iterator.next.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function next() {
    $this->_cur++;
  }

  /**
   * Return the key of the current element
   * @link http://php.net/manual/en/iterator.key.php
   * @return mixed scalar on success, or null on failure.
   * @since 5.0.0
   */
  public function key() {
    return $this->_cur;
  }

  /**
   * Checks if current position is valid
   * @link http://php.net/manual/en/iterator.valid.php
   * @return boolean The return value will be casted to boolean and then evaluated.
   * Returns true on success or false on failure.
   * @since 5.0.0
   */
  public function valid() {
    return $this->_cur <= $this->_obj->getEnd();
  }

  /**
   * Rewind the Iterator to the first element
   * @link http://php.net/manual/en/iterator.rewind.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function rewind() {
    $this->_cur = $this->_obj->getStart();
  }
}

class MathItetator implements IteratorAggregate {
  public $_start,
          $_end,
            $_action;

  function __construct($start, $end, $action) {
    $this->_start = $start;
    $this->_end = $end;
    $this->_action = $action;
  }

  function getStart() {
    return $this->_start;
  }

  function getEnd() {
    return $this->_end;
  }

  /**
   * Retrieve an external iterator
   * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
   * @return Traversable An instance of an object implementing <b>Iterator</b> or
   * <b>Traversable</b>
   * @since 5.0.0
   */
  public function getIterator() {
    switch($this->_action) {
      case 'pow':
        return new NumbersSquared($this);
        break;
      case 'sqrt':
        return new NumbersSquareRoot($this);
        break;
    }
  }
}

$obj = new MathItetator(3, 7 , 'pow') ;
foreach ($obj as $key=> $value){
  print "квадрат числа $key = $value \n";
}
$obj = new MathItetator(3, 7 , 'sqrt') ;
foreach ($obj as $key=> $value){
  print "квадратный корень числа $key = $value \n";
}