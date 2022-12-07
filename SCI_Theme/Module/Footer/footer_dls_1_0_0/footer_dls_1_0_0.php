<?php
    if($check == 0){
        include(locate_template("Module/Footer/footer_dls_1_0_0/sass/footer_dls_1_0_0_css.php")); 
    }
?>
<footer id="footer_dls_1_0_0" class="footer_dls_1_0_0">
    <div class="container">
        <div class="footer_dls_1_0_0__box">
            <div class="footer_dls_1_0_0__top">                                        
                <div class="footer_dls_1_0_0__col">
                    <div class="footer_dls_1_0_0__logo">
                        <img width="215" height="111" src="<?php echo $path ?>images/ft-logo.png" alt="">
                    </div>
                    <div class="footer_dls_1_0_0__social">
                        <a href="#"><img width="32" height="32" src="<?php echo $path ?>images/icon-fb.svg" alt="fb"/></a>
                        <a href="#"><img width="32" height="32" src="<?php echo $path ?>images/icon-ins.svg" alt="fb"/></a>
                        <a href="#"><img width="32" height="32" src="<?php echo $path ?>images/icon-youtube.svg" alt="fb"/></a>
                    </div>
                </div>
                <div class="footer_dls_1_0_0__col">
                    <div class="footer_dls_1_0_0__title">CONTACT US</div>
                    <form class="footer_dls_1_0_0__wrapper" id="register-form">
                        <div class="footer_dls_1_0_0__form">
                            <input type="text" name="iemail" placeholder="Your Email">
                            <textarea placeholder="Comments" name="inote" cols="30" rows="5"></textarea>
                            <button type="submit">SEND INQUIRY</button>
                        </div>
                    </form>
                    <style>
                        .border{
                            border:1px solid #c00 !important;
                        }
                    </style>
                </div>
                <div class="footer_dls_1_0_0__col">
                    <div class="footer_dls_1_0_0__title">Visit Us</div>
                    <div class="footer_dls_1_0_0__info">
                        <?php echo $field["info"]; ?>                        
                    </div>
                    <p>Hotline +84 9 83771639</p>
                </div>
            </div>
            <div class="footer_dls_1_0_0__bot">
                ©Copyright 2022. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<script>
var _0x56d0=["\x72\x65\x67\x69\x73\x74\x65\x72\x2D\x66\x6F\x72\x6D","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x73\x75\x62\x6D\x69\x74","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x69\x65\x6D\x61\x69\x6C","\x69\x6E\x6F\x74\x65","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x76\x61\x6C\x75\x65","\x65\x6D\x61\x69\x6C","","\x42\u1EA1\x6E\x20\x63\x68\u01B0\x61\x20\x6E\x68\u1EAD\x70\x20\x45\x6D\x61\x69\x6C","\x62\x6F\x72\x64\x65\x72","\x61\x64\x64","\x63\x6C\x61\x73\x73\x4C\x69\x73\x74","\x72\x65\x6D\x6F\x76\x65","\x42\u1EA1\x6E\x20\u0111\xE3\x20\x67\u1EED\x69\x20\x74\x68\xE0\x6E\x68\x20\x63\xF4\x6E\x67","\x6E\x6F\x74\x65","\x74\x6F\x4C\x6F\x63\x61\x6C\x65\x44\x61\x74\x65\x53\x74\x72\x69\x6E\x67","\x45\x6D\x61\x69\x6C","\x43\x6F\x6D\x6D\x65\x6E\x74","\x44\x61\x74\x65\x20\x43\x72\x65\x61\x74\x65","\x47\x45\x54","\x66\x6F\x6C\x6C\x6F\x77","\x65\x72\x72\x6F\x72","\x6C\x6F\x67","\x63\x61\x74\x63\x68","\x74\x68\x65\x6E","\x74\x65\x78\x74","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x73\x63\x72\x69\x70\x74\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6D\x61\x63\x72\x6F\x73\x2F\x73\x2F\x41\x4B\x66\x79\x63\x62\x78\x50\x6F\x37\x44\x44\x46\x51\x38\x78\x6D\x67\x70\x30\x58\x69\x74\x4D\x59\x70\x4D\x43\x4D\x33\x75\x6B\x61\x57\x55\x5A\x5F\x55\x79\x44\x79\x77\x2D\x44\x6E\x31\x7A\x51\x5A\x33\x32\x46\x6F\x75\x70\x72\x5A\x48\x6E\x43\x63\x39\x4F\x57\x6A\x65\x35\x39\x6A\x47\x2D\x5A\x2F\x65\x78\x65\x63\x3F","\x3D","\x26"];(function(){const _0x671cx1=document[_0x56d0[1]](_0x56d0[0]);_0x671cx1[_0x56d0[6]](_0x56d0[2],(_0x671cx2)=>{_0x671cx2[_0x56d0[3]]();const _0x671cx3={email:_0x671cx1[_0x56d0[4]],note:_0x671cx1[_0x56d0[5]]};validateForm(_0x671cx3)})})();function validateForm(_0x671cx3){if(_0x671cx3[_0x56d0[8]][_0x56d0[7]]== _0x56d0[9]){alert(_0x56d0[10]);_0x671cx3[_0x56d0[8]][_0x56d0[13]][_0x56d0[12]](_0x56d0[11]);return false}else {_0x671cx3[_0x56d0[8]][_0x56d0[13]][_0x56d0[14]](_0x56d0[11])};sendAPI(_0x671cx3);alert(_0x56d0[15]);_0x671cx3[_0x56d0[8]][_0x56d0[7]]= _0x56d0[9];_0x671cx3[_0x56d0[16]][_0x56d0[7]]= _0x56d0[9]}function sendAPI(_0x671cx3){value1= _0x671cx3[_0x56d0[8]][_0x56d0[7]];value2= _0x671cx3[_0x56d0[16]][_0x56d0[7]];value3=  new Date()[_0x56d0[17]]();name1= _0x56d0[18];name2= _0x56d0[19];name3= _0x56d0[20];var _0x671cx6={method:_0x56d0[21],redirect:_0x56d0[22]};fetch(`${_0x56d0[28]}${name1}${_0x56d0[29]}${value1}${_0x56d0[30]}${name2}${_0x56d0[29]}${value2}${_0x56d0[30]}${name3}${_0x56d0[29]}${value3}${_0x56d0[9]}`,_0x671cx6)[_0x56d0[26]]((_0x671cx9)=>{return _0x671cx9[_0x56d0[27]]()})[_0x56d0[26]]((_0x671cx8)=>{console[_0x56d0[24]](_0x671cx8)})[_0x56d0[25]]((_0x671cx7)=>{return console[_0x56d0[24]](_0x56d0[23],_0x671cx7)})}
</script>    