$(document).ready(function() {
    //Kiểm tra cookie
    var check_spin = getCookie('rnum');

    if (check_spin == null || check_spin == '') {
        // Main
        $('.formdk .submit_s').click(function() {
            //Check thong tin khach hang
            var hoten = $('#iname').val();
            var sdt = $('#imob').val();
            var email = $('#iemail').val();
            var gift = getCookie('rnum');
            // console.log(gift);

            //Check required
            var required = false;

            /* Check Số điện thoại */
            function getValidNumber(value) {
                value = $.trim(value).replace(/\D/g, '');
                if (value.substring(0, 1) == '1') {
                    value = value.substring(1);
                }
                if (value.length == 10) {
                    return value;
                }
                return false;
            }

            //Check thông tin
            $(".formdk .required").each(function() {
                if ($(this).val() == "" || $(this).val() == null) {
                    $(this).addClass('border');
                    required = true;
                } else {
                    $(this).removeClass('border');
                }
            });

            if (required == true) {
                // $('#thongbao .modal-title').html('Thông báo');
            } else if (!getValidNumber(sdt)) {
                $('#imob').addClass('border');
                alert('Bạn nhập sai số điện thoại');
            } else {
                $('#modal-top').hide();
                $.post("https://scibeauty.edu.vn/vong-quay-may-man-ngay-tet/check.php", { quayso: 1, hoten: hoten, sdt: sdt, email: email, gift: gift },
                    function(result) {
                        console.log(result);
                        var json = $.parseJSON(result);
                        var stt = json.stt;
                        var time = json.time;
                        var hoten = json.hoten;
                        var email = json.email;
                        var sdt = json.sdt;
                        var phanthuong = json.phanthuong;
                        // var phanthuong = phanthuong;
                        var numquay = json.numquay;
                        var giai_info = json.giai_info;

                        function send_form(js_time, js_name, js_mail, js_sdt, js_ketqua) {
                            //Send to google sheet
                            $.ajax({
                                url: "https://docs.google.com/forms/d/e/1FAIpQLSerMsESheRWaX1oMRiUVY8QMgAbEKzJ7K_MTvTeTNTfYzkiwQ/formResponse",
                                data: {
                                    "entry.1690988905": js_time,
                                    "entry.2005620554": js_name,
                                    "entry.1045781291": js_mail,
                                    "entry.1166974658": js_sdt,
                                    "entry.1029324147": js_ketqua,

                                },
                                type: "POST",
                                dataType: "xml",
                                statusCode: {
                                    0: function() {
                                        //form_set_default();
                                        //Success message
                                        console.log('Succcess');
                                    },
                                    200: function() {
                                        //form_set_default();
                                        //Success message
                                        console.log('Succcess');
                                    }
                                }
                            });
                        }

                        var _guid = "";

                        function guid() {
                            return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
                                s4() + '-' + s4() + s4() + s4();
                        }

                        function s4() {
                            return Math.floor((1 + Math.random()) * 0x10000)
                                .toString(16)
                                .substring(1);
                        }

                        function send_insight(js_name, js_sdt, js_ketqua) {
                            $.ajax({
                                type: "POST",
                                dataType: "jsonp",
                                jsonpCallback: false,
                                url: "https://insight.scigroup.com.vn/form/insert",
                                data: { my_pie: 3.14, form_id: 5, phone: js_sdt, contact_name: js_name, code_campaign: "915266528", name_campaign: "[SCI Academy] Vòng Quay May Mắn Tết", description: js_ketqua },
                                success: function(data) {
                                    console.log('oki');
                                }
                            });
                        }

                        if (stt == 1) {
                            // send_form(time, hoten, email, sdt, phanthuong);
                            send_insight(hoten, sdt, phanthuong);

                            //Trúng thưởng
                            $('#modal-top .modal-body').html('<div class="modal-gift"><p>Ưu đãi của bạn là</p>' + phanthuong + '<p>Cap lại màn hình dưới đây <br> Và mang tới chi nhánh để đổi quà. <br> *Ưu đãi chỉ áp dụng 1KH/1 lần.</p> </div>');
                            $('#modal-top').show();

                            gtag('event', 'Touch', { event_category: 'Để Lại Thông Tin', event_label: 'Thành Công' });
                            fbq('track', 'CompleteRegistration');

                        } else if (stt == 0) {
                            // setTimeout(function() {
                            $('#modal-top .modal-body').html('<h3>Bạn đã tham gia chương trình. <br/> Chúc bạn may mắn lần sau ! </h3>');
                            $('#modal-top').show();

                            // }, 7000);
                        } else if (stt == 2) {
                            $('#modal-top .modal-sale').html('<h3>Bạn đã hết lượt quay !</h3><div class="modal-footer"><div class="modal-share"><a>Share để nhận thêm lượt quay</a></div><div class="modal-btnShare"><button class="btnShare">share</button><input id="ishare" name="ishare" value="" type="hidden"></div></div>');
                            $('#modal-top').show();
                            $('.formdk h3').hide();
                            $('.formdk  .fct').hide();
                            $('.formdk  .submit_s').hide();
                            $('#spin').addClass('spin-end');

                        } else if (stt == 3) {
                            $('#modal-top .modal-body').html('<h3>Số điện thoại này đã được đăng ký !</h3>');
                            $('#modal-top').show();
                            // $('#spin').addClass('spin-end');
                            // $('.start').addClass('start-end');
                        }


                    });

            }

        });
        // End main

    } else {
        $('#spin').addClass('spin-end');
        $('.start').addClass('start-end');
        $('#spin,.start').removeClass('start_run');
        setTimeout(function() {
            $('#modal-top .modal-body').html('<h3>Bạn đã tham gia chương trình. <br/> Chúc bạn may mắn lần sau ! </h3>');
            $('#modal-top').show();
        }, 1000);
    }
    //Vòng Quay
    var spin_wheel = function(rando) {
        $('#wheel .sec').each(function() {
            var t = $(this);
            var noY = 0;

            var c = 0;
            var n = 700;
            var interval = setInterval(function() {
                c++;
                if (c === n) {
                    clearInterval(interval);
                }

                var aoY = t.offset().top;
                $("#txt").html(aoY);

                /* Chuyển động của button Spin */
                if (aoY < 0) {
                    $('#spin').addClass('spin');
                    setTimeout(function() {
                        $('#spin').removeClass('spin');
                    }, 100);
                }
            }, 10);

            $('#inner-wheel').css({
                'transform': 'rotate(' + rando + 'deg)'
            });
            noY = t.offset().top;
        });
    }

    // Bắt đầu chơi
    $('body').on('click', '.start_run', function() {
        // $('#modal-top').show();
        var randnum = Math.floor((Math.random() * 100) + 1);
        if (randnum <= 15) {
            // Voucher 2tr  -  15%
            var rnum = 20543;
            setCookie("rnum", "ma1");
        }

        if (randnum > 15 && randnum <= 35) {
            // Voucher -60% Phun xăm  -  20%
            var rnum = 20564;
            setCookie("rnum", "ma2");
        }

        if (randnum > 35 && randnum <= 55) {
            // Voucher -60% Spa  -  20%
            var rnum = 20474;
            setCookie("rnum", "ma3");
        }

        if (randnum > 55 && randnum <= 75) {
            // Voucher -60% Nail  -  20%
            var rnum = 20430;
            setCookie("rnum", "ma4");
        }

        if (randnum > 75 && randnum <= 80) {
            // Miễn phí học Spa  -  5%
            var rnum = 20497;
            setCookie("rnum", "ma5");
        }

        if (randnum > 80 && randnum <= 85) {
            // Miễn phí học Phun xăm  -  5%
            var rnum = 20451;
            setCookie("rnum", "ma6");
        }

        if (randnum > 85 && randnum <= 90) {
            // Miễn phí học Nail  -  5%
            var rnum = 20407;
            setCookie("rnum", "ma7");
        }

        if (randnum > 90 && randnum <= 93) {
            // Voucher -50% Nail  -  3%
            var rnum = 20386;
            setCookie("rnum", "ma8");
        }

        if (randnum > 93 && randnum <= 96) {
            // Voucher -50% Phun xăm  -  3%
            var rnum = 20319;
            setCookie("rnum", "ma9");
        }

        if (randnum > 96 && randnum <= 100) {
            // Voucher -50% Spa  -  4%
            var rnum = 20227;
            setCookie("rnum", "ma10");
        }

        // Vong Quay
        spin_wheel(rnum);
        var gift = getCookie('rnum');
        // console.log(gift);

        // Check KQ
        $.post("https://scibeauty.edu.vn/vong-quay-may-man-ngay-tet/check_gift.php", { quayso: 1, gift: gift },
            function(result) {
                // console.log(result);
                var json = $.parseJSON(result);
                var stt = json.stt;
                var phanthuong = json.phanthuong;

                // Nhap thong tin
                setTimeout(function() {
                    $('#modal-top').show();
                    $('.modal-sale').html('<h3>' + phanthuong + '</h3>');
                    $('#spin').addClass('spin-end');
                    $('.start').addClass('start-end');
                    $('#spin,.start').removeClass('start_run');
                }, 6000);
            });


    });

});