<script>
  $(document).ready(function() {
    $('.select2').select2();
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    });

  })
</script>