var count = localStorage.getItem("count") || 28;
if (count == 0) {
    document.getElementById("count").innerHTML = 28;
    localStorage.setItem("count", 28);
}
var intervalId;

function startCountdown() {
    intervalId = setInterval(function () {
        count--;
        if (count >= 0) {
            document.getElementById("count").innerHTML = count;
            localStorage.setItem("count", count);
        }
        if (count == 0) {
            clearInterval(intervalId);
        }
    }, 8000);
}

function pauseCountdown() {
    clearInterval(intervalId);
}

function resetCountdown() {
    if (count > 0) {
        count--;
        document.getElementById("count").innerHTML = count;
        localStorage.setItem("count", count);
        clearInterval(intervalId);
    }
}

// Lấy giá trị số đếm từ local storage
if (count) {
    document.getElementById("count").innerHTML = count;
}

// Kịch bản //

// Chạy count
startCountdown();

// Khi click close thì stop
document.querySelector('.popup__close').addEventListener('click', () => {
    pauseCountdown();
})

// Khi click màn tối của popup thì stop
let popup__form = document.querySelector('.popup__form');
popup__form.onclick = function (event) {
    if (event.target == popup__form) {
        pauseCountdown();
    }
}

// Khi click vào button gọi popup
document.querySelector('.screen1__button').addEventListener('click', () => {
    startCountdown();
})
document.querySelector('.screen8__button').addEventListener('click', () => {
    startCountdown();
})

// Khi gửi thông tin xong giảm 1 count
document.querySelector('.popup__button').addEventListener('click', () => {
    resetCountdown()
})