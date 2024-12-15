<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
  die();



global $arTheme;
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);
$i=0;

?>
<div class="accardeon file-accord flex flex-col gap-4 sm:gap-10">


<?
 foreach ($arResult["ITEMS"] as $arItem) {

	
	
	  $lightfor=CFile::ResizeImageGet(
                                        $arItem["PREVIEW_PICTURE"]['ID'],
                                        array("width" => 600, "height" => 600),
                                        BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                                        false
                                        )['src'];
										$i++;
										if($arItem['PROPERTIES']['FILE']['VALUE'])
										
		$files= CFile::GetByID($arItem['PROPERTIES']['FILE']['VALUE'])->Fetch();
	else
		$files=array();
	 			
	?>
		<div class="accardeon-item">
		<div class="accardeon-item__but flex lg:grid grid-cols-12 gap-5 justify-between items-end pt-2 sm:pt-5 border-t border-black600">
			<div class="hidden lg:block text-14med sm:text-16med col-span-3 xl:col-span-4">
				 <?=$arItem['PROPERTIES']['YEAR']['VALUE']?>
			</div>
			<div class="hidden lg:block text-14med sm:text-16med col-span-3 xl:col-span-4">
				 	 <?=$arItem['PROPERTIES']['COMPANY']['VALUE']?>
			</div>
			<div class="text-14med sm:text-16med lg:col-start-7 col-span-2 xl:col-start-9 xl:col-span-3">
					 <?=$arItem['NAME']?>
			</div>
		</div>
		<div class="accardeon-item__list">
			<div>
				<div class="pt-4 sm:pt-[3.625rem] sm:grid grid-cols-12 gap-5">
					<div class="flex flex-col gap-5 col-span-12 sm:grid grid-cols-2 lg:col-span-6 xl:col-span-4 lg:col-start-7 xl:col-start-9">
						<div class="flex flex-col justify-between flex-1">
							<p class="text-14med">
									 <?=$arItem['PREVIEW_TEXT']?>
							</p>
 <a href="/upload/<?=$files['SUBDIR']?>/<?=$files['FILE_NAME']?>" class="text-17med2 group w-fit mt-4"> <span class="block border-b border-white w-fit">Скачать файл.pdf</span> </a>
						</div>
 <img src="<?=$lightfor?>" class="flex-1" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?
 }
 ?>
</div>