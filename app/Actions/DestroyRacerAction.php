<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class DestroyRacerAction extends Action
{
    use Confirmable;

    public $title = 'Delete race';

    public $icon = 'trash';

    public function handle($model)
    {
        $model->runners()->sync([]);

        $model->delete();

        session()->flash('notifier',['text'=>__("Race $model->name was deleted!")]);

        redirect()->route('races');
    }
}
