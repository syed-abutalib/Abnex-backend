<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Password Reset</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background:#f9fafb; color:#111827;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#f9fafb; padding:40px 0;">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0"
                    style="max-width:600px; background:#ffffff; border-radius:12px; padding:40px; box-shadow:0 8px 20px rgba(0,0,0,0.05);">
                    <tr>
                        <td align="center" style="padding-bottom:20px;">
                            <h2 style="margin:0; font-size:24px; color:#111827; font-weight:bold;">
                                Password Reset Request
                            </h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-size:15px; color:#374151; line-height:1.6; padding-bottom:25px;">
                            <p>Hello,</p>
                            <p>You recently requested to reset your password. Click the button below to continue:</p>
                        </td>
                    </tr>

                    <!-- Reset Button -->
                    <tr>
                        <td align="center" style="padding-bottom:30px;">
                            <a href="{{ $url }}"
                                style="
                                display:inline-block;
                                padding:14px 28px;
                                background:linear-gradient(135deg, #6366F1, #4F46E5);
                                color:#ffffff;
                                font-size:16px;
                                font-weight:bold;
                                text-decoration:none;
                                border-radius:8px;
                                box-shadow:0 4px 12px rgba(99,102,241,0.3);
                                transition: all 0.3s ease;">
                                Reset Password
                            </a>
                        </td>
                    </tr>

                    <!-- Expiry Notice -->
                    <tr>
                        <td
                            style="font-size:14px; color:#6b7280; line-height:1.5; text-align:center; padding-bottom:25px;">
                            This link will expire in <b style="color:#ef4444;">5 minutes</b>. <br>
                            If you didn’t request a password reset, you can safely ignore this email.
                        </td>
                    </tr>

                    <tr>
                        <td style="font-size:14px; color:#9ca3af; text-align:center;">
                            — The Support Team
                        </td>
                    </tr>
                </table>

                <!-- Footer -->
                <p style="font-size:12px; color:#9ca3af; margin-top:20px;">
                    You received this email because you requested a password reset.
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
