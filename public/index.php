<?php
define('__APP_ROOT__', realpath(__DIR__.'/../'));

require __APP_ROOT__ . '/vendor/autoload.php';


use App\Models\Teste\Teste;

$t = new Teste;


echo '<pre>';

$t->columns(['*', 'count(1) as count_flag'])
->where('id > 0')
->group('flag')
->having('count_flag > 1')
->get();
echo PHP_EOL;
echo $t->where('id > 10')->count();
echo PHP_EOL;
/*
echo PHP_EOL;
echo $t->where('id = 1')->count();
echo PHP_EOL;
$t->get();*/

echo $t->showSql();
echo PHP_EOL;


print_r($t);

foreach ($t as $key => $value) {

	$value->descricao = str_shuffle('abcdef');
	$value->flag = rand(0,1);
	//$value->save();

	echo '<br>';
	print_r ($value);
}

echo '</pre>';
