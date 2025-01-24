function isImage(url, callback) {
    const img = new Image();
    img.onload = function() {
        callback(true);
    };
    img.onerror = function() {
        callback(false);
    };
    img.src = url;
}

// Sử dụng hàm để kiểm tra các liên kết
isImage('https://img001.prntscr.com/file/img001/qEqm_pILRPOPPfP1GeKO2g.png', function(result) {
    console.log('Link 1 is an image:', result);
});

isImage('https://prnt.sc/_3u-00GpNL_Z', function(result) {
    console.log('Link 2 is an image:', result);
});
