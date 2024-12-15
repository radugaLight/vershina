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



if(!$_GET['PAGEN_1']) { 
if($arResult['ID']=='0'||$arResult['ID']=='')
{
	$searchid='8';
	
}
else
{
	$searchid=$arResult['ID'];
}

$arFilterSeo = Array('IBLOCK_ID'=>$arResult['IBLOCK_ID'], "SECTION_ID" =>array($searchid),'GLOBAL_ACTIVE'=>'Y');
$db_listSeo = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilterSeo, true, Array('NAME','PICTURE','SECTION_PAGE_URL','UF_YEAR',"SORT"));


$cats=array();
$i=0;
$subcats=array();
while($ob = $db_listSeo->GetNextElement())
{


	$i++;
   $arFields = $ob->GetFields();
 
   $subcats[$i]["DETAIL_PICTURE"]['ID']=$arFields["PICTURE"];
   $subcats[$i]["DETAIL_PAGE_URL"]=$arFields["SECTION_PAGE_URL"];
   $subcats[$i]["NAME"]=$arFields["NAME"];
   $subcats[$i]["PROPERTIES"]["WHERE"]['VALUE']=GetMessage("MASTERPLAN");   
   $subcats[$i]["PROPERTIES"]["YEAR"]["VALUE"]= $arFields["UF_YEAR"];
   $subcats[$i]["SORT"]= $arFields["SORT"];  
   $subcats[$i]["PROPERTIES"]["FOR_MASTER"]['VALUE']= 'Y';  
   $subcats[$i]["ISCATEGORY"]= 'Y';  
}


 
$arResult["ITEMS"] = array_merge($subcats, $arResult["ITEMS"]);



usort($arResult["ITEMS"], function($a, $b){
    return ( $a['SORT'] > $b['SORT'] );
});

  
}
  
 
?>
   <div id="ajaxOutput" class="ajaxOutput flex flex-col gap-6 sm:gap-x-5 sm:gap-y-9 sm:grid sm:grid-cols-2 lg:grid-cols-3">

          
	      <?
      $i = 0;
      foreach ($arResult["ITEMS"] as $arItem) {
		  
	




		            $resize_image = CFile::ResizeImageGet(
            $arItem["DETAIL_PICTURE"]['ID'],
            array("width" => 1280, "height" => 1280),
          BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
          false
          );
		  
		  //720 x 950 было
?>

  
     <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="group relative" >
            <span class="h-fit w-full mb-3 block sm:mb-4 bg-[#161616]">
                <img src="<?= makeWebp($resize_image['src']) ?>" class="aspect-[320/246] sm:aspect-[589/398] w-full" alt="">
            </span>
            <span class="flex flex-col gap-1">
                <span class="flex items-center justify-between text-black400 text-14reg">
                    <span><?=$arItem["PROPERTIES"]["CITY"]["VALUE"]?></span>
                    <span><?=$arItem["PROPERTIES"]["DATEBEGIN"]["VALUE"]?></span>
                </span>
                <!-- <span class="text-17med sm:text-24med"><?=$arItem["NAME"]?></span> -->
            </span>
            <div class="hidden  sm:aspect-[589/398] sm:block absolute inset-0 opacity-0 transition-opacity group-hover:opacity-100 bg-[#333333] mix-blend-hard-light"></div>
            <span class="flex  sm:aspect-[589/398] flex-col gap-1 sm:absolute sm:inset-0 sm:opacity-0 transition-opacity sm:justify-center sm:items-center sm:text-center group-hover:opacity-100">
                <span class="text-17med2 sm:text-22med"><?=$arItem["NAME"]?></span>
                <span class="text-14med text-black200 sm:text-16reg sm:text-black400"><?=$arItem["PROPERTIES"]['WORKNAME']['VALUE']?></span>
            </span>
        </a>
		
	
		
		
<?
$i++;
	  }
?>		  
					
					
			
			
			  <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
  <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
	
	  </div>
	      </div>
		  



	
	   