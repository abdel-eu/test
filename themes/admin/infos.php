<?php

if($tp == "add") {

?>

<?php $title='إضافة خبر'; require_once 'views/head.php'; ?>

	<h2 class="text-flat">رئيسية التحكم <span class="text-sm"><?php echo $title; ?></span></h2>

	<ul class="breadcrumb pb30">
		<li><a href="<?php echo base_url("admin"); ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
		<li><a href="<?php echo base_url("admin/infos"); ?>">شريط الاخبار</a></li>
		<li class="active">إضافة</li>
	</ul>

	<?php if(isset($msg)){ ?>
	<div class="alert alert-success">تم إضافة نوع ملف بنجاح .</div>
	<?php } ?>
	<div class="well bs-component" data-sr="wait 0s, then enter left and hustle 100%">
		<?php echo form_open_multipart("",array("class" => "form-horizontal")); ?>

		  <fieldset>

			<div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
			  <label for="inputUser" class="col-lg-2 control-label">المحتوى</label>
			  <div class="col-lg-10 input-grup">
				<i class="fa fa-user"></i>
				<input type="text" class="form-control text-right" placeholder="المحتوى" name="content">
				<span class="help-block">المحتوى .</span>
			  </div>
			</div>

			<div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">
			  <div class="col-xs-10 col-xs-pull-2">
				<button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
				<button type="submit" class="btn btn-primary" name="test">حفظ</button>
			  </div>
			</div>

		  </fieldset>

		</form>

	</div>



<?php require_once 'views/sidebar.php'; require_once 'views/foot.php';


}elseif($tp == "edit") {

?>


<?php $title='إضافة خبر'; require_once 'views/head.php'; ?>

	<h2 class="text-flat">رئيسية التحكم <span class="text-sm"><?php echo $title; ?></span></h2>

	<ul class="breadcrumb pb30">
		<li><a href="<?php echo base_url("admin"); ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
		<li><a href="<?php echo base_url("admin/infos"); ?>">شريط الاخبار</a></li>
		<li class="active">إضافة </li>
	</ul>

	<?php foreach($cat as $key){ ?>
	<div class="well bs-component" data-sr="wait 0s, then enter left and hustle 100%">
		<?php echo form_open_multipart("",array("class" => "form-horizontal")); ?>

		  <fieldset>

			<div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
			  <label for="inputUser" class="col-lg-2 control-label">المحتوى</label>
			  <div class="col-lg-10 input-grup">
				<i class="fa fa-user"></i>
				<input type="text" class="form-control text-right" placeholder="المحتوى" name="content" value="<?php echo $key->content; ?>">
				<span class="help-block">المحتوى .</span>
			  </div>
			</div>

			<div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">
			  <div class="col-xs-10 col-xs-pull-2">
				<button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
				<button type="submit" class="btn btn-primary" name="test">حفظ</button>
			  </div>
			</div>

		  </fieldset>

		</form>

	</div>
	<?php } ?>



<?php require_once 'views/sidebar.php'; require_once 'views/foot.php';


}else {

?>

<?php require_once 'views/head.php'; ?>

<ul class="breadcrumb pb30">
  <li><a href="<?php echo base_url("admin"); ?>">الرئيسية</a></li>
  <li class="active">شريط الاخبار .</li>
  <li class="pull-left"><a href="<?php echo base_url("admin/add_info"); ?>" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i> أضف خبر جديد</a></li>
</ul>



<ul id="responds">
<?php foreach($cat as $key) { $idcat = $key->id; ?>

		  <li id="infos_<?php echo $idcat; ?>">
					  <span style="float: right;"><?php echo $key->content; ?></span>
					  <div class="del_wrapper">
						<a href="<?php echo base_url("admin/edit_info/$key->id"); ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil-square"></i> تعديل</a>
			<a href="<?php echo base_url("admin/delt/infos/$key->id/infos"); ?>" class="btn btn-danger btn-xs deleteBtn"><i class="fa fa-minus-square"></i> حذف</a>

					  </div>
					<div class="clearfix"></div>
					</li>

<?php } ?>
</ul>

<button class="button btn btn-success">حفظ الترتيب</button>



<?php require_once 'views/sidebar.php'; require_once 'views/foot.php';

}