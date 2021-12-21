var yearSelect = document.querySelector('#year');

(function() {
    var date = new Date();
    var year = date.getFullYear();

    for (var i = 0; i <= 100; i++) {
        var option = document.createElement('option');
        option.textContent = year - i;
        yearSelect.appendChild(option);
    }
})();