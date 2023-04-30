<link href="datepicker/css/bootstrap.min.css" rel="stylesheet" />
<link href="datepicker/css/datepicker.css" rel="stylesheet" />
<script src="datepicker/js/jquery.min.js"></script>
<script src="datepicker/js/bootstrap.min.js"></script>
<script src="datepicker/js/bootstrap-datepicker.js"></script>
 <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>