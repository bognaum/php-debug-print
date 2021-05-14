<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body .container {
			margin: 10px 100px 500px 100px;
		}
	</style>
	<title>PHP-DP</title>
</head>
<body>
	<div class="container">
		<?php include "./../dp.php"; ?>
		<?php
			$data_structure = [
				[
					"section_id" => 22,
					"f_name"     => true,
					"title"      => "Обработка контента",
					"ch"         => [
						[
							"section_id" => "html_and_templates",
							"f_name"     => "html_and_templates.php",
							"title"      => "HTML и шаблонизаторы",
							"ch"         => []
						],
						[
							"section_id" => "js_and_compiled",
							"f_name"     => "js_and_compiled.php",
							"title"      => "JS и компилируемые форматы",
							"ch"         => []
						],
						[
							"section_id" => "css_and_compiled",
							"f_name"     => "css_and_compiled.php",
							"title"      => "CSS и компилируемые форматы",
							"ch"         => []
						],
						[
							"section_id" => "images",
							"f_name"     => "images.php",
							"title"      => "Картинки",
							"ch"         => []
						]
					]
				],
				[
					"section_id" => "babel",
					"f_name"     => "babel.php",
					"title"      => "Babel",
					"ch"         => []
				],
				[
					"section_id" => "watching",
					"f_name"     => "watching.php",
					"title"      => "Отслеживание изменений",
					"ch"         => [
						[
							"section_id" => "watch_sources",
							"f_name"     => "watch_sources.php",
							"title"      => "В исходных файлах",
							"ch"         => []
						],
						[
							"section_id" => "watch_config",
							"f_name"     => "watch_config.php",
							"title"      => "В файле конфигурации",
							"ch"         => []
						]
					]
				],
				[
					"section_id" => "cli",
					"f_name"     => "cli.php",
					"title"      => "CLI",
					"ch"         => []
				],
				[
					"section_id" => "connected_modules",
					"f_name"     => "connected_modules.php",
					"title"      => "Подключаемые модули",
					"ch"         => [
						[
							"section_id" => "how_to_connect_module",
							"f_name"     => "how_to_connect_module.php",
							"title"      => "Как подключить",
							"ch"         => []
						],
						[
							"section_id" => "how_to_write_module",
							"f_name"     => "how_to_write_module.php",
							"title"      => "Как написать",
							"ch"         => []
						],
						[
							"section_id" => "published_modules",
							"f_name"     => "published_modules.php",
							"title"      => "Публично доступные",
							"ch"         => []
						]
					]
				],
				[
					"section_id" => "features",
					"f_name"     => "features.php",
					"title"      => "Особенности",
					"ch"         => []
				],
			];

			$ob1 = new stdClass();
			$ob1->a = 10;
			$ob1->b = "10";
			$ob1->c = new stdClass();
			$ob1->c->d = "10";

			function f1()
			{
				global $data_structure;
				DP($data_structure, '$data_structure');
			}

			function f2()
			{
				f1();
			}

		?>
		<?php DP($data_structure, '$data_structure'); ?>
		<?php DP($ob1, '$ob1'); ?>
		<h3>f2()</h3>
		<?php f2(); ?>
	</div>
</body>
</html>