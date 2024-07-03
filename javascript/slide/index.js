window.addEventListener('load', () => {
    const slideTrack = document.querySelector('.slide-track');
    const slides = Array.from(document.querySelectorAll('.slide'));
    const slideWidth = slides[0].offsetWidth;
    let currentPosition = 0;

    function animateSlider() {
        currentPosition -= 2; // Speed of the slider

        // Reset position if it reaches the end of the first set of slides
        if (currentPosition <= -slideWidth * (slides.length / 2) + slideWidth) {
            currentPosition = 0;
        }

        slideTrack.style.transform = `translateX(${currentPosition}px)`;
        requestAnimationFrame(animateSlider);
    }

    // Start the animation
    animateSlider();
});
