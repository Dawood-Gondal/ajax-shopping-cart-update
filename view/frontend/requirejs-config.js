/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_AjaxShoppingCartUpdate
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

var config = {
    map: {
        '*': {
            'AjaxCart': 'M2Commerce_AjaxShoppingCartUpdate/js/cartValueIncDec',
            'CartQtyUpdate': 'M2Commerce_AjaxShoppingCartUpdate/js/cartQtyUpdate'
        }
    },
    shim: {
        AjaxCart: {
            deps: ['jquery']
        },
        CartQtyUpdate: {
            deps: ['jquery']
        }
    }
};
