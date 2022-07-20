let bars = document.querySelector(".fa-bars");
let navControl = document.querySelector(".nav-content .nav-ul");
bars.addEventListener("click", () => {
    bars.classList.toggle("fa-xmark");
    navControl.classList.toggle("active");
});

// Banner Book Imgae Slide
$('#banner_img_slide').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    nextArrow: $(".next"),
    prevArrow: $(".prev"),
    Arrow: false,
})
// Banner Book Image slide end
//For library MandA Slide
$('.music_and_arts_slide').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 500,
    nextArrow: $(".next"),
    prevArrow: $(".prev"),
    Arrow: false,
})
// library MandA Slide End


// Category Slider Start
$('.cate_card_slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    nextArrow: $(".next"),
    prevArrow: $(".prev"),
    Arrow: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ]
})
// Category Slider End



$(".top-ten-book").slick({
    autoplay: true,
    autoplaySpeed: 1000,
    nextArrow: $(".ne"),
    prevArrow: $(".pre"),
});

$(".new-arrive-books").slick({
    autoplay: true,
    autoplaySpeed: 1000,
    nextArrow: $(".ne"),
    prevArrow: $(".pre"),
});

$(".all-shop-books").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    nextArrow: $(".next"),
    prevArrow: $(".prev"),
    Arrow: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});

// Best seller slick
$(".best-seller-stand").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    nextArrow: $(".next"),
    prevArrow: $(".prev"),
    Arrow: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});

// arrived book slick
$(".new-arrived-div").slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    nextArrow: $(".nex"),
    prevArrow: $(".pre"),
    Arrow: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});

// For All book slick
$(".all-books-div").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    nextArrow: $(".nexs"),
    prevArrow: $(".pres"),
    Arrow: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});

// For Blog slick
$(".blogIandC").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 2000,
    nextArrow: $(".nexs"),
    prevArrow: $(".pres"),
    Arrow: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});

// const ayaCopyBtn = document.querySelector('#aya-copy');
// const ayaCopyCode = document.querySelector('#aya-code');
// ayaCopyBtn.addEventListener('click',()=> {
//   const ayaContent = ayaCopyCode.textContent;
//   navigator.clipboard.writeText(ayaContent);
// });

// const kbzCopyBtn = document.querySelector('#kbz-copy');
// const kbzCopyCode = document.querySelector('#kbz-code');

// kbzCopyBtn.addEventListener('click', ()=>{
//   const kbzContent = kbzCopyCode.textContent;
//   navigator.clipboard.writeText(kbzContent);
// });

// const waveCopyBtn = document.querySelector('#wave-copy');
// const waveCopyCode = document.querySelector('#wave-code');

// waveCopyBtn.addEventListener('click', ()=>{
//   const waveContent = waveCopyCode.textContent;
//   navigator.clipboard.writeText(waveContent);
// });
// const kCopyBtn = document.querySelector('#k-copy');
// const kCopyCode = document.querySelector('#k-code');

// kCopyBtn.addEventListener('click', ()=>{
//   const kContent = kCopyCode.textContent;
//   navigator.clipboard.writeText(kContent);
// });

