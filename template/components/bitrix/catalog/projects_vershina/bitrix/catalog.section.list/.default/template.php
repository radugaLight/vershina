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
<? if( $_REQUEST["IS_AJAX"] == "Y")
{
	$isajax=true;
    	$APPLICATION->RestartBuffer();	
}

if($arParams[IBLOCK_ID]=='70')
{
	$h1=GetMessage('PROJECTSDONE');
	$subtext=GetMessage('PROJECTSDESC');
	$mainclass="projectslist";
}

if($arParams[IBLOCK_ID]=='46')
{
	$h1=GetMessage('NEWS');
	$subtext=GetMessage('NEWSDESC');
	$mainclass="newslist";	
}

if($arParams[IBLOCK_ID]=='69')
{
	$h1=GetMessage('BLOGS');
	$subtext=GetMessage('BLOGSDESC');
	$mainclass="blogslist";		
}



 ?>

