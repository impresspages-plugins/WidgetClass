<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 6/21/14
 * Time: 12:19 AM
 */

namespace Plugin\WidgetClass;


class AdminController
{
    public function widgetAttributes()
    {
        $widgetId = ipRequest()->getPost('widgetId');
        if (!$widgetId) {
            throw new \Ip\Exception('Missing required parameter');
        }

        $answer = array(
            'class' => ClassModel::get($widgetId)
        );

        return new \Ip\Response\Json($answer);
    }

    public function storeAttributes()
    {
        $widgetId = ipRequest()->getPost('widgetId');
        if (!$widgetId) {
            throw new \Ip\Exception('Missing required parameter');
        }
        ClassModel::set($widgetId, ipRequest()->getPost('class'));

        return new \Ip\Response\Json(array(1));
    }
}
