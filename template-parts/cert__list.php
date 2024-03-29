<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'content' => apply_filters( 'the_content', $args['content'] ),
    'list' => $args['list']
];

?>


<section class="certificates">
    <div class="container">
        <header class="certificates__header">
            <<?= $arResult['title']['state']; ?> class="title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
            <div class="format-text">
                <?= $arResult['content']; ?>
            </div>
        </header>
        <div class="certificates__box">
            <div data-swiper-options="certificates" class="certificates__box2 js-swiper">
                <ul class="certificates__list swiper-wrapper ">
                    <?php foreach($arResult['list'] as $item): ?>
                    <li class="certificates__item swiper-slide">
                        <a data-fancybox data-type="iframe" data-src="<?= wp_get_attachment_url($item['file']); ?>" class="certificates__item-link fancybox-pdf">
                            <figure class="certificates__item-img">
                                <img src="#" srcset="<?= wp_get_attachment_image_url($item['image'], 'news'); ?>" alt="<?= get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE); ?>" class="fit-image" />
                            </figure>
                        </a>
                        <div class="certificates__item-title"><?= $item['name']; ?></div>
                        <div class="certificates__item-text">
                          <?= $item['text']; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>  
                </ul>
            </div>
            <button class="certificates__prev-btn">
                <svg width="20" height="20">
                    <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#arrow-left" />
                </svg>
            </button>
            <button class="certificates__next-btn">
                <svg width="20" height="20">
                    <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#arrow-right" />
                </svg>
            </button>
        </div>
    </div>
</section>

