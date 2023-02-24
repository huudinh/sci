<form action="/" id="searchform" name="searchform" method="get" onsubmit="return checkSearch()" class="footer_vpl_1_0_0__search">	
    <input id="s" name="s" type="text" class="footer_vpl_1_0_0__input" placeholder="Nhập từ cần tìm">
    <button type="submit" class="footer_vpl_1_0_0__submit"></button>
</form>

<script>
    function checkSearch() {
        var x = document.forms["searchform"]["s"].value;
        regex = /[\!\@\#\$\%\^\&\*\)\(\+\=\.\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-]/g;
        if  (x=="" || regex.test(x))  {
            alert("Vui lòng nhập từ khóa cần tìm !");
            return false;
        }
    }
</script>