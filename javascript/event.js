// Enter call Function
const searchInput = document.getElementById('searchInput');
searchInput.addEventListener('keyup', function(event){
    if (event.keyCode === 13){
        event.preventDefault();
        document.getElementById('seach_2_0_0__send').click();
    }
});