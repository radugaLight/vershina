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

<div class="flex flex-col gap-6 sm:grid grid-cols-3 sm:gap-5 drop-down__list">
<?foreach($arResult["ITEMS"] as $arItem): //Цикл для вывода категорий
$img=$arItem['PREVIEW_PICTURE']['SRC']?>


	
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="overflow-hidden swiper-slideflex relative flex-col gap-3 group sm:rounded-2xl"> 
		 	<div class="hidden sm:block absolute inset-0 opacity-0 transition-opacity group-hover:opacity-100 bg-[#333333] mix-blend-hard-light"></div>
			<img  src="<?=$img?>"  class="aspect-[320/245] rounded-2xl sm:aspect-[589/435] object-cover"> 
			<span class="flex flex-col gap-1 sm:absolute sm:inset-0 sm:opacity-0 transition-opacity sm:justify-center sm:items-center sm:text-center group-hover:opacity-100"> 
				<span class="text-17med2 sm:text-22med"><?=$arItem["NAME"]?></span> <span class="text-14med text-black200 sm:text-16reg sm:text-black400"><?=$arItem["PROPERTIES"]['WORKNAME']['VALUE']?></span> </span> </a> 
				
				
<?endforeach;?>


 </div>


	<div class="sm:hidden">
        <a href="/projects/" class="button button-secondary w-full mx-auto mt-8 sm:mt-10 drop-down__open">
            <span>Смотреть больше</span>
        </a>
    </div>
    <div class="hidden sm:block">
        <a href="/projects/" class="button button-link w-fit mx-auto mt-8 sm:mt-10 drop-down__open">
            <span>Смотреть больше</span>
        </a>
    </div>
   