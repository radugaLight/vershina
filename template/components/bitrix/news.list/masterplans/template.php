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

        <div class="flex flex-col gap-4 lg:grid grid-cols-3 sm:gap-5 drop-down__list">
<?foreach($arResult["ITEMS"] as $arItem): //Цикл для вывода категорий
$img=$arItem['PREVIEW_PICTURE']['SRC']?>

      <a href="#" class="block">
            <img src="<?=$img?>" class="aspect-[320/211] w-full sm:aspect-[590/389] rounded-2xl mb-3 sm:mb-2.5" alt="">
            <span class="rounded-2xl flex flex-col group gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue h-auto ">
                <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end mt-auto">
                    <span class="text-17med sm:text-22med "><?=$arItem['NAME'];?></span>
                </span>
            </span>
        </a>

<?endforeach;?>


 </div>



   