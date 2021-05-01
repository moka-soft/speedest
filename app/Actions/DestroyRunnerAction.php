<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use LaravelViews\Views\View;

class DestroyRunnerAction extends Action
{
    use Confirmable;

    public $title = 'Delete runner';

    public $icon = 'trash';

    public function handle($model, View $view)
    {
        $model->delete();

        session()->flash('notifier',['text'=>__("Runner $model->name was deleted!")]);

        redirect()->route('runner.index');
    }
}
