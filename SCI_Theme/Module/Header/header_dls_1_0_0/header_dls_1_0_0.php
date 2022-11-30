<?php 
    if($check == 0){
      include(locate_template("Module/Header/header_dls_1_0_0/sass/header_dls_1_0_0_css.php"));          
    }
?>
<header class="header_dls_1_0_0">
    <div class="container">
        <div class="header_dls_1_0_0__box">
            <div class="header_dls_1_0_0__nav" id="headerMenuBtn">
                <img width="30" height="30" src="<?php echo $path ?>images/header-menu.svg" alt="Logo">
            </div>
            <?php
                $postId = get_the_ID();
                if($postId == 10){
                    $div = 'h1';
                } else {
                    $div = 'div';
                }
                echo '
                    <'.$div.' class="header_dls_1_0_0__logo">
                        <a href="/">
                            <img width="240" height="78" src="'.$path.'images/logo.png" alt="logo">
                        </a>
                    </'.$div.'>
                ';
            ?>
            <ul class="header_dls_1_0_0__list" id="headerSideBar">
                <div class="header_dls_1_0_0__logoMb">
                    <a href="#">
                        <img width="240" height="78" src="<?php echo $path ?>/images/logo.png" alt="">
                    </a>
                </div>
                <?php
                    foreach( $field as $key => $value){
                        foreach($value as $key2 => $list){
                            if( $list['acf_fc_layout'] == 'menu_don' ):
                                $main_tt = explode(" | ",  $list["title"]);
                                echo '
                                    <li class="header_dls_1_0_0__item">
                                        <a class="header_dls_1_0_0__link" href="'.$main_tt[1].'">'.$main_tt[0].'</a>
                                    </li>
                                ';
                            elseif( $list['acf_fc_layout'] == 'menu_sub' ):
                                $main_tt = explode(" | ",  $list["title"]);
                                echo '
                                    <li class="header_dls_1_0_0__item">
                                        <a class="header_dls_1_0_0__link" href="'.$main_tt[1].'">'.$main_tt[0].'</a>
                                        <div class="header_dls_1_0_0__dropdown">
                                            <div class="header_dls_1_0_0__dropdownCate">
                                                '.$list["col1"].'
                                            </div>
                                        </div>
                                    </li>
                                ';
                            elseif ( $list['acf_fc_layout'] == 'menu_sub_full' ):
                                $main_tt = explode(" | ",  $list["title"]);
                                $main_ct = explode("&nbsp;",  $list["col1"]);
                                echo '
                                    <div class="header_dls_1_0_0__menuItem haveDropdown">
                                        <a class="header_dls_1_0_0__menuTitle" href="'.$main_tt[1].'">'.$main_tt[0].'</a>
                                        <div class="header_dls_1_0_0__dropdown">
                                            <div class="header_dls_1_0_0__dropdownBox">
                                ';
                                    foreach($main_ct as $num => $value){
                                        echo '
                                            <div class="header_dls_1_0_0__dropdownCate">
                                                '.$value.'
                                            </div>
                                        ';
                                    }
                                echo '
                                            </div>
                                        </div>
                                    </div>
                                ';
                            endif;
                        }
                    }
                ?>
            </ul>
            <select class="header_dls_1_0_0__language en" onfocus='this.size=2;' onblur='this.size=0;' 
            onchange='this.size=1; this.blur(); urlHandler(this.value);'>
                <option value="#en">English</option>
                <option value="#vi">Tiếng Việt</option>
            </select>
            <div class="header_dls_1_0_0__bg" id="headerBg"></div>
        </div>
    </div>
</header>
<script>
    document.getElementById("headerMenuBtn").addEventListener("click", () => {
  document.getElementById("headerSideBar").classList.add("show");
  document.getElementById("headerBg").style.display = "block";
});
document.getElementById("headerBg").addEventListener("click", () => {
  document.getElementById("headerSideBar").classList.remove("show");
  document.getElementById("headerBg").style.display = "none";
});

const menuItem = document.querySelectorAll(".header_sci_1_0_0__item");
menuItem.forEach((item) => {
  item.addEventListener("click", () => {
    item.classList.toggle("open");
  });
});

function urlHandler(value) {                               
  window.location.assign(`${value}`);
  let x = document.querySelector('.header_dls_1_0_0__language');
  
  if(x.classList[1] == 'en'){
      x.classList.remove('en');
      x.classList.add('vi');
  } else {
      x.classList.remove('vi');
      x.classList.add('en');
  }
}
</script>