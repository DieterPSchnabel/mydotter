<?php

 for ($i = 1; $i < 56; $i++) {
     Route::get('dashboard/admintests'.$i, 'DashboardController@admintests'.$i)->name('dashboard.admintests'.$i);
 }
