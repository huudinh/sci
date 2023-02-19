// component photo
const photoCard = (data, index) => {
    (index == 0) ? className = 'project_dls_1_1_0__pic--big' : className = '';
    return `
        <div class="project_dls_1_1_0__pic ${className}">
            <img src="${data.image}" class="modal-btn" onclick="popupPhoto(dataSlide, ${index})" alt="${data.text}">
        </div>
    `;
}

// Render photo card
function renderPhoto(data){
    for(let i = 0; i < 5; i++){
        document.getElementById('project_dls_1_1_0__photo').insertAdjacentHTML('beforeend', photoCard(data[i], i))     
    }
}
renderPhoto(dataSlide);

// Component list
const listCard = (data, index) => {
    return `
        <div class="project_dls_1_1_0__item">
            <img src="${data.image}" class="modal-btn" onclick="popupPhoto(dataSlide, ${index})" alt="${data.text}" />
        </div>
    `;
}

// Render List card
function renderList(data){
    for(let i = 5; i < data.length; i++){
        document.getElementById('project_dls_1_1_0__list').insertAdjacentHTML('beforeend', listCard(data[i], i))
    }
}
renderList(dataSlide);

// compoinent modal popup
const modalPop = (link) => {
    return `
      <div class="modal" id="modal-pic" style="display:flex">
          <div class="modal-closePic" id="modal-closePic">×</div>
          <div class="modal-bg" id="modal-bg"></div>
          <div class="modal-box modal-box-img animate-zoom">
              <div class="modal-pic" style="text-align:center">
                    <div class="slider"></div>
                <div class="slider__control">
                    <button class="slider__arrow slider__arrow--prev"><i class="icon-angle-left"></i></button>
                    <button class="slider__arrow slider__arrow--next"><i class="icon-angle-right"></i></button>
                </div>
              </div>
          </div>
      </div>
    `;
};

function popupPhoto(data, index){
    document.querySelector('#project_dls_1_1_0').insertAdjacentHTML('beforebegin', modalPop())
    createSlider(data, index);
    document.querySelector('#modal-closePic').addEventListener('click', () => {
        document.querySelector('#modal-pic').remove();
    });
    document.querySelector('#modal-bg').addEventListener('click', () => {
        document.querySelector('#modal-pic').remove();
    });
}


// compoinent slide
const slideCard = (data) => {
    return `
        <div class="slider__item ">
            <img class="slider__image" src="${data.image}" alt="${data.text}">
            <p class="slider__text">${data.text}</p>
        </div>
    `;
};


function createSlider(data, index){
    for(let i = 0; i < data.length; i++){
        let slider = document.querySelector('.slider');
        if(i < 2){
            slider.innerHTML += slideCard(data[index]);
        }
        if (index == data.length-1){
            index = 0;
        } else {
            index ++;
        }
    }
    
    const btnNext = document.getElementsByClassName('slider__arrow--next');
    const btnPrev = document.getElementsByClassName('slider__arrow--prev');
    const img = document.getElementsByClassName('slider__image');
    const text = document.getElementsByClassName('slider__text');
    let i = 0;
    btnNext[0].addEventListener("click", function () {
        plusDivs(1);
        i++;
        for (let x = 0; x < img.length; x++) {
            if (i >= data.length) {
                i = 0;
            }
            img[x].setAttribute('src', data[i].image);
            text[x].innerText = data[i].text;
        }
    
    });
    btnPrev[0].addEventListener('click', function () {
        plusDivs(-1);
        i--;
        for (let x = 0; x < img.length; x++) {
            if (i <= -1) {
                i = data.length - 1;
            }
            img[x].setAttribute('src', data[i].image);
            text[x].innerText = data[i].text;
        }
    })
    let slideIndex = 1;
    showDivs(slideIndex);
    
    function plusDivs(n) {
        showDivs(slideIndex += n);
    }
    
    function showDivs(n) {
        let i;
        let x = document.getElementsByClassName("slider__item");
        if (n > x.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }
}