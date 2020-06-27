<?php
/**
 * Created by Paul Livorsi.
 * User: paul
 * Date: 10/9/18
 * Time: 5:49 AM
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$Paul = factory(App\User::class)->create([
			'name'       => 'Paul',
			'email'      => 'paullivorsi@gmail.com',
			'password'   => bcrypt('9911Paul'),
		]);
	}
}