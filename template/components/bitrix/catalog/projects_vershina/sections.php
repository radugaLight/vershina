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
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
Global $curlang;
Global $menuadd;
$menuadd = '';
$this->setFrameMode(true);?>

			


<?
/* Определение глубины каталога */
$arResult['SECTION_ID'] = CIBlockFindTools::GetSectionID(
	$arResult['VARIABLES']['SECTION_ID'], 
	$arResult['VARIABLES']['SECTION_CODE'], 
	array('IBLOCK_ID' => $arParams['IBLOCK_ID'])
);
if(CModule::IncludeModule("iblock")){
    $arFilter = Array(
	    'IBLOCK_ID'=>$arParams["IBLOCK_ID"], 
	    'GLOBAL_ACTIVE'=>'Y', 
	    'SECTION_ID'=>$arResult['SECTION_ID']);
    $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
    while($ar_result = $db_list->GetNext())
    {
         $haveSections = $ar_result['ID'];
break;
    }
}


?>


<?
	global $category;
	
	 $category=$_GET[category];
	if($category=="")
	$category=$arResult["VARIABLES"]["SECTION_CODE"];

?>
<? 	$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"ajaxsimple",
	Array(
		 "COMPONENT_TEMPLATE" => "ajaxsimple",
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_CODE" => $category,
		"SECTION_USER_FIELDS" => array("UF_*"),
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"COUNT_ELEMENTS" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"SHOW_SECTIONS_LIST_PREVIEW" => $arParams["SHOW_SECTIONS_LIST_PREVIEW"],
		"SECTIONS_LIST_PREVIEW_PROPERTY" => $arParams["SECTION_PREVIEW_PROPERTY"],
		"SHOW_SECTION_LIST_PICTURES" => $arParams["SHOW_SECTION_PICTURES"],
		"SECTIONS_LIST_PREVIEW_DESCRIPTION" => $arParams["SECTION_PREVIEW_DESCRIPTION"],
		"TOP_DEPTH" => "1",
		),
	$component
	);
	?>
	
	<script>
		
function ajaxRefresh(category) {
	if(category!="")
	var link = '<?=$menuadd?>/projects/'+category+'/';
	else
	var link = '<?=$menuadd?>/projects/';
	
$.get(
    BX.util.htmlspecialcharsback(link), 
    function (data) {
	var newurl = '<?=$menuadd?>/projects/'+category+'/';
window.history.pushState({path:newurl},'',newurl);
        $('.ajaxOutput').html($(data).find('.ajaxOutput').html());
		$('h1').html($(data).find('h1').html());
		
    }
);
}

$('.listsections button').click(function() {

	if($(this).hasClass("opacity-60"))
	{
	$('.listsections button').removeClass("opacity-60");	
	ajaxRefresh('');	

	}
	else
	{	
	 $('.listsections button').removeClass("opacity-60");
	$(this).addClass("opacity-60");
ajaxRefresh($(this).attr('catid'));
	}
	
	return false;
});

<? if($category) { ?>
$(".listsections button").find(`[catid='<?=$category?>']`).addClass("opacity-60");
<? }
else
{ ?>
$(".listsections button").find(`[catid='']`).addClass("opacity-60");
<?	
}


 ?>
 

</script>


<?
	

$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"catalog_block",
	Array(
		"SHOW_UNABLE_SKU_PROPS"=>$arParams["SHOW_UNABLE_SKU_PROPS"],
		"SEF_URL_TEMPLATES" => $arParams["SEF_URL_TEMPLATES"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $category,
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"AJAX_REQUEST" => $isAjax,
		"ELEMENT_SORT_FIELD" => $arAvailableSort[$sort]["SORT"],
		"ELEMENT_SORT_ORDER" => strtoupper($order),
		"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
		"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
		"PAGE_ELEMENT_COUNT" => 99999999,
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"TYPE_SKU" => $TEMPLATE_OPTIONS["TYPE_SKU"]["CURRENT_VALUE"],
	"PROPERTY_CODE" => array("YEAR","WHERE"),
	"SECTION_USER_FIELDS" => array("UF_DESCRIPTION","UF_VIDEO"),
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
"SHOW_ALL_WO_SECTION" => "Y",
"COUNT_ELEMENTS" => "Y",
		"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
		
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"AJAX_MODE" => $arParams["AJAX_MODE"],
		"AJAX_OPTION_JUMP" => $arParams["AJAX_OPTION_JUMP"],
		"AJAX_OPTION_STYLE" => $arParams["AJAX_OPTION_STYLE"],
		"AJAX_OPTION_HISTORY" => $arParams["AJAX_OPTION_HISTORY"],
		"CACHE_TYPE" =>$arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"CACHE_FILTER" => "Y",
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"FILE_404" => $arParams["FILE_404"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => "Y",

		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => ".default",
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => "N",

		"AJAX_OPTION_ADDITIONAL" => "",
		"ADD_CHAIN_ITEM" => "N",
		"SHOW_QUANTITY" => $arParams["SHOW_QUANTITY"],
		"SHOW_QUANTITY_COUNT" => $arParams["SHOW_QUANTITY_COUNT"],
		"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
		"SHOW_DISCOUNT_TIME" => $arParams["SHOW_DISCOUNT_TIME"],
		"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
		"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"USE_STORE" => $arParams["USE_STORE"],
		"MAX_AMOUNT" => $arParams["MAX_AMOUNT"],
		"MIN_AMOUNT" => $arParams["MIN_AMOUNT"],
		"USE_MIN_AMOUNT" => $arParams["USE_MIN_AMOUNT"],
		"USE_ONLY_MAX_AMOUNT" => $arParams["USE_ONLY_MAX_AMOUNT"],
		"DISPLAY_WISH_BUTTONS" => $arParams["DISPLAY_WISH_BUTTONS"],
		"LIST_DISPLAY_POPUP_IMAGE" => $arParams["LIST_DISPLAY_POPUP_IMAGE"],
		"DEFAULT_COUNT" => $arParams["DEFAULT_COUNT"],
		"SHOW_MEASURE" => $arParams["SHOW_MEASURE"],
		"SHOW_HINTS" => $arParams["SHOW_HINTS"],
		"OFFER_HIDE_NAME_PROPS" => $arParams["OFFER_HIDE_NAME_PROPS"],
		"SHOW_SECTIONS_LIST_PREVIEW" => $arParams["SHOW_SECTIONS_LIST_PREVIEW"],
		"SECTIONS_LIST_PREVIEW_PROPERTY" => $arParams["SECTIONS_LIST_PREVIEW_PROPERTY"],
		"SHOW_SECTION_LIST_PICTURES" => $arParams["SHOW_SECTION_LIST_PICTURES"],
		"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
		"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
		"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
		"SALE_STIKER" => $arParams["SALE_STIKER"],
		"SHOW_RATING" => $arParams["SHOW_RATING"],
		"SORT_BY1"	=>	$arParams["SORT_BY1"],
		"SORT_ORDER1"	=>	$arParams["SORT_ORDER1"],
		"SORT_BY2"	=>	$arParams["SORT_BY2"],
		"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
			"TOP_DEPTH" => "3"
		), $component, array("HIDE_ICONS" => $isAjax)
);

?>
