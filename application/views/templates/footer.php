<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-switch.min.js"></script>
<script src="js/jquery.bootstrap.wizard.min.js"></script>
<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>

<!-- Custom JavaScript for the Menu Toggle -->
<script>
  //    $("#menu-toggle").click(function(e) {
  //        e.preventDefault();
  //        $("#wrapper").toggleClass("active");
  //    });

  $(function () {
    $('.help-button').click(function () {
      $('.help-block').toggleClass('help-block-open');
      $('.help-content').toggleClass('help-content-open');
      $('.help-button').toggleClass('help-block-open-btn');
    });

  });




</script>
</body>

</html>
