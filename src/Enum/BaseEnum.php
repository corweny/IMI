<?php
namespace Imi\Enum;

use Imi\Enum\Annotation\Parser\EnumParser;

abstract class BaseEnum
{
    /**
     * 获取值
     *
     * @param string $name
     * @return mixed
     */
    public static function getValue($name)
    {
        return constant(static::class . '::' . $name);
    }

    /**
     * 获取文本
     *
     * @param mixed $value
     * @return string
     */
    public static function getText($value)
    {
        $enumItem = EnumParser::getInstance()->getEnumItem(static::class, $value);
        if($enumItem)
        {
            return $enumItem->text;
        }
        else
        {
            return null;
        }
    }

    /**
     * 获取注解
     *
     * @param mixed $value
     * @return \Imi\Enum\Annotation\EnumItem
     */
    public static function getData($value)
    {
        return EnumParser::getInstance()->getEnumItem(static::class, $value);
    }

    /**
     * 获取所有名称
     *
     * @return string[]
     */
    public static function getNames()
    {
        return EnumParser::getInstance()->getNames(static::class);
    }

    /**
     * 获取所有值
     *
     * @return array
     */
    public static function getValues()
    {
        return EnumParser::getInstance()->getValues(static::class);
    }
}