<?php

namespace App\Observers;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class AuditObserver
{
    public function created($model)
    {
        Audit::create([
            'user_id'        => Auth::id(),
            'action'         => 'created',
            'auditable_type' => get_class($model),
            'auditable_id'   => $model->id,
            'old_values'     => null,
            'new_values'     => $model->toArray(),
        ]);
    }

    public function updated($model)
    {
        Audit::create([
            'user_id'        => Auth::id(),
            'action'         => 'updated',
            'auditable_type' => get_class($model),
            'auditable_id'   => $model->id,
            'old_values'     => $model->getOriginal(),
            'new_values'     => $model->getChanges(),
        ]);
    }

    public function deleted($model)
    {
        Audit::create([
            'user_id'        => Auth::id(),
            'action'         => 'deleted',
            'auditable_type' => get_class($model),
            'auditable_id'   => $model->id,
            'old_values'     => $model->toArray(),
            'new_values'     => null,
        ]);
    }

}
