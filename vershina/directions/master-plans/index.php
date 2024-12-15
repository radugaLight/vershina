<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "мастер-план световой освещение города");
$APPLICATION->SetPageProperty("description", "Проектируем и реализуем освещение города под ключ, заказать в светотехнической компании полного цикла \"Вершина\". Работаем по ФЗ-223 и ФЗ-44, более 70 успешно реализованных объектов в Москве, области. Поставка, монтаж по всей России. Выполняем работы в рамках энергосервисного контракта.");
$APPLICATION->SetPageProperty("title", "Световой мастер-план города - заказать проект и монтаж.");
$APPLICATION->SetTitle("Мастер-планы");
?>
<section class="direction-block main__first-block mb-20 sm:mb-[8.75rem] pt-36 container">
    <div class="main__first-block__wrapper h-[522px] sm:h-auto sm:aspect-[1808/826]" style="--bgimg: url('https://vershina-light.ru/upload/medialibrary/879/8791f6ba5a0300cc713777dabd39eaa3.jpg');">
        <div class="container flex h-full flex-col pb-8 sm:pb-14">
            <div class="mt-auto">
                <h1 class="text-27semi mb-3 sm:text-64semi sm:mb-6">
                    Мастер-планы <br>
                </h1>
            </div>
            <p class="text-14reg text-black100 sm:text-16reg mb-6 sm:mb-10" style="max-width: 454px;"> 
                Световое планирование — важнейший инструмент в формировании визуального каркаса города.
            </p>
            <a href="#bottomform" class="button button-primary w-fit">
                <span>Связаться</span>
            </a>
        </div>
    </div>
</section>
<section class="container mb-20 sm:mb-[8.75rem] lg:grid grid-cols-12 gap-x-5 ">
    <h2 class="text-24semi sm:text-40semi mb-4 sm:mb-5 col-span-4">Световое планирование</h2>
    <div class="col-span-8 flex flex-col gap-4 sm:gap-5 xl:grid grid-cols-2 mb-4 sm:mb-5">
        <div class="flex flex-col gap-4 sm:gap-5 lg:flex-col-reverse lg:justify-end">
            <a href="#bottomform" class="button button-primary w-full lg:w-fit lg:ml-auto">
                <span>Связаться</span>
            </a>
            <img src="https://vershina-light.ru/upload/medialibrary/e90/e902843bfbe43e80e9b0b4830c88d616.png" class="aspect-[320/328] sm:aspect-[590/328] rounded-2xl" alt="">
        </div>
        <div class="flex flex-col justify-between">
            <p class="text-14med sm:text-17reg text-black100">
                Световой мастер-план увязывает все виды городского освещения в единое целое, помогает избежать хаоса в проектировании, снизить световое загрязнение. Единая концепция мастер-плана определяет стилистику, дизайн и характеристики источников света, регламентирует яркость и мощность применяемого оборудования как на действующих, так и только планируемых к застройке объектах. <br><br> Разработка световой генсхемы способствует сохранению исторического облика города, его архитектурных особенностей и культурного наследия — так называемого дизайн-кода. Хотя мастер-план не имеет статуса законодательного документа, рекомендации по выбору энергоэффективных светильников и внедрению систем управления освещением могут способствовать сокращению потребления электроэнергии в масштабах города. <br><br>      </p>
        </div>
    </div>
</section>
<section class="mb-20 sm:mb-[8.75rem] container drop-down">
    <div class="mb-6 sm:mb-[30px] sm:flex justify-between">
        <div>
            <h2 class=" text-24semi sm:text-40semi mb-3 sm:mb-0">Мастер-планы</h2>
        </div>
    </div>
	
	<?
							$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"masterplans",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "arrfilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "9",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Список разделов",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("*"),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>

    
  
   
    <div class="sm:hidden">
        <a href="/" class="button button-secondary w-full mx-auto mt-8 sm:mt-10 drop-down__open">
            <span>Смотреть больше</span>
        </a>
    </div>
    <div class="hidden sm:block">
        <a href="/" class="button button-link w-fit mx-auto mt-8 sm:mt-10 drop-down__open">
            <span>Смотреть больше</span>
        </a>
    </div>
