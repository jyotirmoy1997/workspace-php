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
      require basePath("App/views/{$name}.view.php");
  }

  /**
  * Load Partial
  *
  * @param string $name
  * @return void
  */

  function loadPartial($name){
      require basePath("App/views/partials/{$name}.php");
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

   function sanitize($dirty){
      return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
   }


?>