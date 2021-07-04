<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/meta'); ?>
<style>
	.form_body p{ text-align: justify;}
</style>
</head>

<body style="background-image: url(images/travel-background.jpg);">

<!-- header area start -->

<?php $this->load->view('includes/header'); ?>

<!-- header area stop --> 

<!-- index area start -->

<div class="index_area">
  <div class="container">
    <div class="form_area">
      <?php $this->load->view('includes/loginHeader'); ?>
      <div class="form_body">
        <h1><?php _e($page_name);  ?></h1>
        
        <!-- form start -->
        
        <div class="main_Zone">
          <div class="box1">
          	<?php _e($page_description);  ?>
            <?php /*?><?php if($language == 'en'){ ?>
                <p> We are committed to offering travel and tourism services of the highest quality, combining our energy and enthusiasm, with our years of experience. Our greatest satisfaction comes in serving large numbers of satisfied clients who have experienced the joys and inspiration of travel. </p>
                <p>Ever since the company was established in 1999, Alamin Travel has concentrated its efforts in producing quatlity travel, responding to the needs of the times while anticipating the demands of the future.</p>
                <p>“Alamin Travel” is registered in the federal registry for tour operators by the Federal Tourism Agency of Russia and was issued the number МВТ 012418  from 25/07/2010.</p>
                <p>The main tourist direction is Sri Lanka (Ceylon Island), popular for its beaches and sightseeing locations. Others are the vacation resorts in the Maldives and Seychelles, Mauritius, tours in India (sightseeing and vacation in Goa and Kerala), Malaysia (excursions in Kuala Lumpur, holidays in Langkawi, Penang and Borneo), Indonesia (Bintan, Bali), Singapore, Thailand and the UAE.</p>
                <p>The company is also a member of IATA (International Air Transport Association – IATA). At different times Alamin Travel was awarded best agent of leading airline companies such as Qatar Airways, Emirates and Etihad Airways, giving us a greater advantage when it comes to acquiring seats even in complicated situations and dates for our clients.</p>
                <h3>The main services offered by our company are:</h3>
                <ul>
                  <li>Organization of group and individual tours;</li>
                  <li>Organization of VIP-tours;</li>
                  <li>Corporate services;</li>
                  <li>Reservation and ticketing for scheduled flights of Russian and foreign airlines;</li>
                  <li>Hotel reservations in Russia and abroad;</li>
                  <li>Sale of train tickets across Russia, CIS and Europe;</li>
                  <li>Medical insurance for travelers traveling to Russia and abroad.</li>
                </ul>
                <p>You will discover that Alamin Travel Agency is quite diverse. We use our diversity in and out of the travel industry to address various global concerns. By planning and organizing events, we address current issues such as enviroment and international relations. We narrow the gap of misunderstanding between people by promoting international business and cultural exchanges and by serving as a major source of information.</p>
                <p>Alamin Travel plays a leading role in the travel and tourism industry as a result of which we have accrued a number of awards and recognition from leading airline companies. These include the agent award certification for outstanding services from Qatar Airways, the Egyptair best seller agent and the Diamond Agent award from Etihad Airways.</p>
                <p>Continually providing a vast array of innovative ideas and quality services, Alamin Travel commits itself as a leader in promoting the enrichment of mankind and the globalization of the world as we embark on the journey into this twenty first century.</p>
            <?php }else{ ?>
            	<p> Мы стремимся предлагать туристические и туристические услуги самого высокого качества, сочетая нашу энергию и энтузиазм с нашим многолетним опытом. Наше наибольшее удовлетворение заключается в обслуживании большого количества довольных клиентов, которые испытали радость и вдохновение путешествия. </ Р>
            	<p> С тех пор, как компания была основана в 1999 году, Alamin Travel сконцентрировала свои усилия на создании качественных путешествий, отвечая потребностям времени и предвосхищая требования будущего. </ p>
            <p> «Аламин Трэвел» зарегистрирован в федеральном реестре туроператоров Федеральным агентством по туризму России и получил номер МВТ 012418 от 25.07.2010. </ p>
            	<p> Основным туристическим направлением является Шри-Ланка (остров Цейлон), популярный своими пляжами и достопримечательностями. Другие - это курорты на Мальдивах и Сейшельских островах, Маврикий, туры в Индию (осмотр достопримечательностей и отдых в Гоа и Керала), Малайзия (экскурсии в Куала-Лумпур, отдых в Лангкави, Пенанг и Борнео), Индонезия (Бинтан, Бали), Сингапур , Таиланд и ОАЭ. </ P>
            	<p> Компания также является членом IATA (Международная ассоциация воздушного транспорта - IATA). В разное время Alamin Travel был награжден лучшим агентом ведущих авиакомпаний, таких как Qatar Airways, Emirates и Etihad Airways, что дает нам большее преимущество, когда речь идет о приобретении мест даже в сложных ситуациях и датах для наших клиентов. </ P>
            	<h3> Основные услуги, предлагаемые нашей компанией: </h3>
            	<ul>
                  <li> Организация групповых и индивидуальных туров; </ li>
                  <li> Организация VIP-туров; </ li>
                  <li> Корпоративные услуги; </ li>
                  <li> Бронирование и заказ билетов на регулярные рейсы российских и зарубежных авиакомпаний; </ li>
                  <li> Бронирование отелей в России и за рубежом; </ li>
                  <li> Продажа билетов на поезд по России, СНГ и Европе; </ li>
                  <li> Медицинская страховка для путешественников, путешествующих в Россию и за границу. </ li>
            	</ul>
                <p> Вы обнаружите, что Alamin Travel Agency довольно разнообразно. Мы используем наше разнообразие в туристической индустрии и за ее пределами для решения различных глобальных проблем. Планируя и организовывая мероприятия, мы решаем текущие проблемы, такие как окружающая среда и международные отношения. Мы сокращаем разрыв в недопонимании между людьми, продвигая международные деловые и культурные обмены и служа в качестве основного источника информации. </ P>
            	<p> Alamin Travel играет ведущую роль в индустрии путешествий и туризма, в результате чего мы получили ряд наград и признание ведущих авиакомпаний. К ним относятся сертификат награды агента за выдающиеся услуги от Qatar Airways, агент бестселлера Egyptair и награда Diamond Agent от Etihad Airways. </ P>
            	<p> Постоянно предоставляя широкий спектр инновационных идей и качественных услуг, Alamin Travel стремится стать лидером в продвижении обогащения человечества и глобализации мира, когда мы вступаем в путешествие в двадцать первое столетие. </ p>
            <?php } ?><?php */?>
          </div>
        </div>
      </div>
      
      <!-- form stop --> 
      
    </div>
  </div>
