<?php $template = $this->templates->theme();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->datamapper->rowData('tb_option', 'nama_aplikasi', 'id', '1'); ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/backend/'.$template.'/');?>css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/backend/'.$template.'/');?>css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/backend/'.$template.'/');?>css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/backend/'.$template.'/');?>css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/backend/'.$template.'/');?>css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/plugins/loaders/blockui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/plugins/notifications/sweet_alert.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/pages/layout_fixed_custom.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/backend/'.$template.'/');?>js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>