<?php include $this->admin_tpl('header');?>

<?php include $this->admin_tpl('navbar');?>

<div class="container">
    <div class="list-group page_menu">
        <a class="list-group-item" href="<?php echo url('admin/account'); ?>">全部账号</a>
        <a class="list-group-item" href="<?php echo url('admin/account/add'); ?>">添加账号</a>
        <a class="list-group-item active" href="<?php echo url('admin/account/me'); ?>">我的账号</a>
        <a class="list-group-item" href="<?php echo url('admin/account/cache'); ?>">更新缓存</a>
    </div>
    <div class="page_content">
        <form method="post" action="" class="form-inline">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $page_title; ?></div>
                <div class="panel-body">
                    <table width="100%" class="table_form">
                        <tr>
                            <th width="100">账号：</th>
                            <td><?php echo $data['username']; ?></td>
                        </tr>
                        <tr>
                            <th>姓名：</th>
                            <td>
                                <input type="text" class="form-control" name="data[realname]" value="<?php echo $data['realname']; ?>" size="30" />
                                <div class="show-tips">账号显示姓名</div>
                            </td>
                        </tr>
                        <tr>
                            <th>密码：</th>
                            <td>
                                <input type="text" class="form-control" name="data[password]" size="30" />
                                <span class="show-tips">如果不修改密码，请留空。</span>
                            </td>
                        </tr>
                        <tr>
                            <th>后台分页数：</th>
                            <td>
                            <div class="form-group">
                                <label class="sr-only">后台分页数：</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="data[list_size]" value="<?php echo $data['list_size']; ?>" size="3"/>
                                    <span class="input-group-addon">条</span>
                                </div>
                                <span class="show-tips">后台显示列表分页的数量 显示器大的多写点 </span>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <th>后台左栏宽度：</th>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="data[left_width]" value="<?php echo $data['left_width']; ?>" size="3">
                                    <span class="input-group-addon">px</span>
                                </div>
                                <span class="show-tips"> 后台左栏宽度,单位px 默认为150 (修改后重新打开后台生效)</span>
                            </td>
                        </tr>
                    </table>
                    <hr />
                    <button class="btn btn-default" type="submit" name="submit">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include $this->admin_tpl('footer');?>
