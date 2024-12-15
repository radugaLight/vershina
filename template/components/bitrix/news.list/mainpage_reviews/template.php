<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

        <div class="container swiper md:overflow-visible">
            <!-- md:pr-[300px] -->
            <div class="swiper-wrapper">
<?foreach($arResult["ITEMS"] as $arItem): //Цикл для вывода категорий
$img=$arItem['PREVIEW_PICTURE']['SRC']?>

 <a href="#" class="swiper-slide aspect-[351/265] md:aspect-auto md:h-[332px] md:w-[440px] md:max-w-[440px] xl:h-[536px] xl:w-[711px] xl:max-w-[711px]">
                    <img class="w-full h-full object-cover" src="<?=$img?>" alt="">
                </a>

<?endforeach;?>

    <a href="/" class="swiper-slide aspect-[351/265] md:aspect-auto md:h-[332px] md:w-[440px] md:max-w-[440px] xl:h-[536px] xl:w-[711px] xl:max-w-[711px]">
                    <img class="w-full h-full object-cover" src="/img/mainpage/image_slider-1.jpg" alt="">
                </a>
                <a href="/" class="swiper-slide aspect-[351/265] md:aspect-auto md:h-[332px] md:w-[440px] md:max-w-[440px] xl:h-[536px] xl:w-[711px] xl:max-w-[711px]">
                    <img class="w-full h-full object-cover" src="/img/mainpage/image_slider-2.jpg" alt="">
                </a>
                <a href="/" class="swiper-slide aspect-[351/265] md:aspect-auto md:h-[332px] md:w-[440px] md:max-w-[440px] xl:h-[536px] xl:w-[711px] xl:max-w-[711px]">
                    <img class="w-full h-full object-cover" src="/img/mainpage/image_slider.jpg" alt="">
                </a>
</div></div>



   