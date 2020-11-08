<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'title', 'event_schedule', 'description', 'primary_image', 'secondary_image', 'status',
    ];


    /**
     * Se encargan de subir la imagen principal
     * y retorna el nombre de ese archivo
     * @param  Request  $request
     * @return $primary_image
     */

    public function uploadPrimaryImage($request)
    {
        if ($request->hasFile('primary_image')) {
            $file = $request->file('primary_image');
            $primary_image  = $file->getClientOriginalName();
            $file->move(public_path("images/"), $primary_image);
            return $primary_image;
        }
    }

    public function uploadSecondaryImage($request)
    {
        if ($request->hasFile('secondary_image')) {
            $file = $request->file('secondary_image');
            $secondary_image  = $file->getClientOriginalName();
            $file->move(public_path("images/"), $secondary_image);
            return $secondary_image;
        }
    }
}
