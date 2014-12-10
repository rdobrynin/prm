<!-- Page content -->
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-8">
                <h3 class="h_title">Current activity</h3>
                <div class="row">

                    <div class="col-md-6 col-vlg-3 col-sm-6">
                        <div class="tiles green m-b-10">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                                <div class="tiles-title text-black">Projects</div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Overall Projects</span> <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700"><?php if ($projects != false): ?><?php print(count($projects));?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Current Team</span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700">2</span>

                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title">Overall hours</span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700">143</span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="43%" style="width: 64.8%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description ">43% project <span class="blend">completed</span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-vlg-3 col-sm-6">
                        <div class="tiles blue m-b-10">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                                <div class="tiles-title text-black">Tasks</div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Overall Tasks</span> <span class="item-count animate-number semi-bold" data-value="15489" data-="" animation-duration="700"><?php if ($tasks != false): ?><?php print(count($tasks));?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Process Tasks</span> <span class="item-count animate-number semi-bold" data-value="551" data-animation-duration="700">1</span>
                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title">Overdue Tasks</span> <span class="item-count animate-number semi-bold" data-value="1450" data-animation-duration="700">1</span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="25%" style="width: 54%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description ">25% tasks <span class="blend">completed</span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="row-fluid" style="padding-top: 20px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="1%"></th>
                                <th width="9%">Task title</th>
                                <th width="22%">Description</th>
                                <th width="6%">Status</th>
                                <th width="10%">Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td >
                                    <div class="checkbox check-default">
                                        <input id="checkbox11" type="checkbox" value="1">
                                        <label for="checkbox11"></label>
                                    </div>
                                </td>
                                <td >Early Bird</td>
                                <td ><span class="muted">Redesign project template</span>
                                </td>
                                <td><span class="label label-success">progress</span>
                                </td>
                                <td >

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox12" type="checkbox" value="1">
                                        <label for="checkbox12"></label>
                                    </div>
                                </td>
                                <td>Angry Birds&nbsp;&nbsp;&nbsp;<span class="label label-important">ALERT!</span>
                                </td>
                                <td><span class="muted">Something goes here</span>
                                </td>
                                <td><span class="label label-danger">overdue</span>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox13" type="checkbox" value="1">
                                        <label for="checkbox13"></label>
                                    </div>
                                </td>
                                <td>PHP Login page</td>
                                <td ><span class="muted">A project in business and science is typically defined</span>
                                </td>
                                <td><span class="label label-primary">completed</span>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox14" type="checkbox" value="1">
                                        <label for="checkbox14"></label>
                                    </div>
                                </td>
                                <td>Zombies</td>
                                <td ><span class="muted">frequently involving research or design</span>
                                </td>
                                <td><span class="label label-warning">approve</span>
                                </td>
                                <td>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading clickable">
                        <h3 class="panel-title">Activity Stream</h3>
                        <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-minus"></i></span>
                    </div>
                    <div class="panel-body">

                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/bg_man@2x.jpg" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Roman D...</a>
                                &nbsp;<span class="label label-warning label-xs">approve</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation</a>
                                <div class="activity-item-description">

                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">30 min ago</span>&nbsp;
                                       <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/TaskEasy-Logo.png" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Jevgeni S...</a>&nbsp;<span class="label label-default label-xs">closed</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation  for implementation </a>
                                <div class="activity-item-description">

                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">2 hours ago</span>&nbsp;
                                        <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/bg_man@2x.jpg" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Roman D...</a>
                                &nbsp;<span class="label label-warning label-xs">approve</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation</a>
                                <div class="activity-item-description">

                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">3 hours ago</span>&nbsp;
                                        <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                        <form class="activity-item-comment-form ready" method="post" action="" style="">
                                            <fieldset><input type="hidden" name="replyTo" value="">
                                                <input type="hidden" name="xsrfToken" value=""><textarea rows="6" name="comment"></textarea>
                                            </fieldset><div class="pull-left"><span class="btn btn-danger btn-xs">Add</span>&nbsp;
                                                <a href="#" class="btn btn-default btn-xs close-activity-form">Cancel</a></div></form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/TaskEasy-Logo.png" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Jevgeni S...</a>&nbsp;<span class="label label-default label-xs">closed</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation for implementation </a>
                                <div class="activity-item-description">
                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">4 hours ago</span>&nbsp;
                                        <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="show-more-activity"> <button class="btn btn-default btn-xs" style="width: 100%">Show more</button></div>
                </div>
            </div>
        </div>
        <!-- ./row-->
    </div>
</div>






<div class="page-content-wrapper">
<div class="page-content inset">
<div class="row">
<div class="col-md-12">
    <h3 class="h_title">Logs activity</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body-table">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong>#ID</strong></td>
                                    <td class="text-left" style="border-left: 1px solid #ddd;"><strong>Date</strong></td>
                                    <td class="text-left" style="border-left: 1px solid #ddd;"><strong>User</strong></td>
                                    <td class="text-left" style="border-left: 1px solid #ddd;"><strong>Action</strong></td>
                                    <td class="text-left" style="border-left: 1px solid #ddd;"><strong>Status</strong></td>
                                    <td class="text-left" style="border-left: 1px solid #ddd;"><strong>item</strong></td>
                                    <td class="text-left" style="border-left: 1px solid #ddd;"><strong>Description</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td>1012</td>
                                    <td class="text-left">2014-12-10 16:56:03</td>
                                    <td class="text-left">Roman Dobrynin</td>
                                    <td class="text-left">create</td>
                                    <td class="text-left"><span class="label label-xs label-warning">approve</span></td>
                                    <td class="text-left">project</td>
                                    <td class="text-left">Magento implementation</td>
                                </tr>
                                <tr>
                                    <td>1012</td>
                                    <td class="text-left">2014-12-10 16:56:03</td>
                                    <td class="text-left">Andrei Abozau</td>
                                    <td class="text-left">in development</td>
                                    <td class="text-left"><span class="label label-xs label-success">proccess</span></td>
                                    <td class="text-left">task</td>
                                    <td class="text-left">Paypal module</td>
                                </tr>
                                <tr>
                                    <td>1012</td>
                                    <td class="text-left">2014-12-10 16:56:03</td>
                                    <td class="text-left">Roman Dobrynin</td>
                                    <td class="text-left">create</td>
                                    <td class="text-left"><span class="label label-xs label-warning">approve</span></td>
                                    <td class="text-left">project</td>
                                    <td class="text-left">Magento implementation</td>
                                </tr>
                                <tr>
                                    <td>1012</td>
                                    <td class="text-left">2014-12-10 16:56:03</td>
                                    <td class="text-left">Roman Dobrynin</td>
                                    <td class="text-left">create</td>
                                    <td class="text-left"><span class="label label-xs label-warning">approve</span></td>
                                    <td class="text-left">project</td>
                                    <td class="text-left">Magento implementation</td>
                                </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>

</div>
<!-- ./row-->
</div>
</div>


</div>



