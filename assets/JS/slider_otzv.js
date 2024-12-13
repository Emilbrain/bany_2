'use strict';

const slideContainer = document.querySelector('.slideot-container');
const slides = document.querySelectorAll('.otzv__column');
const prevBtn = document.getElementById('preBtn');
const nextBtn = document.getElementById('nexBtn');

let currentIndex = 0;
const slideWidth = slides[0].clientWidth;
let startX, endX;

function goToNext() {
    const threshold = window.innerWidth > 1300 ? 4 : 3;
    if (currentIndex === slides.length - threshold) {
        currentIndex = 0;
    } else {
        currentIndex++;
    }
    updateSlider();
}

function goToPrev() {
    const threshold = window.innerWidth > 1300 ? 4 : 3;
    if (currentIndex === 0) {
        currentIndex = slides.length - threshold;
    } else {
        currentIndex--;
    }
    updateSlider();
}

function updateSlider() {
    slideContainer.style.transform = `translateX(${-currentIndex * (slideWidth + 50)}px)`;
}

nextBtn.addEventListener('click', goToNext);
prevBtn.addEventListener('click', goToPrev);

window.addEventListener('resize', () => {
    currentIndex = 0;
    updateSlider();
});

if (window.innerWidth < 1300) {
    slideContainer.addEventListener('touchstart', function (e) {
        startX = e.touches[0].pageX;
    });

    slideContainer.addEventListener('touchend', function (e) {
        endX = e.changedTouches[0].pageX;
        handleSwipe(startX, endX);
    });

    function handleSwipe(startX, endX) {
        const swipeDistance = Math.abs(endX - startX);
        if (swipeDistance > 40) {
            if (startX > endX) {
                goToNext();
            } else {
                goToPrev();
            }
        }
    }
}