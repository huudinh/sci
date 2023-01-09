<style>.brandcate_dls_1_0_0{padding:40px 0 20px 0;font-family:var(--primary-font);max-width:85%;margin:0 auto;font-weight:600;text-align:center}.brandcate_dls_1_0_0 img{display:block;max-width:100%;margin:0 auto}.brandcate_dls_1_0_0__content{margin:40px 0;display:flex;flex-wrap:wrap;gap:20px;min-height:330px}.brandcate_dls_1_0_0__nav{list-style:none;padding:0;margin:0;display:flex;justify-content:space-evenly;align-items:baseline}.brandcate_dls_1_0_0__nav li{cursor:pointer;text-align:center;color:#777}.brandcate_dls_1_0_0__nav li.active,.brandcate_dls_1_0_0__nav li:hover{color:#fff}.brandcate_dls_1_0_0__nav li.active img,.brandcate_dls_1_0_0__nav li:hover img{opacity:1}.brandcate_dls_1_0_0__nav li img{opacity:.5}.brandcate_dls_1_0_0__nav p{width:130px}.brandcate_dls_1_0_0__nav img{margin-bottom:10px}.brandcate_dls_1_0_0__item{width:32%;overflow:hidden}.brandcate_dls_1_0_0__item img{width:100%;height:auto;display:block;transition:all .2s linear}.brandcate_dls_1_0_0__item:hover img{filter:grayscale(0);transform:scale(1.05)}@media(max-width: 1280px){.brandcate_dls_1_0_0{max-width:100%}}@media(max-width: 1180px){.brandcate_dls_1_0_0__nav li img{transform:scale(0.77)}.brandcate_dls_1_0_0__item{width:31%}}@media(max-width: 1024px){.brandcate_dls_1_0_0__item{width:31%}.brandcate_dls_1_0_0__nav li img{transform:scale(0.5);margin-bottom:0}.brandcate_dls_1_0_0__nav p{font-size:14px;width:119px}.brandcate_dls_1_0_0__nav{justify-content:center}.brandcate_dls_1_0_0__content{justify-content:space-between}}@media(max-width: 820px){.brandcate_dls_1_0_0__item{width:30%}}@media(max-width: 600px){.brandcate_dls_1_0_0__item{width:100%}.brandcate_dls_1_0_0__nav{flex-wrap:wrap;width:100%;justify-content:space-around}.brandcate_dls_1_0_0__nav p{margin:0}.brandcate_dls_1_0_0{padding:20px 0 0}.brandcate_dls_1_0_0__content{margin-top:20px;gap:10px}}</style>
<?php 
    $path = get_template_directory_uri();
    $path = $path.'/Module/Category/brandcate_dls_1_0_0/';
?>
<section class="brandcate_dls_1_0_0 ">
    <div class="container">
        <ul class="brandcate_dls_1_0_0__nav"></ul>
        <div class="brandcate_dls_1_0_0__content"></div>
    </div>
</section>
<?php
    global $wp_query;
    $this_category = $wp_query->get_queried_object();
        
    if ($this_category->parent == 0) {
        $parent_category_ID = $this_category->term_id;
    }
    else {
        $parent_category_ID = $this_category->parent;
    }
    $taxonomy = 'category';
    $subcategories_ID = get_term_children($parent_category_ID,$taxonomy);
?>
<script>
    let data = [
        <?php
            foreach ( $subcategories_ID as $ID ) {
                $sub_cat = get_term_by( 'id', $ID, $taxonomy);
                $sub_cat_link = get_term_link( $ID, $taxonomy);
                $sub_cat_title = $sub_cat->name;
                $cate_group = get_field( 'cate_group', 'category_'.$ID );
                $img = get_field( 'img_thumb', 'category_'.$ID );
                echo "
                    {
                        pic: '".$img['url']."',
                        name: '".$sub_cat_title."',
                        link: '".$sub_cat_link."',
                        cate: '".$cate_group."'
                    },
                ";
            }
        ?>
    ];

    // Filter Cate
    const cateArr = [];
    for(let i = 0; i < data.length; i++){
        cateArr.push(data[i].cate);
    }

    const removeDuplicates = (array) => { 
        return array.filter((item, index) => array.indexOf(item) === index);
    }
    cateArrNew = removeDuplicates(cateArr);
    
    const cateList = [{
        pos: 1,
        name: 'All',
        link: '<?php echo $path?>images/icon-1.svg'
    }];

    const addCateList = (name, link, index, pos) => {
        cateList[index] = {
            pos: pos,
            name: name,
            link: link
        }
    }

    for(let i = 0; i < cateArrNew.length; i++){
        switch (cateArrNew[i]){
            case 'Kitchen': 
                addCateList(cateArrNew[i], '<?php echo $path ?>images/icon-2.svg', 1);
                break;
            case 'Bathroom':
                addCateList(cateArrNew[i], '<?php echo $path ?>images/icon-4.svg', 2);
                break;
            case 'Furniture':
                addCateList(cateArrNew[i], '<?php echo $path ?>images/icon-3.svg', 3);
                break;
            case 'Tiling':
                addCateList(cateArrNew[i], '<?php echo $path ?>images/icon-6.svg', 4);
                break;
            case 'Door':
                addCateList(cateArrNew[i], '<?php echo $path ?>images/icon-door.svg', 5);
                break;
        }
    }

    // sort to design
    cateList.sort((firstItem, secondItem) => firstItem.pos - secondItem.pos);

    // compoinent card
    const brandCard = (data) => {
        return `
            <div class="brandcate_dls_1_0_0__item">
                <a href="${data.link}"><img src="${data.pic}" alt="${data.name}"></a>
            </div>
        `;
    };

    // compoinent nav
    const brandNav = (name, link, index) => {
        let active = (index == 0) ? 'active' : '';
        return `
            <li class="${active}" onclick="cateFilter('${name}', ${index})">
                <img src="${link}" alt="${name}" /> 
                <p>${name}</p>
            </li>
        `;
    };


    // Render Data
    const renderBrand = (list) => {
        document.querySelector(".brandcate_dls_1_0_0__content").innerHTML = "";
        for (let i = 0; i < list.length; i++) {
            document.querySelector(".brandcate_dls_1_0_0__content").innerHTML += brandCard(list[i]);
        }
    };

    renderBrand(data);

    // Render Nav
    const renderNav = (list) => {
        document.querySelector(".brandcate_dls_1_0_0__nav").innerHTML = "";
        for (let i = 0; i < list.length; i++) {
            document.querySelector(".brandcate_dls_1_0_0__nav").innerHTML += brandNav(list[i].name, list[i].link, i);
        }
    };

    renderNav(cateList);

    function cateFilter(name, index){
        let dataFiter = [];
        for(let i = 0; i < data.length; i++){
            if(data[i].cate == name){
                dataFiter.push(data[i]);
            } else if(name == 'All'){
                dataFiter = data;
            }
        }
        renderBrand(dataFiter);

        let li = document.querySelectorAll('.brandcate_dls_1_0_0__nav li');
        for(let i = 0; i < li.length; i++){
            li[i].classList.remove('active');
        }
        li[index].classList.add('active');
    }
</script>
