/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'paybox',
                component: 'Foggyline_Paybox/js/view/payment/method-renderer/paybox'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);