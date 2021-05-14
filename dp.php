<?php
	function DP($var, $title="")
	{
		?>
			<script type="text/javascript">
				(function () {
					const 
						title = "<?= $title ?>",
						v     = String.raw`<?php var_dump($var)?>`
						btc   = String.raw`<?php debug_print_backtrace(); ?>`
							.replace(/^(#\d+)/mg, `<b>$1</b>`);

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
								`<summary style="cursor: pointer;">(ƒ>ƒ>ƒ)</summary>`,
								`<pre style="white-space: pre-wrap;">${btc}</pre>`,
							`</details>`,
							`<b>${title}</b> : ${formated}`,
						].join("\n");

					document.write(`
						<div 
							class="DP" 
							style="font-family: consolas, courier, monospace"
						>${str}</div>
					`);
				})()
			</script>
		<?php
	}
?>