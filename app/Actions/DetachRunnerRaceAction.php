<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class DetachRunnerRaceAction extends Action
{
    use Confirmable;

    public $title = 'Detach runner';

    public $icon = 'user-minus';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really detach this runner?';
    }

    public function handle($model)
    {
        //
    }
}
