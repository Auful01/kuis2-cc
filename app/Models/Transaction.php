<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'reservation_id',
        'reservation_detail_id',
        'date',
        'time',
        'status'
    ];

    /**
     * Get the reservation that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    /**
     * Get the reservationDetail that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservationDetail()
    {
        return $this->belongsTo(ReservationDetail::class, 'reservation_detail_id');
    }
}
