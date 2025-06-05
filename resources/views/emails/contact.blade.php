<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; background-color: #f4f4f4;">
    <table role="presentation" style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 20px 0;">
                <table role="presentation" style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); padding: 30px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 300; letter-spacing: 1px;">
                                📧 New Contact Form Submission
                            </h1>
                        </td>
                    </tr>

                    <!-- Alert Banner -->
                    <tr>
                        <td style="background-color: #fef3c7; border-left: 4px solid #f59e0b; padding: 15px 30px;">
                            <p style="margin: 0; color: #92400e; font-size: 14px; font-weight: 600;">
                                ⚠️ New message received - Please respond within 24 hours
                            </p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <!-- Contact Information Card -->
                            <div style="background-color: #f8fafc; border-radius: 8px; padding: 25px; margin-bottom: 25px; border: 1px solid #e2e8f0;">
                                <h2 style="margin: 0 0 20px 0; color: #1e293b; font-size: 18px; font-weight: 600; border-bottom: 2px solid #4f46e5; padding-bottom: 10px; display: inline-block;">
                                    Contact Details
                                </h2>

                                <table role="presentation" style="width: 100%; border-collapse: collapse;">
                                    <tr>
                                        <td style="padding: 10px 0; vertical-align: top; width: 80px;">
                                            <div style="background-color: #4f46e5; color: #ffffff; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; text-align: center; line-height: 40px;">
                                                👤
                                            </div>
                                        </td>
                                        <td style="padding: 10px 0; vertical-align: top;">
                                            <p style="margin: 0 0 5px 0; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600;">
                                                Full Name
                                            </p>
                                            <p style="margin: 0; font-size: 16px; color: #1e293b; font-weight: 600;">
                                                {{ $data['name'] }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 10px 0; vertical-align: top;">
                                            <div style="background-color: #059669; color: #ffffff; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; text-align: center; line-height: 40px;">
                                                ✉️
                                            </div>
                                        </td>
                                        <td style="padding: 10px 0; vertical-align: top;">
                                            <p style="margin: 0 0 5px 0; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600;">
                                                Email Address
                                            </p>
                                            <p style="margin: 0; font-size: 16px; color: #1e293b; font-weight: 600;">
                                                <a href="mailto:{{ $data['email'] }}" style="color: #059669; text-decoration: none;">
                                                    {{ $data['email'] }}
                                                </a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Message Card -->
                            <div style="background-color: #f8fafc; border-radius: 8px; padding: 25px; border: 1px solid #e2e8f0;">
                                <h2 style="margin: 0 0 20px 0; color: #1e293b; font-size: 18px; font-weight: 600; border-bottom: 2px solid #4f46e5; padding-bottom: 10px; display: inline-block;">
                                    💬 Message Content
                                </h2>

                                <div style="background-color: #ffffff; border-radius: 6px; padding: 20px; border-left: 4px solid #4f46e5; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">
                                    <p style="margin: 0; font-size: 16px; color: #374151; line-height: 1.7; white-space: pre-wrap;">{{ $data['message'] }}</p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div style="text-align: center; margin-top: 30px;">
                                <table role="presentation" style="margin: 0 auto; border-collapse: collapse;">
                                    <tr>
                                        <td style="padding: 0 10px;">
                                            <a href="mailto:{{ $data['email'] }}" style="display: inline-block; background-color: #4f46e5; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">
                                                Reply via Email
                                            </a>
                                        </td>
                                        <td style="padding: 0 10px;">
                                            <a href="#" style="display: inline-block; background-color: #059669; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">
                                                Mark as Read
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f1f5f9; padding: 25px 30px; text-align: center; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0 0 10px 0; font-size: 14px; color: #64748b;">
                                This message was sent via your website contact form
                            </p>
                            <p style="margin: 0; font-size: 12px; color: #94a3b8;">
                                Received on {{ date('F j, Y \a\t g:i A') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
