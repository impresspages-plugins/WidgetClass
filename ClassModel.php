<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 6/21/14
 * Time: 7:52 PM
 */

namespace Plugin\WidgetClass;


class ClassModel
{
    public static function set ($widgetId, $attributes)
    {
        ipStorage()->set('WidgetClass', 'class_' . $widgetId, $attributes);
    }

    public static function get ($widgetId)
    {
        return ipStorage()->get('WidgetClass', 'class_' . $widgetId);
    }

    public static function remove ($widgetId)
    {
        return ipStorage()->remove('WidgetClass', 'class_' . $widgetId);
    }
}
