<script>
	callData(<?= json_encode($data[0]); ?>, <?= json_encode(array_values($data[0])); ?>);
	<?php 
		if (!empty($data[1])) {
	?>
		callData(<?= json_encode($data[1]); ?>, <?= json_encode(array_values($data[1])); ?>);
	<?php
		}
	?>
</script>