<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DaemonCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'DaemonCommand';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Initialize the YSK daemon.';

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

        Log::info( 'Daemon Command start:: ' . date('M-d-y H-i-s') );

		$init = new Init();
		$init->init();
		
		Log::info( 'Daemon Command stop:: ' . date('M-d-y H-i-s') );
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('example', InputArgument::OPTIONAL, ''),
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
			array('example', null, InputOption::VALUE_OPTIONAL, '', null),
		);
	}

}
