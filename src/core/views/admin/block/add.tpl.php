<?php include $this->views('admin/header'); ?>
<?php include $this->views('admin/navbar'); ?>
<?php include $this->views('admin/common/msg');?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-2 page_menu">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">区块管理</span>
                </div>
                <div class="list-group">
                    <a class="list-group-item" href="<?php echo url('admin/block'); ?>">全部区块</a>
                    <a class="list-group-item" href="<?php echo url('admin/block/add'); ?>">添加区块</a>
                    <a class="list-group-item" href="<?php echo url('admin/block/cache'); ?>">更新缓存</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-10 page_content">
            <form action="" method="post" class="form-inline">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="panel-title"><?php echo $id ? '编辑' : '添加'; ?>区块</span>
                        <div class="pull-right">
                            <a class="btn btn-default btn-xs" href="<?php echo url('admin/block'); ?>">列表</a>
                            <a class="btn btn-default btn-xs" href="<?php echo url('admin/block/add'); ?>">添加</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <input name="id" type="hidden" value="<?php echo $data['id']; ?>">
                        <table width="100%" class="table_form">
                            <tr>
                                <th width="80">区块标识：</th>
                                <td>
                                    <input class="form-control" type="text" name="data[name]" value="<?php echo $data['name']; ?>" size="40" />
                                    <p class="show-tips">标识支持字母和数字（a-zA-Z0-9_-），必须字母开头</p>
                                </td>
                            </tr>
                            <tr>
                                <th width="80">编辑方式：</th>
                                <td>
                                    <select id="type" class="form-control" name="data[type]" onChange="select_type(this.value)">
                                        <option value="0"> ... 请选择方式</option>
                                        <?php if (is_array($type)) {
                                            foreach ($type as $i => $v) { ?>
                                                <option value="<?php echo $i; ?>" <?php if ($data['type'] == $i) { ?>selected<?php } ?>><?php echo $v; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th width="80">备注：</th>
                                <td><input class="form-control" type="text" name="data[remark]" value="<?php echo $data['remark']; ?>" size="40" /></td>
                            </tr>
                            <tr id="text_1" style="display:none">
                                <th>区块内容：</th>
                                <td>
                                    <textarea class="form-control" name="data[content_1]" id="data[content]" cols="60" rows="8"><?php echo $data['content']; ?></textarea>
                                    <p class="show-tips">区块内容支持HTML标签</p>
                                </td>
                            </tr>
                            <tr id="text_2" style="display:none">
                                <th>区块图片：</th>
                                <td>
                                    <div id="imgPreviewthumb"></div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" size="50" value="<?php echo $data[content]; ?>" name="data[content_2]" id="thumb" onmouseover="admin_command.preview_img('thumb')">
                                        <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default" onClick="showImageUpload('thumb')">本地上传</button>
                                                    <button type="button" class="btn btn-default" onClick="showImageUpload('thumb', 'gallery')">选择图库</button>
                                        </span>
                                    </div>
                                    <p class="show-tips">可直接输入图片地址</p>
                                </td>
                            </tr>
                            <tr id="text_3" style="display:none;">
                                <th>区块内容：</th>
                                <td>
                                    <?php echo content_editor('content_3', array(0 => $data['content']), array('system' => 1)); ?>
                                </td>
                            </tr>
                        </table>
                        <hr />
                        <button type="submit" name="submit" class="btn btn-default">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function select_type(id) {
        $("#text_1").hide();
        $("#text_2").hide();
        $("#text_3").hide();
        $("#text_" + id).show();
    }
    <?php if ($data['type']) { ?>
        $("#text_<?php echo $data['type']; ?>").show();
    <?php } ?>
</script>

<?php include $this->views('admin/footer'); ?>