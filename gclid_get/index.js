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

	var gclidFormFieldList = document.querySelectorAll('input[name="gclid_field"]');
	// console.log(gclidFormFieldList);

	var currDate = new Date().getTime();

	var gclsrcParam = getParam('gclsrc');
	var isGclsrcValid = !gclsrcParam || gclsrcParam.indexOf('aw') !== -1;


	var gclid = JSON.parse(localStorage.getItem('gclid'));
	var isGclidValid = gclid && currDate < gclid.expiryDate;

	if (gclidFormFieldList && isGclidValid && isGclsrcValid) {
		for(let i = 0; i < gclidFormFieldList.length; i++){
			gclidFormFieldList[i].value = gclid.value;
		}
	}
}

window.addEventListener('load', addGclid);