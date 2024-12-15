<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Hello, world!");
$APPLICATION->SetPageProperty("description", "Hello, world!");
$APPLICATION->SetPageProperty("title", "Hello, world!");
$APPLICATION->SetTitle("Hello, world!");
?><div class="container px-0 sm:px-9 sm:pt-36 mb-4 sm:mb-8">
    <div>
        <picture>
            <source media="(min-width: 678px)" srcset="https://svet-expert.com/bitrix/templates/vershina/img/main-firstblock--desk.webp">
            <img
                  src="https://svet-expert.com/bitrix/templates/vershina/img/main-firstblock.webp"
                  class="w-full h-[416px] sm:aspect-[1808/567] object-cover"
            />
        </picture>
    </div>
</div>
<div class="container mb-20 sm:mb-[8.75rem] ">
    <div class="lg:grid grid-cols-12 lg:gap-x-5  mb-[88px] sm:mb-20">
        <h1 class="text-32semi mb-3 lg:hidden ">
            Название проекта 
            в две строки
        </h1>
        <img src="https://svet-expert.com/bitrix/templates/vershina/img/zag.webp" class="aspect-[320/245] rounded-2xl sm:aspect-auto mb-10 lg:mb-0 col-span-5 col-start-1 row-start-1 w-full" alt="">
        <div class="col-span-5 col-start-7 row-start-1">
            <div class="mb-4 sm:mb-8 flex items-end">
                <div class="flex-1">
                    <div class="text-12med text-black700 mb-1 lg:hidden">Май 2024</div>
                    <h2 class="text-24semi sm:text-32semi">Санкт-Петербург</h2>
                </div>
                <div class="text-12med text-black700 lg:hidden">№142342134</div>
            </div>
            <div class="project-block">
                Предлагаем энергосервисные контракты (ЭСК) для модернизации систем освещения города с помощью энергоэффективного оборудования. Вы платите только за потребленную электроэнергию, а мы инвестируем в оборудование, его монтаж и обслуживание. ЭСК позволяет снизить расходы на электроэнергию до 50%. 
                <br><br> 
                Преимущества ЭСК: 
                <br><br> 
                Экономия: снижение затрат на электроэнергию и обслуживание.Модернизация: замена устаревшего оборудования на энергоэффективное.Гарантии: мы несем ответственность за надежную работу системы освещения.Минимум затрат: вы не несете капитальные затраты на модернизацию.
                <br>
                <br>
                <br>
                <br>
                <h3>Подзаголовок</h3>
                <br>
                Предлагаем энергосервисные контракты (ЭСК) для модернизации систем освещения города с помощью энергоэффективного оборудования. Вы платите только за потребленную электроэнергию, а мы инвестируем в оборудование, его монтаж и обслуживание. ЭСК позволяет снизить расходы на электроэнергию до 50%. 
                <br><br> 
                Преимущества ЭСК: 
                <br><br> 
                Экономия: снижение затрат на электроэнергию и обслуживание.Модернизация: замена устаревшего оборудования на энергоэффективное.Гарантии: мы несем ответственность за надежную работу системы освещения.Минимум затрат: вы не несете капитальные затраты на модернизацию.
                
            </div>
            <a href="#bottomform" class="button button-primary w-fit">
                <span>Связаться</span> 
            </a>
        </div>
    </div>
    <div class="lg:grid grid-cols-12 lg:gap-x-5">
        <div class="col-start-7 col-span-5">
            <h2 class="mb-6 text-20semiB sm:text-27semi sm:mb-9">Характеристики</h2>
            <div class="prioject-charasteristic">
                <div class="item__row">
                    <div class="item">
                        <span class="item__header">П/П</span>
                        <span class="item__desk">01</span>
                    </div>
                    <div class="item">
                        <span class="item__header">Состав работ</span>
                        <span class="item__desk">Поставка/Монтаж</span>
                    </div>
                </div>
                <div class="item">
                    <span class="item__header">Название</span>
                    <span class="item__desk">Управление делаими <br class="hidden sm:block"> правительства <br class="hidden sm:block">
                        Нижегородской области</span>
                </div>
                <div class="item">
                    <span class="item__header">Заключение / <br> Окончание</span>
                    <span class="item__desk">12.12.2019 -- 24.12.2020</span>
                </div>
                <div class="item__row">
                    <div class="item">
                        <span class="item__header">Заказчик</span>
                        <span class="item__desk">Нижний Новгород</span>
                    </div>
                    <div class="item">
                        <span class="item__header">Стадия</span>
                        <span class="item__desk">Исполнен</span>
                    </div>
                </div>
                <div class="item">
                    <span class="item__header">Наименование работ</span>
                    <span class="item__desk">
                        Выполнение работ по монтажу системы «Архитектурно-художественное освещение стен и башен Нижегородского
                    </span>
                </div>
                <div class="item">
                    <span class="item__header">Фз</span>
                    <span class="item__desk">44</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="mb-20 sm:mb-[8.75rem] bg-blackBlue">
    <div class="container pt-[22px] pb-[42px] sm:py-16 lg:grid gap-5 grid-cols-12">
        <div class="sm:max-w-[321px] col-span-4">
            <h2 class="text-24semi2 sm:text-40semi mb-4 sm:mb-6">
                Сотрудничество
            </h2>
            <p class="text-14reg sm:text-16reg mb-10 text-black200">Начни реализовывать проект прямо сейчас и получи консультацию бесплатно!</p>
        </div>
        <form action="" class="flex flex-col gap-[22px] col-span-8">
            <input type="text" class="input w-full" placeholder="Имя">
            <input type="text" class="input w-full" placeholder="Телефон">
            <input type="text" class="input w-full" placeholder="Email">
            <textarea type="text" class="textarea w-full" placeholder="Комментарий"></textarea>
            <div class="grid lg:grid-cols-8 lg:gap-x-5">
                <input class="checkbox row-start-4 w-0 h-0 invisible" type="checkbox" id="formCheckbox">
                <label class="mb-6 inuput-checkbox row-start-2 lg:col-span-7 lg:row-start-1 lg:mt-[13px]" for="formCheckbox">
                    <p class="text-12med text-black500 text-nowrap">Я согласен на <a href="" class="text-white"> обработку моих персональных данных</a>
                    </p>
                </label>
                <button class="button button-primary row-start-3 lg:col-span-8">
                    <span>Отправить</span>
                </button>
                <label  class="mb-6 row-start-1 h-fit w-fit flex cursor-pointer lg:col-start-8 lg:ml-auto lg:mt-2.5">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.9999 6.99996L8.49995 13.5C8.10212 13.8978 7.87863 14.4374 7.87863 15C7.87863 15.5626 8.10212 16.1021 8.49995 16.5C8.89777 16.8978 9.43734 17.1213 9.99995 17.1213C10.5626 17.1213 11.1021 16.8978 11.4999 16.5L17.9999 9.99996C18.7956 9.20432 19.2426 8.12518 19.2426 6.99996C19.2426 5.87475 18.7956 4.79561 17.9999 3.99996C17.2043 3.20432 16.1252 2.75732 14.9999 2.75732C13.8747 2.75732 12.7956 3.20432 11.9999 3.99996L5.49995 10.5C4.30647 11.6934 3.63599 13.3121 3.63599 15C3.63599 16.6878 4.30647 18.3065 5.49995 19.5C6.69342 20.6934 8.31212 21.3639 9.99995 21.3639C11.6878 21.3639 13.3065 20.6934 14.4999 19.5L20.9999 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input type="file" class="h-0 w-0">
                </label>
            </div>
        </form>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>