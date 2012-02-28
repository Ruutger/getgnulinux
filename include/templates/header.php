<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang'); ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir'); ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <!-- alternate languages -->
    <?php
    $base_url = $ggl->get('base_url');
    foreach ($ggl->get('locales') as $code => $items) {
        list($locale, $native, $percent) = $items;
        if ($percent == 1) {
            printf("<link rel=\"alternate\" type=\"text/html\" dir=\"%s\" hreflang=\"%s\" href=\"%s%s\" />\n",
                $ggl->get_lang_directionality($code),
                $code,
                $base_url,
                $this->current_page($code));
        }
    } ?>
    <!-- end alternate languages -->
    <title><?php $this->page_title(); ?></title>
    <link rel="copyright" type="text/html" title="Copyright notice for this website." href="<?php $this->url('legal/'); ?>" hreflang="en" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php $this->url('favicon.ico'); ?>" />
    <meta name="description" content="<?php $this->page_description(); ?>"/>
    <meta name="keywords" content="<?php print _("linux, gnu/linux, free software, software freedom, open-source, windows alternative, get linux, switch to linux"); ?>" />
    <?php $this->stylesheet('/style/main-ltr.css'); ?>
    <?php
    $p = isset($_GET['p']) ? $_GET['p'] : NULL;
    switch ($p) {
        case 'linux.misunderstanding_free_software':
            $this->javascript('/style/toggleanswers.js');
            break;
        case 'linux.screenshots':
            $this->javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js');
            $this->javascript('/style/fancybox/jquery.fancybox-1.3.4.pack.js');
            $this->stylesheet('/style/fancybox/jquery.fancybox-1.3.4.css');
            ?>
    <script type="text/javascript">
        $(document).ready(function() {

			$("a[rel=screenshots_ubuntu]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
                'overlayColor'		: '#000',
                'overlayOpacity'	: 0.8,
				'titlePosition' 	: 'outside',
			});

			$("a[rel=screenshots_fedora]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
                'overlayColor'		: '#000',
                'overlayOpacity'	: 0.8,
				'titlePosition' 	: 'outside',
			});

			$("a[rel=screenshots_trisquel]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
                'overlayColor'		: '#000',
                'overlayOpacity'	: 0.8,
				'titlePosition' 	: 'outside',
			});

        });
    </script>
            <?php
            break;
    }

    // Load the Flattr javascript?
    if ( $ggl->get('flattr') ) {
        require_once(ROOT.'/include/widgets/Flattr.php');
    }
    ?>

    <style type="text/css">
    <?php
    // For some languages italic text is not displayed properly. Disable
    // italics for selected languages.
    if ($ggl->no_italics()) {
        print "em,
        #mainbody .read_article a,
        #translations #is_current_language a,
        .quote1 .source,
        .floatquote1 .source,
        .note_ital,
        #about_us h2 {
            font-style: normal;
        }";
    }
    ?>
    </style>

    <?php
    if ($ggl->get('dir') == 'rtl') {
        $this->stylesheet('/style/main-rtl.css');
    }
    ?>

    <!--[if lte IE 6]>
    <?php
    $this->javascript('/style/ie_translation_menu.js');
    $this->stylesheet('/style/ie6-ltr.css');
    ?>
    <![endif]-->

    <!--[if IE 7]>
    <?php
    $this->javascript('/style/ie_translation_menu.js');
    $this->stylesheet('/style/ie7-ltr.css');
    ?>
    <![endif]-->
</head>

<body>
<div id="global-container">
<div class="accessibility">
    <a href="#maincontent"><?php print _("skip to content"); ?></a>
</div>

<div id="wrapper">
<div id="mainbody">
<div id="header">

<?php
$p = isset($_GET['p']) ? $_GET['p'] : NULL;
if ( $p == "home" || !$p ) {
?>
    <div id="header_picture_homepage">
	    <h1><?php print $this->text('website_title'); ?></h1>
    </div>
<?php
} else {
?>
    <div id="header_picture">
        <h1><a href="<?php $this->base_url(); ?>" title="<?php print _("home page"); ?>"><?php $this->text('website_title'); ?></a></h1>
    </div>
<?php } ?>

</div><!-- end header -->
