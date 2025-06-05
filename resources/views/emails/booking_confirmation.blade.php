<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; background-color: #f4f4f4;">
    <table role="presentation" style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 20px 0;">
                <table role="presentation" style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 30px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 300; letter-spacing: 1px;">
                                ✈️ Booking Confirmation
                            </h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="margin: 0 0 20px 0; font-size: 18px; color: #333333;">
                                Dear <strong style="color: #667eea;">{{ $booking->user->name }}</strong>,
                            </p>

                            <p style="margin: 0 0 30px 0; font-size: 16px; color: #666666;">
                                Thank you for booking with us! We're excited to have you on board. Here are your booking details:
                            </p>

                            <!-- Booking Details Card -->
                            <div style="background-color: #f8f9fa; border-radius: 8px; padding: 25px; margin: 30px 0; border-left: 4px solid #667eea;">
                                <table role="presentation" style="width: 100%; border-collapse: collapse;">
                                    <tr>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef;">
                                            <strong style="color: #495057; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Tour:</strong>
                                        </td>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef; text-align: right;">
                                            <span style="color: #333333; font-size: 16px; font-weight: 600;">{{ $booking->tour->name }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef;">
                                            <strong style="color: #495057; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Booking Date:</strong>
                                        </td>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef; text-align: right;">
                                            <span style="color: #333333; font-size: 16px;">{{ $booking->booking_date }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef;">
                                            <strong style="color: #495057; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Persons:</strong>
                                        </td>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef; text-align: right;">
                                            <span style="color: #333333; font-size: 16px;">{{ $booking->persons }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef;">
                                            <strong style="color: #495057; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Total Price:</strong>
                                        </td>
                                        <td style="padding: 8px 0; border-bottom: 1px solid #e9ecef; text-align: right;">
                                            <span style="color: #28a745; font-size: 18px; font-weight: 700;">${{ number_format($booking->total_price, 2) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0;">
                                            <strong style="color: #495057; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Status:</strong>
                                        </td>
                                        <td style="padding: 8px 0; text-align: right;">
                                            <span style="background-color: #28a745; color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">{{ ucfirst($booking->status) }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <p style="margin: 30px 0 20px 0; font-size: 16px; color: #666666;">
                                We look forward to providing you with an amazing experience! If you have any questions, please don't hesitate to contact us.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 30px; text-align: center; border-top: 1px solid #e9ecef;">
                            <p style="margin: 0 0 10px 0; font-size: 16px; color: #333333;">
                                Best regards,
                            </p>
                            <p style="margin: 0; font-size: 18px; font-weight: 600; color: #667eea;">
                                Travel Agency Team
                            </p>
                            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e9ecef;">
                                <p style="margin: 0; font-size: 12px; color: #999999;">
                                    This is an automated message. Please do not reply to this email.
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
