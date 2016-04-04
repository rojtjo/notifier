<?php

namespace spec\Rojtjo\Notifier\Presenters;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Notifications;

class BootstrapThreePresenterSpec extends ObjectBehavior
{
    function it_is_a_presenter()
    {
        $this->shouldImplement('Rojtjo\Notifier\Presenter');
    }

    function it_can_render_the_given_notifications()
    {
        $notifications = new Notifications([
            Notification::success('It is successful'),
            Notification::error('It is an error'),
            Notification::warning('It is a warning'),
            Notification::info('It is info'),
        ]);

        $this->render($notifications)->shouldBe(<<<HTML
<div class="alert alert-success" role="alert">
    It is successful
</div>
<div class="alert alert-danger" role="alert">
    It is an error
</div>
<div class="alert alert-warning" role="alert">
    It is a warning
</div>
<div class="alert alert-info" role="alert">
    It is info
</div>

HTML
);
    }
}