</section>
<section class="container mb-20 sm:mb-[8.75rem]">
    <h2 class="text-24semi sm:text-40semi mb-4 sm:mb-20">Преимущества мастер-плана для города</h2>
    <ul class="gap-2 grid grid-cols-1 min-w-full sm:grid-cols-2 lg:grid-cols-3 sm:gap-5">
        <li class="rounded-2xl flex flex-col gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue lg:h-full lg:min-h-[17.75rem] transition-colors">
            <span class="text-12med w-5 min-h-5 max-h-5 rounded-full flex items-center justify-center transition-colors ">1</span>
            <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end">
                <span class="text-17med sm:text-22med lg:absolute bottom-0 transition-opacity">Создание более комфортной и безопасной световой среды</span>
            </span>
        </li>
        <li class="rounded-2xl flex flex-col gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue lg:h-full lg:min-h-[17.75rem] transition-colors">
            <span class="text-12med w-5 min-h-5 max-h-5 rounded-full flex items-center justify-center transition-colors ">2</span>
            <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end">
                <span class="text-17med sm:text-22med lg:absolute bottom-0 transition-opacity">Создание благоприятной атмосферы для жителей города</span>
            </span>
        </li>
        <li class="rounded-2xl flex flex-col gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue lg:h-full lg:min-h-[17.75rem] transition-colors">
            <span class="text-12med w-5 min-h-5 max-h-5 rounded-full flex items-center justify-center transition-colors ">3</span>
            <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end">
                <span class="text-17med sm:text-22med lg:absolute bottom-0 transition-opacity">Снижение светового загрязнения и энергопотребления</span>
            </span>
        </li>
        <li class="rounded-2xl flex flex-col gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue lg:h-full lg:min-h-[17.75rem] transition-colors">
            <span class="text-12med w-5 min-h-5 max-h-5 rounded-full flex items-center justify-center transition-colors ">4</span>
            <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end">
                <span class="text-17med sm:text-22med lg:absolute bottom-0 transition-opacity">Сохранение исторического облика города</span>
            </span>
        </li>
        <li class="rounded-2xl flex flex-col gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue lg:h-full lg:min-h-[17.75rem] transition-colors">
            <span class="text-12med w-5 min-h-5 max-h-5 rounded-full flex items-center justify-center transition-colors ">5</span>
            <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end">
                <span class="text-17med sm:text-22med lg:absolute bottom-0 transition-opacity">Повышение социального статуса и престижа города и городских властей</span>
            </span>
        </li>
        <li class="rounded-2xl flex flex-col gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue lg:h-full lg:min-h-[17.75rem] transition-colors">
            <span class="text-12med w-5 min-h-5 max-h-5 rounded-full flex items-center justify-center transition-colors ">6</span>
            <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end">
                <span class="text-17med sm:text-22med lg:absolute bottom-0 transition-opacity">Повышение туристической привлекательности города, рост туризма</span>
            </span>
        </li>

    </ul>
</section> <!--
<section class="mb-20 sm:mb-[8.75rem] container drop-down">
    <div class="mb-6 sm:mb-[30px] sm:flex justify-between ">
        <div>
            <h2 class=" text-24semi sm:text-40semi mb-3 sm:mb-0">Альбомы</h2>
        </div>
    </div>
    	<?
							$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"masterplans",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "arrfilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "20",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "9",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Список разделов",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("*"),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
    <div class="sm:hidden">
        <a href="/" class="button button-secondary w-full mx-auto mt-8 sm:mt-10 drop-down__open">
            <span>Смотреть больше</span>
        </a>
    </div>
    <div class="hidden sm:block">
        <a href="/" class="button button-link w-fit mx-auto mt-8 sm:mt-10 drop-down__open">
            <span>Смотреть больше</span>
        </a>
    </div>
