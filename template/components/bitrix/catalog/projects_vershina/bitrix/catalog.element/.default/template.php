<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();
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
Global $curlang;
Global $menuadd;

 

/* SEO FIX  */
 
 if($arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"])
     $APPLICATION->SetPageProperty("title", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]);
 else
 $APPLICATION->SetPageProperty("title",$arResult['NAME'].' - '.GetMessage("ALTDESC")); 


 if($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"])
 {
 $seoalt=arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"];
 }
 
  if($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"])
 {
 $seotitle=arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"];
 }
 
 if($seoalt=='')
	 $seoalt=$arResult['NAME'].' - '.GetMessage("ALTDESC");
 
 if($seotitle=="")
	 $seotitle=$arResult['NAME'].' - '.GetMessage("ALTDESC");
 
  /* END SEO FIX  */

	if($arResult['DETAIL_PICTURE']['SRC']!=''){	
$filesmain =	$arResult['DETAIL_PICTURE']['SRC'];
	
			}
		
	
		
		
		
foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $file)
	{
		$filestmp = CFile::GetByID($file);
		
	$files[] =	CFile::GetPath($filestmp->arResult[0]['ID']);
	
		//	 	$files[] =	 CFile::ResizeImageGet($filestmp->arResult[0]['ID'],Array("width" =>1920, "height" => 1920),BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);


	}

if($files[0])
		$dopfoto=$files[0];
	else
		$dopfoto=$filesmain;
		
?>		
	
		

<!-- <div class="container mb-4 sm:mb-8">
    <div>
        <picture>
            <source media="(min-width: 678px)" srcset="<?=$filesmain?>">
            <img
                  src="<?=$filesmain?>"
                  class="w-full h-[416px] sm:aspect-[1808/567] object-cover"
            />
        </picture>
    </div>
</div> -->
<div class="container mb-20 sm:mb-[8.75rem] pt-36 "  id="projectPage">
    <div class="lg:grid grid-cols-12 lg:gap-x-5  mb-[88px] sm:mb-20">
        <h1 class="text-32semi mb-3 lg:hidden ">
           <?=$arResult['NAME'];?>
        </h1>
        <div class="mb-10 lg:mb-0 col-span-6 col-start-1 row-start-1 w-full slider-pp relative rounded-2xl overflow-hidden">
            <div class="buttons absolute bottom-5 right-5 flex items-center gap-1.5 z-10">
                <div class="button-prev p-0.5 rounded-md backdrop-blur-sm w-fit bg-[rgba(57,_57,_57,_0.6)] [&.swiper-button-disabled]:opacity-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1801 3.37534C16.8351 2.94408 16.2058 2.87416 15.7746 3.21917L6.75065 10.4383C5.74983 11.239 5.74983 12.7611 6.75065 13.5618L15.7746 20.7809C16.2058 21.1259 16.8351 21.056 17.1801 20.6247C17.5251 20.1935 17.4552 19.5642 17.024 19.2192L8.00004 12L17.024 4.78091C17.4552 4.4359 17.5251 3.8066 17.1801 3.37534Z" fill="white"/>
                    </svg>
                </div>
                <div class="button-next button-prev p-0.5 rounded-md backdrop-blur-sm w-fit bg-[rgba(57,_57,_57,_0.6)] [&.swiper-button-disabled]:opacity-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.21917 3.37534C6.56418 2.94408 7.19347 2.87416 7.62473 3.21917L16.6486 10.4383C17.6495 11.239 17.6495 12.7611 16.6486 13.5618L7.62473 20.7809C7.19347 21.1259 6.56418 21.056 6.21917 20.6247C5.87416 20.1935 5.94408 19.5642 6.37534 19.2192L15.3993 12L6.37534 4.78091C5.94408 4.4359 5.87416 3.8066 6.21917 3.37534Z" fill="white"/>
                    </svg>
                        
                </div>
            </div>
            <div class="swiper h-full lg:max-h-[627px" >
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                        <img src="<?=$filesmain?>" class="aspect-[320/245] rounded-2xl lg:aspect-auto h-full object-cover col-start-1 row-start-1 w-full" alt="">
                </div>
                <?
                  foreach ($files as $f)
                	{
                ?>
                    <div class="swiper-slide">
                        <img src="<?=$f?>" alt="<?=$seoalt?>" title="<?=$seotitle?>" class="aspect-[320/245] rounded-2xl sm:aspect-auto h-full object-cover col-start-1 row-start-1 w-full" alt="">
                    </div>
                <? } ?>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const sliderContainer = document.querySelector('#projectPage .slider-pp');
                    
                    const slider = new Swiper(sliderContainer.querySelector('.swiper'), {
                        spaceBetween: 20,
                        navigation: {
                            prevEl: sliderContainer.querySelector('.button-prev'),
                            nextEl: sliderContainer.querySelector('.button-next')
                        }
                    })

                })
            </script>
        </div>
        <div class="col-span-6 flex flex-col ">
            <div class="mb-4 sm:mb-8 flex items-end">
                <div class="flex-1">
                    <div class="text-12med text-black700 mb-1 lg:hidden"><?=$arResult['PROPERTIES']['DATEEND']['VALUE']?></div>
                    <h2 class="text-24semi sm:text-32semi"><?=$arResult['PROPERTIES']['CITY']['VALUE']?></h2>
                </div>
                <div class="text-12med text-black700 lg:hidden"><?=$arResult['PROPERTIES']['NUMBER']['VALUE']?></div>
            </div>
            <div class="prioject-charasteristic mb-auto">
			
	
                <div class="item__row">
						<? if($arResult['PROPERTIES']['PP']['VALUE']) { ?>
                    <div class="item">
                        <span class="item__header">П/П</span>
                        <span class="item__desk">  <?=$arResult['PROPERTIES']['PP']['VALUE']?></span>
                    </div>
							<? } ?>
							<? if($arResult['PROPERTIES']['WORKPARTS']['VALUE']) { ?>
                    <div class="item">
                        <span class="item__header">Состав работ</span>
                        <span class="item__desk"><?=implode(', ',$arResult['PROPERTIES']['WORKPARTS']['VALUE'])?></span>
                    </div>
							<? } ?>
                </div>
	
                <div class="item">
                    <span class="item__header">Название</span>
                    <span class="item__desk"><?=$arResult['NAME']?></span>
                </div>
				<? if($arResult['PROPERTIES']['DATEBEGIN']['VALUE']) { ?>
                <div class="item">
                    <span class="item__header">Заключение / <br> Окончание</span>
                    <span class="item__desk"><?=$arResult['PROPERTIES']['DATEBEGIN']['VALUE']?> <? if($arResult['PROPERTIES']['DATEEND']['VALUE']) { ?>- <?=$arResult['PROPERTIES']['DATEEND']['VALUE']?><? } ?></span>
                </div>
				<? } ?>
                <div class="item__row">
				<? if($arResult['PROPERTIES']['CUSTOMER']['VALUE']) { ?>
                    <div class="item">
                        <span class="item__header">Заказчик</span>
                        <span class="item__desk"><?=$arResult['PROPERTIES']['CUSTOMER']['VALUE']?></span>
                    </div>
					<? } ?>
					<? if($arResult['PROPERTIES']['STAGE']['VALUE']) { ?>
                    <div class="item">
                        <span class="item__header">Стадия</span>
                        <span class="item__desk"><?=$arResult['PROPERTIES']['STAGE']['VALUE']?></span>
                    </div>
					
					<? } ?>
                </div>
				
				
				<div class="item__row">
				<? if($arResult['PROPERTIES']['WORKNAME']['VALUE']) { ?>
				
                <div class="item">
                    <span class="item__header">Наименование работ</span>
                    <span class="item__desk">
                       <?=$arResult['PROPERTIES']['WORKNAME']['VALUE']?>
                    </span>
                </div>
				<? }?> 
				<? if($arResult['PROPERTIES']['F3']['VALUE']) { ?>
                <div class="item">
                    <span class="item__header">ФЗ</span>
                    <span class="item__desk"><?=$arResult['PROPERTIES']['F3']['VALUE']?></span>
                </div>
				<? } ?>
				</div>
            </div>
            <a href="#bottomform" class="button button-primary w-fit mt-10 lg:mt-24 lg:ml-auto">
                <span>Связаться</span>
            </a>
            <!-- <div class="project-block">
             
			  <? if($arResult['PREVIEW_TEXT']){ ?> <?=$arResult['PREVIEW_TEXT'];?> <?  } ?>
			 <? if($arResult['DETAIL_TEXT']){ ?> <?=$arResult['DETAIL_TEXT'];?> <?  } ?>
            </div>
            <a href="/" class="button button-primary w-fit">
                <span>Связаться</span> 
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.27004 13.01C6.74004 12.74 6.15004 12.6 5.55004 12.6C0.870039 12.93 0.870039 19.74 5.55004 20.07H16.64C17.99 20.08 19.29 19.58 20.28 18.67C23.57 15.8 21.81 10.03 17.48 9.48C15.92 0.110001 2.39004 3.67 5.60004 12.6" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15.8501 9.92001C16.3701 9.66001 16.9401 9.52001 17.5201 9.51001" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a> -->
        </div>
    </div>
</div>
