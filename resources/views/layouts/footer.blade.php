

</div>
<!-- End Page Content  -->
</div>


<!-- End Wrapper -->

<!-- JS Scripts -->

<!-- jQuery CDN - Slim version (=without AJAX) -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}

<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

{{--bootstrap JS--}}
{{--<script src="{{ asset('js/admin.js') }}" ></script>--}}

{{--<!-- Bootstrap JS -->--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- jQuery For Scroller Bar -->
<script src="/assets/js/sidebar.js"></script>
<!-- jQuery For User Dropdown -->
<script src="/assets/js/dropdown.js"></script>

<!-- datatable  -->
{{--<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

{{--<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/filtering/row-based/range_dates.js"></script>--}}


<script>
    // $(document).ready( function () {
    //
    //
    //     $('#report').DataTable({
    //         dom: 'lBftip',
    //         buttons: [
    //             'print', 'csv', 'pdf'
    //         ]
    //     });
    //
    // } );

    $('#report').DataTable({
        dom: 'lBftip',
        buttons: [
            'print', 'csv', 'pdf'
        ]
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.1/dist/sweetalert2.all.min.js"></script>
<script !src="">
    $(document).ready(function() {
        $('.select2_op').select2();
    });
</script>

{{--<script>--}}
{{--    $('#flash-overlay-modal').modal();--}}
{{--</script>--}}
<script>
    // $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@yield('scripts')
</body>

</html>
