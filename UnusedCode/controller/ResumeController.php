<?php
namespace SkeletonPHP\Controllers;

use Cv\Models\Resume;

class ResumeController extends Controller
{
    public static function index()
    {
        $sections = Resume::getSections();
        foreach ($sections as &$section) {
            $section->entries =
                Resume::getEntries($section);
        }
        return self::view($sections);
    }
}