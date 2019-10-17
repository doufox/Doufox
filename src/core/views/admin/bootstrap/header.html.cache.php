<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="referrer" content="always"/>
    <meta name="generator" content="<?php echo $site_generator; ?>"/>
    <meta name="keywords" content="<?php echo $site_keywords; ?>"/>
    <meta name="description" content="<?php echo $site_description; ?>"/>
    <title><?php echo $site_title; ?></title>
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/theme/css/style.css" type="text/css"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" mce_href="/favicon.ico">
    <?php echo doHookAction('view_head'); ?>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="hidden-sm"><a href="<?php echo $site_url; ?>">首页</a></li>
                        <?php $return = $this->_category("num=6");  if (is_array($return)) { foreach ($return as $key=>$vdata) { $arrchilds = @explode(',', $vdata['arrchilds']);    $current = in_array($catid, $arrchilds);?><li<?php if ($current) { ?> class="active"<?php } ?>><a href="<?php echo $vdata['url']; ?>"><?php echo $vdata['catname']; ?></a></li><?php } } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://github.com/inpanel/inpanel" target="_blank">源码</a></li>
                    </ul>
                </div>
            </div>
        </nav>
