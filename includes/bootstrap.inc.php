<?php
function __autoload($classname){

 if (file_exists('models/'. $classname.'.php')) {
  require_once('models/'.$classname.'.php');
 }

 else if(file_exists('helpers/'. $classname.'.php')) {
  require_once('helpers/'.$classname.'.php');
 }
}