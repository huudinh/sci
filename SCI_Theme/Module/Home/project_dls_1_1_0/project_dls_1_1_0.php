<?php
    if($check == 0){
        include(locate_template("Module/Home/project_dls_1_1_0/sass/project_dls_1_1_0_css.php")); 
    }
?>      

<style>
    .modal-btn{
        cursor: zoom-in;
    }
</style>
<section class="project_dls_1_1_0 ">
    <div class="container">
        <div id="modal"></div>                
        <?php 
            $rows = $field["project"];
            foreach($rows as $row):
                echo '
                    <div class="project_dls_1_1_0__box">
                        <div class="project_dls_1_1_0__title">
                            <i class="project_dls_1_1_0__icon"></i>
                            '.$row['project_title'].'
                        </div>
                        <div class="project_dls_1_1_0__des">
                            '.$row['project_content'].'
                        </div>
                        <div class="project_dls_1_1_0__photo">
                    ';

                    $content = $row['project_photo'];

                    foreach($content as $key => $image):
                        $cls = ($key == 0) ? 'project_dls_1_1_0__pic--big' : '';
                        echo '
                            <div class="project_dls_1_1_0__pic '.$cls.'">
                                <img src="'.$image['url'].'" class="modal-btn" alt="'.$image['title'].'">
                            </div>
                        ';
                    endforeach;

                echo '</div></div>';
            endforeach;
        ?>
    </div>
</section>
<script>
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
</script>