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







<div class="work">


<div class="full-project mini-section--mb">
   <div class="full-project__header page-section__header page-section__header--flex">
     <h1 class="heading heading--3" style=" width: 100%">
          <?= $arResult['NAME'] ?>
    </h1>
      <p>
       Мы постоянно расширяем ассортимент, чтобы с помощью светильников RADUGA™ наши клиенты и партнеры могли найти решение даже самых сложных и нестандартных задач
      </p>
  </div>
  <div class="full-project__information">
      <div>
	  <? if( $arResult["PROPERTIES"]['CITY']['VALUE']) { ?>
        <div class="full-project__place full-project__information-item">
          <p>Местоположение</p>
          <p><?= $arResult["PROPERTIES"]['CITY']['VALUE'] ?></p>
        </div>
	  <? } ?>
	   <? if( $arResult["PROPERTIES"]['YEAR']['VALUE']) { ?>
        <div class="full-project__year full-project__information-item">
          <p>Год</p>
          <p><?= $arResult["PROPERTIES"]['YEAR']['VALUE'] ?></p>
        </div>
  
	   <? } ?>    </div>
      <div class="full-project__information-buttons">
          <div>
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
            <a id="getcons" onclick="newscroll('#PopupFormCatalog'); return false;" href="#" class="full-project__information-button-like"><img src="/i/v2/icons/repost.svg"/></a>
          </div>
          <!-- <div>
            <div class="full-project__slider-button swiper-button-prev inner-arrow"></div>
            <div class="full-project__slider-button swiper-button-next inner-arrow"></div>
          </div> -->
      </div>
  </div>
    <div class="full-project__slider swiper mini-section--mb">
      <div class="swiper-wrapper">
         <?
        $file = "";
        $files = array();
        if ($arResult['DETAIL_PICTURE']['SRC'])
          $files[] = $arResult['DETAIL_PICTURE']['SRC'];
        foreach ($arResult['PROPERTIES']['PHOTO']['VALUE'] as $file) {
			
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
        <li class="swiper-slide">
          <a rel="fancyitem" data-fancybox="gallery" class="fancy is<?=$extension?>" href="<?= $file ?>">
            <img alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage" src="<?= $file ?>">
          </a>
        </li>
        <? }
        } ?>
      </div>
      <div class="full-project__slider-pagination default-pag-bullets"></div>
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
    <div class="full-project__content proj-article mini-section--mb accordion mobile-accordion">
      <!-- <? if ($arResult["PROPERTIES"]['YEAR']['VALUE']) { ?>
      <div class="full-news__year">
        <p class="page-text page-text--s page-text--med page-text--125">
          <? /*= $arResult["PROPERTIES"]['YEAR']['VALUE'] */?>
        </p>
      </div>
      <? } ?> -->
     <!--  <div class="full-news__year page-text page-text--s page-text--med page-text--125">
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
       
      </div> -->
      <h2 class="heading heading--3">
     <?= $arResult["PREVIEW_TEXT"] ?>
      </h2>
    
       
		    <? if (!empty($arResult["PROPERTIES"]['TEXT1']['VALUE'])): ?>
			  <div class="full-project__text page-text page-text--m page-text--reg page-text--c-e6e6e6">
        <div>
          <?= $arResult["PROPERTIES"]['TEXT1']['~VALUE'][TEXT] ?>
        </div>
		</div>
		
		
		<? if($filespic1) { ?> 
		  <!-- <div class="full-project__text page-text page-text--m page-text--reg page-text--c-e6e6e6"> -->
         <?
        foreach ($filespic1 as $file) {


			$array = explode('.', $file);
			$extension = end($array);
			
			
          if ($file != "") {
        ?>
        <!-- <div class class="fullwidthpicture"> -->
		 <div class="full-project__text page-text page-text--m page-text--reg page-text--c-e6e6e6">
            <img alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage" src="<?= $file ?>">
         </div>
          <!-- </div> -->
        <? }
        } ?>
		<!-- </div> -->
		<? } ?>
	
	
	
        <? endif; ?>
        <? if (!empty($arResult["PROPERTIES"]['TEXT2']['VALUE'])): ?>
		  <div class="full-project__text page-text page-text--m page-text--reg page-text--c-e6e6e6">
        <div>
          <?= $arResult["PROPERTIES"]['TEXT2']['~VALUE'][TEXT] ?>
        </div>
		</div>
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
		
		
		
        <? if (!empty($arResult["DETAIL_TEXT"])): ?>
	
       <div class="page-text page-text--m page-text--reg">
         
          <?= $arResult["DETAIL_TEXT"] ?>
          </div> 
        <? endif; ?>
     
      <div class="page-button--mobile accordion-button">
          <a class="page-button page-button--tertiary" href="#">
            <div class="page-button__text flex"><span>Читать больше</span> <img src="/i/v2/icons/arrowbottom-button.svg"></div>
          </a>
      </div>
     <!--  <a id="getcons" class="page-button page-button--tertiary" onclick="newscroll('#PopupFormCatalog'); return false;"
        href="#">
        <div class="page-button__text flex"><span>Подробнее о модели</span> <img src="/i/v2/icons/arrright.svg">
        </div>
      </a> -->
	  
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
		
		
		
		
		
		
    </div>
    <div>
  <? if ($arResult['PROPERTIES']['VIDEO']['VALUE']) {
    $filevideo = CFile::GetByID($arResult['PROPERTIES']['VIDEO']['VALUE']);
    $videosrc = CFile::GetPath($filevideo->arResult[0]['ID']);
  ?>
  <div class="videotop full-project__video">
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
 
  <? } ?>

