<?php
namespace SkeletonPHP\Views;

class HomeView {
    /**
     * Render the home page view.
     *
     * @param array $data Data to be rendered.
     */
    public function render($data) {
       echo "<h1>Home Page</h1>";
       if(is_array($data)) {
          echo "<ul>";
          foreach ($data as $key => $value) {
             echo "<li>" . htmlspecialchars($key) . " : " . htmlspecialchars($value) . "</li>";
          }
          echo "</ul>";
       } else {
           echo "No data to display.";
       }
    }
}
?>