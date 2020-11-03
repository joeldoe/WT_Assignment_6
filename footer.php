	<div class="footer">
		<p>T&C | Privacy Policy | Copyright @ Happy Club Pvt. Ltd.</p>
	</div>
</div>
</body>
<script type="text/javascript">
	function delete_confirmation(cont_no)
	{
		cont_no = Number(cont_no);
		if(confirm("Do you want to delete the registration for contestant no. "+cont_no))
		{
			window.location = "controller.php?request=delete_record&cont_no="+cont_no;
		}
	}
</script>
</html>
