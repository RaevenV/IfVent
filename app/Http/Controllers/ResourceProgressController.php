<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\User;

class ResourceProgressController extends Controller
{
    public function trackProgress($resource_id, $resource_type)
    {
        $user_id = auth()->id();

        $resourceProgress = Resource::updateOrCreate(
            [
                'user_id' => $user_id,
                'resource_id' => $resource_id,
                'resource_type' => $resource_type
            ],
            [
                'progress' => 'on progress'
            ]
        );

        return redirect()->route($resource_type . '.view', ['id' => $resource_id]);
    }

    public function completeResource($resource_id, $resource_type)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login'); // Redirect to login if user is not authenticated
        };

        $resourceProgress = Resource::updateOrCreate(
            [
                'user_id' => $user->id,
                'resource_id' => $resource_id,
                'resource_type' => $resource_type
            ],
            [
                'progress' => 'completed'
            ]
        );

        $user->increment('totalCompleted');

        return back();
    }
}
