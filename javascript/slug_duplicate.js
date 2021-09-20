let str = window.location.href;
strLast1 = str.charAt(str.length-1)
strLast2 = str.charAt(str.length-2)
strLast = strLast1 + strLast2;
console.log(strLast1);

if(strLast == '//'){
    location.replace(str.slice(0, str.length-1));
}

if(strLast1 != '/'){
    location.replace(str + '/');
}