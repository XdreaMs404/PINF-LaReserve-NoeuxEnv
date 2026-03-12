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
        // Construction dynamique de l'expéditeur pour éviter le spam (basé sur le nom de domaine)
        $domain = $_SERVER['HTTP_HOST'] ?? 'pinf.local';
        // Retire le port potentiel (ex: localhost:8000 -> localhost)
        $domain = preg_replace('/:[0-9]+$/', '', $domain);
        
        $fromEmail = "noreply@$domain";
        
        $headers = [];
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=utf-8";
        $headers[] = "From: La Réserve <$fromEmail>";
        $headers[] = "Reply-To: $fromEmail";

        // Envoi via la fonction native mail()
        return mail($to, $subject, $html, implode("\r\n", $headers));
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
