<!-- Modal -->
<div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                    <small>Contact person invitaion</small>
                </h4>
            </div>
            <div class="modal-body">
                <?php $attributes = array('class' => 'form-signin', 'id' => 'invite-form', 'autocomplete' => 'on'); ?>
                <?php echo form_open('#', $attributes); ?>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name_invite" class="form-control btn-special input-sm" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name_invite" class="form-control btn-special input-sm" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="email" name="email" id="email_invite" class="form-control btn-special input-sm" placeholder="Email Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <select class="form-control selectpicker" name="category">
                                <?php foreach ($roles as $rk => $rv): ?>
                                    <option value="<?php print($rv['rid']); ?>"><?php print(ucfirst($rv['title'])); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="invite-ajax-btn">Invite</button>
                <!--                                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>-->
            </div>
        </div>
    </div>
</div> <!-- #/myModal -->
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
<!--<div class="bench">test: --><?php //echo $this->benchmark->elapsed_time();?><!--&nbsp;sec</div>-->
<div class="time-wrapper">
    <div class="timer">
        <i class="fa fa-clock-o pull-left" id="clock-bottom"></i>&nbsp;
        <span id="task-timer">00:00</span>
        <button class="btn btn-default btn-md" id="play-timer" style="padding: 3px 12px; float: left;">Play</button>
        <span id="task-timer-pause"><a href="#"><i class="fa fa-pause"></i></a></span>
        <span id="task-timer-stop"><a href="#"><i class="fa fa-stop"></i></a></span>

    </div>
</div>
<!-- JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-switch.min.js"></script>
<script src="js/jquery.bootstrap.wizard.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/ajaxfileupload.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<?php include('timer.php');?>
<!-- Custom JavaScript for the Menu Toggle -->
<script>
        $('.selectpicker').selectpicker({
            style: 'btn-special',
            size: 14
        });
  $(function () {

/**
 * INVITATION AJAX
 *
 **/
      $( "#invite-ajax-btn" ).click(function() {
          var form_data = {
              first_name: $('#first_name_invite').val()
          };
          $.ajax({
              url: "<?php echo site_url('ajax/invitation'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  if(msg.result==true) {
                     console.log('ok');
                  }
                  else {
                      console.log('not ok');
                  }
              }
          });
      });

      $('#upload_file').submit(function() {
          $.ajaxFileUpload({
              url             :"<?php print(base_url());?>ajax/do_upload",
              secureuri       :false,
              fileElementId   :'userfile',
              dataType        : 'json',
              data            : {
                  'user_id'             : $('#user_id').val()
              },
              success : function (data, status)
              {
                  if(data.status != 'error') {
//                      $('#files').html('<p class="lead">Avatar successfully uploaded...</p>');
                      $('#avatar-true').hide();
                      $('#avatar-true-ajax').show();
                      $('.avatar-img').hide();
                      $('.avatar-img-ajax').show();
                      $('.avatar-img-ajax').html("<a href='<?php print base_url(); ?>profile'><img src='<?php print base_url(); ?>uploads/avatar/"+data.new_avatar+"' alt='Smiley face' height='45'></a>");
                      $('#ajax-temp').html("<img src='<?php print base_url(); ?>"+'uploads/avatar/'+data.new_avatar+"' alt='Smiley face' height='100'>");
                  }
                  $('#files').show();
                  $('#files').empty();
                  $('#files').html('<p class="lead">'+data.msg+'</p>');
                  $('#files').delay(1500).fadeOut();
//                  $('.show-info').show();
//                  $('.show-info').children( ".show-info-content").html(data.msg);
//                  $('.show-info').delay(2500).fadeOut();
              }
          });
          return false;
      });

    $(".help-button").click((function() {
      var i = 0;
      return function() {
        $('.help-block').animate({
          height: (++i % 2) ? 490 :10,
            background:'rgb(255, 144, 11)',opacity:0.9
        }, 200);
          $('.help-content').slideToggle('fast');
      }
    })());

      /**
       * AJAX online/offline status
       */

      setInterval(function() {
        current_time = $.now();
        $.ajax({
          url: "<?php echo site_url('ajax/check_online'); ?>",
          type: 'GET',
          dataType: 'json',
          success: function (msg) {
            msg.status.forEach(function(entry) {
              var name = entry['first_name'] + ' ' + entry['last_name'];
              var id = entry['id'];
              var time = entry['status_time'];
              var status = entry['status'];
              if(current_time <(entry['status_time']+100)) {
//           ONLINE
                if(entry['status']=='1') {
//                  var audio = $('<audio />', {
//                    autoPlay : 'autoplay',
//                    controls : 'controls'
//                  });
//                  addSource(audio, 'sound/online.ogg');
//                  addSource(audio, 'sound/online.mp3');
//                    audio.appendTo('.note-sound');
//                  function addSource(elem, path) {
//                    $('<source />').attr('src', path).appendTo(elem);
//                  }
            $('.show-info-online').show();
            $('.show-info-online').children( ".show-info-content-online").html('<span class="label label-xs label-success label-round"></span>'+name+' is online');
            $('.show-info-online').delay(2500).fadeOut();
                }
                else if(entry['status']=='0') {
//                  var audio = $('<audio />', {
//                    autoPlay : 'autoplay',
//                    controls : 'controls'
//                  });
//                  addSource(audio, 'sound/online.ogg');
//                  addSource(audio, 'sound/online.mp3');
//                  audio.appendTo('.note-sound');
//                  function addSource(elem, path) {
//                    $('<source />').attr('src', path).appendTo(elem);
//                  }
                  $('.show-info-online').show();
                  $('.show-info-online').children( ".show-info-content-online").html('<span class="label label-xs label-primary label-round"></span>'+name+' is offline');
                  $('.show-info-online').delay(2500).fadeOut();
                }
              }
            });
          }
        });
      }, 5900);

//      dashboard

  });
</script>

</body>

</html>
