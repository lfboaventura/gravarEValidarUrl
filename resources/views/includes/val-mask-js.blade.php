    {{-- Morris Charts JavaScript --}}
    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.mask.test.js') }}"></script> --}}
    <script type="text/javascript" charset="utf8">
        $(function() {
            $(".date").datetimepicker({locale : 'pt-BR', format: 'DD/MM/YYYY'});
        });
    </script>

    