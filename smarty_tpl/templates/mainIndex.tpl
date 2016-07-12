{include file="tplHeader.tpl"}
<head>

{include file="tplComHeader.tpl"}

<title>ハル成長記</title>

{include file="tplHeaderEnd.tpl"}
</head>

    <body>
        <!-- Header -->
			<header id="header">

					<nav id="head-nav" class="navbar topnavbar navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="200">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<i class="fa fa-bars"></i>
								</button>
							</div> <!-- /#navbar-header -->

							<!-- Navigation -->
							<div class="collapse navbar-collapse" id="navbar">
								<ul class="nav pull-right navbar-nav" id="main_navigation_menu">
									<li class="active"><a href="#header">Top</a></li>
									<li><a href="#about">About us</a></li>
									<li><a href="#map">Map</a></li>
									<li><a href="#recruitment">Recruitment</a></li>
									<li><a href="#footer-top">Contact</a></li>
								</ul>
							</div>
						</div>
					</nav> <!-- /#navbar -->
			</header> <!-- /#header -->
		

			<!-- static -->
			<section id="static">
				<div class="container-full">
					<div class="container">
						<div class="row bm-remove animate" data-anim-type="zoomInUp">
							<div class="top_content">
								<img src="../img/fulllogo_l.jpg">
							</div>
						</div>
						<!--▼temporary if exists db record▼-->
							<button id="more">More...</button>
							<ul id="list">
								<iframe width="480" height="270" src="https://www.youtube.com/embed/LXshJfC6C0M?modestbranding=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
							</ul>
						<!--▲temporary▲-->
					</div>
				</div>
			</section> <!-- /#static -->

			<!-- about -->
			<section id="about">
				<div class="container-full">
					<div class="container">
						<div class="row bm-remove animate" data-anim-type="zoomInUp">
							<div class="about_content">
								<div class="col-md-6">
									<div class="imac">
										<img src="../img/outside2.jpg" alt="" width="80%">
									</div>
								</div>
								<div class="col-md-6">
									<div class="web_content">
										{if count($m_top_message_title) > 0}
										  {foreach from=$m_top_message_title key=k item=v}
											<h3>{$v.word1}<h3>
										  {/foreach}
										{/if}
										{if count($m_top_message_body) > 0}
										  {foreach from=$m_top_message_body key=k item=v}
											<p style="margin:20px 0;">{$v.word1}<p>
										  {/foreach}
										{/if}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> <!-- /#static -->

		

			<!-- Mobile description -->
			<!-- footer top -->
			<footer id="footer-top">
				<div class="container-full">
					<div class="container">
						<div class="row bm-remove animate" data-anim-type="bounceIn">
							<div class="footer-text">
								<h1>ご連絡は以下メールアドレスまで</h1>
								<img src="../img/mailaddress.png" alt="mail address" style="margin-left: auto;margin-right:auto;">
							</div>
						</div>
					</div>
				</div>
			</footer> <!-- footer-top -->

			<!-- footer -->
{include file="tplComFooter.tpl"}
			<!-- /#footer -->

		<script src="../js/vendor/jquery-1.10.2.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/animations.min.js"></script>
        <script src="../js/jquery.scrollUp.min.js"></script>
        <script src="../js/lightbox.min.js"></script>
        <script src="../js/smoothscroll.js"></script>
        <script src="../js/visible.min.js"></script>
        <script src="../js/jquery.nav.js"></script>

    </body>
</html>