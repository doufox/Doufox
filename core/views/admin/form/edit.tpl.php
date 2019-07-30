<?php include $this->admin_tpl('header'); ?>
<?php include $this->admin_tpl('navbar'); ?>

<div class="container">
    <div class="list-group page_menu">
        <a class="list-group-item" href="<?php echo url('admin/form/list', array('modelid' => $modelid, 'cid' => $cid)); ?>">返回列表</a>
    </div>
    <div class="page_content">
        <form method="post" action="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">表单信息</span>
                    <div class="pull-right">
                        <a class="btn btn-default btn-xs" href="<?php echo url('admin/form/list', array('modelid' => $modelid, 'cid' => $cid)); ?>">返回列表</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table_form">
                        <tbody>
                            <tr>
                                <th width="150">表单名称：</th>
                                <td><?php echo $model['modelname']; ?></td>
                            </tr>
                            <?php if ($join) { ?>
                                <tr>
                                    <th>当前表单<?php echo $join_info; ?>:</th>
                                    <td><a href="<?php echo url('index/show', array('id' => $cid)); ?>" target="_blank"><?php echo $ciddata['title']; ?></a>
                                        <input type="hidden" value="<?php echo $cid; ?>" name="cid"></td>
                                </tr>
                            <?php }
                            echo $fields; ?>
                            <tr>
                                <th>状态：</th>
                                <td>
                                    <label><input type="radio" <?php if (!isset($data['status']) || $data['status'] == 1) { ?>checked<?php } ?> value="1" name="data[status]" onClick="$('#verify').hide()">已审核</label>
                                    <label><input type="radio" <?php if (isset($data['status']) && $data['status'] == 0) { ?>checked<?php } ?> value="0" name="data[status]" onClick="$('#verify').hide()">未审核</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr />
                    <a class="btn btn-default" href="<?php echo url('admin/form/list', array('modelid' => $modelid, 'cid' => $cid)); ?>">返回列表</a>
                    <button type="submit" class="btn btn-default" value="提交" name="submit" onClick="$('#load').show();">提交</button>
                    <span id="load" style="display:none"><img src="/static/img/loading.gif"></span>
                </div>
            </div>
        </form>
    </div>
</div>


<?php include $this->admin_tpl('footer'); ?>