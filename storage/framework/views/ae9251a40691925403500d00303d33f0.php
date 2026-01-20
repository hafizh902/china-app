<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
</head>
<body style="margin:0; padding:0; background-color:#f5f5f5;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding: 30px 0;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0"
                   style="background:#ffffff; border-radius:12px; overflow:hidden; font-family:Arial, sans-serif;">

                
                <tr>
                    <td align="center"
                    background="https://i.pinimg.com/1200x/2b/dd/be/2bddbec6957375246c3e27bb16333954.jpg"
                    style="
                        background-image:url('https://i.pinimg.com/1200x/2b/dd/be/2bddbec6957375246c3e27bb16333954.jpg');
                        background-size:cover;
                        background-position:center;
                        padding:40px 20px;
                        text-align:center;
                    ">
                        <h2 style="color:#ffffff; margin:0;">Verifikasi Email</h2>
                    </td>
                </tr>

                
                <tr>
                    <td style="padding:30px; color:#333;">
                        <p>Halo 👋</p>

                        <p>
                            Terima kasih telah mendaftar di <b>Chinaon Restaurant</b>.
                            Gunakan kode berikut untuk memverifikasi email Anda:
                        </p>

                        <div style="
                            background:#fef2f2;
                            border:2px dashed #dc2626;
                            text-align:center;
                            font-size:32px;
                            font-weight:bold;
                            letter-spacing:8px;
                            padding:16px;
                            margin:24px 0;
                            color:#b91c1c;
                        ">
                            <?php echo e($code); ?>

                        </div>

                        <p style="font-size:14px;">
                            ⏳ Kode ini berlaku selama <b>10 menit</b>.
                        </p>

                        <p style="font-size:13px; color:#777;">
                            Jika Anda tidak merasa melakukan pendaftaran,
                            abaikan email ini.
                        </p>
                    </td>
                </tr>

                
                <tr>
                    <td style="background:#f3f4f6; padding:16px; text-align:center; font-size:12px; color:#666;">
                        © <?php echo e(date('Y')); ?> Chinaon. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
<?php /**PATH D:\laragon\www\china-app\resources\views/emails/verify-email-otp.blade.php ENDPATH**/ ?>