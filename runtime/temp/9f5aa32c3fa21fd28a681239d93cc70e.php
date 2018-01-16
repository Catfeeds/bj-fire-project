<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"/home/wwwroot/fire.mcykj.com/public/../application/admin/view/questions/add.html";i:1514897446;s:81:"/home/wwwroot/fire.mcykj.com/public/../application/admin/view/layout/default.html";i:1514519378;s:78:"/home/wwwroot/fire.mcykj.com/public/../application/admin/view/common/meta.html";i:1514519378;s:80:"/home/wwwroot/fire.mcykj.com/public/../application/admin/view/common/script.html";i:1514519378;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="__CDN__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__CDN__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__CDN__/assets/js/html5shiv.js"></script>
  <script src="__CDN__/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="add-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">
    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('Type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[type]">
                <?php if(is_array($typeList) || $typeList instanceof \think\Collection || $typeList instanceof \think\Paginator): if( count($typeList)==0 ) : echo "" ;else: foreach($typeList as $key=>$vo): ?>
                <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',""))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="c-title" class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-title" class="form-control summernote edit" rows="5" name="row[title]" cols="50"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-options" class="control-label col-xs-12 col-sm-2"><?php echo __('Options'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            A:<input id="c-options" type="text" name="row[options][A]" value="" class="form-control"/>
            B:<input id="c-options" type="text" name="row[options][B]" value="" class="form-control"/>
            C:<input id="c-options" type="text" name="row[options][C]" value="" class="form-control"/>
            D:<input id="c-options" type="text" name="row[options][D]" value="" class="form-control"/>
            E:<input id="c-options" type="text" name="row[options][E]" value="" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('Answer'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" type="text" name="row[answer]" value="" class="form-control" data-tip="例：单选:A 多选:A,B,C  判断:1正确,2错误"/>
        </div>
    </div>
    <div class="form-group">
        <label for="c-analysis" class="control-label col-xs-12 col-sm-2"><?php echo __('Analysis'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-analysis" class="form-control summernote edit" rows="5" name="row[analysis]" cols="50"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-difficulty" class="control-label col-xs-12 col-sm-2"><?php echo __('Difficulty'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-difficulty" class="form-control" step="0.1" name="row[difficulty]" type="number">
        </div>
    </div>
    <input type="hidden" name="row[category]" value="" />
    <div class="form-group">
        <label for="c-category" class="control-label col-xs-12 col-sm-2"><?php echo __('Category'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline" data-toggle="cxselect" data-selects="one,two,tree,four,five">
                <select class="one form-control" name="category[]" data-url="ajax/category?pid=0"></select>
                <select class="two form-control" name="category[]" data-url="ajax/category" data-query-name="pid"></select>
                <select class="tree form-control" name="category[]" data-url="ajax/category" data-query-name="pid"></select>
                <select class="four form-control" name="category[]" data-url="ajax/category" data-query-name="pid"></select>
                <select class="five form-control" name="category[]" data-url="ajax/category" data-query-name="pid"></select>
            </div>
        </div>
    </div>
    <?php if(is_array($imageList) || $imageList instanceof \think\Collection || $imageList instanceof \think\Paginator): if( count($imageList)==0 ) : echo "" ;else: foreach($imageList as $key=>$vo): ?>
    <div class="form-group">
        <label for="c-images<?php echo $key; ?>" class="control-label col-xs-12 col-sm-2"><?php echo __($vo); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-images<?php echo $key; ?>" class="form-control" size="50" name="row[images][<?php echo $key; ?>]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-images<?php echo $key; ?>" class="btn btn-danger plupload" data-input-id="c-images<?php echo $key; ?>" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="true" data-preview-id="p-images<?php echo $key; ?>"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-images<?php echo $key; ?>" class="btn btn-primary fachoose" data-input-id="c-images<?php echo $key; ?>" data-mimetype="image/*" data-multiple="true"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-images<?php echo $key; ?>"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-images<?php echo $key; ?>"></ul>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>