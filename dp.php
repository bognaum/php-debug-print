<?php
	function DP($var, $title="")
	{
		?>
			<script type="text/javascript">
				(function () {
					const 
						title = "<?= $title ?>",
						v = `<?php var_dump($var)?>`
							.replaceAll("\\", "\\\\")
							.replaceAll("$", "\$"),
						btc = `<?php debug_print_backtrace(); ?>`
							.replaceAll("\\", "\\\\")
							.replaceAll("$", "\$");

					const 
						formated = v
							.replaceAll("=>\n", " => ")
							.replaceAll("\n", "<br>")
							.replaceAll("{", `
								<details style="margin-left: 20px;">
									<summary style="cursor: pointer;">###</summary>`)
							.replaceAll("}", "</details>"),
						str = [
							`<details>`,
								`<summary style="cursor: pointer;">debug_print_backtrace</summary>`,
								`<pre>${btc}</pre>`,
							`</details>`,
							`<b>${title}</b> : ${formated}`,
						].join("\n");

					document.write(str);
				})()
			</script>
		<?php
	}
?>