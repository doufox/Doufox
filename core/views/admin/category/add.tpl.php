<?php include $this->admin_tpl('header');?>
<script type="text/javascript">
    window.top.document.getElementById('position').innerHTML = '添加栏目';
</script>
<div class="subnav">
    <div class="content-menu">
        <a href="<?php echo url('admin/category'); ?>"  class="on">全部栏目</a>
        <a href="<?php echo url('admin/category/add'); ?>"  class="add">添加栏目</a>
        <a href="<?php echo url('admin/category/cache'); ?>" class="options">更新缓存</a>
    </div>
    <div class="table_form">
        <form method="post" action="" id="myform" name="myform">
            <input type="hidden" value="<?php echo $catid; ?>" name="catid">
            <input type="hidden" value="<?php echo $data['typeid']; ?>" name="typeid">
            <div class="col-tab">
                <ul class="tabBut cu-li">
                    <li onClick="SwapTab('setting','on','',2,1);" class="on" id="tab_setting_1">栏目设置</li>
                    <li onClick="SwapTab('setting','on','',2,2);" id="tab_setting_2" class="">其他设置</li>
                </ul>
                <div class="contentList pad-10" id="div_setting_1" style="display: block;">
                <table width="100%" class="table_form">
                    <?php if ($add) { ?>
                    <tbody>
                        <tr>
                            <th width="100">批量添加：</th>
                            <td>
                                <label><input type="radio" value="0" name="addall" onclick='$("#addall").hide();$("#_addall").show();' checked>否</label>&nbsp;
                                <label><input type="radio" value="1" name="addall" onclick='$("#addall").show();$("#_addall").hide();'>是</label>
                            </td>
                        </tr>
                    </tbody>
                    <tbody id='addall' style="display:none">
                        <tr>
                            <th><font color="red">*</font>栏目列表：</th>
                            <td>
                                <textarea style="width:200px;height:110px" name="names"></textarea>
                                <div class="show-tips">格式：栏目名称|栏目目录 一行一个 如： 新闻|news</div>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                    <tbody id='_addall'>
                        <tr>
                            <th width="100"><font color="red">*</font>栏目名称：</th>
                            <td><input type="text" class="input-text" size="30" value="<?php echo $data['catname']; ?>" name="data[catname]" id="dir" onBlur="ajaxdir()"></td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font>栏目目录：</th>
                            <td><input type="text" class="input-text" size="30" value="<?php echo $data['catdir']; ?>" name="data[catdir]" id="dir_text"></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th width="100"><font color="red">*</font>上级栏目：</th>
                            <td>
                                <select id="parentid" name="data[parentid]">
                                <option value="0">作为顶级栏目</option>
                                    <?php echo $category_select; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th width="100"><font color="red">*</font>作为菜单显示：</th>
                            <td>
                                <label><input type="radio" <?php if (!isset($data['ismenu']) || $data['ismenu']==1) { ?>checked<?php } ?> value="1" name="data[ismenu]">显示</label>&nbsp;
                                <label><input type="radio" <?php if (isset($data['ismenu']) && $data['ismenu']==0) { ?>checked<?php } ?> value="0" name="data[ismenu]">隐藏</label>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font>栏目类型：</th>
                            <td>
                            <label><input type="radio" value="1" name="data[typeid]" <?php if ($data[typeid]==1) { ?>checked<?php } ?> onClick="settype(1)" <?php if ($catid && !$add) { ?>disabled<?php } ?>>内部栏目</label>&nbsp;
                            <label><input type="radio" value="2" name="data[typeid]" <?php if ($data[typeid]==2) { ?>checked<?php } ?> onClick="settype(2)" <?php if ($catid && !$add) { ?>disabled<?php } ?>>单网页</label>&nbsp;
                            <label><input type="radio" value="3" name="data[typeid]" <?php if ($data[typeid]==3) { ?>checked<?php } ?> onClick="settype(3)" <?php if ($catid && !$add) { ?>disabled<?php } ?>>外部链接</label>&nbsp;
                            </td>
                        </tr>
                        <tr class="type_3" style="display:none;">
                            <th><font color="red">*</font>链接地址：</th>
                            <td><input type="text" class="input-text" size="50" value="<?php echo $data['http']; ?>" name="data[http]"></td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%" class="type_1 table_form"  style="display:none;">
                <tbody>
                <tr>
                    <th width="100"><font color="red">*</font>内容模型：</th>
                    <td>
                    <select onChange="change_tpl(this.value)" id="modelid" name="data[modelid]" <?php if ($catid && !$add) { ?>disabled<?php } ?>>
                        <option value="">选择内容模型</option>
                        <?php if (is_array($model)) { foreach ($model as $t) { ?>
                        <option value="<?php echo $t['modelid']; ?>" <?php if ($t['modelid']==$data['modelid']) { ?>selected<?php } ?>><?php echo $t['modelname']; ?></option>
                        <?php } } ?>
                    </select>
                    <div class="show-tips">只有内部栏目才能选择内容模型</div>
                    </td>
                </tr>

                <tr>
                    <th>栏目展示模板：</th>
                    <td id="category_template">
                        <input type="text" class="input-text" size="30" value="<?php echo $data['categorytpl']; ?>" name="data[categorytpl]" id="categorytpl">
                        <div class="show-tips">当有下级栏目时有效</div>
                    </td>
                </tr>
                <tr>
                    <th>内容列表模板：</th>
                    <td id="list_template">
                    <input type="text" class="input-text" size="30" value="<?php echo $data['listtpl']; ?>" name="data[listtpl]" id="listtpl"> 列表显示数量：<input type="text" class="input-text" size="5" value="<?php echo $data['pagesize']; ?>" name="data[pagesize]">
                    </td>
                </tr>
                <tr>
                    <th>内容展示模板：</th>
                    <td id="list_template">
                        <input type="text" class="input-text" size="30" value="<?php echo $data['showtpl']; ?>" name="data[showtpl]" id="showtpl">
                    </td>
                </tr>
                <tr>
                    <th>搜索展示模板：</th>
                    <td>
                        <input type="text" class="input-text" size="30" value="<?php echo $data['searchtpl']; ?>" name="data[searchtpl]" id="searchtpl">
                    </td>
                </tr>
                </tbody>
                </table>

                <table width="100%" class="type_2 table_form"  style="display:none;">
                <tbody>
                <tr>
                    <th width="100">单页模板：</th>
                    <td id="show_template">
                        <input type="text" class="input-text" size="30" value="<?php echo $data['pagetpl']; ?>" name="data[pagetpl]" id="pagetpl">
                    </td>
                </tr>

                <tr>
                    <th><font color="red">*</font>单页面内容：</th>
                    <td>
                    <?php echo content_editor('content', array(0=>$data['content']), array('system'=>1)); ?>
                    </td>
                </tr>
                </tbody>
                </table>
                </div>
                <div class="contentList pad-10 hidden" id="div_setting_2" style="display: none;">
                <table width="100%" class="table_form">
                <tr>
                    <th width="100">查看权限：</th>
                    <td>
                        <label><input name="data[islook]" type="radio" value="0"<?php if ($data['islook']==0) { ?> checked<?php } ?> >任何人可查看</label>&nbsp;
                        <label><input name="data[islook]" type="radio" value="1"<?php if ($data['islook']==1) { ?> checked<?php } ?> >会员可查看</label>&nbsp;
                    </td>
                </tr>
                <tr>
                    <th>投稿权限：</th>
                    <td>
                        <label><input name="data[ispost]" type="radio" value="0"<?php if ($data['ispost']==0) { ?> checked<?php } ?> >禁止投稿</label>&nbsp;
                        <label><input name="data[ispost]" type="radio" value="1"<?php if ($data['ispost']==1) { ?> checked<?php } ?> >会员、游客可投稿</label>&nbsp;
                        <label><input name="data[ispost]" type="radio" value="2"<?php if ($data['ispost']==2) { ?> checked<?php } ?> >会员可投稿</label>&nbsp;
                    </td>
                </tr>
                <tr>
                    <th>投稿审核：</th>
                    <td>
                        <label><input name="data[verify]" type="radio" value="0"<?php if ($data['verify']==0 || !$data['verify']) { ?> checked<?php } ?> >需要审核</label>&nbsp;
                        <label><input name="data[verify]" type="radio" value="1"<?php if ($data['verify']==1) { ?> checked<?php } ?> >无需审核</label>&nbsp;
                    </td>
                </tr>
                <tr>
                    <th>栏目图片：</th>
                    <td><span style="position: relative;"><input type="text" class="input-text" size="30" value="<?php echo $data['image']; ?>" name="data[image]" id="image" onmouseover="admin_command.preview2('image')" onmouseout="admin_command.preview('image')">
                    <input type="button" class="button" onClick="admin_command.uploadImage('image')" value="上传图片"><div id="imgPreviewimage"></span></div>
                    </td>
                </tr>
                <tr>
                    <th >SEO标题：</th>
                    <td><input type="text" maxlength="60" size="60" value="<?php echo $data['seo_title']; ?>"   name="data[seo_title]" class="input-text"></td>
                </tr>
                <tr>
                    <th>关键字：</th>
                    <td><input type="text" maxlength="60" size="60" value="<?php echo $data['seo_keywords']; ?>"  name="data[seo_keywords]" class="input-text"></td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td><textarea style="width:90%;height:50px" name="data[seo_description]"><?php echo $data['seo_description']; ?></textarea></td>
                </tr>
                </table>
                </div>
                <div class="bk15"></div>
                <input type="submit" class="button" value="提交" name="submit">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function ajaxdir() {
        var dir = $('#dir_text').val();
        if (dir == '') {
            $.post("<?php echo url('api/index/pinyin', array('id' => rand())); ?>", { name:$("#dir").val() }, function(data){ $("#dir_text").val(data); });
        }
    }
    function SwapTab(name,cls_show,cls_hide,cnt,cur){
        for(i=1;i<=cnt;i++){
            if(i==cur){
                $('#div_'+name+'_'+i).show();
                $('#tab_'+name+'_'+i).attr('class',cls_show);
            }else{
                $('#div_'+name+'_'+i).hide();
                $('#tab_'+name+'_'+i).attr('class',cls_hide);
            }
        }
    }
    var data = <?php echo $json_model; ?>;
    function settype(id) {
        $(".type_1").hide();
        $(".type_2").hide();
        $(".type_3").hide();
        $(".type_"+id).show();
        if (id ==2) {
            var page = $("#pagetpl").val();
            if (page) {}
            else {
                $("#pagetpl").val("page.html")
            }
        }
    }
    function change_tpl(mid) {
        $("#categorytpl").val(data[mid]['categorytpl']);
        $("#listtpl").val(data[mid]['listtpl']);
        $("#showtpl").val(data[mid]['showtpl']);
        $("#searchtpl").val(data[mid]['searchtpl']);
    }
    settype(<?php echo $data[typeid]; ?>);
</script>
</body>
</html>