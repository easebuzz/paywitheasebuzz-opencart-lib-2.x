<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-easebuzz" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-easebuzz" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="easebuzz_status" id="input-status" class="form-control">
                                <?php if ($easebuzz_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="easebuzz_sort_order" value="<?php echo $easebuzz_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip" title="<?php echo $help_total; ?>"><?php echo $entry_total; ?></span></label>
                        <div class="col-sm-10">
                            <input type="text" name="easebuzz_total" value="<?php echo $easebuzz_total; ?>" placeholder="<?php echo $entry_total; ?>" id="input-total" class="form-control" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-payment-mode"><?php echo $entry_payment_mode; ?></label>
                        <div class="col-sm-10">
                            <select name="easebuzz_payment_mode" id="easebuzz_payment_mode" class="form-control">
                                <option value="test" <?php if($easebuzz_payment_mode=="test"){ echo 'selected="selected"'; }?> >Test</option>
                                <option value="prod" <?php if($easebuzz_payment_mode=="prod"){ echo 'selected="selected"'; }?> >Production</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip" title="<?php echo $help_merchant_key; ?>"><?php echo $entry_merchant_key; ?></span></label>
                        <div class="col-sm-10">
                            <input type="text" name="easebuzz_merchant_key" value="<?php echo $easebuzz_merchant_key; ?>" placeholder="<?php echo $entry_merchant_key; ?>" id="input-total" class="form-control" />
                            <?php if ($error_merchant_key) { ?>
                                <div class="text-danger"><?php echo $error_merchant_key; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip" title="<?php echo $help_merchant_salt; ?>"><?php echo $entry_merchant_salt; ?></span></label>
                        <div class="col-sm-10">
                            <input type="text" name="easebuzz_merchant_salt" value="<?php echo $easebuzz_merchant_salt; ?>" placeholder="<?php echo $entry_merchant_salt; ?>" id="input-total" class="form-control" />
                            <?php if ($error_merchant_salt) { ?>
                                <div class="text-danger"><?php echo $error_merchant_salt; ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_geo_zone; ?></label>
                        <div class="col-sm-10">
                            <select name="easebuzz_geo_zone_id" id="input-geo-zone" class="form-control">
                                <option value="0"><?php echo $text_all_zones; ?></option>
                                <?php foreach ($geo_zones as $geo_zone) { ?>
                                <?php if ($geo_zone['geo_zone_id'] == $easebuzz_geo_zone_id) { ?>
                                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-new-status"><?php echo $entry_new_status; ?></label>
                        <div class="col-sm-10">
                            <select name="easebuzz_new_status" id="input-new-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                <?php if ($order_status['order_status_id'] == $easebuzz_new_status) { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-complete-status"><?php echo $entry_complete_status; ?></label>
                        <div class="col-sm-10">
                            <select name="easebuzz_complete_status" id="input-complete-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                <?php if ($order_status['order_status_id'] == $easebuzz_complete_status) { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-cancelled-status"><?php echo $entry_cancelled_status; ?></label>
                        <div class="col-sm-10">
                            <select name="easebuzz_cancelled_status" id="input-cancelled-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                <?php if ($order_status['order_status_id'] == $easebuzz_cancelled_status) { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>
