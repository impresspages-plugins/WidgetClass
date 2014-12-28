<?php
/**
 * @package   ImpressPages
 */


namespace Plugin\WidgetClass;


class Filter
{
    public static function ipWidgetManagementMenu($menu, $info)
    {

        $menu[] = array(
            'title' => __('HTML class attribute', 'WidgetClass', false),
            'attributes' => array(
                'class' => 'ipsWidgetClassAttributes',
                'data-widgetid' => $info['id']
            )
        );
        return $menu;
    }

    public static function ipWidgetHtmlFull($widgetHtml, $info)
    {
        $class = ClassModel::get($info['id']);
        if (empty($class) || !is_string($class)) {
            return $widgetHtml;
        }

        $widgetHtml = preg_replace('/ipWidget/', 'ipWidget ' . $class, $widgetHtml, 1);

        return $widgetHtml;
    }
}
