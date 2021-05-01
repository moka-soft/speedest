<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->delete();
    }
}
