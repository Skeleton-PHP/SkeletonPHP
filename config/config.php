<?php
namespace SkeletonPHP\classes\Config;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
/**
 * Interface ConfigStub
 * @package SmallPHP\classes
 */
interface ConfigStub
{
    public function getHost();
    public function getUsername();
    public function getDatabase();
    public function getPassword();
    public function getTable();
}
/**
 * Class Config
 * @package SmallPHP\classes
 */
class Config implements ConfigStub{
    /**
     * @return mixed|null
     */
    public function getHost()
    {
        return self::retrieveSetting("host");
    }

    /**
     * @param $fetch
     * @return mixed|null
     * Retrieves settings.
     */
    public function retrieveSetting($fetch)
    {
        if (!file_exists("config.json")) {
            die("Error");
        } else {
            $string = file_get_contents('config.json');
            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($string, FALSE)),
                RecursiveIteratorIterator::SELF_FIRST);
            foreach ($jsonIterator as $thekey => $theval) {
                if (!is_array($theval) && $thekey == $fetch) {
                    return $theval;
                }
            }
        }
        return null;
    }
    /**
     * @return mixed|null
     */
    public function getUsername()
    {
        return self::retrieveSetting("username");
    }

    /**
     * @return mixed|null
     */
    public function getPassword()
    {
        return self::retrieveSetting("password");
    }

    /**
     * @return mixed|null
     */
    public function getDatabase()
    {
        return self::retrieveSetting("database_name");
    }

    /**
     * @return mixed|null
     */
    public function getTable()
    {
        return self::retrieveSetting("table_name");
    }

    /**
     * @return mixed|null
     */
    public function recoveryEmail()
    {
        return self::retrieveSetting("recovery_email");
    }

    /**
     * @return mixed|null
     */
    public function debugMode()
    {
        return self::retrieveSetting("debug_mode");
    }
}