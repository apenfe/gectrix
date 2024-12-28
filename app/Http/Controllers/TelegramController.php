<?php

namespace App\Http\Controllers;

use App\Notifications\TelegramBotNotification;

class TelegramController extends Controller {

    public function store() {
        $date = now();
        $message = "Hello, this is a test message from the Laravel application. The current date and time is: $date";
        $user = auth()->user();
        $user->notify(new TelegramBotNotification($message));
    }

}
