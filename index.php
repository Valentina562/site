<?php

$db_name = 'mysql:host=localhost;dbname=master_ok';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send']))
{

   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $mess = $_POST['mess'];

   $select_contact = $conn->prepare("SELECT * FROM `clients` WHERE name = ? AND email = ? AND number = ? AND mess = ?");
   $select_contact->execute([$name, $email, $number, $mess]);

   if($select_contact->rowCount() > 0){
      $message[] = 'Сообщение уже отправлено!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `clients` (name, email, number, mess) VALUES (?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $mess]);
      $message[] = 'Сообщение отправлено!';
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>masterok</title>


   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">


   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">


   <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"
/>
  
</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <div class="logo">Мастер<span>Ок</span></div>

      <nav class="navbar">
         <a href="#home">Главная</a>
         <a href="#kategor">Категории товара</a>
         <a href="#akcii">Акции</a>
         <a href="#new">Новости</a>
         <a href="#vitrina">Витрина</a>
         <a href="#info">О нас</a>
         <a href="#location">Локация</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>



<section class="home" id="home">

   <div class="row">

      <div class="content">
         <h3 data-aos="fade-up">ПРИВЕТСВУЕМ ВАС НА ИНТЕРНЕТ-ВИТРИНЕ МАГАЗИНА "Мастер<span>Ок"</span></h3>
         <p data-aos="fade-up">Вы можете ознакомиться с некоторым товаром, акциями и новостями магазина</p>
         <a href="#vitrina" class="btn" data-aos="fade-up">Посмотреть товар</a>
      </div>

      <div class="image" data-aos="fade-left">
         <img src="images/giphy.gif" alt="">
      </div>

   </div>

</section>

<section class="kategor" id="kategor">

   <h1 class="heading"><span>категории товара</span></h1>

   <div class="swiper kategor-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/icon1.jpg" alt="">
            <a href="#santeh"><h3>сантехника</h3></a>
            <p>задвижки, вентили, смесители, сифоны, шланги, душевые лейки
               </p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/icon2.jpg" alt="">
            <a href="#elektr"><h3>электрика</h3></a>
            <p>обжимные клещи, кабельные ножницы, стриппер, средства для определения напряжения, лампочки, розетки</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/icon3.jpg" alt="">
            <a href="#krepej"><h3>крепёж-метизы</h3></a>
            <p>гайки, винты, шурупы, саморезы, дюбели, заклёпки, шайбы, штифты, шпильки</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/icon4.jpg" alt="">
            <a href="#instrum"><h3>инструмент</h3></a>
            <p>ручные инструменты для слесарно-монтажных, отделочных и кладочных работ, сварки, плотницкий и столярный инструмент, измерительные приборы</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/icon5.jpg" alt="">
            <a href="#elinstrum"><h3>электроинструмент</h3></a>
            <p>электродрели, перфораторы, отбойные молотки, шуруповерты, резьборезы, болгарки, лобзики, электропилы, фрезеры.</p>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<section class="akcii" id="akcii">

   <h1 class="heading"><span>акции</span> </h1>

   <div class="box-container">

       <div class="box" data-aos="zoom-in">
           <img src="images/slide-1.jpg" alt="">
           <div class="content">
               <div class="icons">
                  <p>действует до:</p>
                   <a href="#"> <i class="fas fa-calendar"></i>25.06.22</a>
               </div>
               <h3>5% скидка на первый заказ*</h3>
               <p>Используйте промокод: <span>FIRST</span></p>
               <p>*При первом заказе от 1500 рублей</p>
           </div>
       </div>
       
       <div class="box" data-aos="zoom-in">
           <img src="images/slide-3.jpg" alt="">
           <div class="content">
               <div class="icons">
                  <p>действует до:</p>
                  <a href="#"> <i class="fas fa-calendar"></i>15.06.22</a>
               </div>
               <h3>10% скидка на заказ электроинструмента*</h3>
               <p>Используйте промокод: <span>ELEKTRO</span></p>
               <p>*При заказе любого товара из категории "Электроинструмент" от 10000 рублей</p>
           </div>
       </div>

       <div class="box" data-aos="zoom-in">
           <img src="images/slide-1.jpg" alt="">
           <div class="content">
               <div class="icons">
                  <p>действует до:</p>
                   <a href="#"> <i class="fas fa-calendar"></i>30.06.22</a>
               </div>
               <h3>5% скидка на заказ набора инструментов*</h3>
               <p>Используйте промокод: <span>NABORINSTR</span></p>
               <p>*При заказе набора инструментов от 3000 рублей</p>
           </div>
       </div>

       

   </div>

</section>



<section class="new" id="new">
   
   <h1 class="heading"><span>новости</span></h1>

   <div class="row">

      <div class="image" data-aos="fade-right">
         <img src="images/giphy (1).gif" alt="">
      </div>

      <div class="content">
         <h3 class="title" data-aos="fade-up">О поставках</h3>
         <p data-aos="fade-up">Поставки в магазине осуществляются каждый месяц. Количество и разновидность товара могут меняться.</p>
         <p data-aos="fade-up">Для уточнения наличия интерисующего товара и по другим вопросам пишите нам.</p>
         <a href="#contact"><button data-aos="fade-up">написать</button></a>
         <div class="icons-container">
             <div class="icons" data-aos="fade-right">
                 <i class='fa fa-check-square-o'></i>
                 <h3>проверенные поставщики</h3>
             </div>  
             <div class="icons" data-aos="fade-left">
                 <i class='fa fa-check-square-o'></i>
                 <h3>обратная связь</h3>
             </div>   
             <div class="icons" data-aos="fade-up">
                 <i class='fa fa-check-square-o'></i>
                 <h3>работаем 7 дней в неделю</h3>
             </div>          
         </div>
     </div>
</section>


<section class="vitrina" id="vitrina">

   <h1 class="heading"><span>витрина</span></h1>

   <div class="swiper product-slider" id="santeh">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/airator.png" alt="">
            <h3>аэратор для смесителя op00005</h3>
            <p><span>215</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/smesit.webp" alt="">
            <h3>смеситель для кухни lm00063</h3>
            <p><span>989</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/xggabij6r4yfeps6p548lwflr1edeqhe.png" alt="">
            <h3>смеситель для кухни qn00353</h3>
            <p><span>1 229</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/80dffee9ec5129049766b4078ccc2e68.png" alt="">
            <h3>смеситель для ванной bh-6561</h3>
            <p><span>3 599</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/067_original.webp" alt="">
            <h3>смеситель для умывальника u-6263d</h3>
            <p><span>1 500</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/e87ks5yt74x3yqzl4ar2dwx5edzkb5wv.png" alt="">
            <h3>смеситель для ванной wr50365</h3>
            <p><span>2 230</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tlg09303.png" alt="">
            <h3>смеситель для умывальника vz225-0</h3>
            <p><span>1 500</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/dush.png" alt="">
            <h3>Душ.стойка с лейкой и шлангом L8012</h3>
            <p><span>803</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/shlang.png" alt="">
            <h3>Шланг для душа hansgrohe Comfortflex 28168000</h3>
            <p><span>559</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/c46ae99b469b048816b3b3c0226ae2b4.png" alt="">
            <h3>Полотенцесушитель водяной AISI 500х600</h3>
            <p><span>9 559</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/fc5a18343f6a8dca325356a229e2b86b.png" alt="">
            <h3>Полотенцесушитель электрический Terminus П6 45х65</h3>
            <p><span>12 600</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/zumyjvjnoy71m4v8edsm3fs8iyouy82z.png" alt="">
            <h3>лейка для душа nj-0692</h3>
            <p><span>200</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/175129_big.png" alt="">
            <h3>Полотенцесушитель водяной xv-0-4854</h3>
            <p><span>5 500</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>


   <div class="swiper product-slider" id="elektr">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/19547.970.png" alt="">
            <h3>удлинитель "Стандарт" 4 гнезда 5 метров</h3>
            <p><span>689</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/lamp_PNG3698.png" alt="">
            <h3>люминесцентная лампа FL-ESL</h3>
            <p><span>85</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/600001800907b0.webp" alt="">
            <h3>Удлинитель Panasonic WLTA04432WH-RU</h3>
            <p><span>1 290</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/6f6122bc.png" alt="">
            <h3>Удлинитель У05К-выкл. 5 мест 5метров</h3>
            <p><span>755</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/072a5069486813da7e22a4e474fa7e56.png" alt="">
            <h3>Провод с авиационными разъемами 5м</h3>
            <p><span>850</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>
         <div class="swiper-slide slide">
            <img src="images/129201.500.png" alt="">
            <h3>Умная светодиодная RGB-лента Lightstrip 5м</h3>
            <p><span>1 099</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>
         <div class="swiper-slide slide">
            <img src="images/6hjld12v18a4o7e8mt1gki55al50sknm.png" alt="">
            <h3>Кабель для прямого подключения CH-3P1</h3>
            <p><span>2 250</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>
         
         <div class="swiper-slide slide">
            <img src="images/cf05fd55d9e9.png" alt="">
            <h3>Ножницы секторные НС-240 для резки небронир. кабеля</h3>
            <p><span>2 399</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>

         </div>
         <div class="swiper-slide slide">
            <img src="images/rozetka.png" alt="">
            <h3>розетка одинарная с заземлением с крышкой</h3>
            <p><span>89</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/EE62C498069C3A8261D0408A39DE8DA4.png" alt="">
            <h3>розетка одинарная с заземлением</h3>
            <p><span>75</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/CKK11-025-025-1-K01.png" alt="">
            <h3>Кабель-канал 25х25 ECOLINE (цена за метр)</h3>
            <p><span>128</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/cb8e304947350248994f0fa4152e8cce.png" alt="">
            <h3>светодиодная лента белый свет 5,5м</h3>
            <p><span>2 399</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/lamp-5.png" alt="">
            <h3>лампа люминесцентная 5669-ll</h3>
            <p><span>350</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/572c08eaaadb922ec9493f0271afe7d87c5e8eab.png" alt="">
            <h3>лампа люминесцентная mn-5864</h3>
            <p><span>120</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic_name19096afa324c332425d24c964bf1a27c.jpg" alt="">
            <h3>лампа люминесцентная p6f32</h3>
            <p><span>95</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/bulb_PNG1243.png" alt="">
            <h3>лампа накаливания gr-00021</h3>
            <p><span>65</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>


   <div class="swiper product-slider" id="krepej">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/gaika1.png">
            <h3>гайка гост 9064-75 м56</h3>
            <p><span>15</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/screw_PNG3015.png" alt="">
            <h3>винт jn8 hbb (300шт/уп)</h3>
            <p><span>450</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/screw_PNG3007.png" alt="">
            <h3>винт uhl-6561 (300шт/уп)</h3>
            <p><span>550</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Screw-Bolt-PNG-Images-HD.png" alt="">
            <h3>винт mkj-0-99 (300шт/уп)</h3>
            <p><span>600</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/__970x0.png" alt="">
            <h3>винт R16 XPS (300шт/уп)</h3>
            <p><span>655</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/d80316afb84897be7716dd51d05cfa8a.png" alt="">
            <h3>дюбель-гвозди с цилиндрической манжетой (250шт/уп)</h3>
            <p><span>764</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/dubel-universalny.png" alt="">
            <h3>универсальный полиэтиленовый дюбель (300шт/уп)</h3>
            <p><span>256</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/shk_48x14_01.png" alt="">
            <h3>шайба оцинковая 6,3*19 (150шт/уп)</h3>
            <p><span>350</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>


   <div class="swiper product-slider" id="instrum">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/hand_saw_PNG9542.png" alt="">
            <h3>ручная пила</h3>
            <p><span>450</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/molotok_s.png" alt="">
            <h3>молоток слесарный</h3>
            <p><span>567</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/uroven.png" alt="">
            <h3>уровень строительный 60 см</h3>
            <p><span>680</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/cd438189a1aa893930400e27e0bc154a.png" alt="">
            <h3>уровень строительный 60см 5 глазков</h3>
            <p><span>847</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/ruletka-neo-stalnaya-lenta-5-m-x-25-mm-magnit-dvustoronnyaya_100.png" alt="">
            <h3>Рулетка в обрезиненном корпусе 5 м x 25 мм</h3>
            <p><span>317</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/measure_tape_PNG87.png" alt="">
            <h3>Рулетка в обрезиненном корпусе 3 м x 25 мм</h3>
            <p><span>250</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/947_original.webp" alt="">
            <h3>Рулетка в обрезиненном корпусе 7,5 м x 25 мм</h3>
            <p><span>495</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/e5e7e10a_9ddf.png" alt="">
            <h3>набор инструментов, 55 предметов</h3>
            <p><span>3 800</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/screwdriver_PNG9499.png" alt="">
            <h3>Отвертка ударная плоская (SL 1.0 х 8.0 х 150 мм)</h3>
            <p><span>630</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/18121.500.png" alt="">
            <h3>набор инструментов, 57 предметов</h3>
            <p><span>4 700</span>₽</p>
            <button data-fancybox data-src="#dialog-content.png">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/408743.png" alt="">
            <h3>набор инструментов, 99 предметов</h3>
            <p><span>9 299</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/TSC-1PZ-3150.png" alt="">
            <h3>Отвертка крестовая PH2х150 IEK TSC-1PH-2150</h3>
            <p><span>238</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/screwdriver_PNG9494.png" alt="">
            <h3>отвертка ударная плоская hjl-2552</h3>
            <p><span>50</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>


   <div class="swiper product-slider" id="elinstrum">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/2d54d7f24456c30937894fa4ae8d39d1.png" alt="">
            <h3>лобзик электрический jl-300</h3>
            <p><span>4 300</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/d4737548fb2a0828fe5b86962e9b7a5b.png" alt="">
            <h3>фрезер электрический status rh1300</h3>
            <p><span>3 770</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/lobzik-bosch-pst-650_9a3d505aed67ec6_500x500.png" alt="">
            <h3>лобзик электрический bosch rst750</h3>
            <p><span>5 000</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/07edc749e045f6826005bffe415a9742.png" alt="">
            <h3>фрезер электрический fm-1602</h3>
            <p><span>2 500</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/1302.970.png" alt="">
            <h3>Угловая шлифмашина rdt565-0</h3>
            <p><span>5 400</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/bolgarka.png" alt="">
            <h3>Угловая шлифмашина УШМ-125</h3>
            <p><span>3 590</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/6958ba91d1d0c2fd51fcffc007162e0a.png" alt="">
            <h3>дрель-шуруповёрт аккумуляторная nfr89op</h3>
            <p><span>6 799</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/26121_2.png" alt="">
            <h3>дрель-шуруповёрт аккумуляторная vv-282</h3>
            <p><span>5 500</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/PerforatorWORXWX3929akkumulyatornyy20V22DzhbezAKBiZU.png" alt="">
            <h3>перфоратор аккумуляторный wx392.9</h3>
            <p><span>6 600</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/drill_PNG55.png" alt="">
            <h3>перфоратор электрический aa-5646</h3>
            <p><span>4 555</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/drel-perforator-1.png" alt="">
            <h3>перфоратор аккумуляторный tfr56-0</h3>
            <p><span>5 659</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

         <div class="swiper-slide slide">
            <img src="images/drill_PNG60.png" alt="">
            <h3>перфоратор электрический ui-55-225</h3>
            <p><span>3 990</span>₽</p>
            <button data-fancybox data-src="#dialog-content">сделать предзаказ</button>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<section class="info" id="info">
   <h1 class="heading"><span>о нас</span></h1>

   <div class="box-container">

      <div class="box" data-aos="fade-right">
         <i class="fas fa-clock"></i>
         <div class="content">
            <h3>часы работы</h3>
            <p>Пн-Вт: 08:00 – 19:00</p>
            <p>Вс: 09:00 – 17:00</p>
         </div>
      </div>

      <div class="box" data-aos="fade-left">
         <i class="fas fa-phone"></i>
         <div class="content">
            <h3>телефон</h3>
            <p>8-(910)-581-26-21</p>
            <p>8-(980)-729-09-09</p>
         </div>
      </div>

      <div class="box" data-aos="fade-right">
         <i class="fas fa-envelope"></i>
         <div class="content">
            <h3>email</h3>
            <p>master2022ok@gmail.com</p>
         </div>
      </div>

      <div class="box" data-aos="fade-left">
         <i class="fas fa-map"></i>
         <div class="content">
            <h3>адрес</h3>
            <p>ул. Калинина, 20, Донской, Россия ТОЦ Престиж</p>
         </div>
      </div>

   </div>

</section>


<section class="contact" id="contact">

   <h1 class="heading"><span>ваши контакты</span></h1>

   <div class="row">

      <div class="image">
         <img src="images/connection.png" alt="">
      </div>

      <form action="" method="post">
         <div class="flex">
            <p>Мы будем рады,если Вы оставите свои контакты</p>
            <input data-aos="fade-right" type="text" name="name" placeholder="введите Ваше имя" class="box" required>
            <input data-aos="fade-left" type="email" name="email" placeholder="введите Ваш email" class="box" required>
            <input data-aos="fade-right" type="number"  name="number" placeholder="введите Ваш телефон" class="box" required>
         </div>
         <input type="text" data-aos="fade-up" name="mess" class="box" required placeholder="введите сообщение" size="50" maxlength="20"></input>
         <input type="submit" data-aos="zoom-in" value="отправить" name="send" class="btn">
      </form>

   </div>

</section>

<section class="location" id="location">

   <h1 class="heading"><span>ЛОКАЦИЯ</span></h1>

   <div class="box-container">
       <div class="karta" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/masterok/14815623552/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Мастерок</a><a href="https://yandex.ru/maps/10827/donskoy/category/fasteners/184106650/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Крепёжные изделия в Донском</a><a href="https://yandex.ru/maps/10827/donskoy/category/electronic_goods_store/184108095/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:28px;">Магазин электротоваров в Донском</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUF4YU4hC" width="100%" height="400px" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
   </div>
</section>

<footer class="footer">
   <div class="credit">Донской, 2022</div>

   <a href="https://www.flaticon.com/ru/free-icons/" title=" иконки"> иконки от Freepik - Flaticon</a>
</footer>


<div id="dialog-content" style="display:none; background:#272626c4;">
<div class="modalform">
<form action="" method="post">
         <div class="flex">
            <input data-aos="fade-right" type="text" name="name" placeholder="введите Ваше имя" class="box" required>
            <input data-aos="fade-left" type="email" name="email" placeholder="введите Ваш email" class="box" required>
            <input data-aos="fade-right" type="number"  name="number" placeholder="введите Ваш телефон" class="box" required>
         </div>
         <input type="text" data-aos="fade-up" name="mess" class="box" required placeholder="введите сообщение" size="50" maxlength="20"></input>
         <input type="submit" data-aos="zoom-in" value="отправить" name="send" class="btn">
      </form>
</div>
</div>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>

</body>
</html>