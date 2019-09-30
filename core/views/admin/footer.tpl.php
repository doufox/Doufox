<footer class="footer navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div class="navbar-inner navbar-content-center" style="padding-top:15px;">
            <ul class="navbar-left list-inline text-center text-muted credit">
                <li>
                    <span class="co">&copy; CopyRight <?php echo date('Y'); ?> <?php echo ucfirst(APP_NAME); ?> All Rights Reserved.</span>
                </li>
            </ul>
            <div class="legal text-right list-inline">
                <span class="co">Powered by <a href="https://crogram.com" target="_blank">Crogram</a></span>
            </div>
        </div>
    </div>
</footer>

<!-- 确认提示 -->
<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modal-confirm" style="display: none;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="关闭"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-confirm-title">系统提示</h4>
            </div>
            <div class="modal-body" id="modal-confirm-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <a href="#" type="button" id="modal-confirm-url" class="btn btn-primary">确定</a>
            </div>
        </div>
    </div>
</div>

<!-- 提示 -->
<div class="modal fade" id="modal-alert" tabindex="-1" role="dialog" aria-labelledby="modal-alert" style="display: none;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="关闭"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-alert-title">系统提示</h4>
            </div>
            <div class="modal-body" id="modal-alert-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#modal-alert').on('hide.bs.modal', function() {
        document.getElementById('modal-alert-title').innerText = '系统提示';
        document.getElementById('modal-alert-body').innerText = '';
    })
    $('#modal-confirm').on('hide.bs.modal', function() {
        document.getElementById('modal-confirm-url').href = '';
        document.getElementById('modal-confirm-title').innerText = '系统提示';
        document.getElementById('modal-confirm-body').innerText = '';
    })
    $("#btn-logout").click(function () {
        document.getElementById('modal-confirm-url').href = "<?php echo url('admin/login/logout'); ?>";
        document.getElementById('modal-confirm-body').innerText = '确定退出登录吗？';
    })
</script>

</body>

</html>