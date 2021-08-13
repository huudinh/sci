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

// Count phần tử trùng trong Array
function countSame(arr) {
    let arrNew = [];
    for (let i = 0; i < arr.length; i++) {
        let j = i + 1;
        if (arr[i] == arr[j]) {
            arrNew.push(arr[i]);
            arrNew.push(arr[j]);
        }
    }
    return arrNew.length;
}

// Filter Double Array Item
function itemDouble(arr) {
    let arrNew = [];
    for (let i = 0; i < arr.length; i++) {
        let j = i + 1;
        if (arr[i] != arr[j]) {
            arrNew.push(arr[i]);
        }
    }
    return arrNew;
}

 // Count phần tử trùng trong Array
function countSame2(arr) {
    let arrClone = arr;
    let arrNew = [];
    for (let i = 0; i < arrClone.length; i++) {
        count = 0;
        for (let j = 0; j < arr.length; j++) {
            if (arr[j] == arrClone[i]) {
                // arrNew.push(arr[j]);
                count++
            }
        }
        console.log(count + arrClone[i]);
    }
    // arrNew.push(count + arrClone[i]);
    // return arrNew.length;
    console.log(arrNew);
}
// countSame2(brandKNsv);