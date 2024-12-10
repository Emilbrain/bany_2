'use strict';

document.addEventListener('DOMContentLoaded', () => {
    const upperSlider = document.getElementById('upper-slider');
    const lowerSlider = document.getElementById('lower-slider');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    let currentIndexUpper = 0;
    let currentIndexLower = 0;
    let autoSlideInterval;

    function moveSlides() {
        upperSlider.querySelector('.slides').style.transform = `translateX(${-currentIndexUpper * 33.333}%)`;
        lowerSlider.querySelector('.slides').style.transform = `translateX(${currentIndexUpper * 33.333}%)`;
    }

    prevBtn.addEventListener('click', () => {
        clearInterval(autoSlideInterval); 
        currentIndexUpper--;
        currentIndexLower++;

        if (currentIndexUpper < 0) {
            currentIndexUpper = 2;
        }
        if (currentIndexLower > 2) {
            currentIndexLower = 0;
        }

        moveSlides();
    });

    nextBtn.addEventListener('click', () => {
        clearInterval(autoSlideInterval); 
        currentIndexUpper++;
        currentIndexLower--;

        if (currentIndexUpper > 2) {
            currentIndexUpper = 0;
        }
        if (currentIndexLower < 0) {
            currentIndexLower = 2;
        }

        moveSlides();
    });

    autoSlideInterval = setInterval(() => {
        currentIndexUpper++;

        if (currentIndexUpper > 2) {
            currentIndexUpper = 0;
        }
        moveSlides();
    }, 3000);
});