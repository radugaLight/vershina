<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>

<div class="h-screen flex relative py-6 px-[17px] ">
  <div class="m-auto text-center flex flex-col items-center">
    <h1 class="text-24reg -mb-3 hidden">404</h1>
    <svg class="-mb-3" width="159" height="80" viewBox="0 0 159 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g filter="url(#filter0_f_272_787)">
      <path d="M33.8327 76.48V65.1307H2V52.2613L25.0863 3.52H40.9518L17.8655 52.2613H33.8327V34.0213H47.8675V52.2613H54.3765V65.1307H47.8675V76.48H33.8327Z" fill="white"/>
      <path d="M79.5207 78C74.0966 78 69.3505 76.8685 65.2824 74.6053C61.2143 72.3422 58.0446 69.184 55.7733 65.1307C53.5019 61.0773 52.3663 56.3484 52.3663 50.944V29.056C52.3663 23.6516 53.5019 18.9227 55.7733 14.8693C58.0446 10.816 61.2143 7.65777 65.2824 5.39466C69.3505 3.13155 74.0966 2 79.5207 2C84.9448 2 89.6908 3.13155 93.7589 5.39466C97.827 7.65777 100.997 10.816 103.268 14.8693C105.539 18.9227 106.675 23.6516 106.675 29.056V50.944C106.675 56.3484 105.539 61.0773 103.268 65.1307C100.997 69.184 97.827 72.3422 93.7589 74.6053C89.6908 76.8685 84.9448 78 79.5207 78ZM79.5207 64.928C81.9615 64.928 84.1651 64.3538 86.1313 63.2053C88.0975 62.0569 89.657 60.5031 90.8096 58.544C91.9622 56.5849 92.5385 54.3893 92.5385 51.9573V27.9413C92.5385 25.5093 91.9622 23.3138 90.8096 21.3547C89.657 19.3956 88.0975 17.8418 86.1313 16.6933C84.1651 15.5449 81.9615 14.9707 79.5207 14.9707C77.0798 14.9707 74.8763 15.5449 72.91 16.6933C70.9438 17.8418 69.3844 19.3956 68.2318 21.3547C67.0791 23.3138 66.5028 25.5093 66.5028 27.9413V51.9573C66.5028 54.3893 67.0791 56.5849 68.2318 58.544C69.3844 60.5031 70.9438 62.0569 72.91 63.2053C74.8763 64.3538 77.0798 64.928 79.5207 64.928Z" fill="white"/>
      <path d="M136.456 76.48V65.1307H104.624V52.2613L127.71 3.52H143.575L120.489 52.2613H136.456V34.0213H150.491V52.2613H157V65.1307H150.491V76.48H136.456Z" fill="white"/>
      </g>
      <defs>
      <filter id="filter0_f_272_787" x="0" y="0" width="159" height="80" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
      <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
      <feGaussianBlur stdDeviation="1" result="effect1_foregroundBlur_272_787"/>
      </filter>
      </defs>
    </svg>
    <a href="/" class="px-6 block w-fit py-3 rounded-[63px] text-14semi border border-white border-opacity-[0.32] bg-white bg-opacity-[0.03] backdrop-blur-[9px]" onclick="history.back(); return false">
      <span> Вернуться </span>
    </a>
  </div>
  <p class="text-black500 mt-auto text-10med sm:text-14med absolute bottom-6 text-center px-[17px] left-1/2 -translate-x-1/2">
    Предлагаем энергосервисные контракты (ЭСК) для модернизации систем освещения города с помощью энергоэффективного оборудования. Вы платите только за потребленную электроэнергию, а мы инвестируем в оборудование, его монтаж и обслуживание. 
  </p>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>