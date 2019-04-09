<?php
/**
 * Created by PhpStorm.
 * User: malina
 * Date: 4/7/19
 * Time: 12:40 PM
 */

namespace App\Controllers;


use App\Models\Booking;
use App\Models\Package;
use App\Models\Review;
use System\Core\BaseController;

class ReviewController extends BaseController
{
    public function index()
    {
        extract($_POST);

        $review = new Review;
        $review->user_id = $_SESSION['user'];
        $review->package_id = $package_id;
        $review->description = $description;
        $review->rating = $rating;
        $review->created_at = date('Y-m-d H:i:s');
        $review->updated_at = date('Y-m-d H:i:s');
        $review->save();

        $_SESSION['message'] = [
            'content' => 'Your rating has been added.',
            'type' => 'success'
        ];

        redirect(url('/user'));

    }

    public function cancel($id)
    {
        $booking = new Booking;
        $booking->load($id);

        $booking->status = 'cancelled';
        $booking->updated_at = date('Y-m-d H:i:s');
        $booking->save();

        $_SESSION['message'] = [
            'content' => 'Your booking is cancelled',
            'type' => 'success'
        ];

        redirect(url('/user'));

    }

}