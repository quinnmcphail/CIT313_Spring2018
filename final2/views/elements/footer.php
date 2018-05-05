   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL ?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL ?>views/js/bootstrap.min.js"></script>

<?php
if ($u->isAdmin()) {
    ?>
    <script src="<?php echo BASE_URL ?>application/plugins/tinymce.min.js"></script>
    <script>
	tinymce.init({selector:'#tinyeditor'});
		</script>
 <?php }?>
  </body>
</html>