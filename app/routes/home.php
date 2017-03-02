<?php


/**
 *  ->conditions(array('id' => '[1-9]([0-9]*)'));
 *  ->conditions(array('id' => '.+'));     //   butun parametreleri alır / one/two/three
 *  ->conditions(array('device'=>'(tablet|desktop|mobile)') );.
 *
 * Arayüz Rotasyon Ve Kodları
 */
$app->get('/', function () use ($app) {
    echo 'anasayfa';
});

function middleOne()
{
    echo 'deneme deneme deneme dneme deneme deneme dneme ';
}

$app->get('/tuva', 'middleOne', function () use ($app) {
    $app->flash('error', 'User email is required');

    echo '<br>';
    echo '<br>';
    echo LANG;
    echo '<br>';
    echo Tuva::url('/hakkımızda/panpa');
    echo '<br>';
    echo '<br>';
    echo Tuva::assets('deneme.jpg');
    echo '<br>';
    echo '<br>';

    // $app->redirect('/bar');

    $req = $app->request;
    echo $req->getIp().'<br>';
    echo $req->getUserAgent().'<br>';
    echo $req->getUrl().$req->getRootUri().'<br>';
    echo $req->getResourceUri().'<br>';
    echo $req->getContentCharset().'<br>';
    echo $req->getHost().'<br>';
    echo $req->getHostWithPort().'<br>';
    echo $req->getPort().'<br>';
    echo $req->getScheme().'<br>';
    echo $req->getPath().'<br>';
    echo $req->getUrl().'<br>';
    echo $req->getReferrer().'<br>';

    $app->render('deneme', ['user' => 'tuva']);
});

//POST route
$app->post('/post', function () use ($app) {
    echo $app->request()->post('dddd');
});

// GET route
$app->get('/get/:id', 'middleOne', function ($id) use ($Input) {
    echo $Input->get('dddd');
    echo $id;
})->conditions(['id' => '.+']);

//PUT route
$app->put('/put', function () {
    echo 'This is a PUT route';
});

$app->get('/deneme', function () {
    $newContent = new Content();
    $newContent->title = 'deneme';
    $newContent->save();

    echo $newContent->title;
});

//Mail Gönderme route
$app->get('/mailgonder', function () {
    $transport = Swift_SmtpTransport::newInstance('mail.tuva.me', 587)
      ->setUsername('bilgi@tuva.me')
      ->setPassword('pTroEV0E');

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance('Wonderful Subject')
      ->setFrom(['tuvaergun@gmail.com' => 'John Doe'])
      ->setTo(['tuvaergun@gmail.com', 'yasin@ergn.org' => 'A name'])
      ->setBody('Here is the message itself');

    $result = $mailer->send($message);
});

//$app->notFound(function () use ($app) {
//    echo 'This is a 404 route';
//});
