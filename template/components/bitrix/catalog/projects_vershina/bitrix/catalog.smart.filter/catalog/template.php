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
global $isbuy;

if($isbuy)
{
	return;
}
else
{

?>
<!--/TurboContent-->
<a name="filter"></a>

<div class="bx-filter filter bx_filter_vertical">
  <div class="bx-filter-section container-fluid">
    <form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
      <?foreach($arResult["HIDDEN"] as $arItem):?>
      <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
      <?endforeach;?>
      <div class="row ">
        <?foreach($arResult["ITEMS"] as $key=>$arItem)//prices
				{
					continue;
					$key = $arItem["ENCODED_ID"];
					if(isset($arItem["PRICE"])):
						if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
							continue;

						$step_num = 4;
						$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
						$prices = array();
						if (Bitrix\Main\Loader::includeModule("currency"))
						{
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
							}
							$prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
						}
						else
						{
							$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $precision, ".", "");
							}
							$prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
						}
						?>
        <div class="<?if ($arParams["FILTER_VIEW_MODE"]=="HORIZONTAL" ):?>col-sm-6 col-md-4
          <?else:?>col-lg-12
          <?endif?> bx-filter-parameters-box bx-active">
          <span class="bx-filter-container-modef"></span>
          <div class="bx-filter-parameters-box-title" onclick="smartFilter.hideFilterProps(this)"><span>
              <?=$arItem["NAME"]?> <i data-role="prop_angle" class="fa fa-angle-<?if ($arItem["DISPLAY_EXPANDED"]=="Y"
                  ):?>up
                  <?else:?>down
                  <?endif?>">
                </i>
            </span></div>
          <div class="bx-filter-block" data-role="bx_filter_block">
            <div class="row bx-filter-parameters-box-container">
              <div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
                <i class="bx-ft-sub">
                  <?=GetMessage("CT_BCSF_FILTER_FROM")?>
                </i>
                <div class="bx-filter-input-container">
                  <input class="min-price" type="text" name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                  id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                  placeholder="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                  value=""
                  size="5"
                  onkeyup="smartFilter.keyup(this)"
                  />
                </div>
              </div>
              <div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
                <i class="bx-ft-sub">
                  <?=GetMessage("CT_BCSF_FILTER_TO")?>
                </i>
                <div class="bx-filter-input-container">
                  <input class="max-price" type="text" name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                  id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                  placeholder="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                  value=""
                  size="5"
                  onkeyup="smartFilter.keyup(this)"
                  />
                </div>
              </div>

              <div class="col-xs-10 col-xs-offset-1 bx-ui-slider-track-container">
                <div class="bx-ui-slider-track" id="drag_track_<?=$key?>">
                  <?for($i = 0; $i <= $step_num; $i++):?>
                  <div class="bx-ui-slider-part p<?=$i+1?>"><span>
                      <?=$prices[$i]?>
                    </span></div>
                  <?endfor;?>

                  <div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>">
                  </div>
                  <div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>">
                  </div>
                  <div class="bx-ui-slider-pricebar-v" style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>">
                  </div>
                  <div class="bx-ui-slider-range" id="drag_tracker_<?=$key?>" style="left: 0%; right: 0%;">
                    <a class="bx-ui-slider-handle left" style="left:0;" href="javascript:void(0)"
                      id="left_slider_<?=$key?>"></a>
                    <a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)"
                      id="right_slider_<?=$key?>"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?
						$arJsParams = array(
							"leftSlider" => 'left_slider_'.$key,
							"rightSlider" => 'right_slider_'.$key,
							"tracker" => "drag_tracker_".$key,
							"trackerWrap" => "drag_track_".$key,
							"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
							"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
							"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
							"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
							"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
							"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
							"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
							"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
							"precision" => $precision,
							"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
							"colorAvailableActive" => 'colorAvailableActive_'.$key,
							"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
							);
							?>
        <script type="text/javascript">
          BX.ready(function () {
            window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?= CUtil :: PhpToJSObject($arJsParams) ?>);
          });
        </script>
        <?endif;
						}

				//not prices
						foreach($arResult["ITEMS"] as $key=>$arItem)
						{
						
							 
							if(
								empty($arItem["VALUES"])
								|| isset($arItem["PRICE"])
								)
								continue;
							
							if (
								$arItem["DISPLAY_TYPE"] == "A"
								&& (
									$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
									)
								)
								continue;
		
								?>
        <div class="bx-filter-parameters-box item item<?=$arItem["ID"]?> <?if ($arItem["DISPLAY_EXPANDED"]=="Y" ):?>
          bx-active
          <?endif?>">
          <span class="bx-filter-container-modef modef"></span>
          <div onclick="smartFilter.hideFilterProps2(this)">
            <span class="title">
              <?=$arItem["NAME"]?>
                <?if ($arItem["FILTER_HINT"] <> ""):?>, <?=strip_tags($arItem["FILTER_HINT"])?>
                  <? /* <i id="item_title_hint_<?echo $arItem["ID"]?>" class="fa fa-question-circle"></i>
                  <script type="text/javascript">
                    new top.BX.CHint({
                      parent: top.BX("item_title_hint_<?echo $arItem["ID"]?>"),
                      show_timeout: 10,
                      hide_timeout: 200,
                      dx: 2,
                      preventHide: true,
                      min_width: 250,
                      hint: '<?= CUtil::JSEscape($arItem["FILTER_HINT"])?>'
                    });
                  </script>*/ ?>

                  <?endif?>
                  <i data-role="prop_angle" class="fa fa-angle-<?if ($arItem["DISPLAY_EXPANDED"]=="Y" ):?>up
                    <?else:?>down
                    <?endif?>">
                  </i>
            </span>
          </div>

          <div class="bx-filter-block" data-role="bx_filter_block" <?if ($arItem["DISPLAY_EXPANDED"]=="Y" ):?>
            style="display:block;"
            <?endif?>>
            <div class="row bx-filter-parameters-box-container sorting__row">
              <?
											$arCur = current($arItem["VALUES"]);
											switch ($arItem["DISPLAY_TYPE"])
											{
								case "A"://NUMBERS_WITH_SLIDER
								?>
								<?$fil_min = number_format($arItem["VALUES"]["MIN"]["HTML_VALUE"], $precision, ".", "");
								$fil_max = number_format($arItem["VALUES"]["MAX"]["HTML_VALUE"], $precision, ".", "");
							if(strpos($arItem["NAME"],"потребляемая мощность")!=false)
								$arItem["NAME"]="Мощность, Вт";
								?>
								
								<div class="col-xs-12">
									<div class="bx-filter-select-container">
										<div class="bx-filter-select-block" onclick="showorhide($('#range<?=$arCur["CONTROL_ID"]?>')); return false;">
											<div class="bx-filter-select-text" data-role="currentOption">
											
											
											
											<p class="filttitle"><span><?=$arItem["NAME"]?></span>
											<span class="filtvalues"><?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?></span>
											<? if($arItem["VALUES"]["MIN"]["HTML_VALUE"]&&$arItem["VALUES"]["MAX"]["HTML_VALUE"]) { ?>
											<span class="dash"> - </span>
											<? } ?>
												<span  class="filtvalues"><?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?></span></p> <?
												if($arItem["VALUES"]["MAX"]["HTML_VALUE"]>0||$arItem["VALUES"]["MIN"]["HTML_VALUE"]>0)
												{
												?>	<span class="clearfilt"><label  onclick="clearvalue('<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>','<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>');  event.stopPropagation();  return false; "; for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx-filter-param-label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" ><img src="/i/v2/icons/cross.svg" /></label></span> <?
												}
												else
												{
													?><div class="bx-filter-select-arrow"><img src="/i/v2/icons/vektor.svg" /></div><?
												}
												
												?>
												
											
											
											</div>
										</div>
											
											<div id="range<?=$arCur["CONTROL_ID"]?>" class="bx-filter-select-popup" data-role="dropdownContent" style="display: none;">
												
								<div class="range">
									<span>От
										<input
										class="min-price"
										type="text"
										name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
										id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
										placeholder="<?=$arItem["VALUES"]["MIN"]["VALUE"]?>"
										value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
										size="5"
										onkeyup="smartFilter.keyup(this)"
										/>
									</span>
									
									<span>До<input
										class="max-price"
										type="text"
										name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
										id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
										placeholder="<?=$arItem["VALUES"]["MAX"]["VALUE"]?>"
										value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
										size="5"
										onkeyup="smartFilter.keyup(this)"
										/>
									</span>
								</div>
								<div class="col-xs-10 col-xs-offset-1 bx-ui-slider-track-container">
									<div class="bx-ui-slider-track toddler" id="drag_track_<?=$key?>">
										<?
										$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
										$step = ($arItem["VALUES"]["MAX"]["HTML_VALUE"] - $arItem["VALUES"]["MIN"]["HTML_VALUE"]) / 4;
										$value1 = number_format($arItem["VALUES"]["MIN"]["VALUE"], $precision, ".", "");
										$value2 = number_format($arItem["VALUES"]["MIN"]["HTML_VALUE"] + $step, $precision, ".", "");
										$value3 = number_format($arItem["VALUES"]["MIN"]["HTML_VALUE"] + $step * 2, $precision, ".", "");
										$value4 = number_format($arItem["VALUES"]["MIN"]["HTML_VALUE"] + $step * 3, $precision, ".", "");
										$value5 = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
										if($value1==0)$value1='';
										if($value5==0)$value5='';
										?>
										<div class="bx-ui-slider-part p1"><span><?=$value1?></span></div>
										<div class="bx-ui-slider-part p5"><span><?=$value5?></span></div>

										<div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
										<div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
										<div class="bx-ui-slider-pricebar-v"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
										<div class="bx-ui-slider-range" 	id="drag_tracker_<?=$key?>"  style="left: 0;right: 0;">
											<a class="point point_left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
											<a class="point point_right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
										</div>
									</div>
								</div>
								</div>
								</div></div>
								<?
								$arJsParams = array(
									"leftSlider" => 'left_slider_'.$key,
									"rightSlider" => 'right_slider_'.$key,
									"tracker" => "drag_tracker_".$key,
									"trackerWrap" => "drag_track_".$key,
									"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
									"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
									"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
									"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
									"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
									"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
									"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
									"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
									"precision" => $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0,
									"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
									"colorAvailableActive" => 'colorAvailableActive_'.$key,
									"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
									);
									?>
									<script type="text/javascript">
										BX.ready(function(){
											window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
										});
										
										function clearvalue(a1,a2) {
											$('#'+a1).val('');
											$('#'+a2).val('');	
											$('#'+a2).keyup();
										}
									</script>
              <?
									break;
								case "B"://NUMBERS
								?>
              <div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
                <i class="bx-ft-sub">
                  <?=GetMessage("CT_BCSF_FILTER_FROM")?>
                </i>
                <div class="bx-filter-input-container">
                  <input class="min-price" type="text" name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                  id="
                  <?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                  value="
                  <?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                  size="5"
                  onkeyup="smartFilter.keyup(this)"
                  />
                </div>
              </div>
              <div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
                <i class="bx-ft-sub">
                  <?=GetMessage("CT_BCSF_FILTER_TO")?>
                </i>
                <div class="bx-filter-input-container">
                  <input class="max-price" type="text" name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                  id="
                  <?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                  value="
                  <?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                  size="5"
                  onkeyup="smartFilter.keyup(this)"
                  />
                </div>
              </div>
              <?
								break;
								case "G"://CHECKBOXES_WITH_PICTURES
								?>
              <div class="col-xs-12">
                <div class="bx-filter-param-btn-inline">
                  <?foreach ($arItem["VALUES"] as $val => $ar):?>
                  <input style="display: none" type="checkbox" name="<?=$ar["CONTROL_NAME"]?>"
                    id="<?=$ar["CONTROL_ID"]?>" value="<?=$ar["HTML_VALUE"]?>" <? echo
                    $ar["CHECKED"]? 'checked="checked"' : '' ?>
                  />
                  <?
										$class = "";
										if ($ar["CHECKED"])
											$class.= " bx-active";
										if ($ar["DISABLED"])
											$class.= " disabled";
										?>
                  <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>"
                    class="bx-filter-param-label <?=$class?>"
                    onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'bx-active');">
                    <span class="bx-filter-param-btn bx-color-sl">
                      <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                      <span class="bx-filter-btn-color-icon"
                        style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                      <?endif?>
                    </span>
                  </label>
                  <?endforeach?>
                </div>
              </div>
              <?
								break;
								case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
								?>
              <div class="col-xs-12">
                <div class="bx-filter-param-btn-block">
                  <?foreach ($arItem["VALUES"] as $val => $ar):?>
                  <input style="display: none" type="checkbox" name="<?=$ar["CONTROL_NAME"]?>"
                    id="<?=$ar["CONTROL_ID"]?>" value="<?=$ar["HTML_VALUE"]?>" <? echo
                    $ar["CHECKED"]? 'checked="checked"' : '' ?>
                  />
                  <?
										$class = "";
										if ($ar["CHECKED"])
											$class.= " bx-active";
										if ($ar["DISABLED"])
											$class.= " disabled";
										?>
                  <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>"
                    class="bx-filter-param-label<?=$class?>"
                    onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'bx-active');">
                    <span class="bx-filter-param-btn bx-color-sl">
                      <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                      <span class="bx-filter-btn-color-icon"
                        style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                      <?endif?>
                    </span>
                    <span class="bx-filter-param-text" title="<?=$ar["VALUE"];?>">
                      <?=$ar["VALUE"];?>
                        <?
												if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
													?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>">
                          <? echo $ar["ELEMENT_COUNT"]; ?>
                        </span>)
                        <?
												endif;?>
                    </span>
                  </label>
                  <?endforeach?>
                </div>
              </div>
              <?
									break;
								case "P"://DROPDOWN
								$checkedItemExist = false;
								?>
								<div class="project-cities">
								<div class="bx-filter-block">
								<div class="col-xs-12">
									<div class="bx-filter-select-container">
										<div id="filter<?=$arCur["CONTROL_ID"]?>" class="bx-filter-select-block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
											<div class="bx-filter-select-text" data-role="currentOption">
											<span class="filttitle"><?=$arItem["NAME"]?></span>
												<div class="bx-filter-select-arrow"><img src="/i/v2/icons/vektor.svg" /></div>
												
											
											</div>
										
											<input onclick="   $('#filter<?=$arCur["CONTROL_ID"]?> input').prop( 'checked', false );  smartFilter.click(this)"
											style="display: none"
											type="checkbox"
											name="<?=$arCur["CONTROL_NAME_ALT"]?>"
											id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
											value=""
											/>
											<?foreach ($arItem["VALUES"] as $val => $ar):?>
											<input
											style="display: none"
											type="checkbox"
											name="<?=$ar["CONTROL_ID"] ?>"
											id="<?=$ar["CONTROL_ID"]?>" 
											value="Y"
											<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
											/>
											<?endforeach?>
											<div class="bx-filter-select-popup" data-role="dropdownContent" style="display: none;">
												<ul>
													<li>
														<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx-filter-param-label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
															<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
														</label>
													</li>
													<?
													foreach ($arItem["VALUES"] as $val => $ar):
														$class = "";
													if ($ar["CHECKED"])
														$class.= " selected";
													if ($ar["DISABLED"])
														$class.= " disabled";
													?> 
													<li class="<?=$class?>">
														<label for="<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')"><?=$ar["VALUE"]?></label>
													</li>
													<?endforeach?>
												</ul>
											</div>
											
											<?
												
												?>	
												
												
												
										</div>
									</div><div class="project-cities--current">
									<?
												$found=0;
												foreach ($arItem["VALUES"] as $val => $ar)
												{
													$found++;
													if ($ar["CHECKED"])
													{
														?><div class="project-city"><label for="<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>'); smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>'); "><span class="filtvalues"> <?
														echo $ar["VALUE"];
														$checkedItemExist = true;  ?></span><a class="del-project-sity"></a></label></div><?
													}
												}
												
												?> 
													</div>
								</div></div></div>
								<?
								break;
								case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
								?>
              <div class="col-xs-12">
                <div class="bx-filter-select-container">
                  <div class="bx-filter-select-block"
                    onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
                    <div class="bx-filter-select-text fix" data-role="currentOption">
                      <?
												$checkedItemExist = false;
												foreach ($arItem["VALUES"] as $val => $ar):
													if ($ar["CHECKED"])
													{
														?>
                      <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                      <span class="bx-filter-btn-color-icon"
                        style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                      <?endif?>
                      <span class="bx-filter-param-text">
                        <?=$ar["VALUE"]?>
                      </span>
                      <?
														$checkedItemExist = true;
													}
													endforeach;
													if (!$checkedItemExist)
													{
														?><span class="bx-filter-btn-color-icon all"></span>
                      <?
														echo GetMessage("CT_BCSF_FILTER_ALL");
													}
													?>
                    </div>
                    <div class="bx-filter-select-arrow"></div>
                    <input style="display: none" type="radio" name="<?=$arCur["CONTROL_NAME_ALT"]?>" id="<? echo " all_".$arCur["CONTROL_ID"] ?>"
                    value=""  />
                    <?foreach ($arItem["VALUES"] as $val => $ar):?>
                    <input style="display: none" type="radio" name="<?=$ar["CONTROL_NAME_ALT"]?>"
                      id="<?=$ar["CONTROL_ID"]?>" value="<?=$ar["HTML_VALUE_ALT"]?>" <? echo
                      $ar["CHECKED"]? 'checked="checked"' : '' ?>
                    />
                    <?endforeach?>
                    <div class="bx-filter-select-popup" data-role="dropdownContent" style="display: none">
                      <ul>
                        <li style="border-bottom: 1px solid #e5e5e5;padding-bottom: 5px;margin-bottom: 5px;">
                          <label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx-filter-param-label"
                            data-role="label_<?="all_".$arCur["CONTROL_ID"]?>"
                            onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
                            <span class="bx-filter-btn-color-icon all"></span>
                            <? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                          </label>
                        </li>
                        <?
														foreach ($arItem["VALUES"] as $val => $ar):
															$class = "";
														if ($ar["CHECKED"])
															$class.= " selected";
														if ($ar["DISABLED"])
															$class.= " disabled";
														?>
                        <li>
                          <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>"
                            class="bx-filter-param-label<?=$class?>"
                            onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
                            <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                            <span class="bx-filter-btn-color-icon"
                              style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                            <?endif?>
                            <span class="bx-filter-param-text">
                              <?=$ar["VALUE"]?>
                            </span>
                          </label>
                        </li>
                        <?endforeach?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <?
									break;
								case "K"://RADIO_BUTTONS
								?>

              <label class="custom_radio" for="<? echo "all_".$arCur["CONTROL_ID"] ?>"><input type="radio" value=""
                  name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
                id="
                <? echo "all_".$arCur["CONTROL_ID"] ?>"
                onclick="smartFilter.click(this)"
                />
                <span></span>
                <p>
                  <? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                </p>
              </label>
              <?foreach($arItem["VALUES"] as $val => $ar):?>
              <label data-role="label_<?=$ar["CONTROL_ID"]?>" class="custom_radio <? echo $ar["DISABLED"] ? 'disabled'     : '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
                <input type="radio" value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                name="
                <? echo $ar["CONTROL_NAME_ALT"] ?>"
                id="
                <? echo $ar["CONTROL_ID"] ?>"
                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                onclick="smartFilter.click(this)"
                />
                <span></span>
                <p>
                  <?=$ar["VALUE"];?>
                </p>
              </label>
              <?endforeach;?>
              <?
								break;
								case "U"://CALENDAR
								?>
              <div class="col-xs-12">
                <div class="bx-filter-parameters-box-container-block">
                  <div class="bx-filter-input-container bx-filter-calendar-container">
                    <?$APPLICATION->IncludeComponent(
											'bitrix:main.calendar',
											'',
											array(
												'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
												'SHOW_INPUT' => 'Y',
												'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
												'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
												'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
												'SHOW_TIME' => 'N',
												'HIDE_TIMEBAR' => 'Y',
												),
											null,
											array('HIDE_ICONS' => 'Y')
											);?>
                  </div>
                </div>
                <div class="bx-filter-parameters-box-container-block">
                  <div class="bx-filter-input-container bx-filter-calendar-container">
                    <?$APPLICATION->IncludeComponent(
												'bitrix:main.calendar',
												'',
												array(
													'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
													'SHOW_INPUT' => 'Y',
													'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
													'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
													'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
													'SHOW_TIME' => 'N',
													'HIDE_TIMEBAR' => 'Y',
													),
												null,
												array('HIDE_ICONS' => 'Y')
												);?>
                  </div>
                </div>
              </div>
              <?
										break;
								default://CHECKBOXES
								?>
									<? if(1){											$checkedItemExist = false;
												foreach ($arItem["VALUES"] as $val => $ar)
												{
													$found++;
													if ($ar["CHECKED"])
													{
														$checkedItemExist = true;
													}
												}
												if (!$checkedItemExist)
												{
													// echo GetMessage("CT_BCSF_FILTER_ALL");
												}
												?> </span> <?
												if($checkedItemExist)
												{
												
												}
												else
												{
													
													$addcheck="active";
													$ifchecked="checked";
												}
												
											
												?>
								
			  <a href="/cases/"><label  data-role="label_all_arrFilter_2106_4204683263" class="filter-but    <?=$addcheck ?>          " for="all_arrFilter">
                <input  class="showall<?=$arItem[ID]?>" <?=$ifchecked?>  type="checkbox" name="checkall<?=$arItem[ID]?>"  value="Y" name="all_arrFilter" >
                <span></span>
                <p>
                Все               </p>
              </label></a>
			  
           <?foreach($arItem["VALUES"] as $val => $ar):
		   
		   ?>
              <label data-role="label_<?=$ar["CONTROL_ID"]?>"  class="filter-but <? echo $ar["CHECKED"]? 'active': '' ?>
                <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>" >
                <input class="showone<?=$arItem[ID]?>" type="checkbox" value="<? echo $ar["HTML_VALUE"] ?>"
                name="<? echo $ar["CONTROL_NAME"] ?>"
                id="<? echo $ar["CONTROL_ID"] ?>"
                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                onclick="      $('.showone<?=$arItem[ID]?>').not(event.target).attr('checked', false);   $('.showall<?=$arItem[ID]?>').prop( 'checked', false );  smartFilter.click(this)"
                />
                <span></span>
                <p>
                  <?=$ar["VALUE"];?>
                </p>
              </label>
              <?endforeach;?>
			  
									<? } else { 
								$i=0; $checked=false;
								foreach($arItem["VALUES"] as $val => $ar):
								$i++;
								if($ar["CHECKED"]){
								$checked=true;
								
											}
								if($i==4){


									?>
              <div id="panel<?=$ar["CONTROL_ID"]?>" class="hiddenels" data-role="hiddenels">
                <? } ?>

                <label data-role="label_<?=$ar["CONTROL_ID"]?>" class="custom_checkbox <? echo $ar["DISABLED"]? 'disabled' : '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
                  <input type="checkbox" value="<? echo $ar["HTML_VALUE"] ?>"
                  name="<? echo $ar["CONTROL_NAME"] ?>"
                  id="<? echo $ar["CONTROL_ID"] ?>"<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                  onclick="smartFilter.click(this)"                  />
                  <span></span>
                  <p>
                    <?=$ar["VALUE"];?>
                  </p>
                </label>
                <?endforeach;?>

                <? if($i>=4&&$checked ){ ?>
                <script>	BX.ready(function () {
                    $(".item<?=$arItem["ID"]?> .hiddenels").css("display", "block"); $(".item<?=$arItem["ID"]?> .hiddenels").addClass("bx-active"); $(".item<?=$arItem["ID"]?> .showmore").addClass("hiddenel"); $(".item<?=$arItem["ID"]?> .showless").removeClass("hiddenel");
                  });</script>
                <? } 
							?>
              <?
											}}
							?>
            </div>
            <div style="clear: both"></div>
          </div>
        </div>
        <?
			}
			?>
      </div>
      <!--//row-->
      <div class="bx_filter_popup_result  right" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"]))
        echo 'style="display:none"' ;?>>
        <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
        <!-- noindex --><a href="<?echo $arResult["FORM_ACTION"]?>" class="button white_bg" rel="nofollow">
          <?echo GetMessage("CT_BCSF_FILTER_SHOW")?>
        </a><!-- /noindex -->
      </div>
      <div class=" apply__buttons">
        <div class=" bx-filter-button-box">
          <div class="bx-filter-block">
            <div class="item">
             <input class=" bottomrightbutton" type="submit" style="display: none;" id="set_filter" name="set_filter"
                value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" /> 
              <input class="page-button catalogfilter-resetbutton" type="submit" id="del_filter" name="del_filter"
                value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>" />
				<button disabled type="submit" href="#" class="page-button page-button--primary catalogfilter-submit">
              		<div class="page-button__text">Применить</div>
            	</button>
            </div>
          </div>
        </div>
      </div>
      <div class="clb"></div>

    </form>
  </div>
</div>
<script type="text/javascript">
  var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?= CUtil :: PhpToJSObject($arResult["JS_FILTER_PARAMS"]) ?>);

  $(window).resize(() => {
	let windsize = $(window).width()
	if($(window).width() > 766){
		if ($('#catalogFilterMain').hasClass('catalog-filter-active')){
			$('#catalogFilterMain').removeClass('catalog-filter-active')
			$('html').css('overflow', 'auto');
		}
	}
  })
</script>
<!--TurboContent-->

<a name="products"></a>

<? } ?>