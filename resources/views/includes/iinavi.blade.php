{{-- Modal login enavi  --}}
<div id="infor-iinavi" class="modal fade" role="dialog" data-url="{{ route('iinavi.remove.session') }}">
    <div class="modal-dialog custom-dialog">

        <!-- Modal content-->
        <div class="modal-content custom-content">
            <div class="modal-body custom-body">
                <button type="button" data-dismiss="modal"><i class="close"></i></button>
            </div>
        </div>

    </div>
</div>
{{-- End modal login enavi  --}}

@if(Session::has('userIinavi') && ($iinavi = Session::get('userIinavi')))
<?php
$urlIinavi = $iinavi['url'];
if ($urlIinavi != '') {
    ?>
    <script>
        var url = "<?php echo $urlIinavi; ?>";
        $(window).load(function () {
            $("#infor-iinavi").on('shown.bs.modal', function () {
                var button = $('<div class="custom-close pull-right"><button type="button" data-dismiss="modal"><i class="close"></i></button></div>');
                $("#infor-iinavi .modal-body").load(url, function (responseTxt, statusTxt, xhr) {
                    $(".modal .modal-body").prepend(button);
                });
            }).modal('show');
        });

    </script>
    <script src="/iinavi/js/iinavi.js"></script>
<?php } ?>
@endif