<?

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpiringFireExtinguishersNotification extends Notification
{
    use Queueable;

    protected $fire;

    public function __construct($fire)
    {
        $this->fire = $fire;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Adjust channels as necessary
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A fire extinguisher is expiring soon.')
                    ->action('View Fire Extinguisher', url('/fire-extinguisher/' . $this->fire->id))
                    ->line('Expiration Date: ' . $this->fire->expiration_date);
    }

    public function toArray($notifiable)
    {
        return [
            'fire_id' => $this->fire->id,
            'expiration_date' => $this->fire->expiration_date,
        ];
    }
}

