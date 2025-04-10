<?php
namespace Skeleton\Models;

use Cv\Db;

//THIS HANDLES ALL THE DATABASE QUERIES ANDPULLS INFORMATION FROM MYSQL ETC.

class Resume{

        //class forpulling data from the database.
    public static function getSections()
    {
        return Db::select(['*'], 'resume_sections');
    }

    public static function getEntries($section)
    {
        return Db::select(
            ['*'],
            'resume_section_entries',
            ['section_id = '.$section->id]
        );
    }
}