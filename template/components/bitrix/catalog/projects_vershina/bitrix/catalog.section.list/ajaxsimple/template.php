<?
$cur_page = $APPLICATION->GetCurPage(false);

$end = basename( $cur_page );

$CURRENT_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];

$NAME= $arResult["SECTION"]["NAME"];
foreach ($arResult['SECTIONS'] as &$arSection):
    //проверяем на активность
  

    $is_active = ($arSection['CODE'] == $end)?" active":"";
	if($is_active)
	{
		$catname=$arSection['NAME'];
		$cath1=$arSection['NAME'];
		$depth=$arSection["DEPTH_LEVEL"];
	}
?>
 
<?endforeach;?>         

		 <?
		if($catname==""&&$NAME!="")
		{
			$catname=$NAME;
		}
		  else if($catname=="")
		  {
			$catname='Проекты';
			$cath1='Проекты';
		  }
		  		  if($catname=="БЦ")
		  {
			  $cath1="Бизнес-центры";
		  }
		    if($catname=="ЖК")
		  {
			  $cath1="Жилые комплексы";
		  }
		    if($catname=="ТРЦ")
		  {
			  $cath1="Торгово-развлекательные центры";
		  }
		?>


		 
          
         

<div class="container pt-36">
    <div class="mb-8 sm:mb-10 sm:flex justify-between">
        <h1 class="text-32semi sm:text-64semi mb-3 sm:mb-0"><?=$cath1?></h1>
        <!-- <p class="text-black100 text-16reg sm:max-w-[368px]">Равным образом, реализация намеченных плановых заданий не оставляет шанса</p> -->
    </div>
</div>
  

<a name="filter"></a>

       <div class="container mb-20 sm:mb-[8.75rem]">
	   
	   
	    <div class="listsections flex items-center gap-3 mb-2 sm:flex-wrap sm:mb-5">
     <? if($depth<2) { ?>
       <button  catid="" class="<? if($catname=='Проекты'){ ?>  opacity-60  <? } ?>   whitespace-nowrap flex items-center justify-center py-2 px-4 rounded-full transition-opacity border border-black400 text-13med sm:text-14med hover:opacity-60 "><span><a  href="<?=$menuadd?>/projects/">
                     Все      </a></span></button>
        <? foreach ($arResult['SECTIONS'] as &$arSection) {
			
		  if($arSection['DEPTH_LEVEL']>=2) { 
		   continue;
		   } ?>
			
			 <button  catid="<?=$arSection['CODE']?>"   class="  <? if($catname==$arSection['NAME']){ ?> opacity-60 <? } ?>  whitespace-nowrap flex items-center justify-center py-2 px-4 rounded-full transition-opacity border border-black400 text-13med sm:text-14med hover:opacity-60"><span><a   href="<?=$arSection['SECTION_PAGE_URL']?>"><?=$arSection['NAME']?></a></span></button>

                
               
			  <?
	 } ?> <? } ?></div>