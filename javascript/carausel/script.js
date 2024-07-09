const images = [
    'https://www.w3schools.com/w3css/img_lights.jpg',
    'https://www.w3schools.com/w3css/img_snowtops.jpg',
    'https://www.w3schools.com/w3css/img_mountains.jpg',
    'https://www.w3schools.com/w3css/img_snowtops.jpg',
    'https://nhakhoaparis.vn/wp-content/uploads/2023/07/thuoc-tay-trang-rang-opalescence-5.jpg',
    'https://nhakhoaparis.vn/wp-content/uploads/2023/07/thuoc-tay-trang-rang-opalescence-4.jpg',
    'https://nhakhoaparis.vn/wp-content/uploads/2023/07/thuoc-tay-trang-rang-opalescence-5.jpg',
    'https://nhakhoaparis.vn/wp-content/uploads/2023/07/thuoc-tay-trang-rang-opalescence-4.jpg'
];
// let currentIndex = 0;

// window.onload = () => {
//     const carouselInner = document.getElementById('carouselInner');
//     loadImages();
// };

// function loadImages() {
//     const carouselInner = document.getElementById('carouselInner');
//     carouselInner.innerHTML = ''; // Clear existing images
//     for (let i = currentIndex; i < currentIndex + 3; i++) {
//         if (i < images.length) {
//             const img = document.createElement('img');
//             img.src = images[i];
//             carouselInner.appendChild(img);
//         }
//     }
// }

// function moveLeft() {
//     currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 3;
//     loadImages();
// }

// function moveRight() {
//     currentIndex = (currentIndex < images.length - 3) ? currentIndex + 1 : 0;
//     loadImages();
// }

// let currentIndex = 0;

// window.onload = () => {
//     const carouselInner = document.getElementById('carouselInner');
//     loadImages();
// };

// function loadImages() {
//     const carouselInner = document.getElementById('carouselInner');
//     carouselInner.innerHTML = ''; // Clear existing images
//     for (let i = currentIndex; i < currentIndex + 3 && i < images.length; i++) {
//         const img = document.createElement('img');
//         img.src = images[i];
//         carouselInner.appendChild(img);
//     }
// }

// function moveLeft() {
//     if (currentIndex > 0) {
//         currentIndex--;
//         const carouselInner = document.getElementById('carouselInner');
//         carouselInner.style.transition = 'transform 0.5s ease-in-out';
//         carouselInner.style.transform = 'translateX(300px)';

//         carouselInner.addEventListener('transitionend', () => {
//             loadImages();
//             carouselInner.style.transition = 'none';
//             carouselInner.style.transform = 'translateX(0)';
//         }, { once: true });
//     }
// }

// function moveRight() {
//     if (currentIndex < images.length - 3) {
//         currentIndex++;
//         const carouselInner = document.getElementById('carouselInner');
//         carouselInner.style.transition = 'transform 0.5s ease-in-out';
//         carouselInner.style.transform = 'translateX(-300px)';

//         carouselInner.addEventListener('transitionend', () => {
//             loadImages();
//             carouselInner.style.transition = 'none';
//             carouselInner.style.transform = 'translateX(0)';
//         }, { once: true });
//     }
// }


// ok
// let currentIndex = 0;

// window.onload = () => {
//     loadImages();
// };

// function loadImages() {
//     const carouselInner = document.getElementById('carouselInner');
//     carouselInner.innerHTML = ''; // Clear existing images
//     for (let i = currentIndex; i < currentIndex + 4 && i < images.length; i++) {
//         const img = document.createElement('img');
//         img.src = images[i];
//         carouselInner.appendChild(img);
//     }
// }

// function moveLeft() {
//     if (currentIndex > 0) {
//         currentIndex--;
//         const carouselInner = document.getElementById('carouselInner');
//         carouselInner.style.transition = 'transform 0.5s ease-in-out';
//         carouselInner.style.transform = 'translateX(300px)';

//         carouselInner.addEventListener('transitionend', () => {
//             loadImages();
//             carouselInner.style.transition = 'none';
//             carouselInner.style.transform = 'translateX(0)';
//         }, { once: true });
//     }
// }

// function moveRight() {
//     if (currentIndex < images.length - 3) { // Ensure we can still show at least 3 images
//         currentIndex++;
//         const carouselInner = document.getElementById('carouselInner');
//         carouselInner.style.transition = 'transform 0.5s ease-in-out';
//         carouselInner.style.transform = 'translateX(-300px)';

//         carouselInner.addEventListener('transitionend', () => {
//             loadImages();
//             carouselInner.style.transition = 'none';
//             carouselInner.style.transform = 'translateX(0)';
//         }, { once: true });
//     }
// }

let currentIndex = 0;

window.onload = () => {
    loadImages();
};

function loadImages() {
    const carouselInner = document.getElementById('carouselInner');
    carouselInner.innerHTML = ''; // Clear existing images
    
    // Calculate start and end indices based on currentIndex
    const start = Math.max(0, currentIndex);
    const end = Math.min(images.length, currentIndex + 4);
    
    for (let i = start; i < end; i++) {
        const img = document.createElement('img');
        img.src = images[i];
        carouselInner.appendChild(img);
    }

    // Reset transform to ensure correct initial positioning
    carouselInner.style.transition = 'none';
    carouselInner.style.transform = 'translateX(0)';
}

function moveLeft() {
    if (currentIndex > 0) {
        currentIndex--;
        slideCarousel(300); // Slide to the right (positive value)
    }
}

function moveRight() {
    if (currentIndex < images.length - 4) { // Ensure we can still show at least 4 images
        currentIndex++;
        slideCarousel(-300); // Slide to the left (negative value)
    }
}

function slideCarousel(offset) {
    const carouselInner = document.getElementById('carouselInner');
    carouselInner.style.transition = 'transform 0.5s ease-in-out';
    carouselInner.style.transform = `translateX(${offset}px)`;

    carouselInner.addEventListener('transitionend', () => {
        loadImages();
        carouselInner.style.transition = 'none';
        carouselInner.style.transform = 'translateX(0)';
    }, { once: true });
}