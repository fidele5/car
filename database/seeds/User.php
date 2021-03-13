<?php
use App\User as Utilisateur;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Utilisateur::create([
            'nom'=>"fidele",
            'postnom'=>"plk",
            'prenom'=>"bro",
            'login'=>"fidele21",
            'adresse'=>"Lubumbashi Kamalondo",
            'telephone'=>"0974217408",
            'email'=>"fideleplk@gmail.com",
            'password'=>"123456789",
            'role'=>"admin",
        ]);

        Utilisateur::create([
            'nom' => "Maestro",
            'postnom' => "Delion",
            'prenom' => "PLK",
            'login' => "mateo21",
            'adresse' => "Lubumbashi Kamalondo",
            'telephone' => "0974215897",
            'email' => "fidele@gmail.com",
            'password' => "123456789",
            'role' => "admin",
        ]);

        Utilisateur::create([
            'nom' => "Bruno",
            'postnom' => "Buki",
            'prenom' => "El magnifico",
            'login' => "Maestoso12",
            'adresse' => "Lubumbashi Kamalondo",
            'telephone' => "0974215897",
            'email' => "maestoso21@gmail.com",
            'password' => "123456789",
            'role' => "proprio",
        ]);

        Utilisateur::create([
            'nom' => "Sokka",
            'postnom' => "LaMa",
            'prenom' => "El gringo",
            'login' => "sokki",
            'adresse' => "Lubumbashi Kamalondo",
            'telephone' => "21547861321",
            'email' => "sokka@avatar.com",
            'password' => "123456789",
            'role' => "pcr",
        ]);


    }
}
