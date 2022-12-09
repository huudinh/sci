<?php 
    if($check == 0){
        include(locate_template("Module/Home/slider_dls_1_0_0/sass/slider_dls_1_0_0_css.php"));
    }
?>
<section class="slider_dls_1_0_0">
    <div class="slider__content" >
        <div class="slider__control" >
            <div onclick="changeSlide(-1)" class="slider__controlLeft"></div>
            <div onclick="changeSlide(1)" class="slider__controlRight"></div>
        </div>
    </div>
</section>
<script>
    let slides = [
        <?php
            $rows = $field["slider"];
            foreach($rows as  $row):
                echo "
                    {
                        link:'".$row['sliderItemLink']."',
                        text:'".$row['sliderItemText']."',
                        youtube:'".$row['sliderItemId']."',
                    },
                ";
            endforeach;
        ?>
    ];
    let slideIndex = 0;

    start();

    function start() {
        showSlider(slides);
        changeSlide(0);
    }

    function showSlider(slides) {
        let sliderContent = document.querySelector('.slider__content');
        let slider = document.querySelector('.slider__control');

        /* display/slides holder */
        let display = document.createElement("div");
        display.setAttribute('class', 'display');

        /* dots/indicators controls holder */
        let dots = document.createElement("div");
        dots.setAttribute('class', 'slider__dots');

        for (let i = 0; i < slides.length; i++) {
            if(slides[i].youtube){
                video = `
                    <div class="slider__item" style="padding-bottom:0!important">
                        <div class="slider_dls_1_0_0__video">
                            <iframe src="https://www.youtube.com/embed/${slides[i].youtube}?autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe>
                        </div>            
                    </div>
                `;
            } else {
                video = `
                    <div class="slider__item" style="background-image:url(${slides[i].link});">
                        <div class="slider__text">${slides[i].text}</div>
                    </div>
                `;
            }
            let slide = `
                <div>
                    ${video}
                </div>
            `;
            let dot = `<span class="slider__dot" onclick="showDirect(${i})"></span>`;
            display.innerHTML += slide;
            dots.innerHTML += dot;
        }
        slider.appendChild(display);
        sliderContent.appendChild(dots);
    }


    function changeSlide(n) {
        showDirect(slideIndex += n);
    }

    function showDirect(n) {
        slideIndex = n;
        let i, x = document.getElementsByClassName("slider__item");
        let dots = document.getElementsByClassName("slider__dot");

        if (n > x.length - 1) slideIndex = 0;
        if (n < 0) slideIndex = x.length - 1;
        for (i = 0; i <= x.length - 1; i++) {
            x[i].style.display = "none";
            slideIndex === i ? dots[slideIndex].style.backgroundColor = "#aaa" : dots[i].style.backgroundColor = "rgba(0,0,0,0)"
        }
        x[slideIndex].style.display = "block";
    }
</script>
