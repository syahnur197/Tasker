<script>
	$(() => {
		$(".is-invalid").on('keyup', function(e) {
			$(this).removeClass('is-invalid');
		})

		$(".close").on('click', function(e) {
			$(this).parent().remove();
		})
	});
</script>