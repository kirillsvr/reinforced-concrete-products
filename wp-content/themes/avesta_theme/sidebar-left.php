<div class="sidebar sidebar-left">
		
		<?php dynamic_sidebar('sidebar_left'); ?>

		<div class="sidebar-block sidebar-application-block">
			<h4>Возникли вопросы?</h4>
			<p>Оставьте заявку, <br>наши специалисты проконсультируют вас!</p>
			<a href="#order-call-back-popup" class="popup-link">Оставить заявку</a>
		</div>
  		<?php
		$urlpage = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		if($urlpage == "http://avesta.kbportfolio.ru/o-kompanii/") : ?>
  		<div class="okompaniiside">
  			<h4>Наши партнеры</h4>
			<div class="row">
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/spk-png2-e1484649340681.png" />
					</div>
					<p>ОАО «СтройПанельКомплект»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/logo-e1484649560733.png" />
					</div>
					<p>АО "ЖБК-1"</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/trest14-e1484649366540.png" />
					</div>
					<p>ПАО «Трест № 14»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/stroidet-e1484649398958.png" />
					</div>
					<p>ООО «Завод Стройдеталь № 6»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/s5_logo-e1484649414365.png" />
					</div>
					<p>ООО «ЖБК-7»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/logousb-e1484649431790.png" style="width:200px;" />
					</div>
					<p>ООО «Уралспецбетон»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/pzsp.png" />
					</div>
					<p>АО «ПЗСП»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/betkam.png" style="width:150px;" />
					</div>
					<p>ООО ТД «Бетокам»</p>
				</div>
			</div>
  		</div>
        <?php endif; ?>

</div>