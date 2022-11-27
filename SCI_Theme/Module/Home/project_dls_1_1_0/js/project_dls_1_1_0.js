// compoinent modal popup
const modalPop = (link) => {
    return `
      <div class="modal" id="modal-pic" style="display:flex">
          <div class="modal-closePic">×</div>
          <div class="modal-bg"></div>
          <div class="modal-box modal-box-img animate-zoom">
              <div class="modal-pic" style="text-align:center">
                  <img src="${link}" alt="photo">
              </div>
          </div>
      </div>
    `;
};
let modalBtn = document.querySelectorAll('.modal-btn');

for(let i = 0; i < modalBtn.length; i++){
    modalBtn[i].addEventListener('click', (e) => {
        document.querySelector('#modal').innerHTML = modalPop(e.target.src);
        document.querySelector('.modal-closePic').addEventListener('click', () => {
            document.querySelector('#modal').innerHTML = '';
        });
        document.querySelector('.modal-bg').addEventListener('click', () => {
            document.querySelector('#modal').innerHTML = '';
        });
    });
}