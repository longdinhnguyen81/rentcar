</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="/templates/admin/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="/templates/admin/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="/templates/admin/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="/templates/admin/js/custom.js"></script>
<!-- CKEDITO -->
</body>
<script>
	 CKEDITOR.replace('content',
{
	filebrowserBrowseUrl : '/templates/admin/js/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '/templates/admin/js/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '/templates/admin/js/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '/templates/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '/templates/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '/templates/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>
</html>
<?php ob_end_flush();?>