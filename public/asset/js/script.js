feather.replace({
    'aria-hidden': 'true'
});

$(".togglePassword").click(function (e) {
    e.preventDefault();
    let type = $(this).parent().parent().find(".password").attr("type");
    console.log(type);
    if (type == "password") {
        $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
        $(this).parent().parent().find(".password").attr("type", "text");
    } else if (type == "text") {
        $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
        $(this).parent().parent().find(".password").attr("type", "password");
    }
});

(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
        let position = window.scrollY + 200
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) return
            let section = select(navbarlink.hash)
            if (!section) return
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarlink.classList.add('active')
            } else {
                navbarlink.classList.remove('active')
            }
        })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select('#header')
        let offset = header.offsetHeight

        if (!header.classList.contains('header-scrolled')) {
            offset -= 20
        }

        let elementPos = select(el).offsetTop
        window.scrollTo({
            top: elementPos - offset,
            behavior: 'smooth'
        })
    }

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add('header-scrolled')
            } else {
                selectHeader.classList.remove('header-scrolled')
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * Mobile nav toggle
     */
    on('click', '.mobile-nav-toggle', function (e) {
        select('#navbar').classList.toggle('navbar-mobile')
        this.classList.toggle('bi-list')
        this.classList.toggle('bi-x')
    })

    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function (e) {
        if (select('#navbar').classList.contains('navbar-mobile')) {
            e.preventDefault()
            this.nextElementSibling.classList.toggle('dropdown-active')
        }
    }, true)

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on('click', '.scrollto', function (e) {
        if (select(this.hash)) {
            e.preventDefault()

            let navbar = select('#navbar')
            if (navbar.classList.contains('navbar-mobile')) {
                navbar.classList.remove('navbar-mobile')
                let navbarToggle = select('.mobile-nav-toggle')
                navbarToggle.classList.toggle('bi-list')
                navbarToggle.classList.toggle('bi-x')
            }
            scrollto(this.hash)
        }
    }, true)

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash)
            }
        }
    });

    /**
     * Preloader
     */
    let preloader = select('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove()
        });
    }

    /**
     * Initiate glightbox
     */
    const glightbox = GLightbox({
        selector: '.glightbox'
    });

    /**
     * Initiate gallery lightbox 
     */
    const galleryLightbox = GLightbox({
        selector: '.gallery-lightbox'
    });

    /**
     * Testimonials slider
     */
    new Swiper('.testimonials-slider', {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });

    /**
     * Animation on scroll
     */
    window.addEventListener('load', () => {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        })
    });

    /**
     * Initiate Pure Counter 
     */
    new PureCounter();

});
// ini card
$(document).ready(function () {

    // Lift card and show stats on Mouseover
    $('#product-card').hover(function () {
        $(this).addClass('animate');
        $('div.carouselNext, div.carouselPrev').addClass('visible');
    }, function () {
        $(this).removeClass('animate');
        $('div.carouselNext, div.carouselPrev').removeClass('visible');
    });

    // Flip card to the back side
    $('#view_details').click(function () {
        $('div.carouselNext, div.carouselPrev').removeClass('visible');
        $('#product-card').addClass('flip-10');
        setTimeout(function () {
            $('#product-card').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo(80, 1, function () {
                $('#product-front, #product-front div.shadow').hide();
            });
        }, 50);

        setTimeout(function () {
            $('#product-card').removeClass('flip90').addClass('flip190');
            $('#product-back').show().find('div.shadow').show().fadeTo(90, 0);
            setTimeout(function () {
                $('#product-card').removeClass('flip190').addClass('flip180').find('div.shadow').hide();
                setTimeout(function () {
                    $('#product-card').css('transition', '100ms ease-out');
                    $('#cx, #cy').addClass('s1');
                    setTimeout(function () {
                        $('#cx, #cy').addClass('s2');
                    }, 100);
                    setTimeout(function () {
                        $('#cx, #cy').addClass('s3');
                    }, 200);
                    $('div.carouselNext, div.carouselPrev').addClass('visible');
                }, 100);
            }, 100);
        }, 150);
    });

    // Flip card back to the front side
    $('#flip-back').click(function () {

        $('#product-card').removeClass('flip180').addClass('flip190');
        setTimeout(function () {
            $('#product-card').removeClass('flip190').addClass('flip90');

            $('#product-back div.shadow').css('opacity', 0).fadeTo(100, 1, function () {
                $('#product-back, #product-back div.shadow').hide();
                $('#product-front, #product-front div.shadow').show();
            });
        }, 50);

        setTimeout(function () {
            $('#product-card').removeClass('flip90').addClass('flip-10');
            $('#product-front div.shadow').show().fadeTo(100, 0);
            setTimeout(function () {
                $('#product-front div.shadow').hide();
                $('#product-card').removeClass('flip-10').css('transition', '100ms ease-out');
                $('#cx, #cy').removeClass('s1 s2 s3');
            }, 100);
        }, 150);

    });


    /* ----  Image Gallery Carousel   ---- */

    var carousel = $('#carousel ul');
    var carouselSlideWidth = 335;
    var carouselWidth = 0;
    var isAnimating = false;

    // building the width of the casousel
    $('#carousel li').each(function () {
        carouselWidth += carouselSlideWidth;
    });
    $(carousel).css('width', carouselWidth);

    // Load Next Image
    $('div.carouselNext').on('click', function () {
        var currentLeft = Math.abs(parseInt($(carousel).css("left")));
        var newLeft = currentLeft + carouselSlideWidth;
        if (newLeft == carouselWidth || isAnimating === true) {
            return;
        }
        $('#carousel ul').css({
            'left': "-" + newLeft + "px",
            "transition": "300ms ease-out"
        });
        isAnimating = true;
        setTimeout(function () {
            isAnimating = false;
        }, 300);
    });

    // Load Previous Image
    $('div.carouselPrev').on('click', function () {
        var currentLeft = Math.abs(parseInt($(carousel).css("left")));
        var newLeft = currentLeft - carouselSlideWidth;
        if (newLeft < 0 || isAnimating === true) {
            return;
        }
        $('#carousel ul').css({
            'left': "-" + newLeft + "px",
            "transition": "300ms ease-out"
        });
        isAnimating = true;
        setTimeout(function () {
            isAnimating = false;
        }, 300);
    });
});

// ganti gambar