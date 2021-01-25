window.addEventListener('DOMContentLoaded', function() {
    headerWidth();    
    headerBurgerSwitch();
    headerScroll();
    headerMobile();  
    sliderGallery();  
    lazyload();
    specificationMove();
    wpPageNaviArrows();
    sliderWorks();
    sliderPartners();
});

window.addEventListener('resize' , function() {
    headerWidth();
    headerMobile();
});

window.addEventListener('scroll', function(){
    headerScroll();
    headerHero();
});

function headerWidth()  {
    if(window.innerWidth < 1510) {

        console.log(window.innerWidth);
        let headerMenu = document.querySelector('.header__menu');

        let headerInner = document.querySelector('.header__inner');

        headerMenu.classList.add('header__menu--sub');

        headerInner.parentElement.appendChild(headerMenu);
    }
}

function headerBurgerSwitch() {
    let headerBurger = document.querySelector('.header__burger');

    headerBurger.addEventListener('click', function(e) {
        let elem = this;

        if(elem.classList.contains('header__burger--active')) {
            elem.classList.remove('header__burger--active');
            headerMenuSwitch(false);
        } else {
            elem.classList.add('header__burger--active');
            headerMenuSwitch(true);
        }
    });
}

function headerMenuSwitch(a) {
    let show = a;
    if(document.querySelector('.header__menu--sub')) {
        let headerMenu = document.querySelector('.header__menu--sub');

        if (show) {
            headerMenu.classList.add('header__menu--show');
        } else {
            headerMenu.classList.remove('header__menu--show');
        }
    }
    
    
}

function headerScroll() {    
    let header = document.querySelector('.header');
    let headerBurger = document.querySelector('.header__burger');

    if(window.pageYOffset > 30) {
        header.classList.add('header--scroll');
        headerBurger.classList.remove('header__burger--active');
        headerBurger.classList.remove('header__burger--hidden');
        headerMenuSwitch(false);
        
    } else { 
        header.classList.remove('header--scroll');

        if(window.innerWidth > 991) {
            headerMenuSwitch(true);   
        }
             
        headerBurger.classList.add('header__burger--hidden');
    }
}

function headerMobile() {
    if(window.innerWidth < 991) {
        let parentElements = document.querySelectorAll('.header__menu-parent');

        for (let i = 0; i < parentElements.length; i++) {
            let element = parentElements[i];
            let elementLink = element.querySelector('.header__menu-link');
            let elementSub = element.querySelector('.header__menu-sub');
            let elementWrap = document.createElement('span');
            let elementArrow = document.createElement('button');
            
            elementWrap.classList.add('header__menu-link-wrapper');
            elementArrow.classList.add('header__menu-arrow');
            
            elementWrap.appendChild(elementLink);
            elementWrap.appendChild(elementArrow);

            element.appendChild(elementWrap);       
            
            elementArrow.addEventListener('click', function() {
                let submenu = this.parentElement.parentElement.querySelector('.header__menu-sub'); 

                if(submenu.classList.contains('header__menu-sub--active')) {
                    this.classList.remove('header__menu-arrow--active');
                    submenu.classList.remove('header__menu-sub--active');
                } else {
                    submenu.classList.add('header__menu-sub--active');
                    this.classList.add('header__menu-arrow--active');
                }
            });
        }

        if(window.innerWidth < 767) {
            let headerContacts = document.querySelector('.header__contacts');
            let headerMenu = document.querySelector('.header__menu'); 

            headerMenu.appendChild(headerContacts);
        }
    }
}

