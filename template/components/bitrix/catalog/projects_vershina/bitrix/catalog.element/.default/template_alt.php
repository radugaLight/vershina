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




$this->setFrameMode(true);
$APPLICATION->SetPageProperty('og:image', $arResult['DETAIL_PICTURE']['SRC']);



global $curlang, $ctext;
include_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/templates/corporation/lang/' . $curlang . '/replace_text.php';

if ($arParams[IBLOCK_ID] == '70') {
  $whatsnext = GetMessage('PROJECTSNEXT');
  $whattosee = GetMessage('NEWS');
  $whattoseeid = '46';
  $seelink = "news";
  $nextlink = "projects";
}

if ($arParams[IBLOCK_ID] == '46') {
  $whatsnext = GetMessage('NEWSNEXT');
  $whattosee = GetMessage('PROJECTS');
  $whattoseeid = '70';
  $seelink = "projects";
  $nextlink = "news";
}

if ($arParams[IBLOCK_ID] == '69') {
  $whatsnext = GetMessage('BLOGSNEXT');
  $whattosee = GetMessage('PROJECTS');
  $whattoseeid = '70';
  $seelink = "projects";
  $nextlink = "blog";
}




function localText($a1)
{
  global $ctext;

  foreach ($ctext as $t => $t2) {

    $a1 = str_replace($t, $t2, $a1);

  }
  return $a1;
}

//$imgtitle=$arResult[NAME].' - '.$arResult["PROPERTIES"]['YEAR']['VALUE'].', '.$arResult["PROPERTIES"]['YEAR']['VALUE'];


//Загрузка русской версии
if ($arResult['PROPERTIES']['PARENTEL']['VALUE']) {
  $linkel = $arResult['PROPERTIES']['PARENTEL']['VALUE'];
  $arSelect = array("PREVIEW_PICTURE", "DETAIL_PICTURE", "PROPERTY_*");
  $arFilter = array("IBLOCK_ID" => 70, "ID" => $linkel, "PROPERTY_LINK");
  $res = CIBlockElement::GetList(array(), $arFilter, false, false);
  while ($ob = $res->GetNextElement()) {
    $arFieldsNews = $ob->GetFields();
    $arFieldsNewsProps = $ob->GetProperties();

  }

  foreach ($arFieldsNewsProps as $key => $selection) {
    if ($arResult['PROPERTIES'][$key]['VALUE'] == '' && $arFieldsNewsProps[$key]['VALUE']) {



      $arFieldsNewsProps[$key]['VALUE'] = $arFieldsNewsProps[$key]['VALUE'];



      $arResult['PROPERTIES'][$key]['VALUE'] = $arFieldsNewsProps[$key]['VALUE'];
    }

  }
  $files = array();
  if ($arResult['DETAIL_PICTURE']['SRC'] == '') {
    $filestmp = CFile::GetByID($arFieldsNews['DETAIL_PICTURE']);

    $detailpic = CFile::GetPath($filestmp->arResult[0]['ID']);

    $arResult['DETAIL_PICTURE']['SRC'] = $detailpic;
  }

}


//Конец загрузки русской версии

if ($curlang == "ru") {
  $rodpad = array();
  $rodpad["Культурно-развлекательные центры"] = "освещение культурно-развлекательного центра";
  $rodpad["Исторические здания и культурные объекты"] = "освещение здания";
  $rodpad["Торговые центры"] = "освещение торгового центра";
  $rodpad["Малые архитектурные формы"] = "освещение памятника";
  $rodpad["Предприятия и офисы"] = "освещение здания";
  $rodpad["Жилые дома"] = "освещение жилого дома";
  $rodpad["Бизнес-центры"] = "освещение бизнес-центра";
  $rodpad["Мосты"] = "освещение моста";
  $rodpad["Магазины"] = "освещение магазина";



 
  if ($rodpad[$arResult["PROPERTIES"]["CATEGORY"]["VALUE"]])
    $imgtitle = $arResult['NAME'] . " - " . $rodpad[$arResult["PROPERTIES"]["CATEGORY"]["VALUE"]] . ', ' . $arResult["PROPERTIES"]['CITY']['VALUE'] . ', ' . $arResult["PROPERTIES"]['YEAR']['VALUE'];
  else
    $imgtitle = $arResult['NAME'];
} else {
  $imgtitle = $arResult['NAME'];
}


