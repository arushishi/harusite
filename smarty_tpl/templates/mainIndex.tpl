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
							</div>
						</div>
						<!--▼temporary if exists db record▼-->
							{if count($t_contents) > 0}
							  {foreach from=$t_contents key=k item=v}
								{if $cur_date != $v.date}
									{assign var=cur_date value=$v.date}
									{assign var=change_date value=1}
									{assign var=image_count value=0}
									<h3>{$v.date}<h3>
								{else}
									{assign var=change_date value=0}
								{/if}
								{if $v.kind == 0}
									{if $image_end == 1}
										{assign var=image_end value=0}
										</ul>
									{/if}
									<p class="my_text">{$v.explain}</p>
								{elseif $v.kind == 1}
									{if $image_end == 0}
										{assign var=image_end value=1}
										<ul class="my_image">
									{/if}
											<a href="../public/image{$v.url}" data-lity><img title="{$v.explain}" src="../public/image{$v.url}" alt="{$v.explain}" /></a>
								{elseif $v.kind == 2}
									{if $image_end == 1}
										{assign var=image_end value=0}
										</ul>
									{/if}
									<ul class="my_movie" title="{$v.explain}">
										<p>{$v.explain}<p>
										<iframe src="https://www.youtube.com{$v.url}?modestbranding=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
									</ul>
								{/if}
							  {/foreach}
							  {if $image_end == 1}
								{assign var=image_end value=0}
								</ul>
							  {/if}
							{/if}

						<!--▲temporary▲-->
					</div>
				</div>
			</section> <!-- /#static -->


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