<?

foreach ($arResult['SECTIONS']  as $key => $value){
   if(0 == $arResult['SECTIONS'][$key]['ELEMENT_CNT'])
   {
      unset($arResult['SECTIONS'][$key]);
   }
}

?>