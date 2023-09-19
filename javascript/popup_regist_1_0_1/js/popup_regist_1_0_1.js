
document.addEventListener("DOMContentLoaded", function(){
    const popup_regist = document.getElementsByClassName("popup_regist");
    const popup_regist_1_0_1 = document.getElementById("popup_regist_1_0_1");
    const popup_regist_1_0_1_overlayClickForm = document.getElementById("popup_regist_1_0_1_overlayClickForm");
    const popup_regist_1_0_1_overlay = document.getElementById("popup_regist_1_0_1_overlay");
    const popup_regist_1_0_1_closePopup = document.getElementById("popup_regist_1_0_1_closePopup");
    
    for ( const call of popup_regist ){
      call.addEventListener("click", function(){
        popup_regist_1_0_1.style.display = "block";
        popup_regist_1_0_1_overlayClickForm.style.display = "block";
        popup_regist_1_0_1_overlay.style.display = "block";
      });
    }
    
    popup_regist_1_0_1_closePopup.addEventListener("click", function(){
        popup_regist_1_0_1.style.display = "none";
        popup_regist_1_0_1_overlayClickForm.style.display = "none";
        popup_regist_1_0_1_overlay.style.display = "none";
    });
    
    popup_regist_1_0_1_overlay.addEventListener("click", function(){
        popup_regist_1_0_1.style.display = "none";
        popup_regist_1_0_1_overlayClickForm.style.display = "none";
        popup_regist_1_0_1_overlay.style.display = "none";
    });
    
    });