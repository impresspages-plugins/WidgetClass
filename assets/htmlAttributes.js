/**
 * Created by mangirdas on 6/20/14.
 */

var initCongtainerWidgetAttributes = function () {
    $('.ipsWidgetClassAttributes').off('click.WidgetAttributes').on('click.WidgetAttributes', function (e) {
        e.preventDefault();
        var $this = $(this);
        var widgetId = $this.data('widgetid');

        if ($('#ipWidgetClassPopup').length == 0) {
            $('body').append(WidgetClassPopupHtml);
            ipInitForms();
        }

        var $popup = $('#ipWidgetClassPopup');
        var $form = $popup.find('form');

        $popup.find('.ipsConfirm').off('click').on('click', function (e) {
            e.preventDefault();
            $form.submit();
        });

        $.ajax({
            url: ip.baseUrl,
            dataType: 'json',
            type: 'POST',
            data: {
                aa: 'WidgetClass.widgetAttributes',
                widgetId: widgetId,
                securityToken: ip.securityToken
            },
            success: function (response) {

                $form.find('input[name=widgetId]').val(widgetId);
                $form.find('input[name=class]').val(response.class);
                $popup.modal();
                $form.off('ipSubmitResponse').on('ipSubmitResponse', function (e) {
                    e.preventDefault();
                    $popup.modal('hide');
                });

            },
            error: function () {
                alert('Error.' + response.responseText);
            }
        });


    });
}

initCongtainerWidgetAttributes();


$(document).on('ipWidgetMoved', initCongtainerWidgetAttributes);