</section> -->
<section class="mb-20 sm:mb-[8.75rem] container" id="directionsSlider">
    <div class="mb-6 sm:mb-8 flex justify-between">
        <div>
            <h2 class=" text-24semi sm:text-40semi mb-3 sm:mb-0">Световой мастер-план <br>
                города включает в себя</h2>
        </div>
        <div class="flex items-center h-fit gap-[0.675rem] sm:mt-auto">
            <button class="w-4 h-4 sm:w-6 sm:h-6 swiper-but-prev">
                <svg class="w-full h-full" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4535 2.25023C11.2235 1.96272 10.804 1.91611 10.5165 2.14611L4.50051 6.95887C3.8333 7.49263 3.8333 8.50742 4.50051 9.04118L10.5165 13.8539C10.804 14.0839 11.2235 14.0373 11.4535 13.7498C11.6835 13.4623 11.6369 13.0428 11.3494 12.8128L5.33344 8.00002L11.3494 3.18727C11.6369 2.95726 11.6835 2.53774 11.4535 2.25023Z" fill="white" />
                </svg>
            </button>
            <button class="w-4 h-4 sm:w-6 sm:h-6 swiper-but-next">
                <svg class="w-full h-full rotate-180" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4535 2.25023C11.2235 1.96272 10.804 1.91611 10.5165 2.14611L4.50051 6.95887C3.8333 7.49263 3.8333 8.50742 4.50051 9.04118L10.5165 13.8539C10.804 14.0839 11.2235 14.0373 11.4535 13.7498C11.6835 13.4623 11.6369 13.0428 11.3494 12.8128L5.33344 8.00002L11.3494 3.18727C11.6369 2.95726 11.6835 2.53774 11.4535 2.25023Z" fill="white" />
                </svg>
            </button>
        </div>
    </div>
    <div class="flex flex-col gap-6 sm:grid grid-cols-3 sm:gap-5 swiper">
        <div class="swiper-wrapper">
            <a href="/next/" class="swiper-slide">
                <img src="https://vershina-light.ru/upload/medialibrary/41d/41d999f524f0ec211ffa14e6999987f8.png" class="aspect-[320/211] w-full sm:aspect-[590/389] rounded-2xl mb-3 sm:mb-2.5" alt="">
                <span class="rounded-2xl flex flex-col group gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue h-auto ">
                    <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end mt-auto">
                        <span class="text-17med sm:text-22med ">Административные здания </span>
                    </span>
                </span>
            </a>
            <a href="/next/" class="swiper-slide">
                <img src="https://vershina-light.ru/upload/medialibrary/dc3/dc3071f03558e1164cb25246f8903ed4.png" class="aspect-[320/211] w-full sm:aspect-[590/389] rounded-2xl mb-3 sm:mb-2.5" alt="">
                <span class="rounded-2xl flex flex-col group gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue h-auto ">
                    <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end mt-auto">
                        <span class="text-17med sm:text-22med ">Объекты культурного и духовного наследия</span>
                    </span>
                </span>
            </a>
            <a href="/next/" class="swiper-slide">
                <img src="https://vershina-light.ru/upload/medialibrary/b3a/b3a60bdf3c9f0764b0d2da944db8e121.png " class="aspect-[320/211] w-full sm:aspect-[590/389] rounded-2xl mb-3 sm:mb-2.5" alt="">
                <span class="rounded-2xl flex flex-col group gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue h-auto ">
                    <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end mt-auto">
                        <span class="text-17med sm:text-22med ">Памятники архитектуры</span>
                    </span>
                </span>
            </a>
            <a href="/next/" class="swiper-slide">
                <img src="https://vershina-light.ru/upload/medialibrary/b96/b96008e9881765eeaaab4b4468a3c819.jpg " class="aspect-[320/211] w-full sm:aspect-[590/389] rounded-2xl mb-3 sm:mb-2.5" alt="">
                <span class="rounded-2xl flex flex-col group gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue h-auto ">
                    <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end mt-auto">
                        <span class="text-17med sm:text-22med "> Центральные и знаковые улицы </span>
                    </span>
                </span>
            </a>
            <a href="/next/" class="swiper-slide">
                <img src="https://vershina-light.ru/upload/medialibrary/5aa/5aa21f0e93ff02165be473ce700cfc39.jpg" class="aspect-[320/211] w-full sm:aspect-[590/389] rounded-2xl mb-3 sm:mb-2.5" alt="">
                <span class="rounded-2xl flex flex-col group gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue h-auto ">
                    <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end mt-auto">
                        <span class="text-17med sm:text-22med "> Пешеходные и автомобильные мосты </span>
                    </span>
                </span>
            </a>
            <a href="/next/" class="swiper-slide">
                <img src="https://vershina-light.ru/upload/iblock/4a9/4a9b95e9da6325ca4034b70f0ea4f493.jpg " class="aspect-[320/211] w-full sm:aspect-[590/389] rounded-2xl mb-3 sm:mb-2.5" alt="">
                <span class="rounded-2xl flex flex-col group gap-10 p-4 sm:p-8 bg-blackBlue border border-blackBlue h-auto ">
                    <span class="relative flex flex-col gap-2 text-black100 h-full lg:justify-end mt-auto">
                        <span class="text-17med sm:text-22med "> Парки и скверы </span>
                    </span>
                </span>
            </a>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const aboutSlider = new Swiper('#directionsSlider .swiper', {
                loop: true,
                slidesPerView: 1,
                navigation: {
                    prevEl: '#directionsSlider .swiper-but-prev',
                    nextEl: '#directionsSlider .swiper-but-next'
                }, 
                spaceBetween: 20,
                breakpoints: {
                  678: {
                    slidesPerView: 2,
                  },
                  1024: {
                    slidesPerView: 3,
                  }
                }
            })
        });
    </script>
