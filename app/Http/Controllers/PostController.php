<?php

namespace App\Http\Controllers;

use App\Events\PostAddedEvent;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //cfg phpMailer
                    // отправка сигнала на страницу личного кабинета

        $curr_user = $request->input('user_data');
        $data_curr_user = explode(',',$curr_user);
        ($data_curr_user);
        $users = User::where('login', '!=', $data_curr_user[0])->get();
        $form_message = $request['data'];

        $current_post = Post::create([
            'data'=>$form_message,
            'author'=>$data_curr_user[0]
        ]);

        $current_post_id = $current_post['id'];

        $message_model = new Message();
        $message_model->author = $data_curr_user[0];
        $message_model->message = $form_message;
        $message_model->id_post = $current_post_id;
        $message_model->save();
        dd('message_data_save');

            foreach ($users as $user){
                $login = $user['login'];
                $email = $user['email'];
            
                    // SMTP settings for Yandex
                $mail = new PHPMailer(true); // Create a new PHPMailer instance
                $mail->SMTPDebug = 2; // debug
                $mail->isSMTP();
                $mail->Host = 'smtp.yandex.ru'; //host
                $mail->SMTPAuth = true; // dada
                $mail->Username = 'Del1verer@yandex.ru'; // u email
                $mail->Password = 'fiywnosdepeewtej'; // Use the password generated for other applications
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->Subject = 'theme mail';
                
                $mail->setFrom('Del1verer@yandex.ru', 'AdminServ');
                $mail->addAddress( $email, $login);
                $mail->isHTML(true);



                    // Set the HTML body of the email using the view contents
                    
                    $mail->msgHTML("<body>
                    <html>
                        <h1>Здравствуйте, $login</h1></br>
                        <p>Автор: $data_curr_user[0], создал новое сообщение</p>
                    </html>
                    </body>");
                
                // Send the email
                if ($mail->send()) { // отправляем письмо
                    echo ('Письмо отправлено!');
                } else {
                    dd( 'Ошибка: ' . $mail->ErrorInfo);
                }
                

            }



        $data = [
            'login'=>$data_curr_user[0],
            'email'=>$data_curr_user[1]
        ];

        
        return redirect()->route('personal',['login'=>$data['login'], 'email'=>$data['email']]); 


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
