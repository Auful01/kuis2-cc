<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    protected $table = 'reservation_details';

    protected $fillable = [
        'id',
        'treatment_id',
        'doctor_id',
        'reservation_id',
        'subtotal'
    ];

    /**
     * Get the user that owns the ReservationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    /**
     * Get the treatment that owns the ReservationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'treatment_id');
    }

    /**
     * Get the reservation that owns the ReservationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