</section>

<? $APPLICATION->IncludeFile(
  SITE_DIR . "include/stages.php",
    array(),
    array(
      "MODE" => "php",
      "NAME" => "Copy",
    )
  );
  ?>

<section class="mb-20 sm:mb-[8.75rem] container drop-down">
    <div class="mb-6 sm:mb-8 sm:flex justify-between">
        <div>
            <!-- <p class="text-14reg sm:text-14med mb-1 text-black200">Более 500 проектов</p> -->
            <h2 class=" text-24semi sm:text-40semi mb-3 sm:mb-0">Наши проекты</h2>
        </div>
        <a href="#bottomform" class="button button-primary w-full sm:w-fit mt-auto">
            <span>Связаться</span>
        </a>
    </div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"proj_line",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "arrfilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "17",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "9",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Список разделов",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("YEAR","COMPANY","FILE"),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
</section>
<?$APPLICATION->IncludeComponent(
	"interlabs:feedbackform",
	"formbottom",
	Array(
		"AGREE_PROCESSING" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"EMAIL_FROM" => "info@svet-expert.com",
		"EMAIL_TO" => "info@svet-expert.com",
		"EVENT_TYPE" => "INTERLABS_FEEDBACK",
		"FIELD_CHECK" => array("NAME","PHONE",""),
		"FORM_ID" => "21",
		"IBLOCK_FIELDS_USE" => array("NAME","PHONE","POCHTA","COMMENT"),
		"IBLOCK_FIELD_EMAIL" => "POCHTA",
		"IBLOCK_FIELD_PHONE" => "PHONE",
		"IBLOCK_ID" => "21",
		"IBLOCK_TYPE" => "forms",
		"MAX_FILE_COUNT" => "1",
		"MAX_FILE_SIZE" => "5",
		"MESSAGE_ID" => "12",
		"SUBJECT" => "Оставить заявку",
		"USE_CAPTCHA" => "N"
	));?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
