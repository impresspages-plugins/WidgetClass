<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 6/21/14
 * Time: 12:01 AM
 */

namespace Plugin\WidgetClass;


class FormHelper
{
    public static function attributesForm ()
    {

        $form = new \Ip\Form();

        $field = new \Ip\Form\Field\Hidden(
            array(
                'name' => 'aa',
                'value' => 'WidgetClass.storeAttributes',
            ));
        $form->addField($field);

        $field = new \Ip\Form\Field\Hidden(
            array(
                'name' => 'widgetId'
            ));
        $form->addField($field);

        $field = new \Ip\Form\Field\Text(
            array(
                'name' => 'class',
                'label' => __('Enter HTML class attribute to be added to the widget', 'WidgetClass', false),
        ));

        $form->addField($field);

        return $form;
    }
}
