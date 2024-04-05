const inputElement = document.querySelector(".search-input");
const inputValue = localStorage.getItem("inputValue");

if (inputValue) {
    inputElement.value = inputValue;
}

inputElement.addEventListener("input", function () {
    localStorage.setItem("inputValue", this.value);
});

$(document).ready(function () {
    var container = $("#category-container");
    var list = $("#category-list");

    var startIndex = 0;
    var endIndex = 15;
    var numItems = list.find("li").length;

    function updateNavigation() {
        if (startIndex <= 0) {
            $("#prev").prop("disabled", true);
        } else {
            $("#prev").prop("disabled", false);
        }

        if (endIndex >= numItems) {
            $("#next").prop("disabled", true);
        } else {
            $("#next").prop("disabled", false);
        }
    }

    function updateDisplay() {
        var items = list.find("li");
        items.hide();

        if (endIndex >= numItems) {
            startIndex = 0;
            endIndex = 15;
            items.slice(startIndex, endIndex + 1).show();
        }

        if ($(window).width() < 576) {
            // Sử dụng Media Query để ẩn các mục khi kích thước màn hình nhỏ hơn 768px
            endIndex = startIndex + 1;
        } else if ($(window).width() > 576 && $(window).width() < 768) {
            endIndex = startIndex + 5;
        } else if ($(window).width() > 768 && $(window).width() < 992) {
            endIndex = startIndex + 7;
        } else if ($(window).width() > 992 && $(window).width() < 1200) {
            endIndex = startIndex + 9;
        } else if ($(window).width() > 1200 && $(window).width() < 1400) {
            endIndex = startIndex + 13;
        } else {
            endIndex = startIndex + 15;
        }

        items.slice(startIndex, endIndex + 1).show();

        updateNavigation();
    }

    updateDisplay();

    $("#next").click(function () {
        startIndex += 2;
        endIndex += 2;
        updateDisplay();
        updateNavigation();
    });

    $("#prev").click(function () {
        startIndex -= 2;
        endIndex -= 2;
        updateDisplay();
        updateNavigation();
    });

    $(window).resize(function () {
        updateDisplay();
    });
});
var currentSlide = 0;
var slides = document.getElementsByClassName("slide");

function showSlide(slideIndex) {
    if (slideIndex >= slides.length) {
        currentSlide = 0;
    } else if (slideIndex < 0) {
        currentSlide = slides.length - 1;
    }

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[currentSlide].style.display = "block";
}

function prevSlide() {
    currentSlide--;
    showSlide(currentSlide);
}

function nextSlide() {
    currentSlide++;
    showSlide(currentSlide);
}

showSlide(currentSlide);



const getAll_Slide = document.querySelector('.hienthi-all');
const getOne_Slide = document.querySelectorAll('.slider-hienthi .slide');
const getChuyendong = document.querySelector('.slider-chuyendong');
let giu_chuyendong = false;

let tong_Slide = 0;
let id_chuyendong;

function chuyendongSlide(index) {
    giu_chuyendong = true;

    clearInterval(id_chuyendong);

    for (let i = 0; i < getOne_Slide.length; i++) {
        if (i !== index) {
            getOne_Slide[i].style.display = 'none';
        } else {
            getOne_Slide[i].style.display = 'block';
        }
    }

    const kichHoat_Button = getChuyendong.querySelector('.active');
    if (kichHoat_Button) {
        kichHoat_Button.classList.remove('active');
    }
    getChuyendong.querySelectorAll('button')[index].classList.add('active');

    tong_Slide = index;
}

function chuyen_Dong_Cua_Slide() {
    id_chuyendong = setInterval(() => {
        if (!giu_chuyendong) {
            tong_Slide = (tong_Slide + 1) % getOne_Slide.length;
            chuyendongSlide(tong_Slide);
        }
    }, 3000);
}

function dungchuyendong() {
    giu_chuyendong = false;
}

const spans = getChuyendong.querySelectorAll('span');
spans.forEach((span, index) => {
    span.addEventListener('mouseover', () => {
        chuyendongSlide(index);
    });
    span.addEventListener('mouseout', () => {
        dungchuyendong();
    });
});

chuyen_Dong_Cua_Slide();

document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.country-slider');
    const countryList = container.querySelector('.country-list');
    const prevButton = container.querySelector('.btn.btn-prev1');
    const nextButton = container.querySelector('.btn.btn-next1');

    const countryItems = countryList.querySelectorAll('li');
    const countryCount = countryItems.length;
    const displayCount = 8;
    let currentIndex = 0;

    // Ẩn các quốc gia ban đầu nằm ngoài phạm vi hiển thị
    for (let i = displayCount; i < countryCount; i++) {
        countryItems[i].style.display = 'none';
    }

    // Xử lý khi nhấn nút Previous
    prevButton.addEventListener('click', function() {
        if (currentIndex > 0) {
            countryItems[currentIndex + displayCount - 1].style.display = 'none';
            countryItems[currentIndex - 1].style.display = 'list-item';
            currentIndex--;
        }
    });

    // Xử lý khi nhấn nút Next
    nextButton.addEventListener('click', function() {
        if (currentIndex + displayCount < countryCount) {
            countryItems[currentIndex].style.display = 'none';
            countryItems[currentIndex + displayCount].style.display = 'list-item';
            currentIndex++;
        }
    });
});

window.addEventListener("scroll", function () {
    var navbar = document.getElementById("navbar");
    var navbarHidden = document.getElementById("navbar-hidden");
  
    if (window.pageYOffset > 0) {
      navbar.style.display = "none";
      navbarHidden.style.display = "block";
    } else {
      navbar.style.display = "block";
      navbarHidden.style.display = "none";
    }
  });

  window.addEventListener("scroll", function () {
    var search = document.getElementById("search-container");
    if (window.pageYOffset > 0) {
        search.style.display = "none";
    } else {
        search.style.display = "block";  
    }
  });

  document.getElementById("myRange").addEventListener("input", function() {
    if (this.value == 100) {
        this.disabled = true; // Ngăn chặn việc kéo lại khi đạt giá trị 100
    }
});


