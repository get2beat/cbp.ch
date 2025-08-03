import $ from 'jquery';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
gsap.registerPlugin(ScrollTrigger);

import { ScrollToPlugin } from 'gsap/all';
gsap.registerPlugin(ScrollToPlugin);

import Masonry from "masonry-layout";
import jQueryBridget from 'jquery-bridget';
import imagesLoaded from 'imagesloaded';

jQueryBridget('masonry', Masonry, $);
jQueryBridget( 'imagesLoaded', imagesLoaded, $ );

//IE11
if (!!window.MSInputMethodContext && !!document.documentMode) { document.body.classList.add("IE11") };

//document ready
$(function() {


    let body = $('body');
    $(window).on('resize', function () {
        if ($(window).width() <= 1280) {
            $(body).removeClass("isDesktop").addClass("isMobile");
        } else {
            $(body).removeClass("isMobile").addClass("isDesktop");
        }
    });
    if ($(window).width() <= 1280) {
        $(body).removeClass("isDesktop").addClass("isMobile");
    } else {
        $(body).removeClass("isMobile").addClass("isDesktop");
    }

    $('#hamburger-open').click( function() {
        body.addClass('m-nav-open');
        $('#menu-mobile').show();
    });
    $('#hamburger-close').click( function() {
        body.removeClass('m-nav-open');
        $('#menu-mobile').hide();
    });

    $('#websharebutton').on('click', function (e) {
        e.preventDefault();
        $('#shareicons').addClass('active');
    });

    function setNavigationTop(swiper) {
        let slide = swiper.slides[swiper.activeIndex];
        let img = $(slide).find('img, video');

        if (img.length === 0) return;

        let imgHeight = img.height();
        let value = imgHeight / 2;

        let button = $(img).closest(".swiper-container").find(".swiper-button-img");
        button.css('top', value + 'px'); // Korrekte Methode, um Style zu setzen
    }


    var galerieSwiper = null;
    //galerie slider
    if ($('.swiper-container__galerie').length) {
        galerieSwiper = new Swiper('.swiper-container__galerie', {
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            direction: 'horizontal',
            loop: false,
            allowTouchMove: true,
            autoHeight: true,
            autoplay: {
                delay: 4000,
            },
            speed: 1500,
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            on: {
                slideChange: function (swiper) {
                    $(swiper.slides.eq(swiper.previousIndex)).find('.m-slide__link').hide();
                    $(swiper.slides.eq(swiper.activeIndex)).find('.m-slide__link').show();
                },
                init: function (swiper) {
                    if (swiper.slides.length <= 1) {
                        swiper.params.loop = false;
                        swiper.params.autoplay = false;
                        swiper.params.pagination = false;
                    }
                },
            },
        })
    }

    var karussellSwiper = null;

    if ($('.swiper-container__karussell').length) {
        karussellSwiper = new Swiper('.swiper-container__karussell', {

            slidesPerView: 1,
            spaceBetween: 30,
            slidesPerGroup: 1,
            loop: false,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }

        })
    }



    var bildtextSlider = null;

    if ($('.swiper-container__bildtextSlider').length) {
        bildtextSlider = new Swiper('.swiper-container__bildtextSlider', {
            slidesPerView: 1,
            spaceBetween: 20,
            slidesPerGroup: 1,
            loop: true,
            autoplay: {
                delay: 4000,
            },
            speed: 1000,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            /*
            autoplay: {
                delay: 4000,
            },
            speed: 1500,
             */
        })
    }





    /* ext:project */
    let galerieFixheightSwiper = null;
    //galerie slider
    if ($('.m-modul-galerieslider').length) {
        $( ".m-modul-galerieslider" ).each(function( index ) {
            let sliderID = $(this).attr('id')
            galerieFixheightSwiper = new Swiper('.swiper-container__fixheight-'+sliderID, {
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                direction: 'horizontal',
                loop: false,
                allowTouchMove: true,
                //autoHeight: 640,
                autoplay: {
                    delay: 4000,
                },
                speed: 1500,
                slidesPerView: 1,
                breakpoints: {
                    640: {
                        pagination: {
                            el: '.swiper-slider-pagination',
                            type: 'bullets',
                            clickable: true
                        },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    },
                },
                lazy: {
                    // Native Lazy Loading aktivieren
                    enabled: true,
                    // Bilder laden, bevor sie sichtbar werden
                    loadPrevNext: true,
                    // Anzahl der Bilder vor/nach aktuellem Slide vorladen
                    loadPrevNextAmount: 1
                },
                preloadImages: false,
                on: {
                    slideChange: function (swiper) {
                        $(swiper.slides[swiper.activeIndex]).find('.m-slide__link').show();
                    },
                    init: function (swiper) {
                        if (swiper.slides.length <= 1) {
                            swiper.params.loop = false;
                            swiper.params.autoplay = false;
                            swiper.params.pagination = false;
                        }

                        setNavigationTop(swiper)

                        $(window).on('orientationchange', function() {
                            setNavigationTop(swiper)
                        });

                        $(window).on('resize', function(){
                            clearTimeout(resizeTimeout);
                            let resizeTimeout = setTimeout(() => {
                                setNavigationTop(swiper);
                            }, 100); // Warte kurz, um zu vermeiden, dass die Funktion zu oft aufgerufen wird
                        });
                    },
                },
            })
        })
    }


    /* team search result */
    if ($('#news-search-result').length) {
        $('.m-news-list').hide();
        $('.m-result-filter').show();
        gsap.to(window,{scrollTo:{y:"#m-form-teamserach-anker", offsetY:200}});
    } else {
        if ($('#m-form-teamserach-anker').length) {
            if(window.location.hash) {
                gsap.to(window,{scrollTo:{y:"#m-form-teamserach-anker", offsetY:200}});
            }
            $('.m-news-list').show();
            $('.m-result-filter').hide();
        }
    }



    //video content
    $('.m-videoPlayContent').click( function(e) {
        let video = $(this).closest('section').find('video');
        let container = video.parent();
        $(this).fadeOut();
        container.removeClass('m-video__container');
        video.trigger('play');
        video.attr("controls","controls");
    });


    //nav
    $( ".m-nav__inner > ul > li").hover(

        function(e) {
            if($(e.target).find('> a').hasClass('has-children'))
            {
                $("header").addClass("active");
            }
        }, function() {
            $("header").removeClass("active");
        }
    );

    /* dropdown selectbox*/
    $( ".dropdown").hover(
        function(e) {
            if(
                $(e.target).hasClass('has-children') ||
                ($(e.target).find('> a').hasClass('has-children'))
            )
            {
                $(".m-extendable").addClass("active");
            }
        },
        function() {
            $(".m-extendable").removeClass("active");
        }
    );

    // m-modul-accordeon
    const items = gsap.utils.toArray(".m-modul-accordeon");
    let lastItem;
    items.forEach((item, i) => {
        item.tl = gsap.timeline({
            paused: true,
            onStart: () => item.classList.add("active")
        })
            .to(item.querySelector(".m-content-wrapper"), {
                duration: 1,

            })
            .from(item.querySelectorAll(".m-content"), {
                duration: 0.5,
                y: -40,
                opacity: 0,
                stagger: 0.25,
                //ease: "expo"
                ease: "power2.out",
            }, 0.25);

        item.addEventListener("click", e => {
            // Reverse the other animations
            items.forEach(myItem => myItem.tl.reverse());
            if(lastItem) {
                lastItem.classList.remove("active")
            }
            if(typeof lastItem === "undefined"
                || (lastItem && !lastItem.isSameNode(item))) {
                // Play the clicked item's animation
                item.tl.play();

                lastItem = item;
            } else {
                lastItem = undefined;
            }
        });
    });





    //accordeon all
/*
    $('.m-modul-accordeon header').on('click', function(e) {
        $(e.currentTarget).parent().toggleClass( "active" );
    });
*/


    //map
    // Google Maps
    if($('.m-map').length){
        initMap();
    }

    $("#m-contact").on("click", function() {
        gsap.to(window,{duration: 0.001, scrollTo:{y:"#m-footer", offsetY:0}});
    });
    $("#m-contact-mobile").on("click", function() {
        body.removeClass('m-nav-open');
        $('#menu-mobile').hide();
        gsap.to(window,{duration: 0.001, scrollTo:{y:"#m-footer", offsetY:0}});
    });




    let movefromleft = gsap.utils.toArray('.m-hover');

    movefromleft.forEach(elem => {
        elem.addEventListener("mouseenter", () => {
            gsap.from(elem, {
                clearProps:"all",
                stagger: 0.2,
                top: 0,
                left: 0,
                duration: 0.5
            })
            gsap.to(elem, {
                clearProps:"all",
                stagger: 0.2,
                autoAlpha: 1,
                duration: 0.5,
                top: 0, left: "100%", xPercent: -100, yPercent: 0,
                ease: "power2.out",
            })
        });


    });




    //animation container element
    let revealcontainer = gsap.utils.toArray('.revealcontainer');

    revealcontainer.forEach(elem => {
        let revealcontainerelem = $(elem).find('.revealcontainerelem');

        gsap.from(revealcontainerelem, {
            stagger: 0.2,
            y: 50,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
        gsap.to(revealcontainerelem, {
            stagger: 0.2,
            autoAlpha: 1,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
    });

    //animation single element
    let revealelements = gsap.utils.toArray('.revealelem');

    revealelements.forEach(elem => {

        gsap.from(elem, {
            clearProps:"all",
            stagger: 0.2,
            y: 50,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
        gsap.to(elem, {
            clearProps:"all",
            stagger: 0.2,
            autoAlpha: 1,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
    });

    //animation single element - width
    let revealelementswidth = gsap.utils.toArray('.revealelemwitdh');

    revealelementswidth.forEach(elem => {

        gsap.from(elem, {
            clearProps:"all",
            width: "10%",
            duration: 0.75,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
    });



    // Animation from site Config
    // check if is News
    let isNews = gsap.utils.toArray('.animationcontainer');
    let animationcontainer = '';
    let stager = '';
    if (isNews.length > 0) {
        animationcontainer = isNews;
        stager = 0.5;
    }

    //animation single element - fade
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animatefade');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimatefade');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 2.5,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });

    //animation single element - zoom
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animatezoom');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimatezoom');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            scale: 0.5,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 1.5,
            scale: 1,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });

    //animation single element - rotate x
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animaterotatex');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimaterotatex');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            scale: 0.5,
            rotationX: 180,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 1.5,
            rotationX: 0,
            scale: 1,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });
    //animation single element - rotate y
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animaterotatey');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimaterotatey');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            scale: 0.5,
            rotationY: 180,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 1.5,
            rotationY: 0,
            scale: 1,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });


    /* ext:projects ajax */

    $(".m-filter-radio").on("click", function() {
        $("input.m-search").val('');
    });

    if ($('.m-search').length) {

        gsap.to(".m-search", {
            scrollTrigger: {
                trigger: ".m-search",
                onEnter: typePlaceholder
            }
        });
    }

    function typePlaceholder(){
        var speed = 100;
        var placeholderTextParts = $('.m-search').attr('placeholder').split('');
        $('.m-search').attr('placeholder','');
        var curIndex = 0;
        function addToPlaceholder(){
            var curVal = $(".m-search").attr("placeholder");
            $(".m-search").attr("placeholder", curVal + placeholderTextParts[curIndex]  );
            curIndex++;
            if( curIndex < placeholderTextParts .length ){
                setTimeout( addToPlaceholder , speed );
            }
        }
        setTimeout( addToPlaceholder , 500 );
    }

    $(".m-filter-radio label").on("click", function() {
        $(".m-filter-radio label").removeClass('active');
        $(this).addClass('active');
    });

        var form = $('#ajaxlist-form');
        var selectForm = $('.ajaxFormOption');
        var resultContainer = $('#ajaxCallResult');
        var service = {
            ajaxCall: function (data) {
                $.ajax({
                    url: '/',
                    cache: false,
                    data: data.serialize(),
                    success: function (result) {
                        //console.log('URL:', this.url); // Protokolliert die URL
                        //console.log(result);
                        resultContainer.html(result).fadeIn('fast');
                        /* mansory projects list */
                        //masonry
                        var elements = document.getElementsByClassName('m-grid');
                        var msnry;

                        imagesLoaded( document.querySelector('#ajaxCallResult'), function() {
                            // init Isotope after all images have loaded
                            var n = elements.length;
                            for(var i = 0; i < n; i++){
                                msnry = new Masonry( elements[i], {
                                    itemSelector: '.m-grid-item',
                                    initLayout: true
                                });
                            }
                        });


                        /*
                        const $container = $('.m-grid');
                        //const $container = $($.parseHTML(result)).filter(".m-grid");
                        //const $container = $('.m-grid').html(result);

                        $container.imagesLoaded(() => {
                            const grid = document.querySelector('.m-grid')
                            const msnry = new Masonry(grid, {
                                itemSelector: '.m-grid-item',
                                initLayout: true
                            })
                            msnry.once('layoutComplete', () => {
                                grid.classList.add('load');
                            })
                            msnry.layout()
                        });
                         */

                    },
                    error: function (jqXHR, textStatus, errorThrow) {
                        resultContainer.html('Ajax request - ' + textStatus + ': ' + errorThrow).fadeIn('fast');
                    }
                });
            }
        };
        form.submit(function (ev) {
            ev.preventDefault();
            service.ajaxCall($(this));
        });
        /*
        selectForm.on('change', function () {

            resultContainer.fadeOut('fast');
            form.submit();
        });
         */
        selectForm.on("click", function() {
            form.submit();
        });
        if ($('.m-projects-list').length) {
            $('#check-0').attr('checked', 'checked');
            form.submit();
        }

});


