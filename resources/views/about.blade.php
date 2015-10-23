@extends("layouts.master")


@section("content")

		<section id="site-contents">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2 class="page-heading">About Us</h2>
            <p>Humbole is an open content catering media house.</p>

            </p>Our goal is to present interesting content (video, images and articles) to the right group of people from around the universe. We believe that Internet is becoming like a sea of content and information. If we try to look out for anything interesting its really hard to find one easily. Something like what Samuel Taylor Coleridge said,</p>

            <p>&quot;<em>Water, water, everywhere,<br>
            Nor any drop to drink</em>.&quot;</p>


            <p>Apart from our original article, we digg out the unseen best videos, images from the web and present you the best. We all know life is too short to see or read all. We at humbole are trying to give life a best shot by helping you see and experience the maximum best in the universe.</p>

            <p>Humbole is constantly changing and gets better with your participation – comment on the articles, send an email, suggest a topic, or ask a question and get involved!</p>

            <p>Check out, read, inspire and entertain from article, images and videos you have never seen before.</p>

            <p>We get you the most amazing information you deserve to see, hear and know from around the universe.</p>

            <p>Share with one .. share with all !!</p>

            <p>For press inquiries or to contact us, please e-mail <a href="mailto:contact@humbole.com">contact@humbole.com</a></p>
            
					</div>
					
					
          <aside ng-controller="RelatedController" class="col-md-4 ng-scope">
          						<h2 class="page-heading">Team</h2>
          						<!-- ngRepeat: post in relatedPosts --><div class="grid-item ng-scope">
          							<figure class="grid-thumbnail">
          								<span class="image-wrapper">
          										<img width="100%" height="100%" ng-src="http://humbole.com/images/nilay_anand.jpg" src="http://humbole.com/images/nilay_anand.jpg">
          								</span>
          							</figure>
          							<div class="image-description">
          								<h2 class="image-title"><b>Nilay Anand</b></h2>
          								<div class="image-category">
          									<a class="ng-binding">CEO, Co-founder</a>
          								</div>
          							</div>
          						</div><!-- end ngRepeat: post in relatedPosts -->
          						          						<!-- ngRepeat: post in relatedPosts --><div class="grid-item ng-scope">
          							<figure class="grid-thumbnail">
          								<span class="image-wrapper">
          										<img width="100%" height="100%" ng-src="http://humbole.com/images/drishty_chopra.jpg" src="http://humbole.com/images/drishty_chopra.jpg">
          								</span>
          							</figure>
          							<div class="image-description">
          								<h2 class="image-title"><b>Drishty Chopra</b></h2>
          								<div class="image-category">
          									<a class="ng-binding">Media Manager, Co-founder</a>
          								</div>
          							</div>
          						</div><!-- end ngRepeat: post in relatedPosts -->
          						<!-- ngRepeat: post in relatedPosts --><div class="grid-item ng-scope">
          							<figure class="grid-thumbnail">
          								<span class="image-wrapper">
          										<img width="100%" height="100%" ng-src="http://humbole.com/images/kiran_kumar.jpg" src="http://humbole.com/images/kiran_kumar.jpg">
          								</span>
          							</figure>
          							<div class="image-description">
          								<h2 class="image-title"><b>Kiran Kumar</b></h2>
          								<div class="image-category">
          									<a class="ng-binding">Media Activist, Co-founder</a>
          								</div>
          							</div>
          						</div><!-- end ngRepeat: post in relatedPosts -->
          						<!-- ngRepeat: post in relatedPosts --><div class="grid-item ng-scope">
          							<figure class="grid-thumbnail">
          								<span class="image-wrapper">
          										<img width="100%" height="100%" ng-src="http://humbole.com/images/vineet_k.jpg" src="http://humbole.com/images/vineet_k.jpg">
          								</span>
          							</figure>
          							<div class="image-description">
          								<h2 class="image-title"><b>Vineet Kumar</b></h2>
          								<div class="image-category">
          									<a class="ng-binding">Senior Developer</a>
          								</div>
          							</div>
          						</div><!-- end ngRepeat: post in relatedPosts -->
          						<!-- ngRepeat: post in relatedPosts --><div class="grid-item ng-scope">
          							<figure class="grid-thumbnail">
          								<span class="image-wrapper">
          										<img width="100%" height="100%" ng-src="http://humbole.com/images/ricky_p.jpg" src="http://humbole.com/images/ricky_p.jpg">
          								</span>
          							</figure>
          							<div class="image-description">
          								<h2 class="image-title"><b>Ricky Pukhrambam</b></h2>
          								<div class="image-category">
          									<a class="ng-binding">Content Programmer</a>
          								</div>
          							</div>
          						</div><!-- end ngRepeat: post in relatedPosts -->
          						<!-- ngRepeat: post in relatedPosts --><div class="grid-item ng-scope">
          							<figure class="grid-thumbnail">
          								<span class="image-wrapper">
          										<img width="100%" height="100%" ng-src="http://humbole.com/images/chandani.jpg" src="http://humbole.com/images/chandani.jpg">
          								</span>
          							</figure>
          							<div class="image-description">
          								<h2 class="image-title"><b>Chandani Sapra</b></h2>
          								<div class="image-category">
          									<a class="ng-binding">Content Programmer</a>
          								</div>
          							</div>
          						</div><!-- end ngRepeat: post in relatedPosts -->
                      
          					</aside>
				</div>
            </div>
		</section>
@stop