</div>

</div>
<div>

  <!-- <p class="smallblack">
      <? /*= $arResult['SECTION']["UF_ARTICLE"] */?>
    </p> -->

  <? $file1 = CFile::GetByID($arResult['SECTION']["UF_CATALOG"]);
  $filesrc = CFile::GetPath($file1->arResult[0]['ID']);
  if ($filesrc == "")
    $filesrc = '/ru/downloads/';
  $img = CFile::GetFileArray($arResult["PROPERTIES"]["PICTURE"]["VALUE"]);
  ?>

  <!-- 
    <div class="statistics statprojects" style=" margin-top: 0px;">
      <? if ($arResult["PROPERTIES"]['CITY']['VALUE']) { ?>
      <div class="style1_2">

        <p class="bolder">Город</p>
        <p class="smallgrey">
          <? /*= $arResult["PROPERTIES"]['CITY']['VALUE'] */?>
        </p>
      </div>
      <? } ?>


      <div class="style1_6">
        <p class="bolder">Поделиться</p>
        <p class="smallgrey">
        <ul class="social">
          <li><a href="https://vk.com/radugalightsvet" target="_blank" rel="nofollow"><i class="fa fa-vk"
                aria-hidden="true"></i></a></li>

          <li><a href="https://www.youtube.com/channel/UCYjcEOsZBMJ4yoccYbuhlvg?" target="_blank" rel="nofollow"><i
                class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        </ul>
        </p>
      </div>
      <div class="style1_1">
        <p class="smallgrey">
          <? /*= $arResult["PREVIEW_TEXT"] */?>
        </p>
      </div>

    </div> -->
</div>





<? if (!empty($arResult["PROPERTIES"]['TEXT2']['VALUE'])): ?>
<!-- <div class="style1_2  centerfix relfix fullhalf rightpadding ">
    <?

  $img = CFile::GetFileArray($arResult["PROPERTIES"]["PICTURE2"]["VALUE"]);
  if (is_array($img)) {
    if ($arResult["PROPERTIES"]['IMGALIGN2'][VALUE_XML_ID] == '8fa089ea70253c09536feb52cd4fa211') {
    ?>
    <div class="absoluteimagel "
      style="background-image: url(<?= $img['SRC'] ?>); height: <?= $img['HEIGHT'] ?>px; max-height: 800px;"></div>
    <? } else { ?>
    <img alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage  noleft" src="<?= $img['SRC'] ?>">
    <? }
  } ?>
  </div> -->
<!-- <div class="style1_2 smallgrey ">
    <? /*= $arResult["PROPERTIES"]['TEXT2']['~VALUE'][TEXT] */?>
  </div> -->
