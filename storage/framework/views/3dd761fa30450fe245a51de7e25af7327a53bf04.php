<?php if(Session::has('dcat-admin-toastr')): ?>
    <?php
        $toastr  = Session::get('dcat-admin-toastr');
        $type    = $toastr->get('type')[0] ?? 'success';
        $message = $toastr->get('message')[0] ?? '';
        $options = admin_javascript_json($toastr->get('options', []));
    ?>
    <script>$(function () { toastr.<?php echo e($type, false); ?>('<?php echo $message; ?>', null, <?php echo $options; ?>); })</script>
<?php endif; ?><?php /**PATH D:\waibao\veno-admin\vendor\dcat\laravel-admin\src/../resources/views/partials/toastr.blade.php ENDPATH**/ ?>