function sliderGallery() {
    if(document.querySelector('.product__gallery-max')) {
        $('.product__gallery-max').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.product__gallery-min'
          });
          $('.product__gallery-min').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.product__gallery-max',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            nextArrow: '.product__gallery-buttons-next',
            prevArrow: '.product__gallery-buttons-prev',
            responsive: [		
                {
                    breakpoint: 1510,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 1240,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 3,
                        centerMode: true,
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 3,
                        centerMode: true,
                    }
                },
               
            ]
          });
          
          $('.product-subitems__list-color').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            nextArrow: '.product-subitems__buttons-color-next',
            prevArrow: '.product-subitems__buttons-color-prev',
            responsive: [		
                {
                    breakpoint: 1510,
                    settings: {
                        slidesToShow: 5,
                    }
                },
                {
                    breakpoint: 1240,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 4,
                    }
                },
            ]
          }); 

          $('.product-subitems__list-floor').slick({
            slidesToShow: 6,
            slidesToScroll: 6,
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            nextArrow: '.product-subitems__buttons-floor-next',
            prevArrow: '.product-subitems__buttons-floor-prev',
            responsive: [		
                {
                    breakpoint: 1510,
                    settings: {
                        slidesToShow: 5,
                    }
                },
                {
                    breakpoint: 1240,
                    settings: {
                        slidesToShow: 4,
                    }
                },
            ]
          });

          $('.product-subitems__list-model').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            nextArrow: '.product-subitems__buttons-model-next',
            prevArrow: '.product-subitems__buttons-model-prev',
            responsive: [		
                {
                    breakpoint: 1510,
                    settings: {
                        slidesToShow: 3,
                    }
                },
               
            ]
          });
          
          
    }
}

function specificationMove() {
    if(document.querySelector('.specifications')) {
        if(window.innerWidth < 992 && window.innerWidth > 767) {
            let specItem = document.querySelector('.specifications');
            let productContainer = document.querySelector('.product__inner').parentElement;

            productContainer.appendChild(specItem);
        }
    }
}

function wpPageNaviArrows() {
    if(document.querySelector('.nextpostslink') && !document.querySelector('.previouspostslink')) {
        let wppagenavi = document.querySelector('.wp-pagenavi');

        document.querySelector('.nextpostslink').innerHTML = '<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"> <circle r="12.5" transform="matrix(-1 0 0 1 12.5 12.5)" fill="#009A9F"/> <path d="M16.6021 13.225C17.1326 12.7906 17.1326 12.0863 16.6021 11.6518L11.319 7.3258C10.7885 6.8914 9.92839 6.8914 9.39788 7.3258C8.86737 7.7602 8.86737 8.46451 9.39788 8.89891L14.681 13.225C15.2115 13.6594 16.0716 13.6594 16.6021 13.225Z" fill="white"/> <path d="M9.39788 17.6742C8.86737 17.2398 8.86737 16.5355 9.39788 16.1011L14.681 11.775C15.2115 11.3406 16.0716 11.3406 16.6021 11.775C17.1326 12.2094 17.1326 12.9137 16.6021 13.3482L11.319 17.6742C10.7885 18.1086 9.92839 18.1086 9.39788 17.6742Z" fill="white"/> </svg>';

        let arrow = document.createElement('span');
        arrow.classList.add('previouspostslink');
        arrow.innerHTML = '<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"> <circle cx="12.5" cy="12.5" r="12.5" fill="#009A9F"/> <path d="M8.39788 13.225C7.86737 12.7906 7.86737 12.0863 8.39788 11.6518L13.681 7.3258C14.2115 6.8914 15.0716 6.8914 15.6021 7.3258C16.1326 7.7602 16.1326 8.46451 15.6021 8.89891L10.319 13.225C9.7885 13.6594 8.92838 13.6594 8.39788 13.225Z" fill="#FDFDFD"/> <path d="M15.6021 17.6742C16.1326 17.2398 16.1326 16.5355 15.6021 16.1011L10.319 11.775C9.7885 11.3406 8.92838 11.3406 8.39788 11.775C7.86737 12.2094 7.86737 12.9137 8.39788 13.3482L13.681 17.6742C14.2115 18.1086 15.0716 18.1086 15.6021 17.6742Z" fill="#FDFDFD"/> </svg>';

        wppagenavi.appendChild(arrow);
    }

    if(document.querySelector('.previouspostslink') && !document.querySelector('.nextpostslink')) {
        let wppagenavi = document.querySelector('.wp-pagenavi');

        document.querySelector('.previouspostslink').innerHTML ='<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"> <circle cx="12.5" cy="12.5" r="12.5" fill="#009A9F"/> <path d="M8.39788 13.225C7.86737 12.7906 7.86737 12.0863 8.39788 11.6518L13.681 7.3258C14.2115 6.8914 15.0716 6.8914 15.6021 7.3258C16.1326 7.7602 16.1326 8.46451 15.6021 8.89891L10.319 13.225C9.7885 13.6594 8.92838 13.6594 8.39788 13.225Z" fill="#FDFDFD"/> <path d="M15.6021 17.6742C16.1326 17.2398 16.1326 16.5355 15.6021 16.1011L10.319 11.775C9.7885 11.3406 8.92838 11.3406 8.39788 11.775C7.86737 12.2094 7.86737 12.9137 8.39788 13.3482L13.681 17.6742C14.2115 18.1086 15.0716 18.1086 15.6021 17.6742Z" fill="#FDFDFD"/> </svg>' ;

        let arrow = document.createElement('span');
        arrow.classList.add('nextpostslink');
        arrow.innerHTML = '<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"> <circle r="12.5" transform="matrix(-1 0 0 1 12.5 12.5)" fill="#009A9F"/> <path d="M16.6021 13.225C17.1326 12.7906 17.1326 12.0863 16.6021 11.6518L11.319 7.3258C10.7885 6.8914 9.92839 6.8914 9.39788 7.3258C8.86737 7.7602 8.86737 8.46451 9.39788 8.89891L14.681 13.225C15.2115 13.6594 16.0716 13.6594 16.6021 13.225Z" fill="white"/> <path d="M9.39788 17.6742C8.86737 17.2398 8.86737 16.5355 9.39788 16.1011L14.681 11.775C15.2115 11.3406 16.0716 11.3406 16.6021 11.775C17.1326 12.2094 17.1326 12.9137 16.6021 13.3482L11.319 17.6742C10.7885 18.1086 9.92839 18.1086 9.39788 17.6742Z" fill="white"/> </svg>';

        wppagenavi.appendChild(arrow);
    }
}

