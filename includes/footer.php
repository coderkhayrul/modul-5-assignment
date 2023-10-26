

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if(isset($_SESSION['notification'])){
      echo "
      Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
      }).fire({
        icon: '$_SESSION[notification_type]',
        title: '$_SESSION[notification]'
      })
      ";
      unset($_SESSION['notification' ] , $_SESSION['notification_type']);
    } ?>
</script>

</body>

</html>