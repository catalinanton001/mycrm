<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$XaKQzNv20z4jButyjpuie.zj2IDG.EYwfunhQ6LGXB9r6kQafJp/q', 'role_id' => 1, 'remember_token' => '',],
            ['id' => 2, 'name' => 'Beniamin', 'email' => 'beniamin@gmail.com', 'password' => '$2y$10$Y/IAMl3GnZI/EZxDXtchme6dpTpfIJxFy1GnC5gSXu6QKjLTjSLyK', 'role_id' => 2, 'remember_token' => null,],
            ['id' => 3, 'name' => 'Catalin', 'email' => 'catalin@gmail.com', 'password' => '$2y$10$hNuKi1ulTbdsBNW.Vav8..Z6gKkVB.Ctvprr5qBv.8dLonfUEuJA6', 'role_id' => 2, 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
