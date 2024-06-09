<?php

namespace App\Http\Livewire;

use App\Models\User;
use PowerComponents\LivewirePowerGrid\PowerGrid;

class UserGrid extends PowerGrid
{
    public $model = User::class;

    public function columns(): array
    {
        return [
            PowerGrid::make('Name')->sortable(),
            PowerGrid::make('Email')->sortable(),
            PowerGrid::make('Phone Number')->sortable('phone_number'),
            PowerGrid::make('Age')->sortable('age'),
            PowerGrid::make('Total Completed')->sortable('totalCompleted'),
        ];
    }
}
