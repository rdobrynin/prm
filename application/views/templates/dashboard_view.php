<!-- Page content -->
    <div id="page-content-wrapper">
        <div class="page-content inset">
            <div class="row">
                <div class="col-md-8">
                    <a href="" data-toggle="modal" data-target="#invite" title="invite">
                        <button class="btn btn-primary btn-xs"> Invite person</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Activity Stream</h3>
                            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-minus"></i></span>
                        </div>
                        <div class="panel-body">





                        </div>
                    </div>
                </div>

            </div> <!-- ./row-->
            </div>
        </div>
<!-- Modal -->
<div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"><small>Contact person invitaion</small></h4>
            </div>
            <div class="modal-body">
                <?php $attributes = array('class' => 'form-signin', 'id' => 'invite-form', 'autocomplete'=>'on'); ?>
                <?php  echo form_open('#', $attributes);?>
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
</div>



