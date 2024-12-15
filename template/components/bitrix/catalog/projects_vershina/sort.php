<?$arDisplays = array("block", "list", "table");
if(array_key_exists("display", $_REQUEST) || (array_key_exists("display", $_SESSION)) || $arParams["DEFAULT_LIST_TEMPLATE"]){
    if($_REQUEST["display"] && (in_array(trim($_REQUEST["display"]), $arDisplays))){
        $display = trim($_REQUEST["display"]);
        $_SESSION["display"]=trim($_REQUEST["display"]);
    }
    elseif($_SESSION["display"] && (in_array(trim($_SESSION["display"]), $arDisplays))){
        $display = $_SESSION["display"];
    }
    elseif($arSection["DISPLAY"]){
        $display = $arSection["DISPLAY"];
    }
    else{
        $display = $arParams["DEFAULT_LIST_TEMPLATE"];
    }
}
else{
    $display = "block";
}
$template = "catalog_".$display;
?>
<? if (0){ ?>
<div class="sorting ">
    <div class="left">                    
        <div class="select">

            <?  
            $sort_default = $arParams['SORT_PROP_DEFAULT'] ? $arParams['SORT_PROP_DEFAULT'] : 'name';
            $order_default = $arParams['SORT_DIRECTION'] ? $arParams['SORT_DIRECTION'] : 'asc';
            $arPropertySortDefault = array('name', 'sort');
            
            $arAvailableSort = array(
                'name' => array(
                    'SORT' => 'NAME',
                    'ORDER_VALUES' => array(
                        'asc' => GetMessage('sort_title').GetMessage('sort_name_asc'),
                        'desc' => GetMessage('sort_title').GetMessage('sort_name_desc'),
                        ),
                    ),
                'sort' => array(
                    'SORT' => 'SORT',
                    'ORDER_VALUES' => array(
                        $order_default => GetMessage('sort_title').GetMessage('sort_sort'),
                        )
                    ),
                );
            
            foreach($arAvailableSort as $prop => $arProp){
                if(!in_array($prop, $arParams['SORT_PROP']) && $sort_default !== $prop){
                    unset($arAvailableSort[$prop]);
                }
            }

            if($arParams['SORT_PROP']){
                foreach($arParams['SORT_PROP'] as $prop){
                    if(!isset($arAvailableSort[$prop])){
                        $dbRes = CIBlockProperty::GetList(array(), array('ACTIVE' => 'Y', 'IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => $prop));
                        while($arPropperty = $dbRes->Fetch()){
                            $arAvailableSort[$prop] = array(
                                'SORT' => 'PROPERTY_'.$prop,
                                'ORDER_VALUES' => array(),
                                );

                            if($prop == 'PRICE'){
                                $arAvailableSort[$prop]['ORDER_VALUES']['asc'] = GetMessage('sort_title').GetMessage('sort_PRICE_asc');
                                $arAvailableSort[$prop]['ORDER_VALUES']['desc'] = GetMessage('sort_title').GetMessage('sort_PRICE_desc');
                            }
                            else{
                                $arAvailableSort[$prop]['ORDER_VALUES'][$order_default] = GetMessage('sort_title_property', array('#CODE#' => $arPropperty['NAME']));
                            }
                        }
                    }
                }
                $_SESSION[$arParams['IBLOCK_ID'].md5(serialize((array)$arParams['SORT_PROP']))] = $arAvailableSort;
                
            }

            if(array_key_exists('sort', $_REQUEST) && !empty($_REQUEST['sort'])){
                setcookie('catalogSort', $_REQUEST['sort'], 0, SITE_DIR);
                $_COOKIE['catalogSort'] = $_REQUEST['sort'];
            }
            if(array_key_exists('order', $_REQUEST) && !empty($_REQUEST['order'])){
                setcookie('catalogOrder', $_REQUEST['order'], 0, SITE_DIR);
                $_COOKIE['catalogOrder'] = $_REQUEST['order'];
            }
            $sort = !empty($_COOKIE['catalogSort']) ? $_COOKIE['catalogSort'] : $sort_default;
            $order = !empty($_COOKIE['catalogOrder']) ? $_COOKIE['catalogOrder'] : $order_default;
            ?>

            <select class="sort checked">
                <?foreach($arAvailableSort as $newSort => $arSort):?>
                <?if(is_array($arSort['ORDER_VALUES'])):?>
                <?foreach($arSort['ORDER_VALUES'] as $newOrder => $sortTitle):?>
                <?$selected = ($sort == $newSort && $order == $newOrder);?>
                <option <?=($selected ? "selected='selected'" : "")?>  value="<?=$APPLICATION->GetCurPageParam('sort='.$newSort.'&order='.$newOrder, array('sort', 'order'))?>" class="ordering"><span><?=$sortTitle?></span></option>
                <?endforeach;?>
                <?endif;?>
                <?endforeach;?>
            </select>
        </div>
    </div>
    <div class="right">
        <ul class="catalog_items_view">
            <?foreach($arDisplays as $displayType):?>
            <?
            $current_url = '';
            $current_url = $APPLICATION->GetCurPageParam('display='.$displayType,   array('display'));
            $url = str_replace('+', '%2B', $current_url);
            if($displayType == "block"){
                $faType = "fa-th-large";
            }else if($displayType == "list"){
                $faType = "fa-th-list";
            }else if($displayType == "table"){
                $faType = "fa-list";
            }
            ?>
            <li <?=$displayType?> <?=($display == $displayType ? 'class="active"' : '')?>><a rel="nofollow" href="<?=$url;?>"><i class="fa <?=$faType?>" title="<?=GetMessage("SECT_DISPLAY_".strtoupper($displayType))?>"></i></a></li>
            <?endforeach;?>

        </ul>
    </div>
</div>
<div class="filter-action"><?=GetMessage('filter')?> <span class=""><i class="svg inline  svg-inline-filter" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
  <defs>
    <style>
      .cls-1 {
        fill: #222;
        fill-rule: evenodd;
      }
    </style>
  </defs>
  <path class="cls-1" d="M663,361v5l-3-1v-4l-7-7v-2h17v2Zm-7.219-7,5.055,5h1.32l5-5H655.781Z" transform="translate(-653 -352)"></path>
</svg>
</i></span></div>
<? } ?>
<div class="filter_mob"></div>