<script>
  window.LIBS_PATH = {
    lightgallery: "<?= _assets(); ?>/js/vendor/lightgallery.min.js",
    swiper: "<?= _assets(); ?>/js/vendor/swiper-bundle.min.js"
  };

  window.swiperOptions = {
    certificates: {
      slidesPerView: 1,
      navigation: {
        nextEl: ".certificates__next-btn",
        prevEl: ".certificates__prev-btn"
      },
      breakpoints: {
        // when window width is >= 768px
        768: {
          slidesPerView: 2
        },
        992: {
          slidesPerView: 3
        },
        1200: {
          slidesPerView: 4
        }
      }
    },
    partners: {
      loop: true,
      autoplay: {
        delay: 3000
      },
      slidesPerView: 2,
      slidesPerGroup: 2,
      navigation: {
        nextEl: ".partners__next-btn",
        prevEl: ".partners__prev-btn"
      },
      breakpoints: {
        // when window width is >= 768px
        768: {
          slidesPerView: 4,
          slidesPerGroup: 4
        },
        992: {
          slidesPerView: 6,
          slidesPerGroup: 6
        }
      }
    }
  };















  </script>


  <style>
  .not-selectable{-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none}.carousel{position:relative;box-sizing:border-box}.carousel *,.carousel *:before,.carousel *:after{box-sizing:inherit}.carousel__viewport{position:relative;overflow:hidden;width:100%;height:100%}.carousel__track{display:flex}.carousel__slide{flex:0 0 60%;max-width:100%;position:relative;padding:1rem;overflow-x:hidden;overflow-y:auto;overscroll-behavior:contain;-webkit-overflow-scrolling:touch;touch-action:pan-y}.carousel--has-dots{margin-bottom:30px}.carousel__dots{margin:0 auto;padding:0;position:absolute;top:calc(100% + 0.75rem);left:0;right:0;display:flex;justify-content:center;list-style:none;user-select:none}.carousel__dots .carousel__dot{margin:0;padding:0;display:block;position:relative;width:30px;height:30px;cursor:pointer}.carousel__dots .carousel__dot:after{content:"";width:10px;height:10px;position:absolute;top:50%;left:50%;background-color:currentColor;border-radius:50%;opacity:0.25;transform:translate(-50%, -50%);transition:opacity 0.2s ease-in-out}.carousel__dots .carousel__dot--active:after{opacity:1}.carousel__button{box-sizing:content-box;padding:10px 6px;border:0;border-radius:2px;color:#777;background:#fff;cursor:pointer;box-shadow:0 2px 1px -1px rgba(0,0,0,0.2),0 1px 1px 0 rgba(0,0,0,0.14),0 1px 3px 0 rgba(0,0,0,0.12);position:absolute;top:50%;transform:translateY(-50%)}.carousel__button--prev{left:10px}.carousel__button--next{right:10px}.carousel__button[disabled]{cursor:default;opacity:0.3}.carousel__button svg{display:inline-block;vertical-align:top;pointer-events:none;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}body.compensate-for-scrollbar{overflow:hidden !important;touch-action:none}.fancybox__container{box-sizing:border-box;display:flex;flex-direction:column;position:fixed;top:0;left:0;bottom:0;right:0;margin:0;padding:0;padding:env(safe-area-inset-top, 0px) env(safe-area-inset-right, 0px) env(safe-area-inset-bottom, 0px) env(safe-area-inset-left, 0px);overflow:hidden;z-index:1050;outline:none;transform-origin:top left}.fancybox__container *,.fancybox__container *::before,.fancybox__container *::after{box-sizing:inherit}.fancybox__container :focus{outline:thin dotted}body.is-using-mouse .fancybox__container :focus{outline:none}.fancybox__backdrop{position:absolute;top:0;right:0;bottom:0;left:0;background-color:rgba(30,30,30,0.97)}.fancybox__carousel{position:relative;flex:1 1 auto;min-height:0;height:100%;z-index:1051}.fancybox__carousel .carousel__track{height:100%}.fancybox__carousel .carousel__viewport{overflow:visible;cursor:default}.fancybox__carousel .carousel__slide{flex:0 0 100%;margin:0;padding:42px;display:flex;flex-direction:column;outline:0;overflow:auto;-webkit-overflow-scrolling:touch}.fancybox__carousel .carousel__slide::before{content:"";flex:0 0 0;margin-bottom:auto}.fancybox__carousel .carousel__slide::after{content:"";flex:0 0 0;margin-top:auto}.fancybox__carousel .carousel__slide.has-image{overflow:visible;touch-action:none}.fancybox__carousel .carousel__slide.has-image .fancybox__content{padding:0;background:transparent;flex-shrink:1;min-height:1px;overflow:visible;width:intrinsic;width:-moz-max-content;width:-webkit-max-content;width:max-content;height:intrinsic;height:-moz-max-content;height:-webkit-max-content;height:max-content;color:#fff}.fancybox__carousel .carousel__slide.has-image.has-caption{padding-bottom:16px}.fancybox__carousel .carousel__slide.has-iframe .fancybox__content,.fancybox__carousel .carousel__slide.has-video .fancybox__content,.fancybox__carousel .carousel__slide.has-pdf .fancybox__content,.fancybox__carousel .carousel__slide.has-map .fancybox__content{width:80%;height:80%;flex-shrink:1;min-height:1px;overflow:visible}.fancybox__carousel .carousel__slide.has-video .fancybox__content,.fancybox__carousel .carousel__slide.has-map .fancybox__content,.fancybox__carousel .carousel__slide.has-pdf .fancybox__content{padding:0;background:rgba(23,23,23,0.9);color:#fff}.fancybox__carousel .carousel__slide.has-map .fancybox__content{background:#e5e3df}.fancybox__carousel .carousel__slide.has-video .fancybox__content{width:800px;height:450px;max-width:100%;max-width:Min(100%, calc((100vh - 84px) / (.5625)));max-height:100%}@media (max-width: 414px), (max-height: 414px){.fancybox__carousel .carousel__slide.has-iframe .fancybox__content,.fancybox__carousel .carousel__slide.has-pdf .fancybox__content,.fancybox__carousel .carousel__slide.has-map .fancybox__content{width:100%;height:100%;max-width:none;max-height:none}}@media (max-height: 414px){.fancybox__carousel .carousel__slide.has-video .fancybox__close,.fancybox__carousel .carousel__slide.has-pdf .fancybox__close,.fancybox__carousel .carousel__slide.has-map .fancybox__close,.fancybox__carousel .carousel__slide.has-iframe .fancybox__close{right:-42px;color:#fff}}.fancybox__content{padding:38px;background-color:#fff;position:relative;align-self:center;max-width:100%;flex-shrink:0;display:flex !important;flex-direction:column;z-index:1052}.fancybox__image{max-width:100%;max-height:100%;width:auto;height:auto;vertical-align:top;filter:none;-webkit-filter:blur(0px);align-self:center;flex-shrink:0}.fancybox__iframe{border:0;display:block;height:100%;width:100%;background:transparent}.fancybox-placeholder{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0}.fancybox__caption{align-self:center;color:#fff;margin-top:16px;max-width:100%;line-height:1.375;visibility:visible;cursor:auto;flex-shrink:0}.is-loading .fancybox__caption{visibility:hidden}.fancybox__container .carousel__dots{top:100%;color:#eee}.fancybox__container .carousel__button{background:transparent;box-shadow:none;color:#eee;transition:color 0.2s}.fancybox__carousel .carousel__nav .carousel__button::before{content:"";display:block;position:absolute;top:-80px;right:-10px;bottom:-80px;left:-10px;cursor:inherit}.fancybox__carousel .carousel__nav .carousel__button svg{width:30px;height:30px;filter:drop-shadow(0px 1px 1px rgba(30,30,30,0.4))}.fancybox__carousel .carousel__nav .carousel__button--next{right:0}.fancybox__carousel .carousel__nav .carousel__button--prev{left:0}.fancybox__close{box-sizing:content-box;margin:0;padding:0;border:0;position:absolute;transform:translateZ(1px);background:transparent;color:#eee;cursor:pointer;z-index:1053}.fancybox__close svg{width:24px;height:24px;filter:drop-shadow(0px 1px 1px rgba(30,30,30,0.4))}.fancybox__content>.fancybox__close{top:-28px;right:0}.fancybox__container>.fancybox__close{top:10px;right:10px}@media (max-height: 414px){.fancybox__content>.fancybox__close{top:0px;right:0px;padding:9px;color:currentColor}.carousel__slide:not(.has-image) .fancybox__close svg{filter:none}}.fancybox__loading{position:absolute;top:50%;left:50%;width:50px;height:50px;margin-top:-25px;margin-left:-25px;cursor:pointer;mix-blend-mode:difference;z-index:1053}.fancybox__loading div{width:100%;height:100%;border:3px solid rgba(255,255,255,0.2);border-left-color:rgba(255,255,255,0.9);border-radius:50%;animation:fancybox-rotate 1.1s linear infinite}@keyframes fancybox-rotate{0%{transform:rotate(0deg)}100%{transform:rotate(1turn)}}.fancybox__container.animated[aria-hidden="true"] .fancybox__backdrop,.fancybox__container.animated[aria-hidden="true"] .fancybox__caption,.fancybox__container.animated[aria-hidden="true"] .carousel__nav,.fancybox__container.animated[aria-hidden="true"] .carousel__dots,.fancybox__container.animated[aria-hidden="true"] .fancybox__close{transition:opacity 0.2s ease-out;opacity:0}.fancybox__container.animated[aria-hidden="false"] .fancybox__backdrop,.fancybox__container.animated[aria-hidden="false"] .fancybox__caption,.fancybox__container.animated[aria-hidden="false"] .carousel__nav,.fancybox__container.animated[aria-hidden="false"] .carousel__dots,.fancybox__container.animated[aria-hidden="false"] .fancybox__close{transition:opacity 0.25s ease-in-out;opacity:1}.fadeIn{animation:fadeIn ease-in-out 0.25s}@keyframes fadeIn{from{opacity:0}to{opacity:1}}.fadeOut{animation:fadeOut 0.2s both}@keyframes fadeOut{to{opacity:0}}.slideInUp{animation:0.25s ease-in-out slideInUp both}@keyframes slideInUp{from{transform:translate3d(0, 50px, 0);opacity:0}to{transform:translate3d(0, 0, 0);opacity:1}}.slideInDown{animation:0.25s ease-in-out slideInDown both}@keyframes slideInDown{from{transform:translate3d(0, -30px, 0);opacity:0}to{transform:translate3d(0, 0, 0);opacity:1}}.slideOutUp{animation:0.2s slideOutUp both}@keyframes slideOutUp{to{transform:translate3d(0, -30px, 0);opacity:0}}.slideOutDown{animation:0.2s slideOutDown both}@keyframes slideOutDown{to{transform:translate3d(0, 30px, 0);opacity:0}}.throwOutUp{animation:0.2s throwOutUp both}@keyframes throwOutUp{to{transform:translate3d(0, -50%, 0);opacity:0}}.throwOutDown{animation:0.2s throwOutDown both}@keyframes throwOutDown{to{transform:translate3d(0, 50%, 0);opacity:0}}.fancybox__carousel .carousel__slide{scrollbar-width:thin;scrollbar-color:#ccc rgba(255,255,255,0.1)}.fancybox__carousel .carousel__slide::-webkit-scrollbar{width:8px;height:8px}.fancybox__carousel .carousel__slide::-webkit-scrollbar-track{background-color:rgba(255,255,255,0.1)}.fancybox__carousel .carousel__slide::-webkit-scrollbar-thumb{background-color:#ccc;border-radius:2px;box-shadow:inset 0 0 4px rgba(0,0,0,0.2)}.fancybox__carousel .is-draggable{cursor:move;cursor:grab}.fancybox__carousel .is-dragging{cursor:move;cursor:grabbing}.fancybox__carousel .carousel__slide:not(.has-image) .fancybox__content{cursor:auto}.fancybox__carousel .carousel__slide.can-zoom_in .fancybox__content{cursor:zoom-in}.fancybox__thumbs{flex:0 0 auto;min-height:42px;padding:0 8px 16px 8px}@media (hover: hover){.fancybox__thumbs::before{content:"";position:absolute;top:50%;right:0;bottom:0;left:0;pointer-events:none;background:linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.01) 8.1%, rgba(0,0,0,0.036) 15.5%, rgba(0,0,0,0.078) 22.5%, rgba(0,0,0,0.132) 29%, rgba(0,0,0,0.194) 35.3%, rgba(0,0,0,0.264) 41.2%, rgba(0,0,0,0.338) 47.1%, rgba(0,0,0,0.412) 52.9%, rgba(0,0,0,0.486) 58.8%, rgba(0,0,0,0.556) 64.7%, rgba(0,0,0,0.618) 71%, rgba(0,0,0,0.672) 77.5%, rgba(0,0,0,0.714) 84.5%, rgba(0,0,0,0.74) 91.9%, rgba(0,0,0,0.75) 100%);transform:translateZ(-1px)}}.fancybox__thumbs .carousel__slide{flex:0 0 99px;margin:0;padding:2px;box-sizing:content-box;cursor:pointer;overflow:visible}.fancybox__thumbs .carousel__slide div{padding-bottom:calc(1 / 1.5 * 100%);background-size:cover;background-position:center center;background-color:#272727;transition:all 0.1s}.fancybox__thumbs .carousel__slide.is-nav-selected div{box-shadow:inset 0 0 0 3px #fff}.fancybox__container.animated[aria-hidden="true"] .fancybox__thumbs{animation:fadeOut ease-out 0.2s both}.fancybox__container.animated[aria-hidden="false"] .fancybox__thumbs{animation:fadeIn ease-in-out 0.25s both}


  .fancybox__carousel .carousel__slide:not(.has-image) .fancybox__content {
    cursor: auto;
    height: 70vh !important;
}
  </style>