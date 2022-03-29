<?php

namespace App\Http\Services;

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Object_;

class PhotoService
{

    /**
     * @param array $array
     * @param $id
     */
    public function create(array $array, $id)
    {
        foreach ($array as $image){
            $cover_path = Storage::put('images', $image['image']);
            Photo::create([
                'project_id' => $id,
                'path_img' => $cover_path,
                'description' => $image['description']
            ]);
        };
    }


    /**
     * @param array $array_new
     * @param int $id
     * @param object $array_old
     * @return bool
     */
    public function update(array $array_new, int $id, object $array_old): bool
    {
        foreach ($array_new as $key => $image_new){
            if (isset($image_new['image'])){
                if($key >= count($array_old)){
                    $cover_path = Storage::put('images', $image_new['image']);
                    Photo::create([
                        'project_id' => $id,
                        'path_img' => $cover_path,
                        'description' => $image_new['description']
                    ]);
                }else{
                    $cover_path = Storage::put('images', $image_new['image']);
                    Storage::delete($array_old[$key]["path_img"]);
                    $array_old[$key]->update([
                        'project_id' => $id,
                        'path_img' => $cover_path,
                        'description' => $image_new['description']
                    ]);
                }
            }
        }
        return true;
    }

    public function destroy(Photo $photo)
    {
        Storage::delete($photo["path_img"]);
    }
}
