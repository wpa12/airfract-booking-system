<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\BookingStatuses;
use Illuminate\Support\Facades\Auth;

class CreateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check(); // checks the user in logged in before proceeding with the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'aircraft_id' => 'required|exists:aircraft,id',
            'user_id' => 'required|exists:users,id',
            'flight_school_id' => 'required|exists:flight_schools,id',
            'booking_date_time_out' => 'required|datetime',
            'booking_date_time_in' => 'required|datetime',
            'booking_status' => 'required|string|in:' . implode(',', array_column(BookingStatuses::cases(), 'value')),
        ];
    }
}
