<?php

namespace App\Notifications;

use App\Models\Blog;
use App\Models\BreakingNew;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;

class BreakingNewsAdded extends Notification
{
   use Queueable;
   protected $breakingNew;
   /**
    * Create a new notification instance.
    *
    * @return void
    */
   public function __construct(BreakingNew $breakingNew)
   {
      $this->breakingNew = $breakingNew;
   }

   /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
   public function via($notifiable)
   {
      return [FcmChannel::class];
   }

   /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
   public function toMail($notifiable)
   {
      return (new MailMessage)
         ->line('The introduction to the notification.')
         ->action('Notification Action', url('/'))
         ->line('Thank you for using our application!');
   }

   public function toFcm($notifiable)
   {
      return FcmMessage::create()
         ->setData([
            'news_title' => $this->breakingNew->title, 'news_href' => $this->breakingNew->href
         ])
         ->setNotification(
            \NotificationChannels\Fcm\Resources\Notification::create()
               ->setTitle($this->breakingNew->title)
               ->setBody($this->breakingNew->href)
         )
         ->setAndroid(
            AndroidConfig::create()
               ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
               ->setNotification(AndroidNotification::create()->setColor('#0A0A0A'))
         )->setApns(
            ApnsConfig::create()
               ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios'))
         );
   }
   /**
    * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
   public function toArray($notifiable)
   {
      return [
         //
      ];
   }
}
