<?php

/**
 * @copyright Copyright &copy; Alexandr Katrazhenko, katrazhenko.pp.ua, 2019
 * @package yii2-simply
 * @version 1.0.0
 */

namespace xandkat\simply;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;

/**
 * Class Html
 * @package xandkat\simply
 */
class Html extends BaseHtml
{
    /**
     * @var static::$tag
     */
    protected static $tag;

    /**
     * @param $name
     * @param $arguments
     * @return string
     */
    public static function __callStatic($name, $arguments)
    {
        switch ($name) {
            case stripos($name, 'begin'):
                static::$tag = self::beginTag(strtolower(substr_replace($name, '', 0, 5)), static::setArrayIdxAsClassZeroInsteadIfExist($arguments));
                break;
            case stripos($name, 'end'):
                static::$tag = self::endTag(strtolower(substr_replace($name, '', 0, 3)));
                break;
            case method_exists((new parent()), $name):
                try {
                    static::$tag = \Yii::createObject("yii\helpers\Html::{$name}", [$arguments[0], $arguments[1], static::setArrayIdxAsClassZeroInsteadIfExist([2])]);
                } catch (InvalidConfigException $e) {
                    throw new \InvalidArgumentException($e->getMessage());
                }
                break;
            default:
                static::$tag = static::tag($name, $arguments[0], static::setArrayIdxAsClassZeroInsteadIfExist($arguments[1]));
        }
        return static::$tag;
    }

    /**
     * @param array $array
     * @return array
     */
    protected static function setArrayIdxAsClassZeroInsteadIfExist($array)
    {
        if (array_key_exists(0, $array)) {
            $arrayIdxZero = ArrayHelper::getValue($array, 0);
            if (array_key_exists('class', $array)) {
                $arrayIdxClass = ArrayHelper::getValue($array, 'class');
                ArrayHelper::setValue($array, 'class', $arrayIdxZero . ' ' . $arrayIdxClass);
            } else {
                ArrayHelper::setValue($array, 'class', $arrayIdxZero);
            }
            ArrayHelper::remove($array, 0);
        }
        return $array;
    }
}