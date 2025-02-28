<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        DB::table('contacts')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
        ]);

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->input('email'));

            $mail->isHTML(true);
            $mail->Subject = 'Thank you for reaching out!';
            $mail->Body = '<p style="color:#455056; font-size:14px;line-height:24px; margin-bottom:10px;">
                                Greetings, ' . $request->input('name') . '
                            </p>
                            <p style="color:#455056; font-size:14px;line-height:24px;margin-bottom:15px;">
                                Thank you for your email. We have received your message and will get back to you shortly.
                            </p>';
            $mail->send();

            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Message could not be sent: ' . $mail->ErrorInfo]);
        }
    }
}