<? endif; ?>
<!-- <? if (!empty($arResult["DETAIL_TEXT"])): ?>
  <div class="<? if ($arResult[" PROPERTIES"]["PICTURE3"]["VALUE"]) { ?> style1_2 smallgrey
    <? } else { ?>style1_1 smallgrey
    <? } ?>">
    <?= $arResult["DETAIL_TEXT"] ?>
  </div>
  <? if ($arResult["PROPERTIES"]["PICTURE3"]["VALUE"]) { ?>
  <div class="style1_2  centerfix relfix">
    <?

    $img = CFile::GetFileArray($arResult["PROPERTIES"]["PICTURE3"]["VALUE"]);
    if (is_array($img)) {
      if ($arResult["PROPERTIES"]['IMGALIGN3'][VALUE_XML_ID] == '0b7d5054cba82882a0b8fb5eb46c02a2') {
    ?>
    <div class="absoluteimage"
      style="background-image: url(<?= $img['SRC'] ?>);  height: <?= $img['HEIGHT'] ?>px; max-height: 800px;"></div>
    <? } else { ?>
    <img alt="<?= $imgtitle ?>" title="<?= $imgtitle ?>" class="inlineimage " src="<?= $img['SRC'] ?>">
    <? }
    } ?>




  </div>
  <? } ?>
  <? endif; ?> -->



<? if ($arResult['PROPERTIES']['LINK_ELEMENT']['VALUE']) { ?>
<div class="mini-section--mb">
  <div class="advantages mainsection" style="margin-top: 0px; margin-bottom: 0px;">
    <h2 class="heading heading--2">
      <?= GetMessage("PRODUCTSUSED"); ?>
    </h2>
    <ul class="items itemsshort clearfix">
      <?
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
      ?>
    </ul>
  </div>
</div>

<? }
?>




<? if ($arResult["PROPERTIES"]['TEXT3']['~VALUE']) {



  $file = CFile::GetByID($arResult['PROPERTIES']['PICTURE4']['VALUE']);



?>


<div class="fullwidthbannerbottom"
  style="background-image: url(<?= CFile::GetPath($file->arResult[0]['ID']) ?>); height: <?= intval($arResult["PROPERTIES"]['SLIDERH2']['VALUE']) ?>px;">

  <div class="work">
    <div class="<? if ($arResult[" PROPERTIES"]['WHITE_BOTTOM']['VALUE']) { ?> whitefix
      <? } ?>" style="display: table-cell; height: 100%; vertical-align: middle;"><div class="style1_3">
        <?= $arResult["PROPERTIES"]['TEXT3']['~VALUE']['TEXT'] ?>
      </div>
    </div>
  </div>
</div>




<? } ?>




<? if ($arResult['PROPERTIES']['YAMAP']['VALUE']):


?>
<? $arPos = explode(",", $arResult['PROPERTIES']['YAMAP']['VALUE']); ?>
<div class="full-project__map" >
  <h2 class="heading heading--2">Местоположение объекта</h2>
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


<!-- <div class="advantages mainsection noslider" style="margin-top: 0px; margin-bottom: 0px;">
  <h3 class=" ">
    <? /* = $whattosee */?><a href="/ru/<?= $seelink ?>/">
        <div class="lowerinlinealt" style="">
          <div class="">подробнее</div>
        </div>
      </a>
  </h3>
</div> -->
<!-- <ul class="items  clearfix ">
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
   if ($i1 > 3)
   break;
   if ($i1 < 2)
   $newsclass = "recommended huge";
   else
   $newsclass = "recommended mini";
   ?>
   <li class=" <?= $newsclass ?> " id="<?= $this->GetEditAreaId($arFieldsNews['ID']); ?>">
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

<script type="text/javascript"> 
  
  // $( function () {
  //   const slidesCount =  $('.full-project__slider .swiper-wrapper .swiper-slide')
    
  //   const fullProjectSlide = new Swiper('.full-project__slider', {
  //   slidesPerView: 1,
  //   spaceBetween: 20,
  //   speed: 400,
  //   loop: slidesCount.length > 1,
  //   navigation: {
  //     nextEl: '.full-project__slider-button.swiper-button-next',
  //     prevEl: '.full-project__slider-button.swiper-button-prev',
  //   },
  //   pagination: {
  //   el: '.full-project__slider-pagination',
  //   type: 'bullets',
  // },
  // });
  // })
  
</script>
