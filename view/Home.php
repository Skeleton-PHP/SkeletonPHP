<?php
namespace SkeletonPHP\view;
//HANDLES THE INFORMATION WHEN RETURNED
class Home {
    /**
     * Render the home page view.
     *
     * @return string HTML content for the home page.
     */
    public function render() {
        return "<h1>Welcome to the Home Page</h1><p>This is the home view.</p>";
    }
}
?>