?>










<div class="work mini-section--mb full-news isblog">
  <div class=" full-news__elem">
    <div class="full-news__slider">
      <div class="like-repost">
  
  				   <? 
				   if($arResult['PROPERTIES']['PARENTEL']['VALUE']>0)
				   {
					    $likeid=$arResult['PROPERTIES']['PARENTEL']['VALUE'];
				   }
				   else
				   {
					   $likeid=$arResult['ID'];
				   }
				      
				   
				   
				   $APPLICATION->IncludeComponent(
    "vasoft:likeit.button",
    "likes_simple_next",
    array(
        "SHOW_COUNTER" => "Y", // отображать счетчик
        "ENABLE_ACTION" => "Y", // разрешить голосование
        "ID" => $likeid // идентификатор элемента
    ),
    $component
);?>
<? $this->addExternalJs("/bitrix/js/vasoft.likeit/likeit.js"); ?>
  
  
        <a id="getcons" onclick="newscroll('#PopupFormCatalog'); return false;" href="#" class="full-project__information-button-like"><img src="/i/v2/icons/repost.svg"></a>
      </div>
      <ul class="bxslider2">
        <?
        $file = "";
        $files = array();
	$img = CFile::GetFileArray($arResult["PROPERTIES"]["PICTURE"]["VALUE"]);  


		if($arResult['DETAIL_PICTURE']['SRC'])
     $files[] = $arResult['DETAIL_PICTURE']['SRC'];	
        if ($img['SRC'])
          $files[] = $img['SRC'];
        foreach ($arResult['PROPERTIES']['PHOTO']['VALUE'] as $file) {
          $filestmp = CFile::GetByID($file);

          $files[] = CFile::GetPath($filestmp->arResult[0]['ID']);

        }
        foreach ($arResult['PROPERTIES']['PHOTO2']['VALUE'] as $file) {
          $filestmp = CFile::GetByID($file);

          $files[] = CFile::GetPath($filestmp->arResult[0]['ID']);

        }
		

		if($arResult["PROPERTIES"]["PICTURE"]["VALUE"])
$filespic1[] = CFile::GetFileArray($arResult["PROPERTIES"]["PICTURE"]["VALUE"])['SRC'];
		
	if($arResult["PROPERTIES"]["PICTURE2"]["VALUE"])
$filespic2[] = CFile::GetFileArray($arResult["PROPERTIES"]["PICTURE2"]["VALUE"])['SRC'];	 

	if($arResult["PROPERTIES"]["PICTURE3"]["VALUE"])
$filespic3[] = CFile::GetFileArray($arResult["PROPERTIES"]["PICTURE2"]["VALUE"])['SRC'];	


        foreach ($files as $file) {

			$array = explode('.', $file);
			$extension = end($array);
			
          if ($file != "") {
        ?>

        <li style="text-align: center;">
        <a rel="fancyitem" data-fancybox="gallery" class="fancy is<?=$extension?>"
            href="<?= $file ?>">
            <div alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage"
             style="background-image: url('<?= $file ?>')"></div>
            </a>
            </li>



        <? }
        } ?>
      </ul>
      <div class="bx-pagers full-news__bx-pagers nomobile">
        <?
        $i = 0;
        foreach ($files as $file) { ?>


        <a data-slide-index="<?= $i ?>" href=""><img style="margin-top: 0px;" alt="<?= $imgtitle ?>"
            title="<?= $imgtitle ?>" src="<?= $file ?>"></a>

        <? $i++;
        } ?>

      </div>
    </div>
    <div class="full-news__content">
      <!-- <? if ($arResult["PROPERTIES"]['YEAR']['VALUE']) { ?>
      <div class="full-news__year">
        <p class="page-text page-text--s page-text--med page-text--125">
          <? /*= $arResult["PROPERTIES"]['YEAR']['VALUE'] */?>
        </p>
      </div>
      <? } ?> -->
      <div class="full-news__year page-text page-text--s page-text--med page-text--125">
        <p class="mini-news__date">
          <?=FormatDateFromDB($arResult["DATE_CREATE"], 'SHORT'); ?>
        </p>
           <? 

