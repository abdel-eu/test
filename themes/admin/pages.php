<?php require_once 'views/head.php'; ?>

<ul class="breadcrumb pb30">
  <li><a href="<?php echo base_url("admin"); ?>">الرئيسية</a></li>
  <li class="active">الصفحات .</li>
  <li class="pull-left"><a href="<?php echo base_url("admin/add_page"); ?>" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i> أضف صفحة جديد</a></li>
</ul>



	<table id="no-more-tables" class="table table-bordered" role="table">
		<thead>
			<tr>
				<th width="2%">#</th>
				<th width="40%" class="text-right">العنوان</th>
				<th width="68%" class="text-right">التحكم</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($cat as $key) { $idcat = $key->id; ?>
			<tr>
				<td data-title="#"><span class="badge"><?php echo $key->id; ?></span></td>
				<td data-title="إسم القسم"> <?php echo $key->title; ?></td>
				<td data-title="التحكم" class="text-center">
					<a href="<?php echo base_url("admin/edit_page/$key->id"); ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil-square"></i> تعديل</a>
					<a href="<?php echo base_url("admin/delt/pages/$key->id/pages"); ?>" class="btn btn-danger btn-xs deleteBtn"><i class="fa fa-minus-square"></i> حذف</a>
				</td>
			</tr>
		<?php } ?>

		</tbody>		
	</table>

<?php require_once 'views/sidebar.php'; require_once 'views/foot.php';