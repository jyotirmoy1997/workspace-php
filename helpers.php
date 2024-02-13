<?php

/**
 * Get the base path
 * 
 * @param string path
 * @return string
 */

 function basePath($path = ''){
    return __DIR__ . '/' . $path;
 }

 /**
  * Load View
  *
  * @param string $name
  * @return void
  */

  function loadView($name, $data = []){
      extract($data);
      require basePath("views/{$name}.view.php");
  }

  /**
  * Load Partial
  *
  * @param string $name
  * @return void
  */

  function loadPartial($name){
      require basePath("views/partials/{$name}.php");
   }

   /**
  * Inspect
  *
  * @param string $name
  * @return void
  */
   function inspect($name){
      echo '<pre>';
      var_dump($name);
      echo '</pre>';
   }

   /**
  * Inspect
  *
  * @param string $name
  * @return void
  */
  function inspectAndDie($name){
   echo '<pre>';
   die(var_dump($name));
   echo '</pre>';
}


?>