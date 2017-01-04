<?php
namespace App\Modules\Helloworld\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HelloworldDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('App\Modules\Helloworld\Database\Seeds\FoobarTableSeeder');

        Model::reguard();

	}

}
