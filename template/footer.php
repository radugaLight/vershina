<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<? $APPLICATION->IncludeFile(
	SITE_DIR . "include/directions.php",
	  array(),
	  array(
	    "MODE" => "php",
	    "NAME" => "Copy",
	  )
	);
?>
</main>
			<footer class="footer">
    <div class="container">
        <div class="grid gap-y-8 gap-x-5 mb-14 sm:mb-32 sm:grid-cols-12"> 
           <div class="mb-[18px] col-span-4">
                <a href="/" class="w-fit block">
                    <svg width="51" height="26" viewBox="0 0 51 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M50.1601 26C50.8513 26 51.2456 25.2057 50.8303 24.6496L32.6717 0.336795C32.3336 -0.115839 31.6571 -0.111514 31.3248 0.345405L18.7407 17.6479C18.0657 18.576 16.6859 18.5675 16.0222 17.6312L11.5549 11.3286C11.2264 10.8651 10.5453 10.8554 10.2038 11.3094L0.1714 24.6474C-0.246538 25.203 0.147377 26 0.839944 26H9.59905C11.217 26 12.7556 25.2946 13.8172 24.066L16.1089 21.4137C16.7759 20.6419 17.9664 20.6398 18.636 21.4093L20.9607 24.0808C22.0221 25.3005 23.5549 26 25.1661 26H50.1601Z" fill="white"/>
                    </svg>
                </a>
           </div>
           <div class="col-span-3">
                <h4 class="text-14med text-black400 mb-3 sm:mb-[1.875rem]">Наше освещение</h4>
                <ul class="grid gap-3 text-17med sm:text-15semi lg:grid-cols-[1fr_2fr]">
                    <li><a href="/directions/architectural-sanctification/">Архитектурное</a></li>
                    <li><a href="/directions/sport-sanctification/">Спортивное</a></li>
                    <li><a href="/directions/landscaping/">Ландшафтное</a></li>
                    <li><a href="/directions/projecting-lighting/">Проектирование</a></li>
                    <li><a href="/directions/street-sanctification/">Уличное</a></li>
                    <li><a href="/directions/master-plans/">Мастер-планы городов</a></li>
                    <li><a href="/directions/lighting-bridges/">Мосты</a></li>
                    <li><a href="/directions/energy-contract/">Энергосервисный контракт</a></li>
                </ul>
           </div>
           <div class="col-span-3">
                <h4 class="text-14med text-black400 mb-3 sm:mb-[1.875rem]">О компании</h4>
                <ul class="grid gap-3 text-17med sm:text-15semi">
                    <li><a href="/projects/">Проекты</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
                </ul>
           </div>
           <div class="col-span-2">
                <h4 class="text-14med text-black400 mb-3 sm:mb-[1.875rem]">Контакты</h4>
                <ul class="grid gap-3 text-17med sm:text-15semi">
                    <li><a href="tel:+74950237833" class=" block ">8-495-023-78-33</a></li>
                    <li><a href="mailto:info@vershina-light.ru" class=" block">info@vershina-light.ru</a></li>
                    <li>г. Москва,   ул. Ивана <br> Франко, д. 8, БЦ Kutuzoff Tower</li>
                </ul>
           </div>
        </div>
        <div class="grid gap-y-8 gap-x-5 text-15semi sm:text-14semi text-black400 sm:grid-cols-12">
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-[4.125rem] sm:col-start-5 sm:col-span-8">
                <a href="/term-of-use">Пользовательское соглашение</a>
                <a href="/politic">Политика конфиденциальности</a>
            </div>
            <div class="sm:col-start-1 sm:col-span-4 sm:row-start-1">
                Vershina 2014 — 2024 ©
            </div>
        </div>
    </div>
</footer>
		</div>
		<script type="text/javascript" > 
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; 
   m[i].l=1*new Date(); 
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} 
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) 
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); 
 
   ym(98247440, "init", { 
        clickmap:true, 
        trackLinks:true, 
        accurateTrackBounce:true, 
        webvisor:true, 
        trackHash:true, 
        ecommerce:"dataLayer" 
   }); 
   
   
   window.onload = function(){
	   
	   ym(98247440, 'getClientID', function(clientID) {
   console.log(clientID);
 $('.ClientId').val(clientID);
});
  

}


</script> <noscript><div><img src="https://mc.yandex.ru/watch/<?=$counter?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript> 
	</body>
</html>