<!-- Calander script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<script>
  $(document).ready(function () {
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd', // Specify the format you want to store in the database
      autoclose: true,
    });
  });
</script>
<!-- End of the calander script -->
