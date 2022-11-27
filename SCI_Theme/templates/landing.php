<?php 
/* Template Name: Langding Page
* Template Post Type: post
*/ 

// Tich hop code tracking
if (current_user_can('administrator') || current_user_can('editor')) {
 
 $addcode = '<meta name="robots" content="noindex,follow"/>
 <link id="pagestyle" rel="stylesheet" type="text/css" href="/wp-includes/css/admin-bar.min.css?ver=4.9.10" />
 <link id="pagestyle" rel="stylesheet" type="text/css" href="/wp-includes/css/dashicons.min.css?ver=4.9.10" />
 <script>var refer = document.referrer;console.log(refer);</script>
 </head>';

}else{
	$addcode = '
	<meta name="robots" content="index,follow"/>
	<script>var refer = document.referrer;console.log(refer);</script>
	</head>';
}

global $post; ?>

<?php
	// Get data
	$field_html = get_post_meta($post->ID,'html_code',true);
	$lp_link = get_post_meta($post->ID,'lp_link',true);
	
	$field_html_m = get_post_meta($post->ID,'html_code_m',true);
	$lp_link_m = get_post_meta($post->ID,'lp_link_m',true);

	function showPost($field, $link, $addcode) {
		$tracking = "
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','GTM-WZZNMWN');</script>
				
				<script async src='https://www.googletagmanager.com/gtag/js?id=G-CKE2K2DYNN'></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				
				gtag('config', 'G-CKE2K2DYNN');
			</script>
		
			<script>
				setTimeout(function() {
					! function(f, b, e, v, n, t, s) {
						if (f.fbq) return;
						n = f.fbq = function() {
							n.callMethod ?
								n.callMethod.apply(n, arguments) : n.queue.push(arguments)
						};
						if (!f._fbq) f._fbq = n;
						n.push = n;
						n.loaded = !0;
						n.version = '2.0';
						n.queue = [];
						t = b.createElement(e);
						t.async = !0;
						t.src = v;
						s = b.getElementsByTagName(e)[0];
						s.parentNode.insertBefore(t, s)
					}(window,
						document, 'script', '//connect.facebook.net/en_US/fbevents.js');
		
					fbq('init', '1216077185086864');
					fbq('track', 'PageView');
				}, 5000)
			</script>
		";
		if($field != ''):
			
			$html = str_replace('"media/','"'.$link.'media/',$field);
			echo $html = str_replace('</head>',$addcode,$html);
			echo $tracking;
			wp_admin_bar_render();
		else:
			echo '<html><head>'.$addcode.'<body><h3 style="margin-top:200px;text-align:center">MISSING HTML CODE</h3></body></html>';
		endif;
	}

	// Kiem tra xem co ban mobile hay ko
	if($field_html_m != ''):
		// Check Ipad
		if( (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) ):
			showPost($field_html, $lp_link, $addcode);
		else:
			if( !wp_is_mobile() ):
				showPost($field_html, $lp_link, $addcode);
			else:
				// Neu la Mobile
				showPost($field_html_m, $lp_link_m, $addcode);
			endif;

		endif;
	
	else:
	// Trương hop ko co ban mobile	
		showPost($field_html,$lp_link, $addcode);
	endif;

	
?>
