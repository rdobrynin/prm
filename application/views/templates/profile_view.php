<div class="errors alert alert-danger alert-dismissible" role="alert"><?php echo validation_errors(); ?></div>
<?php include('navtop_view.php'); ?>
<?php include('sidebar_view.php'); ?>
<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <!--FORM-->
            <div class="col-md-8">
                <h2>Profile view</h2>
                <form role="form" class="form-horizontal" action="<?php print(base_url()); ?>update_profile" method="POST" autocomplete="on">
                    <div class="row">
                        <div class="address-wrapper" style="height: 100%;">
                            <p class="lead">Requirement information</p>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="first_name">First name</label>
                                    <input type="text" value="<?php print($user[0]['first_name']); ?>" class="form-control" name="first_name" id="first_name" placeholder="First name">
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" >Last name</label>
                                    <input type="text" value="<?php print($user[0]['last_name']); ?>" class="form-control" name="last_name" id="last_name" placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" value="<?php print($user[0]['phone']); ?>" class="form-control" name="phone" id="last_name" placeholder="Phone number">
                                </div>
                                <!--                additional phones-->
                                <div class="form-group">
                                    <div class="col-md-12" style="padding-left: 20px;">
                                        <?php foreach ($phones as $k => $phone): ?>
                                            <?php if (isset($phone['phone'])): ?>
                                                <span><input type="hidden" name="<?php print($phone['id']); ?>">
                        <span class="label label-default label-tag delete-add-phone" style="margin-left: 10px;"><span class="get_old_phone"><i class="fa fa-phone"></i>&nbsp;<?php print($phone['phone']); ?></span>
                            &nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i></span></span>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="delete_phone_data"></div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-12" style="margin-bottom: 10px;">
                                <div class="btn btn-xs btn-success" id="add_phone">Add Phone</div>
                            </div>
                                <div id="items_phone"></div>
                                <div id="items_remove_phone"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6" style="margin-bottom: 10px;">
                                    <p><span class="label label-primary">Primary email:</span>  <span><span class="lead">&nbsp;<?php print($user['0']['email']); ?></span></span></p>
                                    </div>
                                <!--additional emails-->
                                <div class="form-group">
                                    <div class="col-md-12" style="padding-left: 20px;">
                                        <?php foreach ($emails as $k => $email): ?>
                                            <?php if (isset($email['email'])): ?>
                                                <span><input type="hidden" name="<?php print($email['id']); ?>">
                        <span class="label label-default label-tag delete-add-email" style="margin-left: 10px;"><i class="fa fa-mail"></i>&nbsp;<span class="get_old_mail"><?php print($email['email']); ?></span>
                            &nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i></span></span>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="delete_email_data"></div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <div class="btn btn-xs btn-success" id="add_email">Add Email</div>
                                </div>
                                <div id="items_email"></div>
                                <div id="items_remove_email"></div>
                            </div>
                            <?php if ($user[0]['role'] != 1):; ?>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="last_name">Role</label>
                                        <select class="form-control" name="role">
                                            <?php foreach ($roles as $rk => $rv): ?>
                                                    <option value="<?php print($rk); ?>"><?php print($rv); ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="address-wrapper" style="height: 100%;">
                            <p class="lead">Additional information</p>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="skype_address">Skype</label>
                                    <input type="text" value="<?php print($user[0]['skype_address']); ?>" class="form-control" id="skype_address" name="skype_address" placeholder="Skype address">

                            </div>
                                <div class="col-md-6">
                                    <label for="facebook_address">Facebook</label>
                                    <input type="text" value="<?php print($user[0]['facebook_address']); ?>" class="form-control" id="facebook_address" name="facebook_address" placeholder="Facebook address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="linkedin_address">Linkedin</label>
                                    <input type="text" value="<?php print($user[0]['linkedin_address']); ?>" class="form-control" id="linkedin_address" name="linkedin_address" placeholder="Linkedin address">
                                </div>
                            </div>
                        </div>
                        <span class="pull-left"><a href="javascript:history.back()" class="btn btn-primary">Back</a></span>
                        <input type="hidden" value="<?php print(time()); ?>" name="date_edited">
                        <button type="submit" id="profile-update-btn" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h2>Profile Picture</h2>

                <div class="address-wrapper" style="height: 100%;">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="" id="upload_file">
                                <label for="userfile">Upload</label>
                                <input type="file" name="userfile" id="userfile" size="20"/>
                                <input type="hidden" value="<?php print($user[0]['id']); ?>" name="user_id" id="user_id">
                                <br/>
                                <input type="submit" class="btn btn-info" name="submit" id="submit"/>
                            </form>
                            <?php if ($avatar != FALSE): ?>
                                <div id="avatar-true">
                                <span class="avatar-wrapper pull-right"><img src="<?php print base_url().'uploads/avatar/'.($avatar); ?>" alt="Smiley face" height="100"></span>
                                </div>

                                <div id="avatar-true-ajax">
                                    <span id="ajax-temp" class="avatar-wrapper pull-right"></span>
                                </div>
                            <?php endif ?>
                            <div id="files"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer_view.php'); ?>
<script>
    $(function () {
        $("body").on("click", ".delete-add-phone", function (e) {
            $(this).parent("span").remove();
        });
        $("body").on("click", ".delete-add-email", function (e) {
            $(this).parent("span").remove();
        });
        if (window.location.hash == "#updated") {
            $('.show-info').show();
            $('.show-info').delay(2500).fadeOut();
        }
//        Add phone
        $("#add_phone").click(function (e) {
            $("#items_phone").append('<div class="col-md-12"><div class="form-group"><div class="col-md-3"><input type="text" placeholder="Additional phone number" style="margin-bottom:8px; margin-top: 2px;" class="form-control col-md-10" name="add_phone[]"></div><button  class="btn btn-danger btn-xs delete-phone">Delete</button></div></div></div><div>');
        });
        $("body").on("click", ".delete-phone", function (e) {
            $(this).parent("div").remove();
        });
//        Delete phone
        $('.delete-add-phone').click(function () {
            phone_for_delete = $.trim($(this).children().text());
            $(".delete_phone_data").append('<span><input type="hidden" name="del_phone[]" value="'+phone_for_delete+'"></span>');
        });
//        Add email
        $("#add_email").click(function (e) {
            $("#items_email").append('<div class="col-md-12"><div class="form-group"><div class="col-md-3"><input type="email" placeholder="Additional email address" style="margin-bottom:8px; margin-top: 2px;" class="form-control col-md-10" name="add_email[]"></div><button  class="btn btn-danger btn-xs delete-email">Delete</button></div></div></div><div>');
        });
//        Delete email
        $('.delete-add-email').click(function () {
            email_for_delete =$(this).children().text();
            $(".delete_email_data").append('<span><input type="hidden" name="del_email[]" value="'+email_for_delete+'"></span>');
        });

        res = $('.errors').text();
        if (res.length > 0) {
            $('.errors').show();
        }
        else {
            $('.errors').hide();
        }
        $('.errors').click(function () {
            $(this).slideToggle("fast");
        });
        $('body').click(function () {
            $('.errors').slideUp("fast");
        });

    });
</script>
