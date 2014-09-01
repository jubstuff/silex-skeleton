<?php
use Symfony\Component\HttpFoundation\Request;

$app->get('/', function() use ($app) {
    return $app['twig']->render('home.twig');
})
->bind('home');

$app->get('/about', function() use ($app) {
    return $app['twig']->render('about.twig');
})->bind('about');

$app->match('/contact', function(Request $request) use ($app) {
    $data = array(
        'name' => 'Your name',
        'email' => 'Your email',
        'message' => 'Your message',
    );

    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('name', 'text', array('attr' => array('class' => 'form-control')))
        ->add('email', 'text', array('attr' => array('class' => 'form-control')))
        ->add('message', 'textarea', array('attr' => array('class' => 'form-control')))
        ->getForm();

    $form->handleRequest($request);

    if($form->isValid()) {
        $data = $form->getData();

        $message = \Swift_Message::newInstance()
            ->setSubject('Hello from ASSA')
            ->setFrom(array($data['email']))
            ->setTo(array('giustinob@gmail.com'))
            ->setBody(sprintf("Message from %s\n\n%s", $data['name'], $data['message']));

        $app['mailer']->send($message);

        return $app->redirect('/');
    }

    return $app['twig']->render('contact.twig', array('form' => $form->createView()));
})->bind('contact');