function initMap() {

    var mapContainer = document.getElementsByClassName('m-map')[0];
    var mapLng = parseFloat(mapContainer.getAttribute('data-lng'));
    var mapLat = parseFloat(mapContainer.getAttribute('data-lat'));
    var markerSrc = mapContainer.getAttribute('data-marker-src');

    // Standort von Miux AG
    var location = {lat: mapLat, lng: mapLng};
    // The map, centered at Uluru
    var map = new google.maps.Map(mapContainer, {
        zoom: 17,
        mapTypeControl: false,
        streetViewControl: false,
        center: location,
        styles:
            [
                {
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#bdbdbd"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#181818"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#1b1b1b"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#2c2c2c"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#8a8a8a"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#373737"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#3c3c3c"
                        }
                    ]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#4e4e4e"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#3d3d3d"
                        }
                    ]
                }
            ]});

    setMarkers(map, location);

}

function setMarkers(map, location) {


    let markerColor = encodeURIComponent("#ffffff");

    // Marker
    var image = {
        url: 'data:image/svg+xml;charset=utf-8,%3Csvg%20width%3D%2256%22%20height%3D%2269%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%3E%3Cdefs%3E%3Cfilter%20x%3D%22-50%25%22%20y%3D%22-50%25%22%20width%3D%22200%25%22%20height%3D%22200%25%22%20filterUnits%3D%22objectBoundingBox%22%20id%3D%22a%22%3E%3CfeOffset%20dx%3D%225%22%20dy%3D%225%22%20in%3D%22SourceAlpha%22%20result%3D%22shadowOffsetOuter1%22%2F%3E%3CfeGaussianBlur%20stdDeviation%3D%225%22%20in%3D%22shadowOffsetOuter1%22%20result%3D%22shadowBlurOuter1%22%2F%3E%3CfeColorMatrix%20values%3D%220%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200.5%200%22%20in%3D%22shadowBlurOuter1%22%2F%3E%3C%2Ffilter%3E%3Cpath%20d%3D%22M643.023%20196.002a6.978%206.978%200%20116.978-6.977%206.978%206.978%200%2001-6.978%206.977m18.026-6.978c0-9.938-8.086-18.024-18.026-18.024-9.938%200-18.023%208.086-18.023%2018.024%200%205.881%203.06%2010.244%208.137%2017.473%202.597%203.697%205.824%208.294%209.387%2014.221a.588.588%200%2000.5.282c.204%200%20.393-.11.5-.282%203.564-5.927%206.79-10.524%209.388-14.22%205.075-7.23%208.137-11.593%208.137-17.474%22%20id%3D%22b%22%2F%3E%3C%2Fdefs%3E%3Cg%20fill%3D%22'+markerColor+'%22%20transform%3D%22translate%28-620%20-166%29%22%20fill-rule%3D%22evenodd%22%3E%3Cuse%20filter%3D%22url%28%23a%29%22%20xlink%3Ahref%3D%22%23b%22%2F%3E%3Cuse%20xlink%3Ahref%3D%22%23b%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E',
        size: new google.maps.Size(56, 69),
        scaledSize: new google.maps.Size(56, 69),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(23, 56)
    }

    var marker = new google.maps.Marker({
        position: location,
        map: map,
        icon: image
    });
}
