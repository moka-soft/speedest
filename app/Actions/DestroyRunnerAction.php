<?php

namespace App\Actions;

use App\Models\Runner;

final class DestroyRunnerAction
{
    public function destroy(Runner $runner)
    {
        $runner->races()->sync([]);
        $runner->delete();
    }
}
