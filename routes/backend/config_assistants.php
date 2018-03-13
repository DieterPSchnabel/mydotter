<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10.03.2018
 * Time: 14:03
 */
for ($i = 1; $i <= 20; $i++) {
    Route::get('dashboard/ca' . $i, 'DashboardController@ca' . $i)->name('dashboard.ca' . $i);
}
