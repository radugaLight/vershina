<?php
/**
 * Created by PhpStorm.
 * User: akorolev
 * Date: 01.10.2018
 * Time: 11:59
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
use \Bitrix\Main\Localization\Loc;

Loc::loadLanguageFile(__FILE__);

CUtil::InitJSCore(array('interlabs_feedbackform'));


/**
 * $arResult=[
 *    'isSaveFeedback' => boolean  //save in iblock or generate event
 *    'validateErrors'=> array<[message=>string]>
 *    'USE_CAPTCHA' => string Y|N
 *    'CAPTCHA_CODE' => string
 *    'AJAX_MODE'=> string Y|N
 * ];
 */

?>

		
		
		<section class="mb-20 sm:mb-[8.75rem] bg-blackBlue ajaxform3section" id="bottomform">
    <? if ($arResult['isSaveFeedback'] == true) { ?>
    <div class="container h-[718px] sm:h-[647px] text-center  flex items-center justify-center flex-col" id='formSuccess'>
        <h2 class="text-24semi2 sm:text-40semi mb-3 sm:mb-4">
            Ваша заявка отправлена
        </h2>
        <p class="text-black200 text-16reg sm:text-17reg mb-6 sm:mb-10 max-w-[327px]">Наш менеджер свяжется с вами в ближайшее время</p>
        <a href="/projects/" class="button button-primary w-fit relative">
            <span>Перейти к проектам</span>
        </a>
    </div>
    <? } else { ?>
<div class="container pt-[22px] pb-[42px] sm:py-16 lg:grid gap-5 grid-cols-12" id="formUnSuccess">
	
<div class="sm:max-w-[321px] col-span-4">
		<h2 class="text-24semi2 sm:text-40semi mb-4 sm:mb-6">
		Сотрудничество </h2>
		
			   
		      
    
    <!-- <div> -->
      <? if (isset($arResult['validateErrors']) && count($arResult['validateErrors']) > 0) { ?>
        <?php foreach ($arResult['validateErrors'] as $error) { ?>
                    <p class="text-14reg sm:text-16reg mb-10 text-black200">
			
	
                            <?php echo $error['message']; ?>
            	</p>
			 
                    <?php } ?>
      <? } else { ?>
		
				   <h3 style='width: 0px; height: 0px; overflow: hidden;'><?php echo $arResult['SUBJECT'] ? $arResult['SUBJECT'] : Loc::getMessage("FORM_TITLE"); ?></h3>
				   
		<p class="text-14reg sm:text-16reg mb-10 text-black200">
			 Начни реализовывать проект прямо сейчас и получи консультацию бесплатно!
		</p>
	
    <? } ?>
			
	</div>	
         
	
          
		    <form name="ajaxform3" id="ajaxform3" method="post" enctype="multipart/form-data" action=""
                  data-validatefields='<?php echo json_encode($arResult['template']['validate']); ?>'
                  class="dartsform3  form <?php echo $arResult['AJAX_MODE'] === 'Y' ? ' ' : ''; ?> flex flex-col gap-[22px] col-span-8">

                <input type="hidden" name="interlabs__feedbackform" value="Y">
                <input type="hidden" name="interlabs__feedbackform_FORM_ID" value="21">
				<input id="email" name="email" type="hidden" value="">
				
				
				 <input type="text" id="NAMEFADE" name="NAME"  class="input w-full" placeholder="Имя">
				 <input type="text"  id="PHONEFADE" name="PHONE"  class="input w-full" placeholder="Телефон">
				 <input type="text" id="POCHTAFADE" name="POCHTA" class="input w-full" placeholder="Email">
				 <textarea type="text"  id="COMMENTFADE" name="COMMENT"  class="textarea w-full" placeholder="Комментарий"></textarea>
				 
				 
           
				   
				   
				        <?php if (1) { ?>
                        <div class="grid lg:grid-cols-8 lg:gap-x-5">
 <input class="checkbox row-start-4 w-0 h-0 invisible" type="checkbox" id="formCheckbox"> <label class="mb-6 inuput-checkbox row-start-2 lg:col-span-7 lg:row-start-1 lg:mt-[13px]" for="formCheckbox">
			<p class="text-12med text-black500 text-nowrap">
				 Я согласен на <a href="/term-of-use/" class="text-white"> обработку моих персональных данных</a>
			</p>
 </label> <button  type="submit"  class="button button-primary row-start-3 lg:col-span-8">
			Отправить </button> <label class="mb-6 row-start-1 h-fit w-fit flex cursor-pointer lg:col-start-8 lg:ml-auto lg:mt-2.5"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.9999 6.99996L8.49995 13.5C8.10212 13.8978 7.87863 14.4374 7.87863 15C7.87863 15.5626 8.10212 16.1021 8.49995 16.5C8.89777 16.8978 9.43734 17.1213 9.99995 17.1213C10.5626 17.1213 11.1021 16.8978 11.4999 16.5L17.9999 9.99996C18.7956 9.20432 19.2426 8.12518 19.2426 6.99996C19.2426 5.87475 18.7956 4.79561 17.9999 3.99996C17.2043 3.20432 16.1252 2.75732 14.9999 2.75732C13.8747 2.75732 12.7956 3.20432 11.9999 3.99996L5.49995 10.5C4.30647 11.6934 3.63599 13.3121 3.63599 15C3.63599 16.6878 4.30647 18.3065 5.49995 19.5C6.69342 20.6934 8.31212 21.3639 9.99995 21.3639C11.6878 21.3639 13.3065 20.6934 14.4999 19.5L20.9999 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg><input type="file" id="FILE" name="FILE" class="h-0 w-0"> </label>
		</div>
                    <!-- <div class="form-group agree">
                        <div class="c-checkbox">
                            <input id="AGREE_PROCESSING<?=$tomorrow?>" name="AGREE_PROCESSING<?=$tomorrow?>" value="Y" type="checkbox" required>
                            <label for="AGREE_PROCESSING<?=$tomorrow?>"><? /* php echo Loc::getMessage("AGREE_PROCESSING"); */ ?>
                                Я согласен на <a href="/privacy-policy/">обработку моих персональных данных</a>
                            </label>
                        </div>

                        <?php if ($arResult['AGREE_PROCESSING_TEXT']) {
                            $AGREE_PROCESSING_TEXT_dialog_CSS_ID = 'AGREE_PROCESSING_TEXT_dialog' . uniqid('AGREE_PROCESSING_TEXT_dialog');
                            ?>
                            <div id="<?php echo $AGREE_PROCESSING_TEXT_dialog_CSS_ID; ?>"
                                 class="interlabs__info-dialog hidden">
                                <div class="header">
                                    <label><?php echo Loc::getMessage("AGREE_PROCESSING_DIALOG_TITLE"); ?></label>
                                    <span class="close-dialog"
                                          onclick="document.getElementById('<?php echo $AGREE_PROCESSING_TEXT_dialog_CSS_ID; ?>').className+=' hidden '">
                                         <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                              xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L17 17" stroke="#8B8989" stroke-width="2" stroke-linecap="round"/>
                    <path d="M1 17L17 1" stroke="#8B8989" stroke-width="2" stroke-linecap="round"/>
                </svg>
                                    </span>
                                </div>
                                <div class="body">
                                    <div class="form-group scroll-area">
                                        <?php echo $arResult['AGREE_PROCESSING_TEXT']; ?>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-close"
                                           onclick="document.getElementById('<?php echo $AGREE_PROCESSING_TEXT_dialog_CSS_ID; ?>').className+=' hidden '"><?php echo Loc::getMessage("FORM_CLOSE"); ?></a>
                                    </div>
                                </div>
                            </div>
                            <a onclick="document.getElementById('<?php echo $AGREE_PROCESSING_TEXT_dialog_CSS_ID; ?>').className=document.getElementById('<?php echo $AGREE_PROCESSING_TEXT_dialog_CSS_ID; ?>').className.replace('hidden','')">
                                <?php echo Loc::getMessage("AGREE_PROCESSING_DIALOG_TITLE"); ?>
                            </a>
                        <?php } else if ($arResult['AGREE_PROCESSING_FILE']) { ?>
                            <a class="AGREE_PROCESSING_FILE__link"
                               href=" <?php echo $arResult['AGREE_PROCESSING_FILE']["SRC"]; ?>"
                               target="_blank">
                                <?php echo $arResult['AGREE_PROCESSING_FILE']["FILE_NAME"]; ?>
                            </a>
                        <?php } ?>

                    </div> -->
                <?php } ?>



                
				<input type="hidden" class="ClientId" id="ClientId" name="ClientId" value="" />
				
				
			</form>
</div>
<? } ?>
 </section>
 
 
		<script>
	
