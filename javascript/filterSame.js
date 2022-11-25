// Lọc đối tượng trùng vào Object
function filterSame(a) {
    result = {};
    for (var i = 0; i < a.length; ++i) {
        if (!result[a[i]])
            result[a[i]] = 0;
        ++result[a[i]];
    }
    return result;
}

// Filter Double Array Item
function itemDouble(arr) {
    let arrNew = [];
    arr.forEach((c) =>{
        if (!arrNew.includes(c)){
            arrNew.push(c);
        }
    });
    return arrNew;
}

// Remove Double Array Item
const removeDuplicates = (array) => {
    return array.filter((item, index) => array.indexOf(item) === index);
}