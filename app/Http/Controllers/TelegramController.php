<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Notifications\TelegramBotNotification;

class TelegramController extends Controller {

    public function store(Alert $alert = null) {

        if($alert) {
            $message = "This is Gectrix alert report system:\n";
            $message .= "Type of alert: $alert->type\n";
            $message .= "Start date: $alert->start_date\n";
            $message .= "End date: $alert->end_date\n";
            $message .= "Description: $alert->description\n";
            $message .= "Danger level: $alert->danger_level\n";
            $message .= "Ubicación: https://www.google.com/maps?q=$alert->latitude,$alert->longitude\n";
        } else {
            $message = "Hello, this is a test message from the Laravel application.";
        }

        $user = auth()->user();
        $user->notify(new TelegramBotNotification($message));

        return redirect()->route('alerts.index')->with('success', 'Alerta creada y notificada exitosamente.');
    }

    public function notifyAlert(Alert $alert) {
        $message = "This is Gectrix alert report system (Reminder):\n";
        $message .= "Type of alert: $alert->type\n";
        $message .= "Start date: $alert->start_date\n";
        $message .= "End date: $alert->end_date\n";
        $message .= "Description: $alert->description\n";
        $message .= "Danger level: $alert->danger_level\n";
        $message .= "Ubicación: https://www.google.com/maps?q=$alert->latitude,$alert->longitude\n";

        $user = auth()->user();
        $user->notify(new TelegramBotNotification($message));

        return redirect()->route('alerts.index')->with('success', 'Reminder de alerta notificado exitosamente.');
    }

}
