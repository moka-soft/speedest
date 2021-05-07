<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
use Laravel\Jetstream\InteractsWithBanner;
use LivewireUI\Modal\ModalComponent;
use Spatie\Newsletter\NewsletterFacade;

class Subscribe extends ModalComponent
{
    use InteractsWithBanner;

    public $headline= 'Is coming soon';

    public $description = 'Under construction. This application is just a beta demonstration, we not persist your data. Subscribe for new updates.';

    public $email;

    protected $rules = [
        'email' => 'required|email'
    ];

    public bool $close = false;

    private string $cookieName = 'subscribe_show';

    public function mount()
    {
        $this->close = (bool) request()->cookie($this->cookieName);
    }


    public function hiddeBanner()
    {
        $this->close = true;

        Cookie::queue($this->cookieName, 1, 60*24*10);
    }

    public function subscribe()
    {
        $this->validate();

        $ok = NewsletterFacade::subscribeOrUpdate($this->email);

        if ($ok) {
            $this->banner(__('Now you are subscribed in our chanel. Thanks !'));
            $this->close = true;
        } else {
            $this->dangerBanner(__("Couldn't not subscribe now. Try a few minutes later"));
        }
    }

    public function render()
    {
        return view('livewire.subscribe', [
            'headline' =>  $this->headline,
            'description' => $this->description
        ]);
    }
}
