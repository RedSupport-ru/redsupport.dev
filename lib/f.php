<?php
/**
 * redsupport.dev - модуль для разработки, обертка стандартных debug функций
 *
 * @author Sergey Korshunov <dev@redsupport.ru>
 * @copyright 2018 RedSupport.ru
 */

namespace RedSupport\Dev;

/**
 * Class F
 * @package RedSupport\Dev
 */
class F
{
    /**
     * @var int user id
     */
    static public $checkUserID = 0;

    /**
     * @return bool
     */
    private static function checkUser() {
        global $USER;
        if ((int)self::$checkUserID && (int)$USER->GetID() !== (int)self::$checkUserID) {
            return false;
        }
        return true;
    }

    /**
     * Php core function
     *
     * @param $data
     * @return bool
     */
    public static function var_dump ($data) {
        if (!self::checkUser()) return false;
        var_dump($data);
    }

    /**
     * var_dump + <pre> & clean page
     *
     * @param $data
     * @param bool $clean
     * @return bool
     */
    public static function dump ($data, $clean = true) {
        if (!self::checkUser()) return false;
        if ($clean) {
            $A = new \CMain();
            $A->RestartBuffer();
        }

        echo '<pre>';
        self::var_dump($data);
        echo '</pre>';

        if ($clean) die;
    }

    /**
     * Bitrix mydump() + <pre>
     *
     * @param $thing
     * @param int $max_depth
     * @param int $depth
     * @return string
     */
    public static function mydump_pre ($thing, $max_depth = -1, $depth = 0) {
        if (!self::checkUser()) return false;
        return '<pre>' . self::mydump($thing, $max_depth, $depth) . '</pre>';
    }

    /**
     * Bitrix mydump() + pre & clean page
     *
     * @param $thing
     * @param int $max_depth
     * @param int $depth
     * @return string
     */
    public static function mydump_clean ($thing, $max_depth = -1, $depth = 0) {
        if (!self::checkUser()) return false;

        $A = new \CMain();
        $A->RestartBuffer();
        echo self::mydump_pre($thing, $max_depth, $depth);
        die;
    }

    /**
     * Bitrix core function
     *
     * @param $thing
     * @param int $max_depth
     * @param int $depth
     * @return bool|string
     */
    public static function mydump ($thing, $max_depth = -1, $depth = 0) {
        if (!self::checkUser()) return false;
        return mydump($thing, $max_depth, $depth);
    }

    /**
     * Bitrix core function
     *
     * @param $text
     * @param string $module_id
     * @param int $traceDepth
     * @param bool $ShowArgs
     * @return bool
     */
    public static function AddMessage2Log ($text, $module_id = '', $traceDepth = 6, $ShowArgs = false) {
        if (!self::checkUser()) return false;
        AddMessage2Log($text, $module_id, $traceDepth, $ShowArgs);
    }
}