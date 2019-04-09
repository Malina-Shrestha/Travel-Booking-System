<?php
namespace App\Controllers;


use App\Models\Booking;
use App\Models\Category;
use App\Models\User;
use System\Core\BaseController;

class BookingsController extends BaseController
{
    public function index()
    {
        $data = $this->paginate(new Booking, 10, 'bookings');

        view('back/bookings/index', $data);
    }

    public function edit($id)
    {
        $booking = new Booking;
        $booking->load($id);

        view('back/bookings/edit', compact('booking'));
    }

    public function update($id)
    {
        extract($_POST);

        $booking = new Booking;
        $booking->load($id);
        $booking->qty = $qty;
        $booking->status = $status;
        $booking->start_date = $start_date;
        $booking->end_date = $end_date;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        $_SESSION['message'] = [
            'content' => 'Booking updated',
            'type' => 'success'
        ];

        redirect(url('/bookings'));
    }

    public function delete($id)
    {
        $booking = new Booking;
        $booking->load($id);
        $booking->delete();

        $_SESSION['message'] = [
            'content' => 'Booking removed.',
            'type' => 'success'
        ];

        redirect(url('/bookings'));
    }
}