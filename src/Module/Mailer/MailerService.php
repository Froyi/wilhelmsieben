<?php
declare (strict_types=1);

namespace Project\Module\Mailer;

use Project\Configuration;
use Project\Module\GenericValueObject\DatetimeInterface;
use Project\Module\GenericValueObject\Email;
use Project\Module\GenericValueObject\Extras;
use Project\Module\GenericValueObject\Name;
use Project\Module\GenericValueObject\Seats;

/**
 * Class MailerService
 * @package Project\Module\Mailer
 */
class MailerService
{
    const MAIN_SUBJECT = 'Reservierung eingetroffen';

    const DEFAULT_CONTACT = 'kontakt@cafewilhelmsieben.de';

    /** @var  Configuration $configuration */
    protected $configuration;

    /**
     * MailerService constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param Name              $name
     * @param Seats             $seats
     * @param DatetimeInterface $datetime
     * @param null|Email        $email
     * @param null|Extras       $extras
     * @return bool
     */
    public function sendReserveMail(Name $name, Seats $seats, DatetimeInterface $datetime, ?Email $email, ?Extras $extras = null): bool
    {
        $to = $this->configuration->getEntryByName('project')['email'];

        $subject = self::MAIN_SUBJECT;

        $message = '
            <html>
            <head>
              <title>' . self::MAIN_SUBJECT . '</title>
            </head>
            <body>
              <h2>' . $name->getName() . ' hat einen Tisch angefragt.</h2>
              
              <p>Es werden am ' . $datetime->getDateString() . ' um ' . $datetime->getTimeString() . ' Uhr ' . $seats->getSeats() . ' Plätze benötigt.</p>
              ';

        $contact = self::DEFAULT_CONTACT;
        if ($email !== null) {
            $contact = $email->getEmail();
            $message .= '
                <h3>Kontaktdaten</h3>
                <p>' . $email->getEmail() . '</p>';
        }

        if ($extras !== null) {
            $message .= '
                <h3>Sonderwünsche</h3>
                <p>' . $extras->getExtras() . '</p>';
        }

        $message .= '</body></html>';

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $header .= 'From: ' . utf8_decode($name->getName()) . '<' . $contact . '>' . "\r\n";

        $mailSent = mail($to, $subject, $message, $header);

        // Mail an Nutzer
        $this->sendMailToUser($email, $datetime, $seats);

        return $mailSent;
    }

    /**
     *
     *
     * @param null|Email        $email
     * @param DatetimeInterface $datetime
     * @param Seats             $seats
     * @return bool
     */
    protected function sendMailToUser(?Email $email, DatetimeInterface $datetime, Seats $seats): bool
    {
        if ($email === null) {
            return true;
        }

        $subject = self::MAIN_SUBJECT;

        $to = $email->getEmail();

        $message = '
            <html>
            <head>
              <title>' . self::MAIN_SUBJECT . '</title>
            </head>
            <body>
              <h2>Ihre Anfrage erhalten</h2>
              
              <p>Wir haben am ' . $datetime->getDateString() . ' um ' . $datetime->getTimeString() . ' Uhr ' . $seats->getSeats() . ' Plätze für Sie reserviert. Vielen Dank.</p>
              </body></html>
              ';

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $header .= 'From: ' . self::DEFAULT_CONTACT . '<cafew7>' . "\r\n";

        return mail($to, $subject, $message, $header);
    }
}