if($arResult["TAGS"]){
$tags=explode(',',$arResult["TAGS"]);
			foreach ($tags as $key => $val):
         ?><a href="https://raduga-light.com/ru/search/?q=<?=$val?>"><p class="mini-news__date"><?=$val?></p></a><?
      endforeach;
}
	 ?>
      </div>
      <div class="full-news__text page-text page-text--m page-text--reg page-text--c-e6e6e6">
        <h1 class="heading heading--3" style=" width: 100%">
          <?= $arResult['NAME'] ?>
        </h1>
		
		
         <? if (!empty($arResult["PROPERTIES"]['TEXT1']['VALUE'])): ?>
        <div>
          <?= $arResult["PROPERTIES"]['TEXT1']['~VALUE'][TEXT] ?>
        </div>
        <? endif; ?>
		</div>
		<? if($filespic1) { ?> 
		
		  <!-- <div class="full-project__text page-text page-text--m page-text--reg page-text--c-e6e6e6"> -->
         <?
        foreach ($filespic1 as $file) {


			$array = explode('.', $file);
			$extension = end($array);
			
			
          if ($file != "") {
        ?>
        <div class class="fullwidthpicture"> 
            <img alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage" src="<?= $file ?>">
         
          </div>
        <? }
        } ?>
		<!-- </div> -->
		<? } ?>
		
		
		
        <? if (!empty($arResult["PROPERTIES"]['TEXT2']['VALUE'])): ?>
         <div class="full-news__text page-text page-text--m page-text--reg page-text--c-e6e6e6">
		 <div>
          <?= $arResult["PROPERTIES"]['TEXT2']['~VALUE'][TEXT] ?>
        </div></div>
        <? endif; ?>
		
		
				<? if($filespic2) { ?> 
		  <!-- <div class="full-project__text page-text page-text--m page-text--reg page-text--c-e6e6e6"> -->
         <?
        foreach ($filespic2 as $file) {


			$array = explode('.', $file);
			$extension = end($array);
			
			
          if ($file != "") {
        ?>
        <!-- <div class class="fullwidthpicture"> -->
            <img alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage" src="<?= $file ?>">
         
          <!-- </div> -->
        <? }
        } ?>
		<!-- </div> -->
		<? } ?>
		
		
		
        <? if (!empty($arResult["PROPERTIES"]['TEXT3']['VALUE'])): ?>
         <div class="full-news__text page-text page-text--m page-text--reg page-text--c-e6e6e6"><div>
          <?= $arResult["PROPERTIES"]['TEXT3']['~VALUE'][TEXT] ?>
        </div></div>
        <? endif; ?>
		
		
		
		<? if($filespic3) { ?> 
		  <!-- <div class="full-project__text page-text page-text--m page-text--reg page-text--c-e6e6e6"> -->
         <?
        foreach ($filespic3 as $file) {


			$array = explode('.', $file);
			$extension = end($array);
			
			
          if ($file != "") {
        ?>
        <!-- <div class class="fullwidthpicture"> -->
            <img alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage" src="<?= $file ?>">
         
          <!-- </div> -->
        <? }
        } ?>
		<!-- </div> -->
		<? } ?>
		
		
			
        <? if (!empty($arResult["DETAIL_TEXT"])): ?>
        <div class="full-news__text page-text page-text--m page-text--reg page-text--c-e6e6e6"> <div>
          <?= $arResult["DETAIL_TEXT"] ?>
        </div>  </div>
        <? endif; ?>
		
    
	  



      
     
    </div>
  </div>





    <?
	global $similarNewsFilter;
	$similarNewsFilter = Array(

"TYPEOFNEWS" => $arResult["PROPERTIES"]['TYPEOFNEWS']['XML_ID']
);?>  

  <? 
  
  
  $APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "ProjectsList_next3",
    array(
      "ACTION_VARIABLE" => "action",
      // Название переменной, в которой передается действие
      "ADD_PICT_PROP" => "-",
      "ADD_PROPERTIES_TO_BASKET" => "Y",
      // Добавлять в корзину свойства товаров и предложений
      "ADD_SECTIONS_CHAIN" => "N",
      // Включать раздел в цепочку навигации
      "ADD_TO_BASKET_ACTION" => "ADD",
      "AJAX_MODE" => "N",
      // Включить режим AJAX
      "AJAX_OPTION_ADDITIONAL" => "",
      // Дополнительный идентификатор
      "AJAX_OPTION_HISTORY" => "N",
      // Включить эмуляцию навигации браузера
      "AJAX_OPTION_JUMP" => "N",
      // Включить прокрутку к началу компонента
      "AJAX_OPTION_STYLE" => "Y",
      // Включить подгрузку стилей
      "BACKGROUND_IMAGE" => "-",
      // Установить фоновую картинку для шаблона из свойства
      "BASKET_URL" => "/personal/basket.php",
      // URL, ведущий на страницу с корзиной покупателя
      "BROWSER_TITLE" => "-",
      // Установить заголовок окна браузера из свойства
      "CACHE_FILTER" => "N",
      // Кешировать при установленном фильтре
      "CACHE_GROUPS" => "Y",
      // Учитывать права доступа
      "CACHE_NOTES" => "",
      "CACHE_TIME" => "36000000",
      // Время кеширования (сек.)
      "CACHE_TYPE" => "A",
      // Тип кеширования
      "COMPATIBLE_MODE" => "Y",
      // Включить режим совместимости
      "CONVERT_CURRENCY" => "N",
      // Показывать цены в одной валюте
      "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
      "DETAIL_URL" => "/ru/news/#ELEMENT_CODE#/",
      // URL, ведущий на страницу с содержимым элемента раздела
      "DISABLE_INIT_JS_IN_COMPONENT" => "N",
      // Не подключать js-библиотеки в компоненте
      "DISPLAY_BOTTOM_PAGER" => "N",
      // Выводить под списком
      "DISPLAY_COMPARE" => "N",
      // Разрешить сравнение товаров
      "DISPLAY_TOP_PAGER" => "N",
      // Выводить над списком
      "ELEMENT_SORT_FIELD" => "sort",
      // По какому полю сортируем элементы
      "ELEMENT_SORT_FIELD2" => "id",
      // Поле для второй сортировки элементов
      "ELEMENT_SORT_ORDER" => "desc",
      // Порядок сортировки элементов
      "ELEMENT_SORT_ORDER2" => "desc",
      // Порядок второй сортировки элементов
      "ENLARGE_PRODUCT" => "STRICT",
      "FILTER_NAME" => "similarNewsFilter",
      // Имя массива со значениями фильтра для фильтрации элементов
      "HIDE_NOT_AVAILABLE" => "N",
      // Недоступные товары
      "HIDE_NOT_AVAILABLE_OFFERS" => "N",
      // Недоступные торговые предложения
      "IBLOCK_ID" => "46",
      // Инфоблок
      "IBLOCK_TYPE" => "vbf_corporation_content",
      // Тип инфоблока
      "INCLUDE_SUBSECTIONS" => "Y",
      // Показывать элементы подразделов раздела
      "LABEL_PROP" => "",
      "LAZY_LOAD" => "N",
      "LINE_ELEMENT_COUNT" => "3",
      // Количество элементов выводимых в одной строке таблицы
      "LOAD_ON_SCROLL" => "N",
      "MESSAGE_404" => "",
      // Сообщение для показа (по умолчанию из компонента)
      "MESS_BTN_ADD_TO_BASKET" => "В корзину",
      "MESS_BTN_BUY" => "Купить",
      "MESS_BTN_DETAIL" => "Подробнее",
      "MESS_BTN_SUBSCRIBE" => "Подписаться",
      "MESS_NOT_AVAILABLE" => "Нет в наличии",
      "META_DESCRIPTION" => "-",
      // Установить описание страницы из свойства
      "META_KEYWORDS" => "-",
      // Установить ключевые слова страницы из свойства
      "OFFERS_LIMIT" => "3",
      // Максимальное количество предложений для показа (0 - все)
      "PAGER_BASE_LINK_ENABLE" => "N",
      // Включить обработку ссылок
      "PAGER_DESC_NUMBERING" => "N",
      // Использовать обратную навигацию
      "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
      // Время кеширования страниц для обратной навигации
      "PAGER_SHOW_ALL" => "N",
      // Показывать ссылку "Все"
      "PAGER_SHOW_ALWAYS" => "N",
      // Выводить всегда
      "PAGER_TEMPLATE" => "catalog",
      // Шаблон постраничной навигации
      "PAGER_TITLE" => "Элементы",
      // Название категорий
      "PAGE_ELEMENT_COUNT" => "3",
      // Количество элементов на странице
      "PARTIAL_PRODUCT_PROPERTIES" => "N",
      // Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
      "PRICE_CODE" => "",
      // Тип цены
      "PRICE_VAT_INCLUDE" => "Y",
      // Включать НДС в цену
      "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
      "PRODUCT_ID_VARIABLE" => "id",
      // Название переменной, в которой передается код товара для покупки
      "PRODUCT_PROPS_VARIABLE" => "prop",
      // Название переменной, в которой передаются характеристики товара
      "PRODUCT_QUANTITY_VARIABLE" => "quantity",
      // Название переменной, в которой передается количество товара
      "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
      "PRODUCT_SUBSCRIPTION" => "Y",
      "PROPERTY_CODE_MOBILE" => array(
        0 => "ANNOUNCE",
      ),
      "RCM_PROD_ID" => "",
      "RCM_TYPE" => "personal",
      "SECTION_CODE" => "",
      // Код раздела
      "SECTION_ID" => "",
      // ID раздела
      "SECTION_ID_VARIABLE" => "SECTION_ID",
      // Название переменной, в которой передается код группы
      "SECTION_URL" => "/ru/news/",
      // URL, ведущий на страницу с содержимым раздела
      "SECTION_USER_FIELDS" => array(
        // Свойства раздела
        0 => "",
        1 => "",
      ),
      "SEF_MODE" => "Y",
      // Включить поддержку ЧПУ
      "SET_BROWSER_TITLE" => "Y",
      // Устанавливать заголовок окна браузера
      "SET_LAST_MODIFIED" => "N",
      // Устанавливать в заголовках ответа время модификации страницы
      "SET_META_DESCRIPTION" => "Y",
      // Устанавливать описание страницы
      "SET_META_KEYWORDS" => "Y",
      // Устанавливать ключевые слова страницы
      "SET_STATUS_404" => "N",
      // Устанавливать статус 404
      "SET_TITLE" => "Y",
      // Устанавливать заголовок страницы
      "SHOW_404" => "N",
      // Показ специальной страницы
      "SHOW_ALL_WO_SECTION" => "N",
      // Показывать все элементы, если не указан раздел
      "SHOW_CLOSE_POPUP" => "N",
      "SHOW_DISCOUNT_PERCENT" => "N",
      "SHOW_FROM_SECTION" => "N",
      "SHOW_MAX_QUANTITY" => "N",
      "SHOW_OLD_PRICE" => "N",
      "SHOW_PRICE_COUNT" => "1",
      // Выводить цены для количества
      "SHOW_SLIDER" => "Y",
      "SLIDER_INTERVAL" => "3000",
      "SLIDER_PROGRESS" => "N",
      "TEMPLATE_THEME" => "blue",
      "USE_ENHANCED_ECOMMERCE" => "N",
      "USE_MAIN_ELEMENT_SECTION" => "N",
      // Использовать основной раздел для показа элемента
      "USE_PRICE_COUNT" => "N",
      // Использовать вывод цен с диапазонами
      "USE_PRODUCT_QUANTITY" => "N",
      // Разрешить указание количества товара
      "COMPONENT_TEMPLATE" => "NewsList_next3",
      "SEF_RULE" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
      // Правило для обработки
      "SECTION_CODE_PATH" => ""
    )
  ); ?>

