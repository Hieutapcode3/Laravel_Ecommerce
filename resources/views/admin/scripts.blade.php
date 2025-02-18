<script>
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
          title: "Are you Sure to Delete?",
          text: "This action cannot be undone.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if(willDelete){
            window.location.href = urlToRedirect;
          }
        });
      }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../admincss/vendor/jquery/jquery.min.js"></script>
    <script src="../admincss/vendor/popper.js/umd/popper.min.js"></script>
    <script src="../admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../admincss/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="../admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../admincss/js/charts-home.js"></script>
    <script src="../admincss/js/front.js"></script>