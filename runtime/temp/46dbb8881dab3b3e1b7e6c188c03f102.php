<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/papers/rule/edit.html";i:1511595874;s:84:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/layout/default.html";i:1510887721;s:81:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/common/meta.html";i:1510887721;s:83:"/Users/wangcailin/Web/Work/Fire/public/../application/admin/view/common/script.html";i:1510887721;}*/ ?>
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
        <label for="c-name" class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-name" data-rule="required" class="form-control" name="row[name]" type="text" value="<?php echo $row['name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-time" class="control-label col-xs-12 col-sm-2"><?php echo __('Time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-time" data-rule="required" class="form-control" name="row[time]" value="<?php echo $row['time']; ?>" type="number" data-tip="单位：分钟">
        </div>
    </div>
    <div class="form-group">
        <label for="c-totalscore" class="control-label col-xs-12 col-sm-2"><?php echo __('Totalscore'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-totalscore" data-rule="required" class="form-control" name="row[totalscore]" type="number" value="<?php echo $row['totalscore']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-radio" class="control-label col-xs-12 col-sm-2"><?php echo __('Radio'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-radio" class="form-control" name="row[radio]" type="number" value="<?php echo $row['radio']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-radio_score" class="control-label col-xs-12 col-sm-2"><?php echo __('Radio_score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-radio_score" class="form-control" step="0.1" name="row[radio_score]" type="number" value="<?php echo $row['radio_score']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-checkbox" class="control-label col-xs-12 col-sm-2"><?php echo __('Checkbox'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-checkbox" class="form-control" name="row[checkbox]" type="number" value="<?php echo $row['checkbox']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-checkbox_score" class="control-label col-xs-12 col-sm-2"><?php echo __('Checkbox_score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-checkbox_score" class="form-control" step="0.1" name="row[checkbox_score]" type="number" value="<?php echo $row['checkbox_score']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-judge" class="control-label col-xs-12 col-sm-2"><?php echo __('Judge'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-judge" class="form-control" name="row[judge]" type="number" value="<?php echo $row['judge']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-judge_score" class="control-label col-xs-12 col-sm-2"><?php echo __('Judge_score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-judge_score" class="form-control" step="0.1" name="row[judge_score]" type="number" value="<?php echo $row['judge_score']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule1_end" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule1_end'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule1_end" data-rule="required" class="form-control" name="row[rule1_end]" type="number" value="<?php echo $row['rule1_end']; ?>" data-tip="单位：%百分比">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule1_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule1_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule1_name" data-rule="required" class="form-control" name="row[rule1_name]" type="text" value="<?php echo $row['rule1_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule2_start" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule2_start'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule2_start" data-rule="required" class="form-control" name="row[rule2_start]" type="number" value="<?php echo $row['rule2_start']; ?>" data-tip="单位：%百分比">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule2_end" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule2_end'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule2_end" data-rule="required" class="form-control" name="row[rule2_end]" type="number" value="<?php echo $row['rule2_end']; ?>" data-tip="单位：%百分比">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule2_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule2_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule2_name" data-rule="required" class="form-control" name="row[rule2_name]" type="text" value="<?php echo $row['rule2_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule3_start" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule3_start'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule3_start" data-rule="required" class="form-control" name="row[rule3_start]" type="number" value="<?php echo $row['rule3_start']; ?>" data-tip="单位：%百分比">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule3_end" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule3_end'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule3_end" data-rule="required" class="form-control" name="row[rule3_end]" type="number" value="<?php echo $row['rule3_end']; ?>" data-tip="单位：%百分比">
        </div>
    </div>
    <div class="form-group">
        <label for="c-rule3_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Rule3_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rule3_name" data-rule="required" class="form-control" name="row[rule3_name]" type="text" value="<?php echo $row['rule3_name']; ?>">
        </div>
    </div>
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