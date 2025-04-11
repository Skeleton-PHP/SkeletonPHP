<?php
namespace SkeletonPHP\view;

class Sample {
    /**
     * Render the home page view with data.
     *
     * @param array $data Data passed from the controller.
     * @return string HTML content for the home page.
     */
    public function render(array $data) {
        $html = "<h1>Welcome to the Home Page</h1>";
        if (!empty($data)) {
            $html .= "<ul>";
            foreach ($data as $key => $value) {
                $html .= "<li>" . htmlspecialchars($key) . ": " . htmlspecialchars($value) . "</li>";
            }
            $html .= "</ul>";
        } else {
            $html .= "<p>No data available.</p>";
        }
        return $html;
    }
}
?>
