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