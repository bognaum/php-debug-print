<?php
	function DP($var=NULL, $title="")
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
								/^(#\d+)(.+?)(called at \[)(.+?):(\d+?)(\])/mg, 
								`
									<tr>
										<td rowspan="2" 
											title="call number">$1</td>
										<td colspan="2" 
											title="function & adfs">
											<div style="
												max-height: 100px; 
												overflow: auto;
											">
												$2
											</div>
										</td>
									</tr>
									<tr>
										<td 
											title="line"
											style="
												text-align: center;
												padding-left: 10px;
												padding-right: 10px;
											"
										>
											<b>$5</b>
										</td>
										<td title="file">
											<b>$4</b>
										</td>
									</tr>
								`
							);

					const 
						formated = v
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
								text-align: left;
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