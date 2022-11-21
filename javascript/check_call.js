/* Check Số điện thoại */
function getValidNumber(value) {
    value = value.trim();
    if (value.substring(0, 1) == '1') {
        value = value.substring(1);
    }
    if (value.length == 10) {
        return value;
    }
    return false;
}