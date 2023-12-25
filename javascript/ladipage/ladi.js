// Get API User
const getLocation = async () => {
    const response = await fetch(`https://geolocation-db.com/json/`);
    const data = await response.json();
    return data;
};

// Hàm chuyển đổi Google Ads
function getParam(p) {
    var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}

function addToStorage(key, value) {
    var expiryPeriod = 90 * 24 * 60 * 60 * 1000; // 90 day expiry in milliseconds
    var expiryDate = new Date().getTime() + expiryPeriod;

    var record = { value: value, expiryDate: expiryDate };

    localStorage.setItem(key, JSON.stringify(record));
}

function storeGclid() {
    var gclidParam = getParam('gclid');

    if (gclidParam) {
        addToStorage('gclid', gclidParam);
    }
}

function addGclid() {
    storeGclid(); // store gclid param to localstorage

    var gclidFormFieldList = document.querySelectorAll('input[name="referred"]');
    // console.log(gclidFormFieldList);

    var currDate = new Date().getTime();

    var gclsrcParam = getParam('gclsrc');
    var isGclsrcValid = !gclsrcParam || gclsrcParam.indexOf('aw') !== -1;


    var gclid = JSON.parse(localStorage.getItem('gclid'));
    var isGclidValid = gclid && currDate < gclid.expiryDate;

    if (gclidFormFieldList && isGclidValid && isGclsrcValid) {
        //   gclidFormField.value = gclid.value;
        for (let i = 0; i < gclidFormFieldList.length; i++) {
            gclidFormFieldList[i].value = gclid.value;
        }
    }
}
// Run Get Gclid
window.addEventListener('load', addGclid);

(function addInput() {
    let firstLinkFieldList = document.querySelectorAll('input[name="first_link"]');
    let locationFieldList = document.querySelectorAll('input[name="location"]');
    let websiteReferFieldList = document.querySelectorAll('input[name="website"]');
    
    // Get Full UTM URL 
    if (firstLinkFieldList) {
        for (let i = 0; i < firstLinkFieldList.length; i++) {
            firstLinkFieldList[i].value = window.location.href;
        }
    }

    // Get City
    if (locationFieldList) {
        for (let i = 0; i < locationFieldList.length; i++) {
            getLocation().then((data) => {
                locationFieldList[i].value = data.city;
            })
        }
    }

    let refer = document.referrer;
    if(!refer){
        refer = 'website';
    }

    // Get URL Refer
    if (websiteReferFieldList) {
        for (let i = 0; i < websiteReferFieldList.length; i++) {
            websiteReferFieldList[i].value = refer;
        }
    }

})();