// this is the id of the form


$( document ).ready(function() {
 
$('form[name="ajaxform3"]').submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    function setValidationFormsBot(el) {
  const EMAIL_REGEXP =
    /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;

  const PHONE_REGEXP = /\+\d{1}\(\d{3}\)\d{3}-\d{2}-\d{2}/g;

  let check = true;

  function isEmailValid(value) {
    if (EMAIL_REGEXP.test(value)) {
      check = true;
    } else {
      check = false;
    }
  }

  function isPhoneValid(value) {
    if (PHONE_REGEXP.test(value)) {
      check = true;
    } else {
      check = false;
    }
  }


  el.find(".input").removeClass("error");
  if (
    el.find("[name='NAME']").length > 0 &&
    el.find("[name='NAME'] ").val() < 3
  ) {
    el.find("[name='NAME']").addClass("error");
  }
  if (el.find("[name='PHONE']").length > 0) {
    isPhoneValid(el.find("[name='PHONE']").val());
    if (!check) {
      el.find("[name='PHONE']").addClass("error");
    }
  }
  if (el.find("[name='POCHTA']").length > 0) {
    isEmailValid(el.find("[name='POCHTA']").val());
    if (!check) {
      el.find("[name='POCHTA']").addClass("error");
    }
  }

  if(el.find(".input").hasClass('error')){
    return false
  } else {
    return true
  }
  
}

    var form = $(this);


    if(!setValidationFormsBot($(this))){
      return false
    }

    var actionUrl = form.attr('action');
      var formData = new FormData(document.getElementById("ajaxform3"));
	  
	  
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: formData,// serializes the form's elements.
		 contentType: false,
		 processData: false,
        success: function(data)
        {
			
			    e.preventDefault(); 
       $('.ajaxform3section').html($(data).find('.ajaxform3section').html());
	   //showNotification('ok','Специалист RADUGA обратится к Вам в ближайшее время!','Заявка успешно отправлена');
        }
    });
    
});
  
});
</script>


