// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{
  public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'soumya@bridge.in',
            'password' => Hash::make('soumya')
        ));
        
        User::create(array(
            'email' => 'soumya.k@bridge-india.in',
            'password' => Hash::make('soumya2')
        ));
    }

}
