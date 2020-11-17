<?php
  function displayAndUnset($session_index) {
    if (isset($_SESSION[$session_index])) {
      echo $_SESSION[$session_index];
      unset($_SESSION[$session_index]);
    }
  }
  function displayInputAndUnset($session_index) {
    if (isset($_SESSION[$session_index])) {
      echo '"'.$_SESSION[$session_index].'"';
      unset($_SESSION[$session_index]);
    }
  }
?>