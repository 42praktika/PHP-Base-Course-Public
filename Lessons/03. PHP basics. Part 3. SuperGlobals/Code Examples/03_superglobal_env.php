<?php

declare(strict_types=1);

echo '<pre>';
echo 'ENV_VAR from getenv: ' . getenv('ENV_VAR');
echo '<br>';
echo '$_ENV[\'ENV_VAR\']: '. ($_ENV['ENV_VAR'] ?? 'N/A');
echo '<br>';
echo '$_SERVER[\'ENV_VAR\']: '. ($_SERVER['ENV_VAR'] ?? 'N/A');
echo '<br>';

putenv('ENV_VAR=42lab');
echo 'ENV_VAR after putenv';
echo '<br>';

echo 'by getenv: ' . getenv('ENV_VAR');
echo '<br>';

echo '$_ENV[\'ENV_VAR\']: '. ($_ENV['ENV_VAR'] ?? 'N/A');
echo '<br>';

echo '$_SERVER[\'ENV_VAR\']: '. ($_SERVER['ENV_VAR'] ?? 'N/A');
echo '<br>';

$_ENV['ENV_VAR']='42lab';
echo '$_ENV[\'ENV_VAR\']=\'42lab\'';
echo '<br>';

echo '$_ENV[\'ENV_VAR\']: '. ($_ENV['ENV_VAR'] ?? 'N/A');
