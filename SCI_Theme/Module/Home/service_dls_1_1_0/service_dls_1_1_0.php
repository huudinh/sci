<?php
    if($check == 0){
        include(locate_template("Module/Home/service_dls_1_1_0/service_dls_1_1_0_css.php")); 
    }
?>      
<section class="service_dls_1_1_0 ">
    <div class="container">
        <div class="main_dls_1_0_0__title fadeInUp load"><?php echo $field['project_title'] ?></div>
        <div class="main_dls_1_0_0__line fadeInUp load"></div>
        <div id="service_dls_1_1_0__content" class="service_dls_1_1_0__content fadeInUp load"></div>
        <div class="service_dls_1_1_0__more fadeInUp load">MORE PROJECTS</div>
    </div>
</section>
    
<script>
    const data = [
        <?php 
            $content = $field['data'];
            foreach( $content as $key => $image ):
                echo '
                    {
                        name: "'.$image['title'].'",
                        place: "'.$image['caption'].'",
                        photo: "'.$image['url'].'",
                        des: "'.$image['description'].'",
                    },
                ';
            endforeach;
        ?>
    ];
    const recruitCard = (data, index) => {
        let itemStyle, textStyle;
        if(index % 2 == 0){
            itemStyle = 'service_dls_1_1_0__item--right';
            textStyle = 'service_dls_1_1_0__text--right';
        } else {
            itemStyle = 'service_dls_1_1_0__item--left';
            textStyle = 'service_dls_1_1_0__text--left';

        }

        index++;

        return `
            <div class="service_dls_1_1_0__item ${itemStyle}">
                <div class="service_dls_1_1_0__pic">
                    <img width="720" height="480" src="${data.photo}" alt="photo" />
                </div>
                <div class="service_dls_1_1_0__text ${textStyle}">
                    <div class="service_dls_1_1_0__num">
                        0${index}.
                    </div>
                    <div class="service_dls_1_1_0__name">
                    ${data.name}
                    </div>
                    <div class="service_dls_1_1_0__place">
                    ${data.place}
                    </div>
                    <div class="service_dls_1_1_0__des">
                    ${data.des}
                    </div>
                </div>
            </div>
        `;
    };

    const noData = `<div>Không có dữ liệu</div>`;
    const render = (data) => {
    if (data.length === 0) {
        document.getElementById("service_dls_1_1_0__content").innerHTML = noData;
        document.getElementsByClassName(
        "service_dls_1_1_0__more"
        )[0].style.display = "none";
    } else {
        function loop(key) {
        document.getElementById("service_dls_1_1_0__content").innerHTML = "";
        for (let i = 0; i < data.length; i++) {
            if (i <= key) {
            document.getElementById("service_dls_1_1_0__content").innerHTML +=
                recruitCard(data[i], i);
            document.getElementsByClassName(
                "service_dls_1_1_0__more"
            )[0].style.display = "table";
            }
            if (key + 2 > data.length) {
            document.getElementsByClassName(
                "service_dls_1_1_0__more"
            )[0].style.display = "none";
            }
        }
        }
        // chay lan dau
        loop(2);
        let count = 2;
        const counter = () => loop((count += 2));
        // xử ly click more
        document
        .getElementsByClassName("service_dls_1_1_0__more")[0]
        .addEventListener("click", () => {
            counter();
            
        });
    }
    };

    // get All Data
    render(data);
</script>