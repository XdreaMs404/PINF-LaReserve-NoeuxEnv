<?php
namespace Services;

class Mailer
{
    /**
     * Envoie un email ou le logue en local si pas de SMTP
     */
    public static function sendMail(string $to, string $subject, string $html, string $text = ''): bool
    {
        // Si on est en local ou pas de config SMTP, on logue dans un fichier
        // Simple détection : APP_ENV=local ou absence de SMTP_HOST
        if (getenv('APP_ENV') === 'local' && !getenv('SMTP_HOST')) {
            return self::logMail($to, $subject, $html, $text);
        }

        // Sinon on tente mail() natif (suppose serveur configuré)
        $headers = "From: noreply@pinf.local\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        // Version simple HTML
        return mail($to, $subject, $html, $headers);
    }

    private static function logMail(string $to, string $subject, string $html, string $text): bool
    {
        $logDir = defined('ROOT_PATH') ? ROOT_PATH . '/storage' : dirname(__DIR__, 2) . '/storage';

        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $logFile = $logDir . '/mails.log';
        $date = date('Y-m-d H:i:s');

        // On extrait les liens potentiels pour faciliter le clic
        preg_match_all('#https?://[^\s]+#', $html . ' ' . $text, $matches);
        $links = implode("\n -> ", $matches[0] ?? []);

        $logContent = "[$date] TO: $to\nSUBJECT: $subject\nCONTENT (HTML): $html\nLINKS:\n -> $links\n--------------------------------------------------\n";

        return file_put_contents($logFile, $logContent, FILE_APPEND) !== false;
    }
}
