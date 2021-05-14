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
							// .replaceAll("=>\n", " => ")
							// .replaceAll("\n", "<br>")
							.replaceAll("{", `
								<details style="margin-left: 20px;">
									<summary style="cursor: pointer;"></summary>`)
							.replaceAll("}", "</details>")
							.replace(/^\s+(\[.+?\])=>\n(.*?$)/gm, `
								<div style="display: table-row;">
									<div style="display: table-cell;">$1</div>
									<div style="display: table-cell;">&nbsp;=>&nbsp;</div>
									<div style="display: table-cell;">$2</div>
								</div>
							`),
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
							style="
								font-family: consolas, courier, monospace;
								margin: 20px;
							"
						>${str}</div>
					`);
				})()
			</script>
		<?php
	}
?>