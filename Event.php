<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 6/16/14
 * Time: 12:13 PM
 */

namespace Plugin\WidgetClass;


class Event
{
    public static function ipBeforeController()
    {
        ipAddCss('assets/WidgetClass.css');
        ipAddJs('assets/WidgetClass.js');

        if (ipIsManagementState()) {
            ipAddJs('assets/htmlAttributes.js');

            $popupHtml = ipView(
                'view/attributePopup.php',
                array (
                    'form' => FormHelper::attributesForm()
                )
            )->render();
            ipAddJsVariable('WidgetClassPopupHtml', $popupHtml);
        }

    }


    public static function ipAfterWidgetRemoved($info)
    {
        ClassModel::remove($info['id']);
    }

    public static function ipWidgetDuplicated($info)
    {
        $newWidgetId = $info['newWidgetId'];
        $oldWidgetId = $info['oldWidgetId'];

        $attributes = ClassModel::get($oldWidgetId);
        ClassModel::set($newWidgetId, $attributes);
    }
}
