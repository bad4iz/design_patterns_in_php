<?php


/**
 * Class Window
 */
class Window {
  function __construct($dialog, $modal, $visible) {
    $this->dialog = $dialog;
    $this->modal = $modal;
    $this->visible = $visible;
  }
}

$window = new Window(true, false, true);


/**
 * Class CreateWindow
 */
class CreateWindow {

  function setDialog($flag = false) {
    $this->dialog = $flag;
    return $this;
  }
  function setModal ($flag = false) {
    $this->modal = $flag;
    return $this;
  }
  function setVisible ($flag = false) {
    $this->modal = $flag;
    return $this;
  }
  function create(){
    return new Window($this->dialog, $this->modal, $this->visible);
  }
}

$createWindow = new CreateWindow();
$window2 = $createWindow->setVisible(true)->setDialog(true)->setModal(true)->create();