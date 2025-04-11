<?php
namespace SkeletonPHP\Models;

class SampleModel {
    // This method emulates a data query.
    public function sample_query() {
         return [
             'name'  => 'John Doe',
             'email' => 'johndoe@example.com',
             'bio'   => 'Software developer with 10 years of experience.'
         ];
    }
}
?>