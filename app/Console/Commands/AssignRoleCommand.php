<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     * Kita buat commandnya: user:assign-role {email} {role}
     */
    protected $signature = 'user:assign-role {email} {role}';

    /**
     * The console command description.
     */
    protected $description = 'Assign a role to a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $roleName = $this->argument('role');

        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error("User dengan email '{$email}' tidak ditemukan.");
            return;
        }

        $role = Role::where('name', $roleName)->first();
        if (!$role) {
            $this->error("Role '{$roleName}' tidak ditemukan. Pilihan: Admin, Editor, Wartawan");
            return;
        }

        // Gunakan API dari package untuk memberikan role
        $user->assignRole($role);

        $this->info("Sukses! Role '{$roleName}' berhasil diberikan kepada user '{$user->name}'.");
    }
}