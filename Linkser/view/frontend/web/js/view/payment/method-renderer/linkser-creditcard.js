define([
        'jquery',
        'Magento_Checkout/js/model/quote',
        'Magento_Payment/js/view/payment/cc-form',
        'Magento_Ui/js/modal/alert',
        'Magento_Checkout/js/model/full-screen-loader'
    ],
    function($, quote, Component, alert, fullScreenLoader) {
        'use strict';
        var city, telephone, postcode, base_currency, street, countryid, ids, totalshp, jwt, isSetup = false,
            isCollet = false;
        let error = 0;
        $(document).ready(function() {

            $.getScript("https://songbirdstag.cardinalcommerce.com/cardinalcruise/v1/songbird.js", function() {

                $(document).ready(function() {

                });

            });



        });


        return Component.extend({
            defaults: {
                redirectAfterPlaceOrder: false,
                template: 'Vexsoluciones_Linkser/payment/linkser-creditcard'
            },



            initialize: function() {
                this._super();
                this.pm();
                this.setToken();
                this.supdata();
                this.licns();
            },


            licns: function() {

                if (!act_license) {
                    //alert({content: $.mage.__('There was an error validating the credomatic license')});

                }
            },

            pm: function() {
                $(document).ready(function() {
                    $.ajax({
                        url: Url_credomatic + 'linkser/payment/getatt',
                        type: 'POST',
                        async: false,
                        data: 1,
                        dataType: {

                            format: 'json'
                        },
                        dataType: 'json',
                        success: function(data) {
                            ids = data.id;
                            totalshp = data.totalp;

                        },
                        error: function(request, error) {
                            console.log(request);
                            console.log(error);
                        }
                    });
                });

            },


            setToken: function() {
                $.ajax({
                    url: Url_credomatic + 'linkser/payment/jwt',
                    type: 'POST',
                    async: false,
                    dataType: {
                        format: 'json'
                    },
                    dataType: 'json',
                    success: function(data_token) {
                        jwt = data_token.token;
                    },
                    error: function(request, error) {
                        console.log(request);
                        console.log(error);
                    }
                });
            },

            supdata: function() {
                /*

                     city = quote.shippingAddress().city;
                     telephone = quote.shippingAddress().telephone;
                     postcode = quote.shippingAddress().postcode;
                     base_currency = quote.totals().base_currency_code;
                     street = quote.shippingAddress().street[0];
                     countryid = quote.shippingAddress().countryId;
                    */

            },



            afterPlaceOrder: function() {

                var dataArray = {
                    cc_card: document.getElementById("linkser_creditcard_cc_number").value,
                    cc_month: $("#linkser_creditcard_expiration :selected").val(),
                    cc_year: $("#linkser_creditcard_expiration_yr :selected").val(),
                    cc_vv: document.getElementById("linkser_creditcard_cc_cid").value,
                    cc_type: document.getElementById("linkser_creditcard_cc_type").value,
                    cc_bin: document.getElementById("linkser_creditcard_cc_number").value.substring(0, 6),
                    idorder: ids,
                    totalsp: totalshp,
                    action: "auth"
                };
                // console.log(jwt);
                fullScreenLoader.startLoader();

                let form = $.parseHTML('<iframe name="ddc-iframe" height="1" width="1" style="display: none;"></iframe>');
                let form2 = $.parseHTML('<form id="ddc-form" target="ddc-iframe" method="POST" action="https://centinelapistag.cardinalcommerce.com/V1/Cruise/Collect"> <input type="hidden" name="JWT" value="' + jwt + '" /></form>');
                $("#html-body").after(form2);
                $("#html-body").after(form);

                setTimeout(() => {
                    var ddcForm = document.querySelector('#ddc-form');
                    if (ddcForm) {
                        ddcForm.submit();
                    } // ddc form exists

                    window.addEventListener("message", (event) => {
                        console.log(event);
                        if (event.origin === "https://centinelapistag.cardinalcommerce.com") {
                            let data_post = JSON.parse(event.data);
                            console.log('Merchant received a message:', data_post);
                            if (data_post !== undefined && data_post.Status) {
                                isCollet = true;
                            }

                        }

                    });

                    this.ajaxVerificPaymentType(dataArray);

                }, 1000);



            },

            ajaxVerificPaymentType: function(dataArray) {
                $.ajax({
                    url: Url_credomatic + 'linkser/payment/validate',
                    type: 'POST',
                    data: { u_data: JSON.stringify(dataArray) },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(dataArray);
                        Cardinal.on("payments.validated", function(data, jwt) {
                            console.log(data);
                            // console.log(jwt);
                            fullScreenLoader.startLoader();
                            if (data.ErrorDescription == "Success") {
                                // validate
                                dataArray['action'] = 'validate';
                                dataArray['transactionId'] = data.Payment.ProcessorTransactionId;
                                $.ajax({
                                    url: Url_credomatic + 'linkser/payment/validate',
                                    type: 'POST',
                                    data: { u_data: JSON.stringify(dataArray) },
                                    dataType: 'json',
                                    success: function(data_capture) {
                                        // salimos solicitamos auth
                                        // console.log(data_capture);
                                        fullScreenLoader.stopLoader();
                                        if (data_capture.status == "success") {

                                            fullScreenLoader.stopLoader();
                                            window.location.href = window.checkoutConfig.defaultSuccessPageUrl;
                                        } else {
                                            fullScreenLoader.stopLoader();
                                            alert({
                                                title: $.mage.__('Pago no procesado'),
                                                content: $.mage.__('verifique sus datos e intente nuevamente'),
                                                actions: {
                                                    always: function() {
                                                        window.location.href = Url_credomatic;
                                                    }
                                                }
                                            });
                                        }

                                    },
                                    error: function(request, error) {
                                        fullScreenLoader.stopLoader();
                                        console.log(request);
                                        console.log(error);
                                        alert({
                                            title: $.mage.__('Pago no procesado'),
                                            content: $.mage.__('verifique sus datos e intente nuevamente'),
                                            actions: {
                                                always: function() {
                                                    window.location.href = Url_credomatic;
                                                }
                                            }
                                        });

                                    }
                                });


                            } else {
                                fullScreenLoader.stopLoader();

                                if (error == 0) {
                                    error = 1;
                                    dataArray['action'] = 'validate_error';
                                    $.ajax({
                                        url: Url_credomatic + 'linkser/payment/validate',
                                        type: 'POST',
                                        data: { u_data: JSON.stringify(dataArray) },
                                        dataType: 'json',
                                        success: function(data_capture) {
                                            console.log(data_capture);
                                            fullScreenLoader.stopLoader();
                                            alert({
                                                title: $.mage.__('Pago no procesado'),
                                                content: $.mage.__('verifique sus datos e intente nuevamente'),
                                                actions: {
                                                    always: function() {
                                                        window.location.href = Url_credomatic;
                                                    }
                                                }
                                            });
                                        }
                                    });
                                }

                            }

                        });

                        if (data.status == "auth_payment") {
                            Cardinal.on('payments.setupComplete', function(setupCompleteData) {
                                // Do something
                                fullScreenLoader.stopLoader();

                                Cardinal.continue('cca', {
                                    "AcsUrl": data.url,
                                    "Payload": data.payload
                                }, {
                                    "OrderDetails": {
                                        "TransactionId": data.referenceID
                                    }
                                });


                            });

                            Cardinal.configure({
                                logging: {
                                    level: "on"
                                }
                            });


                            Cardinal.setup("init", {
                                jwt: jwt
                            });



                        } else if (data.status == "success") {

                            fullScreenLoader.stopLoader();
                            window.location.href = window.checkoutConfig.defaultSuccessPageUrl;
                        } else {
                            fullScreenLoader.stopLoader();
                            alert({
                                title: $.mage.__('Pago no procesado'),
                                // content: $.mage.__(data.message),
                                content: $.mage.__('verifique sus datos e intente nuevamente'),
                                actions: {
                                    always: function() {
                                        window.location.href = Url_credomatic;
                                    }
                                }
                            });
                        }

                    },
                    error: function(request, error) {
                        fullScreenLoader.stopLoader();
                        console.log('error data5');

                        console.log(request);
                        console.log(error);
                        alert({
                            title: $.mage.__('Pago no procesado'),
                            // content: $.mage.__(data.message),
                            content: $.mage.__('verifique sus datos e intente nuevamente'),
                            actions: {
                                always: function() {
                                    window.location.href = Url_credomatic;
                                }
                            }
                        });
                    }
                });

            },



            context: function() {


                return this;
            },

            getCode: function() {
                return 'linkser_creditcard';
            },

            isActive: function() {

                // if(!act_license){
                // //document.getElementById('vexsoluciones_linkser_cc_number').readOnly = true;
                // $('#vexsoluciones_linkser_cxxxxxxxxxxxxxxxxxc_number').attr("disabled", true);
                // $('#vexsoluciones_linkser_expiration').attr("disabled", true);
                // $('#vexsoluciones_linkser_expiration_yr').attr("disabled", true);
                // //$('#vexsoluciones_linkser_cc_cid').attr("disabled", true);
                // }	


                return true;
            }
        });



    }



);