</div>
</div>

<!-- index area stop --> 

<!-- footer area start -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer area stop --> 

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script> 
<script src="https://shaack.com/projekte/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.extra.js"></script> 
<script type='text/javascript'>
        $(function() {
            $('.input-group.date').datepicker({
                orientation: "auto left",
                forceParse: false,
                autoclose: true,
                todayHighlight: true,
                toggleActive: true
            });
        });

    </script> 
<script>
        $("input[type='number']").inputSpinner()

    </script> 
<script>
        $(document).ready(function() {

            $(".toggle-accordion").on("click", function() {
                var accordionId = $(this).attr("accordion-id"),
                    numPanelOpen = $(accordionId + ' .collapse.in').length;

                $(this).toggleClass("active");

                if (numPanelOpen == 0) {
                    openAllPanels(accordionId);
                } else {
                    closeAllPanels(accordionId);
                }
            })

            openAllPanels = function(aId) {
                console.log("setAllPanelOpen");
                $(aId + ' .panel-collapse:not(".in")').collapse('show');
            }
            closeAllPanels = function(aId) {
                console.log("setAllPanelclose");
                $(aId + ' .panel-collapse.in').collapse('hide');
            }

        });

    </script> 
<script>
        $(document).ready(function() {
            $("input[name$='cars']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#Cars" + test).show();
            });
        });

    </script>
</body>
</html>
