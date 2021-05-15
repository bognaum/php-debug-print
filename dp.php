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
							.replace(/^(.+?\().*(\).*?)\n/, "$1...$2\n")
							.replace(
								/^(#\d+)(.+?)(called at \[)(.+?)(\])/mg, 
								`
									<tr>
										<td rowspan="2">$1</td>
										<td>$2</td>
									</tr>
									<tr>
										<td>$3<i><b>$4</b></i>$5</td>
									</tr>
								`
							);

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
								`<table border cellspacing="0" cellpadding="5">
									<tbody>${btc}</tbody>
								</table>`,
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