</div>
<div class="work">
  <? if ($arResult['PROPERTIES']['VIDEO']['VALUE']) { ?>
<div class="style1_1" >
  <? if ($arResult['PROPERTIES']['VIDEO']['VALUE']) {
    $filevideo = CFile::GetByID($arResult['PROPERTIES']['VIDEO']['VALUE']);
    $videosrc = CFile::GetPath($filevideo->arResult[0]['ID']);
  ?>
  <div class="videotop">
    <video autoplay muted loop id="myVideo" style="width: 100%; height: auto; vertical-align: middle;">
      <source src="<?= $videosrc ?>" type="video/mp4">
    </video>
  </div>
  <? $curPage = $APPLICATION->GetCurPage(false);
    $canonical = 'https://' . str_replace(':443', '', $_SERVER["HTTP_HOST"]) . $curPage;

    $old_date_timestamp = strtotime($arResult["DATE_CREATE"]);
    $new_date = date('Y-m-d H:i:s', $old_date_timestamp);


  ?>
  <script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "VideoObject",
  "name": "<?= $arResult['NAME'] ?>",
  "description": "<?= $imgtitle ?>",
  "thumbnailUrl": "https://raduga-light.com<?= $arResult["PREVIEW_PICTURE"]['SRC'] ?>",
  "uploadDate": "<?= $new_date ?>",
  "publisher": {
    "@type": "Organization",
    "name": "RADUGA - Technology of Light",
    "logo": {
      "@type": "ImageObject",
      "url": "https://raduga-light.com/icons/android-icon-192x192.png",
      "width": 192,
      "height": 192
    }
  },
  "contentUrl": "<?= $canonical ?>",
  "embedUrl": "https://raduga-light.com<?= $videosrc ?>"
}
</script>
  <? } ?>
  <?
  if ($img && $arResult['PROPERTIES']['PHOTO']['VALUE']) { ?>

  <script>jQuery(document).ready(function () {

      var hh = parseInt("<?= $img['HEIGHT'] ?>");
      if (hh < 400)
        hh = 400;

      hh = hh + 'px';
      $('.customcolors   .inlineimage').css('max-height', hh);
      jQuery('.bxslider2').bxSlider({
        pager: true, // отключаем индикатор количества слайдов
        nextText: '', // отключаем текст кнопки Next
        prevText: '', // отключаем текст кнопки Prev
        controls: true,
        touchEnabled: true,
        pagerCustom: '.bx-pagers',
        mode: 'fade'
      });

      $(".customcolors").fadeTo("slow", 1);
    });


  </script>

  <style>
    /* .bx-pagers {
        bottom: 8px;
      }

      .slider2 .inlineimage {
        margin: 0px !important;
      }

      .slider2 .bx-pagers div {
        background-color: transparent;
      }

      .bx-pagers a img {
        margin-top: 0px;
        height: 30px;
        width: auto;
        margin-left: 3px;
        margin-right: 3px;
        object-fit: fill;
      } */

  </style>




  <? } else if (!$arResult['PROPERTIES']['VIDEO']['VALUE'] && $img) {
    $heightbanner = 460;
    if ($img['HEIGHT'] > 460) {
      $heightbanner = (755 / $img['WIDTH']) * $img['HEIGHT'];
    }
  ?>
  <div class="fullwidthbannerprojects " style="background:url(<?= $img['SRC'] ?>); height:<?= $heightbanner ?>px !important;">
  </div>
  <? } ?>

