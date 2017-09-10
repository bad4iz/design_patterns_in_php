<?php
interface MediaPlayer{
  function play($type , $name);
}
interface SuperMediaPlayer{
  function playOgg($name);
  function playMP4($name);
}


class OggPlayer implements SuperMediaPlayer{
  function playOgg($name) {
    print "Playing OGG $name";
  }
  function playMP4($name) {
    // TODO: Implement playMP4() method.
  }
}

class MP4Player implements SuperMediaPlayer{
  function playOgg($name) {
  }
  function playMP4($name) {
    print "Playing MP4 $name";
  }
}

class MediaAdapter implements MediaPlayer {
  private $superMediaPlayer;

  function __construct($type) {
    switch ($type){
      case "OGG":
        $this->superMediaPlayer = new OggPlayer();
        break;
      case "MP4":
        $this->superMediaPlayer = new MP4Player();
        break;
    }
  }
  function play($type, $name) {
    switch ($type){
      case "OGG":
        $this->superMediaPlayer->playOgg($name);
        break;
      case "MP4":
        $this->superMediaPlayer->playMP4($name);
        break;
    }
  }
}


class AudioPlayer implements MediaPlayer {
  private $mediaAdapter;
  function play($type, $name) {
    switch ($type){
      case "WAV": print ("Playing Wav $name");
        break;
      case "MP3": print ("Playing MP3  $name");
        break;
      case "OGG":
      case "MP4":
        $this->mediaAdapter = new MediaAdapter($type);
        $this->mediaAdapter->play($type, $name);
        break;
    }
  }
}

$player = new AudioPlayer();
$player->play("WAV", 'song1');
$player->play("MP3", 'song2');
$player->play("OGG", 'song3');
$player->play("MP4", 'song4');
