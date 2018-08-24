<?php echo $this->Html->charset(); ?>
<?php Cache::clear(); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $google_analytics ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?= $google_analytics ?>');
	</script>
<?php endif; ?>

<?php 
echo $this->Html->meta('icon', 'favicon.png');

echo $this->Html->css(Router::fullbaseUrl().'/frontend/css/bootstrap.min.css');
echo $this->AssetCompress->css('style');
echo $this->Html->css(Router::fullbaseUrl().'/frontend/css/jquery-ui.min.css');
echo $this->Html->css(Router::fullbaseUrl().'/frontend/fontawesome-5.20/css/all.css');
echo $this->AssetCompress->script('base');

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>
