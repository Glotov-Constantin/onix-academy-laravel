<?php return array (
  'App\\Providers\\EventServiceProvider' => 
  array (
    'App\\Events\\UserRegistered' => 
    array (
      0 => 'App\\Listeners\\UserRegisteredListener@handle',
    ),
    'Illuminate\\Auth\\Events\\Registered' => 
    array (
      0 => 'Illuminate\\Auth\\Listeners\\SendEmailVerificationNotification',
    ),
  ),
);