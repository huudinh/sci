
<!-- Code tracking Insight -->
<!-- <script src="/css/js_ver2.js?t=1"></script> -->

<script>
  var ref = document.referrer;
  //set cookies
  function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  //get cookies    
  function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }

  //Tách chuỗi link
  function locurl(url) {
      var parse_url = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/;
      var result = parse_url.exec(url);
      var res = result[3].replace(/www./gi, '');
      return res;
  }
  if(ref.length){
      var ref_host = locurl(ref);
      var landing_url =  document.URL;
      var home_url = locurl(landing_url);
      if(ref_host != home_url){
          var first_url = landing_url;
          var refer = ref;
          setCookie('ref', refer, 30);
          setCookie('first_url', first_url, 30);
      }else{
          var refer = getCookie('ref');
          var first_url = getCookie('first_url');
      }
      console.log(refer);
      console.log(first_url);
  }
</script>