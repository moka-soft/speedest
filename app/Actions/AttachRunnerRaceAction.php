<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class AttachRunnerRaceAction extends Action
{
    use Confirmable;

    public $title = 'Attach participant';

    public $icon = 'user-check';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really attach this participant?';
    }

    public function handle($model)
    {
        //
    }
}