</div>
  <? } ?>


<? if ($arResult['PROPERTIES']['LINK_ELEMENT']['VALUE']||$arResult['PROPERTIES']['LINK_CATEGORIES']['VALUE']) { 

if($arResult['PROPERTIES']['LINK_TEXT']['VALUE'])
	$productsused = $arResult['PROPERTIES']['LINK_TEXT']['VALUE'];
else
$productsused=GetMessage("PRODUCTSUSED");

?>

<div class="mini-section--mb">
  <div class="advantages mainsection" style="margin-top: 0px; margin-bottom: 0px;">
    <h2 class="heading heading--2">
      <?=$productsused; ?>
    </h2>
    <ul class="scrollingsimilar items itemsshort clearfix">
      <?
	  
	  
	  //Ссылки на категории товаров
	  	  if($arResult['PROPERTIES']['LINK_CATEGORIES']['VALUE']) {
  foreach ($arResult['PROPERTIES']['LINK_CATEGORIES']['VALUE'] as $linkel) {

 $arSelect = Array("ID","IBLOCK_ID", "NAME","DESCRIPTION","UF_DESCRIPTION","SECTION_PAGE_URL","PICTURE" );
 
 
    if($curlang=="ru")
   $arFilter = Array("IBLOCK_ID"=>200, "ID"=>$linkel, "PROPERTY_ANNOUNCE" ); 
else
	   $arFilter = Array("IBLOCK_ID"=>GetMessage("CATALOGBLOCK"), "UF_PARENTEL"=>$linkel ); 

   $res = CIBlockSection::GetList(Array(), $arFilter, false,  $arSelect); 
   
   
   while($ob = $res->GetNext()) 
   {
	   


      ?>
      <li class="item item3 listprops" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <? if ($ob['SECTION_PAGE_URL']): ?><a href="<?=$ob['SECTION_PAGE_URL'] ?>">
          <? endif; ?>
          <div class="topcatalogimage"
            style="background-image: url(<?= CFile::GetPath($ob['PICTURE']) ?>);">

            <span class="title">
              <?=$ob["NAME"] ?>
            </span>


          </div>
          <? if ($ob['SECTION_PAGE_URL']): ?>
        </a>
        <? endif; ?>
      </li>

      <?
			}
		}
	  }
	  
	  //Ссылки на товары
	  
	  if($arResult['PROPERTIES']['LINK_ELEMENT']['VALUE']) {
  foreach ($arResult['PROPERTIES']['LINK_ELEMENT']['VALUE'] as $linkel) {

    $arSelect = array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_LINK", "PROPERTY_ICON", "PROPERTY_POSITION");
    if ($curlang == "ru")
      $arFilter = array("IBLOCK_ID" => 200, "ID" => $linkel, "PROPERTY_LINK");
    else
      $arFilter = array("IBLOCK_ID" => GetMessage("CATALOGBLOCK"), "PROPERTY_PARENTEL" => $linkel, "PROPERTY_LINK");

    $res = CIBlockElement::GetList(array(), $arFilter, false, false);
    while ($ob = $res->GetNextElement()) {
      $arFieldsNews = $ob->GetFields();
      $arFieldsNewsProps = $ob->GetProperties();




      ?>
      <li class="item item3 listprops" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <? if ($arFieldsNews["DETAIL_PAGE_URL"]): ?><a href="<?= $arFieldsNews["DETAIL_PAGE_URL"] ?>">
          <? endif; ?>
          <div class="topcatalogimage"
            style="background-image: url(<?= CFile::GetPath($arFieldsNews['PREVIEW_PICTURE']) ?>);">

            <span class="title">
              <?= $arFieldsNews["NAME"] ?>
            </span>


          </div>
          <? if ($arFieldsNews["DETAIL_PAGE_URL"]): ?>
        </a>
        <? endif; ?>
      </li>

      <?
			}
		}
	  }
	  
	 
      ?>
    </ul>
  </div>
</div>

<? }
?>


