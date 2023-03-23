<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeesStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $fr = Country::where('country_code', 'FR')->withCount('employees')->first();
        $ma = Country::where('country_code', 'Ma')->withCount('employees')->first();
        return [
            Card::make('All employees', Employee::all()->count()),
            Card::make($fr->name. ' Employees', $fr->employees_count),
            Card::make($ma->name. ' Employees', $ma->employees_count),

        ];
    }
}
