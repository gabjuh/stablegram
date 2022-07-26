<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserFollowed extends Mailable
{
    use Queueable, SerializesModels;

    public $following;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($following)
    {
        $this->following = $following;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->setAvatar();
        return $this->from('noreply@stablegram.test')
            ->markdown('mail.user_followed', [
                'follower' => $user,
                'recipient' => $this->following,
            ]);
    }
}
