<?php

namespace App\Actions;

use App\Models\Race;

final class DestroyRacerAction
{
    public function destroy(Race $race)
    {
        $race->runners()->sync([]);
        $race->delete();
    }
}
