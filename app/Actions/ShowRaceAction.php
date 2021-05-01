<?php

namespace App\Actions;

use LaravelViews\Actions\Action;

class ShowRaceAction extends Action
{
    public $title = 'Show race';

    public $icon = 'eye';

    public function handle($model)
    {
        redirect()->route('race.show', $model->id);
    }
}
