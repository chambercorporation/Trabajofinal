<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
  session_start();
  session_destroy(); ?>
  &nbsp;
<script> swal.fire({title: 'Sesion cerrada correctamente correctamente',icon: 'error'});</script>
<?= header("Refresh:1; url=../home/index.php")?>