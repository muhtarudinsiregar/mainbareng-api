<?php
namespace App\Transformers;

use App\Models\Room;
use League\Fractal\TransformerAbstract;
use Carbon\Carbon;
use App\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => (int)$user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('Y-m-d'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', $user->updated_at)->format('Y-m-d'),
            'gender' => $user->gender,
            'city' => $user->city,
            'photo_path' => $user->photo_path,
            'phone' => $user->phone,
            'summary' => $user->summary,
            'address' => $user->address,
            'birth_date' => $user->birth_date
        ];
    }
}
