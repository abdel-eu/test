<?php $title='إضافة عرض'; require_once 'views/head.php'; ?>

	<h2 class="text-flat">رئيسية التحكم <span class="text-sm"><?php echo $title; ?></span></h2>

	<ul class="breadcrumb pb30">
		<li><a href="<?php echo base_url("admin"); ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
		<li><a href="<?php echo base_url("admin/pages"); ?>">الصفحات</a></li>
		<li class="active">تعديل صفحة</li>
	</ul>

	<?php foreach($cat as $key){ ?>
	
	<div class="well bs-component" data-sr="wait 0s, then enter left and hustle 100%">
		<?php echo form_open_multipart("",array("class" => "form-horizontal")); ?>

		  <fieldset>

		    <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
		      <label for="inputUser" class="col-lg-2 control-label">عنوان الصفحة</label>
		      <div class="col-lg-10 input-grup">
		      	<i class="fa fa-user"></i>
		        <input type="text" class="form-control text-right" placeholder="عنوان الصفحة" name="title" value="<?php echo $key->title; ?>">
		        <span class="help-block">عنوان الصفحة</span>
		      </div>
		    </div>
		    <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
		      <label for="inputUser" class="col-lg-2 control-label">محتوى الصفحة</label>
		      <div class="col-lg-10 input-grup">
		        <textarea class="form-control text-right" name="content" id="editor1"><?php echo $key->content; ?></textarea>
		        <span class="help-block">محتوى الصفحة</span>
		      </div>
		    </div>

		    <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
		      <label for="inputUser" class="col-lg-2 control-label">ظهور رابط الصفحة في الفوتر</label>
		      <div class="col-lg-10 input-grup">
		        <select class="form-control text-right" name="footer">
		        	<option value="0">لا</option>
		        	<option value="1" <?php if($key->footer == 1) echo "selected"; ?>>نعم</option>
		        </select>
		        <span class="help-block">ظهور رابط الصفحة في الفوتر</span>
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