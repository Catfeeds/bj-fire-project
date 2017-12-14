<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/questions/edit.html";i:1513060796;s:84:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/layout/default.html";i:1510887721;s:81:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/common/meta.html";i:1510887721;s:83:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/common/script.html";i:1510887721;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('Type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[type]">
                <?php if(is_array($typeList) || $typeList instanceof \think\Collection || $typeList instanceof \think\Paginator): if( count($typeList)==0 ) : echo "" ;else: foreach($typeList as $key=>$vo): ?>
                <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['type'])?$row['type']:explode(',',$row['type']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="c-title" class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-title" data-rule="required" class="form-control " rows="3" name="row[title]" cols="50"><?php echo $row['title']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-options" class="control-label col-xs-12 col-sm-2"><?php echo __('Options'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            A:<input id="c-options" type="text" name="row[options][A]" value="<?php echo $row['options']['A']; ?>" class="form-control"/>
            B:<input id="c-options" type="text" name="row[options][B]" value="<?php echo $row['options']['B']; ?>" class="form-control"/>
            C:<input id="c-options" type="text" name="row[options][C]" value="<?php echo $row['options']['C']; ?>" class="form-control"/>
            D:<input id="c-options" type="text" name="row[options][D]" value="<?php echo $row['options']['D']; ?>" class="form-control"/>
            E:<input id="c-options" type="text" name="row[options][E]" value="<?php echo $row['options']['E']; ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('Answer'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[answer]" type="text" value="<?php echo $row['answer']; ?>" data-tip="例：单选:A 多选:A,B,C  判断:1正确,2错误">
        </div>
    </div>
    <div class="form-group">
        <label for="c-analysis" class="control-label col-xs-12 col-sm-2"><?php echo __('Analysis'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-analysis" data-rule="required" class="form-control" name="row[analysis]" type="text" value="<?php echo $row['analysis']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-difficulty" class="control-label col-xs-12 col-sm-2"><?php echo __('Difficulty'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-difficulty" class="form-control" step="0.1" name="row[difficulty]" type="number" value="<?php echo $row['difficulty']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="c-category" class="control-label col-xs-12 col-sm-2"><?php echo __('Category'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline" data-toggle="cxselect" data-selects="one,two,tree,four,five">
                <select class="one form-control" name="row[category][0]" data-url="ajax/category?pid=0">
                    <option value="<?php echo $row['category']['0']; ?>" selected=""></option>
                </select>
                <select class="two form-control" name="row[category][1]" data-url="ajax/category" data-query-name="pid">
                    <option value="<?php echo $row['category']['1']; ?>" selected=""></option>
                </select>
                <select class="tree form-control" name="row[category][2]" data-url="ajax/category" data-query-name="pid">
                    <option value="<?php echo $row['category']['2']; ?>" selected=""></option>
                </select>
                <select class="four form-control" name="row[category][3]" data-url="ajax/category" data-query-name="pid">
                    <option value="<?php echo $row['category']['3']; ?>" selected=""></option>
                </select>
                <select class="five form-control" name="row[category][4]" data-url="ajax/category" data-query-name="pid">
                    <option value="<?php echo $row['category']['4']; ?>" selected=""></option>
                </select>
            </div>
        </div>
    </div>

    <?php if(is_array($row['images']) || $row['images'] instanceof \think\Collection || $row['images'] instanceof \think\Paginator): if( count($row['images'])==0 ) : echo "" ;else: foreach($row['images'] as $key=>$vo): ?>
    <div class="form-group">
        <label for="c-images<?php echo $key; ?>" class="control-label col-xs-12 col-sm-2"><?php echo __($key); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-images<?php echo $key; ?>" class="form-control" size="50" name="row[images][<?php echo $key; ?>]" type="text" value="<?php echo $vo; ?>">
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