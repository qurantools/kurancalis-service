<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
require_once 'rain.tpl.class.php';

class GenerateResourceClasses extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:resources';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generates the resource classes for a table in a database';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		//
		$arguments = $this->argument();
		
		
		$tpl = new raintpl();
		
		$table = $arguments['table'];
		$resource = ucfirst($table);
		$tpl->assign("resource",$resource);
		$tpl->assign("table",$table);
		
		
		$output =  $tpl->draw("abstract_resource_controller",true);
		
		file_put_contents("app/controllers/Abstract".$resource."Controller.php", $output);
		
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('host', InputArgument::REQUIRED, 'Mysql Host.'),
			array('user', InputArgument::REQUIRED, 'Mysql User.'),
			array('pass', InputArgument::REQUIRED, 'Mysql Password.'),
			array('db', InputArgument::REQUIRED, 'Mysql Database.'),
			array('table', InputArgument::REQUIRED, 'Mysql Table.')
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