function headerHero() {
    if(window.pageYOffset > 30) {
        if(document.querySelector('.section-hero')) {
            document.querySelector('.header').classList.remove('header--hero');
        }
    } else {
        if(document.querySelector('.section-hero')) {
            document.querySelector('.header').classList.add('header--hero');
        }
    }
    
}

function sliderWorks() {
    if(document.querySelector('.works__side-item')) {
        $('.works__side-flow').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: true,
            asNavFor: '.works__main-flow'
          });
          $('.works__main-flow').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.works__side-flow',
            dots: false,
            arrows: false,
            centerMode: false,
            focusOnSelect: true,
          });         
        
          
    }
}


function sliderPartners() {
    if(document.querySelector('.partners__flow')) {
        $('.partners__flow').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            dots: true,
            responsive: [		
                {
                    breakpoint: 1510,
                    settings: {
                        slidesToShow: 5,
                    }
                },
                {
                    breakpoint: 1240,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 3,
                    }
                }
            ]           
          });
    }
}




/*!
 * Lazy Load - JavaScript plugin for lazy loading images
 *
 * Copyright (c) 2007-2019 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://appelsiini.net/projects/lazyload
 *
 * Version: 2.0.0-rc.2
 *
 */

(function (root, factory) {
    if (typeof exports === "object") {
        module.exports = factory(root);
    } else if (typeof define === "function" && define.amd) {
        define([], factory);
    } else {
        root.LazyLoad = factory(root);
    }
}) (typeof global !== "undefined" ? global : this.window || this.global, function (root) {

    "use strict";

    if (typeof define === "function" && define.amd){
        root = window;
    }

    const defaults = {
        src: "data-src",
        srcset: "data-srcset",
        selector: ".lazyload",
        root: null,
        rootMargin: "0px",
        threshold: 0
	};
	

    /**
    * Merge two or more objects. Returns a new object.
    * @private
    * @param {Boolean}  deep     If true, do a deep (or recursive) merge [optional]
    * @param {Object}   objects  The objects to merge together
    * @returns {Object}          Merged values of defaults and options
    */
    const extend = function ()  {

        let extended = {};
        let deep = false;
        let i = 0;
        let length = arguments.length;

        /* Check if a deep merge */
        if (Object.prototype.toString.call(arguments[0]) === "[object Boolean]") {
            deep = arguments[0];
            i++;
        }

        /* Merge the object into the extended object */
        let merge = function (obj) {
            for (let prop in obj) {
                if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                    /* If deep merge and property is an object, merge properties */
                    if (deep && Object.prototype.toString.call(obj[prop]) === "[object Object]") {
                        extended[prop] = extend(true, extended[prop], obj[prop]);
                    } else {
                        extended[prop] = obj[prop];
                    }
                }
            }
        };

        /* Loop through each object and conduct a merge */
        for (; i < length; i++) {
            let obj = arguments[i];
            merge(obj);
        }

        return extended;
    };

    function LazyLoad(images, options) {
        this.settings = extend(defaults, options || {});
        this.images = images || document.querySelectorAll(this.settings.selector);
        this.observer = null;
        this.init();
    }

    LazyLoad.prototype = {
        init: function() {

            /* Without observers load everything and bail out early. */
            if (!root.IntersectionObserver) {
                this.loadImages();
                return;
            }

            let self = this;
            let observerConfig = {
                root: this.settings.root,
                rootMargin: this.settings.rootMargin,
                threshold: [this.settings.threshold]
            };

            this.observer = new IntersectionObserver(function(entries) {
                Array.prototype.forEach.call(entries, function (entry) {
                    if (entry.isIntersecting) {
                        self.observer.unobserve(entry.target);
                        let src = entry.target.getAttribute(self.settings.src);
                        let srcset = entry.target.getAttribute(self.settings.srcset);
                        if ("img" === entry.target.tagName.toLowerCase()) {
                            if (src) {
                                entry.target.src = src;
                            }
                            if (srcset) {
                                entry.target.srcset = srcset;
                            }
                        } else {
                            entry.target.style.backgroundImage = "url(" + src + ")";
                        }
                    }
                });
            }, observerConfig);

            Array.prototype.forEach.call(this.images, function (image) {
                self.observer.observe(image);
            });
        },

        loadAndDestroy: function () {
            if (!this.settings) { return; }
            this.loadImages();
            this.destroy();
        },

        loadImages: function () {
            if (!this.settings) { return; }

            let self = this;
            Array.prototype.forEach.call(this.images, function (image) {
                let src = image.getAttribute(self.settings.src);
                let srcset = image.getAttribute(self.settings.srcset);
                if ("img" === image.tagName.toLowerCase()) {
                    if (src) {
                        image.src = src;
                    }
                    if (srcset) {
                        image.srcset = srcset;
                    }
                } else {
                    image.style.backgroundImage = "url('" + src + "')";
                }
            });
        },

        destroy: function () {
            if (!this.settings) { return; }
            this.observer.disconnect();
            this.settings = null;
        }
    };

    root.lazyload = function(images, options) {
        return new LazyLoad(images, options);
    };

    if (root.jQuery) {
        const $ = root.jQuery;
        $.fn.lazyload = function (options) {
            options = options || {};
            options.attribute = options.attribute || "data-src";
            new LazyLoad($.makeArray(this), options);
            return this;
        };
    }

    return LazyLoad;
});


$('[href="#callback"]').fancybox({
    touch: false,
    autoFocus: false
});	

$('button[data-href]').click(function(){
    event.preventDefault(); 
    var href = $(this).data("href");
    $.fancybox.open($(href), {
        touch: false,
        autoFocus: false
    })
});

$("a[href$='.jpg']:not(.gallery__photo), a[href$='.jpeg']:not(.gallery__photo), a[href$='.png']:not(.gallery__photo), a[href$='.webp']:not(.gallery__photo)").click(function() {	
    event.preventDefault(); 
    var gallerybox = $(this).parent().find($("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.png'], a[href$='.webp']"));	
    if (gallerybox.length > 1) {
        var index = $(this).index();
        $.fancybox.open(gallerybox, {
            'index' : index,				
            loop: true
        });
    } else {		
        $.fancybox.open(gallerybox);
    }		
});	