<?php

namespace App\Http\Requests;

use App\Enums\BookingStatuses;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

// use App\Enums\BookableTypes;

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
            'user_id' => 'required|exists:users,id',
            'flight_school_id' => 'required|exists:flight_schools,id',
            'booking_date_time_start' => 'required|date_format:Y-m-d H:i:s',
            'booking_date_time_end' => 'required|date_format:Y-m-d H:i:s',
            'booking_status' => 'required|string|in:'.implode(',', array_column(BookingStatuses::cases(), 'value')),
        ];
    }
}
