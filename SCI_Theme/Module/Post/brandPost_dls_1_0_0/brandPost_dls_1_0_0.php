<style>
    .brandPost_dls_1_0_0{padding:40px 0 20px 0;font-family:var(--primary-font)}.brandPost_dls_1_0_0__photo{gap:20px;margin:20px 0;text-align:center;display:grid;grid-template-rows:auto auto;grid-template-columns:auto auto}.brandPost_dls_1_0_0__title{position:relative;font-weight:700;font-size:18px;margin:20px 0}.brandPost_dls_1_0_0__name{font-weight:600}.brandPost_dls_1_0_0__des{color:#777}.brandPost_dls_1_0_0__pic{background-color:#ccc;overflow:hidden;margin:10px 0 15px}.brandPost_dls_1_0_0__pic img{width:100%;height:auto;display:block;transition:all .2s linear}.brandPost_dls_1_0_0__pic:hover img{filter:grayscale(0);transform:scale(1.05)}.brandPost_dls_1_0_0__pages{display:flex;justify-content:center;flex-wrap:wrap;margin:40px 0;padding:0;list-style:none;width:100%}.brandPost_dls_1_0_0__pages li{width:32px;height:32px;text-align:center;line-height:32px;border:1px solid #000;margin:0 5px;cursor:pointer}.brandPost_dls_1_0_0__pages li.act,.brandPost_dls_1_0_0__pages li:hover{border:1px solid #fff}@media(max-width: 1180px){.brandPost_dls_1_0_0{padding:20px 0 20px 0}}
</style>
<section class="brandPost_dls_1_0_0 ">
    <div id="modal"></div>
    <div class="brandPost_dls_1_0_0__box">
        <h1 class="brandPost_dls_1_0_0__title"><?php echo the_title(); ?></h1>
        <div class="brandPost_dls_1_0_0__content">
            <?php 
                while ( have_posts() ) : 
                    the_post(); 
			        the_content(); 
			    endwhile; 
            ?>
        </div>
        <div class="brandPost_dls_1_0_0__photo"></div>
        <ul class="brandPost_dls_1_0_0__pages"></ul>
    </div>
</section>
<script>
    let data = [
        <?php 
            $content = get_field( 'single_photo' );
            foreach( $content as $image ):
                echo "
                    {
                        pic: '".$image['url']."',
                        name: '".$image['title']."',
                        des: '".$image['description']."',
                    },
                ";
            endforeach;
        ?>
    ];

    // compoinent bài viết
    const recruitCard = (data) => {
    return `
        <div class="brandPost_dls_1_0_0__item">
            <div class="brandPost_dls_1_0_0__pic">
                <img src="${data.pic}" class="modal-btn" data-modal="modal-pic" alt="">
            </div>
            <div class="brandPost_dls_1_0_0__name">${data.name}</div>
            <div class="brandPost_dls_1_0_0__des">${data.des}</div>
        </div>
    `;
    };

    // compoinent phân trang
    const pageItem = (num) => {
    let act = (num == 1) ? 'act' : '';
    return `<li class='${act}' onclick="showPage(${num})">${num}</li>`;
    }

    // Render dữ liệu bài viết
    const render = (list, count) => {
    document.querySelector(".brandPost_dls_1_0_0__photo").innerHTML = "";
    for (let i = 0; i < list.length; i++) {
        if (i <= count) {
        document.querySelector(".brandPost_dls_1_0_0__photo").innerHTML +=
            recruitCard(list[i]);
        }
    }
    //Call modal
    modalRun(list);
    };

    // Khai báo số bài viết trên trang
    let count = 5

    // Gọi data ban đầu khi load trang
    render(data, count);

    // Render giao diện Phân trang
    const pageSplit = () => {
        let numberPage = Math.ceil(data.length / count);
        console.log(numberPage)
        for (let i = 1; i <= numberPage; i++) {
            document.querySelector('.brandPost_dls_1_0_0__pages').innerHTML += pageItem(i);
        }
    }
    pageSplit();

    // Thuật toán phân Trang
    const getPagenavi = (pageNum) => {
    let newData = [];
    const paginationLimit = 5
    const pageCount = Math.ceil(data.length / paginationLimit);
    let currentPage;
    currentPage = pageNum;

    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;
    data.forEach((item, index) => {
        if (index >= prevRange && index < currRange) {
        newData.push(item)
        }
    });
    return {
        render: newData,
        pageCount: pageCount
    }
    }

    // Gọi dữ liệu Phân Trang
    function showPage(num){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    render(getPagenavi(num).render, count);
    let li = document.querySelectorAll('.brandPost_dls_1_0_0__pages li');
    for(let i = 0; i < li.length; i++){
        li[i].classList.remove('act');
    }
    li[num-1].classList.add('act');
    }

    // compoinent modal popup
    const modalPop = (list, index) => {
    return `
        <div class="modal" id="modal-pic" style="display:flex">
            <div class="modal-closePic">×</div>
            <div class="modal-bg"></div>
            <div class="modal-box modal-box-img animate-zoom">
                <div class="modal-pic" style="text-align:center">
                    <img src="${list[index].pic}" alt="photo">
                </div>
            </div>
        </div>
    `;
    }

    // Methor modal popup
    function modalRun(list){
    const modalItem = document.querySelectorAll('.modal-btn');
    console.log(list);
    modalItem.forEach((item, index)=> {
        // console.log(item)
        item.addEventListener('click', ()=>{
        document.querySelector('#modal').insertAdjacentHTML('beforeend', modalPop(list, index));
        document.querySelector('.modal-closePic').addEventListener('click', () => {
            document.querySelector('#modal').innerHTML = '';
        });
        document.querySelector('.modal-bg').addEventListener('click', () => {
            document.querySelector('#modal').innerHTML = '';
        });
        });
    });
    }
</script>