<? if ($arResult['PROPERTIES']['YAMAP']['VALUE']):


?>
<? $arPos = explode(",", $arResult['PROPERTIES']['YAMAP']['VALUE']); ?>
<div class="style1_1" style="padding-right: 6px;">
  <div class="yandexmapa">
    <? $APPLICATION->IncludeComponent(
    "bitrix:map.yandex.view",
    "",
    array(
      "INIT_MAP_TYPE" => "MAP",
      "MAP_DATA" => serialize(
        array(
          'yandex_lat' => $arPos[0],
          'yandex_lon' => $arPos[1],
          'yandex_scale' => 13,
          'PLACEMARKS' => array(
            array(
              'TEXT' => $arResult['PROPERTIES']["YAMAP"]["VALUE"] . ", " . $arResult['PROPERTIES']["YAMAP"]["VALUE"],
              'LON' => $arPos[1],
              'LAT' => $arPos[0],
            ),
          ),
        )
      ),
      "MAP_WIDTH" => "100%",
      "MAP_HEIGHT" => "676",
      "CONTROLS" => array("ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
      "OPTIONS" => array("DESABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING"),
      "MAP_ID" => ""
    ),
  false
  ); ?>
  </div>

</div>
<? endif; ?>
<?

$arFilter = array("IBLOCK_ID" => $whattoseeid, "ACTIVE" => "Y");
$arFilter = array(
  "IBLOCK_ID" => $whattoseeid,
  "ACTIVE" => "Y",
);



$resNav = CIBlockElement::GetList(
  array(
    $arParams['SORT_BY1'] => $arParams['SORT_ORDER1'],
    $arParams['SORT_BY2'] => $arParams['SORT_ORDER2'],
  ),
  $arFilter,
false,
  array("nPageSize" => 3, "nElementID" => $whattoseeid),
  array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_LINK", "PROPERTY_ICON", "PROPERTY_ANNOUNCE", "PROPERTY_PARENTEL")
);
$cnt = $resNav->SelectedRowsCount();
?>




<?

$arFilter = array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ACTIVE" => "Y");
$arFilter = array(
  "IBLOCK_ID" => $arResult["IBLOCK_ID"],
  "ACTIVE" => "Y"
);



$resNav = CIBlockElement::GetList(
  array(
    $arParams['SORT_BY1'] => $arParams['SORT_ORDER1'],
    $arParams['SORT_BY2'] => $arParams['SORT_ORDER2'],
  ),
  $arFilter,
false,
  array("nPageSize" => 7, "nElementID" => $arResult["ID"]),
  array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_LINK", "PROPERTY_ICON", "PROPERTY_ANNOUNCE", "PROPERTY_PARENTEL")
);
$cnt = $resNav->SelectedRowsCount();
?>

</div>

<!-- <div class="work">

  <div class="advantages mainsection" style="margin-top: 0px; margin-bottom: 0px;">
    <h3 class=" ">
      <? /* = $whatsnext */?><a href="/ru/<? /*=  $nextlink */?>/">
          <div class="lowerinlinealt" style="">
            <div class="">подробнее</div>
          </div>
        </a>
    </h3>
  </div>
</div> -->
<!-- <ul class="items  clearfix scrollingrecommended">
  <? /*
   $i1 = 0;
   $removefirst = false;
   while ($ob = $resNav->GetNextElement()) {
   $arFieldsNews = $ob->GetFields();
   $arFieldsNewsProps = $ob->GetProperties();
   if (intval($arFieldsNews["ID"]) == intval($arResult["ID"])) {
   continue;
   }
   if ($removefirst == false && $cnt > 3) {
   $removefirst = true;
   continue;
   }
   $i1++;
   $resize_image = CFile::ResizeImageGet(
   $arFieldsNews["PREVIEW_PICTURE"],
   array("width" => 1100, "height" => 600),
   BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
   false
   );
   if ($i1 > 7)
   break;
   if ($i1 < 2)
   $newsclass = "project50";
   else
   $newsclass = "project30";
   ?>
   <li class=" recommended " id="<?= $this->GetEditAreaId($arFieldsNews['ID']); ?>">
   <? if ($arFieldsNews["DETAIL_PAGE_URL"]): ?><a href="<?= $arFieldsNews["DETAIL_PAGE_URL"] ?>">
   <? endif; ?>
   <div class="image" style="background-image: url(<?= $resize_image['src'] ?>);">
   </div>
   </a>
   <a href="<?= $arFieldsNews["DETAIL_PAGE_URL"] ?>">
   <div class="overflower">
   <p class="title">
   <?= $arFieldsNews["NAME"] ?>
   </p>
   <? if ($arFieldsNewsProps['YEAR']['VALUE']): ?>
   <p class="rightfont">
   <?= $arFieldsNewsProps['YEAR']['~VALUE'] ?> &nbsp; <?= $arFieldsNewsProps['CITY']['~VALUE'] ?>
   </p>
   <? endif; ?>
   <div class="shower">
   <?= mb_substr(strip_tags($arFieldsNews['PREVIEW_TEXT']), 0, 1000) . '' ?>
   </div>
   </div>
   </a>
   </li>
   <?
   }
   */?>
</ul> -->
</div>
<script>
  reloadSliders();
</script>
