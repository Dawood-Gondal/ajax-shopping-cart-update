/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_AjaxShoppingCartUpdate
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

define(['jquery'], function ($) {
    "use strict";
    function ajaxCartUpdate() {
        $('.main').on("click", '.alo_qty_dec', function () {
            var input = $(this).parent().find('input');
            var value = parseInt(input.val());
            if (value) input.val(value - 1);
        });
        $('.main').on("click", '.alo_qty_inc', function () {
            var input = $(this).parent().find('input');
            var value = parseInt(input.val());
            input.val(value + 1);
        });
    }

    ajaxCartUpdate();
});
