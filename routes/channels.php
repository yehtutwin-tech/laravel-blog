<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('admin.notifications', function ($user) {
    // return (int) $user->id === (int) $id;
    // return true;
    return $user->role === 'admin';
});
