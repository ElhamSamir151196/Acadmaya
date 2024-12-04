@extends('Student.MainStudent')

@section('User_content')  

<!-- ------------------------banner ------------------------->
<div class="banner ">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

	<!-- The slideshow -->
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/software_engineer 3.jpg" alt="software_engineer 3" >
		</div>
		<div class="carousel-item">
			<img src="img/backgroun_laptop.jpg" alt="backgroun_laptop" >
		</div>
		<div class="carousel-item">
			<img src="img/businesses.png" alt="businesses">
		</div>
		<div class="carousel-item ">
			<img src="img/software_engineer 1.jpg" alt="software_engineer 1" >
		</div>
		<div class="carousel-item ">
			<img src="img/software_engineer 2.jpg" alt="software_engineer 2" >
		</div>
		<div class="carousel-item ">
			<img src="img/279643.jpg" alt="img bannar" >
		</div>
  	</div>
  

  </div>
</div>
<div class="clear"></div>

<!--------------------------------- departments -------------------------->



<!-------------------------- show all departments ------------>
	<div class="card-deck services" >
		<div>
		
				
				<!--<div class=" box ">
					<img class="card-img-top"  src="{{ URL::asset('img/icon.jpg') }}" alt="Image"/>
					<div class="card-body">
					<h1 class="card-title">name</h1>
					</div>
				</div>-->
		<div class="container_1"> 
			<div class="box">
				<h3>Samar Sabry</h3>
				<img src="img\software_engineer 1.jpg">
				<p>
					text messages are used for personal, family, 
					business and social purposes. 
					Governmental and non-governmental organizations 
					
				</p>
							
			</div>

			<div class="box">
				<h3>Shrouk Mahmoud</h3>
				<img src="img\software_engineer 2.jpg">
				<p>
					text messages are used for personal, family, 
					business and social purposes. 
					Governmental and non-governmental organizations 
					
				</p>
							
			</div>

			<div class="box">
				<h3>Elham Samir</h3>
				<img src="img\software_engineer 3.jpg">
				<p>
					text messages are used for personal, family, 
					business and social purposes. 
					Governmental and non-governmental organizations 
					
				</p>
							
			</div>

			<div class="box">
				<h3>Esraa Gamal</h3>
				<img src="img\software_engineer.jpg">
				<p>
					text messages are used for personal, family, 
					business and social purposes. 
					Governmental and non-governmental organizations 
					
				</p>
							
			</div>
		</div>

		<div class="container_2">
				<h3>Sofia Acadmya</h3>
				<p>
					text messages are used for personal, family, 
					business and social purposes. 
					Governmental and non-governmental organizations 
				</p>
							
		</div>

		<div class="container_3 row"> 
			<div class="box3 col-4">
				<h3>Mobile Applications</h3>
				<img src="img\backgroun_laptop.jpg">
				<h5>Flutter & Dart</h5>
				<p>
						text messages are used for personal, family, 
						business and social purposes. 
						Governmental and non-governmental organizations... 
						<a  href="#">more</a>
				</p>
					
				
							
			</div>
			<div class="box3 col-4">
				<h3>Web Full Stack</h3>
				<img src="img\backgroun_laptop.jpg">
				<h5>Important Web languages</h5>
				<p>
						text messages are used for personal, family, 
						business and social purposes. 
						Governmental and non-governmental organizations ...
						<a  href="#">more</a>
				</p>
					
			
							
			</div>

			<div class="box3 col-4">
				<h3>AI and Machine Larning</h3>
				<img src="img\backgroun_laptop.jpg">
				<h5>Advanced Programming</h5>
				<p>
						text messages are used for personal, family, 
						business and social purposes. 
						Governmental and non-governmental organizations... 
						<a  href="#">more</a>
				</p>
					
				
							
			</div>
		</div>
			
		
		<br><br>
		</div>
		<div class="clear"></div>
		<div>
		
		</div>
	</div>
	
<!------------------------------------About us --------------->

		<div class="about_us-section">
			<div class="container float-right col-lg-6 mySlides">
				

						<div class="item img1">
							<img src="img/aboutimg2.jpg" alt="About us" style="width:100%;height:100%;">
						</div>
						
						

					
				
				</div>
                
                <h2> About Us</h2>
                <p>Posts shared On Special Network for help people to concentrate in thier topice and not waste time.
					It's also your personal organizer for storing, saving and sharing photos. 
					 and you have full control over your photos and privacy settings.</p>
                
                
                <div class="clear"></div>
            </div>





@endsection