// Tạo Template
const button = `    
    <button id="copyBtn">Get Copy</button>
    <textarea id="showcode" rows="4" cols="50"></textarea>
`;
document.body.insertAdjacentHTML('afterend', button);

// Đọc dữ liệu cần lấy
let link = document.querySelectorAll('.MjjYud a[jsname="UWckNb"]');
let des = document.querySelectorAll('.MjjYud .VwiC3b>span:not([class]), .MjjYud .VwiC3b');
console.log(des);

// Lấy HTML
let html = '';
for(let i = 0; i < link.length; i++){
    html += `<p><a href="${link[i].href}">${link[i].href}</a></p> <p>${des[i].innerHTML}</p>`;
}

// Sự kiện click nút Copy
const copyBtn = document.querySelector('#copyBtn');
copyBtn.addEventListener('click', copyFunction)

// Hàm xử lý copy DOM
function copyFunction() {
    // Đưa dữ liệu ra Textarrea
    document.querySelector('#showcode').value = html;
    // Xử lý copy
    showcode.select();
    showcode.setSelectionRange(0, 99999); /*For mobile devices*/
    document.execCommand("copy");
}