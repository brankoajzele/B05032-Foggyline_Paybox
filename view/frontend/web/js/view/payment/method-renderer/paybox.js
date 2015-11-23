/*browser:true*/
/*global define*/
define(
    [
        'Magento_Checkout/js/view/payment/default'
    ],
    function (Component) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Foggyline_Paybox/payment/paybox'
            },

            /** Returns send check to info */
            getMailingAddress: function() {
                //console.log('--getMailingAddress--');
                return window.checkoutConfig.payment.paybox.mailingAddress;
                //return 'john@change.me';
            },

            /** Returns payable to info */
            getPayableTo: function() {
                //console.log('--getPayableTo--');
                return window.checkoutConfig.payment.paybox.payableTo;
                //return 'John';
            }
        });
    }
);
