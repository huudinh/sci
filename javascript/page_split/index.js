// Khai báo
let currentPage = 1;
let itemsPerPage = 10;
let pageNumberLimit = 5;
let maxPageNumberLimit = 5;
let minPageNumberLimit = 0;

// Logic for getting total number of pages
const pages = [];
for (let i = 1; i <= Math.ceil(data.length / itemsPerPage); i++) {
    pages.push(i);
}

// Display Data
// Logic for displaying a number of items per page
const displayData = (currentPage) => {
    const indexOfLastItem = currentPage * itemsPerPage;
    const indexOfFirstItem = indexOfLastItem - itemsPerPage;
    let pageItems = data.slice(indexOfFirstItem, indexOfLastItem)
    let showData = [];

    if (pageItems.length > 0) {
        pageItems.map((todo) => {
            showData.push(`<li>${todo.title}</li>`);
        })
    }
    return showData;
};

// Logic for displaying page numbers
const handleClick = (currentPage) => {
    if (currentPage <= pages.length) {

        if (currentPage + 1 > maxPageNumberLimit) {
            maxPageNumberLimit += pageNumberLimit;
            minPageNumberLimit += pageNumberLimit;
        }

        if (currentPage - 1 < minPageNumberLimit) {
            maxPageNumberLimit -= pageNumberLimit;
            minPageNumberLimit -= pageNumberLimit;
        }

        showPagesTextFunc(pages, currentPage, minPageNumberLimit, maxPageNumberLimit);
        showDataTextFunc(displayData(currentPage));
        addSearch(currentPage);
    }
};

// Show Data on UI
function showDataTextFunc(showData) {
    let showDataText = showData.toString().split(",").join("");
    document.querySelector('.content').innerHTML = showDataText;
}
showDataTextFunc(displayData(currentPage));


// Show Pages on UI
function showPagesTextFunc(pages, currentPage, minPageNumberLimit, maxPageNumberLimit) {
    // Render Page Numbers
    let showPages = [];
    pages.map((number) => {
        if (number < maxPageNumberLimit + 1 && number > minPageNumberLimit) {
            showPages.push(`
                <li onclick="handleClick(${number})" class="${currentPage == number && "active"}">${number}</li>
            `);
        }
    });

    // In ra DOM
    let showPagesText = showPages.toString().split(",").join("");
    document.querySelector('.pageNumbersContent').innerHTML = showPagesText;
}
showPagesTextFunc(pages, currentPage, minPageNumberLimit, maxPageNumberLimit);

// Logic Click Back Page
const handleNextbtn = () => {
    if (currentPage + 1 < pages.length) {
        currentPage += 1;

        if (currentPage + 1 > maxPageNumberLimit) {
            maxPageNumberLimit += pageNumberLimit;
            minPageNumberLimit += pageNumberLimit;
        }
        showPagesTextFunc(pages, currentPage, minPageNumberLimit, maxPageNumberLimit);
        showDataTextFunc(displayData(currentPage));
        addSearch(currentPage);

    }
};

// Logic Click Next Page
const handlePrevbtn = () => {
    if (currentPage > 1) {
        currentPage -= 1;

        if (currentPage - 1 < minPageNumberLimit) {
            maxPageNumberLimit -= pageNumberLimit;
            minPageNumberLimit -= pageNumberLimit;
        }
        showPagesTextFunc(pages, currentPage, minPageNumberLimit, maxPageNumberLimit);
        showDataTextFunc(displayData(currentPage));
        addSearch(currentPage);
    }
};

// Show Pages Choice
const handleGoPage = (page) => {     
    if (page > 0 && page < pages.length) {
        currentPage = page;
        if(page > pageNumberLimit){
            maxPageNumberLimit = page;
            minPageNumberLimit = page - pageNumberLimit;
        }
        showPagesTextFunc(pages, currentPage, minPageNumberLimit, maxPageNumberLimit);
        showDataTextFunc(displayData(currentPage));
    }
};

// Get Page URL
const params = new URLSearchParams(window.location.search);
const urlPage = Number(params.get('pages')); 

// Update Data theo URL 
handleGoPage(urlPage);

// Update Url
function addSearch(number){    
    const url = new URL(window.location);
    url.searchParams.set('pages', number);
    window.history.pushState({}, '', url);
}

 