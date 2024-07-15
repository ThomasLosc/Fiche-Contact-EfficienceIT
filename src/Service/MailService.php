<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class MailService
{
    public const EMAIL_FROM = "noreply@efficience-it.com";
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(Contact $contact)
    {
        $email = (new TemplatedEmail())
            ->from(self::EMAIL_FROM)
            ->to($contact->getDepartment()->getEmail())
            ->subject('Fiche contact')
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'contact' => $contact
            ]);

        try {
            $this->mailer->send($email);
        } catch (\Exception $e) {
            return 'Erreur lors de l\'envoi de l\'email : ' . $e->getMessage();
        }
    }
}