<?php 
if (empty($_SERVER['HTTP_REFERER']) or $_SERVER['HTTP_REFERER'] == '-') {
    echo 'Bad Request!';
    exit; // do nothing if hit directly.
  }
    
















?>